<?php

namespace Core;

class YJProtol implements \Core\Protol
{
    const MIN_PACK_LENGTH = 13;
    public static $decode_type = array(
        "JSON",
        "DPHP"
    );

    public static function input($data)
    {
        // TODO: Implement input() method   接受数据.
        if (strlen($data) < self::MIN_PACK_LENGTH) {
            return false;
        }
        $pose = strpos($data, "\r\n");
        if ($pose === false || $pose < (self::MIN_PACK_LENGTH - 3)) {
            return false;
        }

        return substr($data, "0", $pose);
    }

    public static function decode($data)
    {
        // TODO: Implement decode() method 解析数据.
        $data = trim($data, "\r\n");
        $data = explode("#", $data);
        if ($data[0] != "LHYJ") {
            return "1001";
        }
        #$recvData = explode(PHP_EOL, $data[1]);
        #var_dump($recvData);
        #var_dump($data);
        if (!in_array($data[1], self::$decode_type)) {
            return "1002";
        }
        switch ($data[1]) {
            case "JSON":
                $result = self::decodeJson($data[2]);
                return $result === false ? "1003" : $result;
                break;
            case "DPHP":
                $result = self::decodeSerialize($data[2]);
                return $result === false ? "1003" : $result;
                break;
        }
    }

    public static function encode($data)
    {
        // TODO: Implement encode() method 加密数据, 推行数据时.
        if (!is_array($data)) {
            $data = array($data);
        }

        $jsonstring = json_encode($data);

        return $jsonstring . "\r\n";
    }


    public static function decodeJson($data)
    {
        return json_decode($data, true);
    }

    public static function decodeSerialize($data)
    {
       return unserialize($data);
    }
}