<?php

require_once "./init.php";

class Client
{
    public static $instance;
    public $hostAddress = "127.0.0.2";
    public $hostPort = "1234";
    public $client;
    public $fileLogPath = "/home/www/test/Protol/Client_Log/";
    public $supportWay = array(
        "JSON",
        "DPHP"
    );
    const PACKAGE_HEAD = "LHYJ#";
    const DEFAULT_ENCODE_WAY = "JSON";

    public static function instance()
    {
        if (!self::$instance) {
            return self::$instance = new static();
        }

        return self::$instance;
    }

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $this->client = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($this->client === false) {
            throw new Exception("客服端建立连接错误！！！" . socket_strerror(socket_last_error($this->client)));
        }

        $ret = socket_connect($this->client, $this->hostAddress, $this->hostPort);
        if ($ret === false) {
            throw new Exception("Connect faith!!" . socket_strerror(socket_last_error($this->client)));
        }
        #socket_set_block($this->client);
        echo "客服端建立连接成功！ \n";
    }

    //发送的data  $protol 编码方式
    public function startWorker($data, $protol)
    {
        $encodeData = $this->encodeSendData($data, $protol);
        if ($encodeData === false) {
            error_log("编码失败！！！！", "3", $this->fileLogPath . "encode_debug.log");
            return false;
        }
        $this->writeLog($data, "send.log");
        $ret = socket_send($this->client, $encodeData,'8192', MSG_WAITALL);
        if ($ret != false ) {
            /*socket_recv($this->client, $recvData, "8192", MSG_WAITALL);
            if ($recvData != '') {
                $decodeData = $this->decodeRecvData($recvData);
                $this->writeLog($decodeData, "receive.log");
                echo "receive some data from server!!\n";
                $this->closeConnect();
            }*/
            while (true) {
                socket_recv($this->client, $data, '8192', MSG_EOF);
                if ($data == '') {
                    sleep(1);
                    continue;
                } else {
                    break;
                }
            }

            echo "Receive some data from server!!\n";
            $this->closeConnect();
        } else {
            echo "发送数据失败！\n";
            return false;
        }
    }

    public function dealInput($data)
    {
        $data = trim($data);
        $pos = strpos($data, ":");
        if ($pos === false) {
            return false;
        }

        return explode(":", $data);
    }

    //按照协议组成数据包发送
    public function encodeSendData($data, $protol)
    {
        $protol = in_array($protol, $this->supportWay) ? $protol : self::DEFAULT_ENCODE_WAY;

        $package = self::PACKAGE_HEAD . $protol . '#';
        $encodeData = '';
        switch ($protol) {
            case self::DEFAULT_ENCODE_WAY:
                $encodeData = $this->encodeJson($data);
                break;
            default:
                $encodeData = $this->encodePhp($data);
                break;
        }

        $package .= $encodeData . "\r\n";

        return $package;
    }

    public function encodeJson($data)
    {
        return json_encode($data);
    }

    public function encodePhp($data)
    {
        return serialize($data);
    }
    //解析返回的数据包
    public function decodeRecvData($data)
    {
        $trimData = trim($data,"\r\n");

        return json_decode($trimData, true);
    }

    // 写日志 type = filename of filelog
    public function writeLog($data, $type = '')
    {
        if (!is_dir($this->fileLogPath)) {
            mkdir($this->fileLogPath, "775", false);
        }
        if (!is_array($data)) {
            $data = array($data);
        }

        if (empty($data)) {
            return false;
        }
        $filename = $this->fileLogPath . $type;
        $datastring = implode("####", $data) . PHP_EOL;
        error_log($datastring, "3", $filename);
    }

    public function closeConnect()
    {
        socket_close($this->client);
        return;
    }
}

fputs(STDOUT, "请输入需要发送的数据信息， 格式： xxx:content \n");

$Client = new Client();

while (true) {   //  这里决定不能持续在此做多次的输入 因为在实例类中 真正完成一套请求（即发送请求与接受处理后的请求后）会关闭套接字链接 需再次实例化！
    $data = fgets(STDIN);
    if ($data == '') {
        sleep("2");
        return;
    }

    $dealData = $Client->dealInput($data);
    if ($dealData == false) {
        echo "需要发送的数据格式不正确！ \n";
        return;
    }

    $Client->startWorker($dealData, "JSON");
}