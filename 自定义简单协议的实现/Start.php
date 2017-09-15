<?php
require_once "./init.php";

class Start
{
    public static $address = "127.0.0.2";
    public static $port = "1234";
    public $signal = SIGTERM;
    public $errCodeMsg = array(
        "0001"  => "It's Ok!!",
        "1001"  => "The package Of request was wrong! please check your package!",
        "1002"  => "The transcoding is not support! we just support json or serialize!!",
        "1003"  => "Sorry, decode the data faith!"
    );
    public $filelogPath = "/home/www/test/Protol/Log/";
    public static $instance;
    public $stream;
    public $isBlocking = true; //是否采用阻塞模式 默认非阻塞
    public $protolObj;
    public static $stopAccept = false;
    public static function instance()
    {
        if (!self::$instance) {
            return self::$instance = new static();
        }

        return self::$instance;
    }

   public function __construct()
    {
        $this->protolObj = new \Core\YJProtol();
        $this->init();
    }


    public function init()
    {
        $this->stream = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
        if ($this->stream == false) {
            throw new Exception("init a socket connect faith~." . socket_last_error($this->stream) );
        }
        if (($ret = socket_bind($this->stream, self::$address, self::$port)) == false) {
            throw new Exception("Bind address and port faith~." . socket_last_error($this->stream));
        }

        if (($ret = socket_listen($this->stream,"8192")) == false) {
            throw new Exception("Listen faith!" . socket_last_error($ret));
        }

        $this->isBlocking == false ? socket_set_nonblock($this->stream) : socket_set_block($this->stream);
        echo "Starting listen!!!! \n";
        pcntl_signal(SIGTERM, array($this, 'stopAccept'));
    }

    public function startWorker()
    {
        while(!self::$stopAccept) {
            $connection = socket_accept($this->stream);
            if (false == $connection) {
                #throw new Exception("there is some wrong when get a connection!");
                usleep("300");
            } elseif ($connection > 0){
                $this->forkProcess($connection);
            } else {
                throw_exception("Wrong: " . socket_last_error($connection));
            }

            pcntl_signal_dispatch();
        }
        return;
    }

    public function stopAccept()
    {
        echo "Exit now \n";
        self::$stopAccept = true;
        socket_close($this->stream);
        return true;
    }

    public function forkProcess($connection)
    {
        $pid = pcntl_fork();
        if ($pid == -1) {
            throw new Exception("fork faith");
        } elseif ($pid == 0) {
            $this->dealConnection($connection);
            exit(0);
        } else {
            pcntl_wait($status, WNOHANG);
        }
    }

    public function dealConnection($connection)
    {
        /*socket_recv($connection, $recvData, '8192', MSG_WAITALL);  //错误代码  导致一直循环读取缓冲区的数据造成客户端不退出获取不到完整的数据
        while(!$this->protolObj::input($recvData)) {
            socket_recv($connection, $data, '8192', MSG_WAITALL);
            $recvData .= $data;
        }*/
        $recvData = '';
        while(true) {
            socket_recv($connection, $data, '8192', MSG_EOF);
            $recvData .= $data;
            if (!$this->protolObj::input($recvData)) {
                continue;
            } else {
                break;
            }
        }

        $decodeResult = $this->protolObj::decode($recvData);
        if (!is_array($decodeResult) && strlen($decodeResult) == 4) {
            $string = $this->errCodeMsg[$decodeResult];
            $this->sendData(array("$decodeResult" => $string), $connection);
            $errdate = array();
            $errdate[$decodeResult] = $this->errCodeMsg[$decodeResult];
            $type = $decodeResult === "1003" ? "decode_debug" : "request_debug";
            $this->writeRecvDataToLog($errdate, $type);
            return;
        }
        $this->writeRecvDataToLog($decodeResult, "default");
        $code = "0001";
        $this->sendData(array("0001" => $this->errCodeMsg[$code]), $connection);
        return;
    }


    //$data为数组格式
    public function sendData($data, $conn)
    {
        $sendData = $this->protolObj::encode($data);

        $ret = socket_send($conn, $sendData, '8192', MSG_WAITALL);
        if ($ret == false) {
            throw new Exception("There is some wrong when send data!!!" . socket_last_error($ret));
        }
        return true;
    }
    //写日志 default 正常接受到请求包 解析后的data存入 ， request_debug 请求包错误写入  decode_debug 解析数据错误
    //send 返回的处理结果
    public function writeRecvDataToLog($data, $type = "default")
    {
        $filename = $type == "default" ? "receive.log" : "{$type}.log";
        if (!is_dir($this->filelogPath)) {
            mkdir($this->filelogPath, '775', false);
        }
        $filePath = $this->filelogPath . "$filename";
        $saveData = json_encode($data) . PHP_EOL;
        error_log($saveData, "3", $filePath);
    }
}

$Server = new Start();

$Server->startWorker();