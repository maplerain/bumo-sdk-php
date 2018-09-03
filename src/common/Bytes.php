<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/8/9
 * Time: 18:03
 */

namespace bumo\common;
/**
 * Class Bytes
 * byte数组与字符串转化类
 * @package bumo\encryption
 */
class Bytes {
    /**
     * 转换一个string字符串为byte数组
     * @param $str, 需要转换的字符串
     * @return array, 目标byte数组
     */
    public static function getbytes($str) {

        $len = strlen($str);
        $bytes = array();
        for($i=0;$i<$len;$i++) {
//            if(ord($str[$i]) >= 128){
//                $byte = ord($str[$i]) - 256;
//            }else{
//                $byte = ord($str[$i]);
//            }
            $bytes[] =  ord($str[$i]) ;
        }
        return $bytes;
    }

    /**
     * 将字节数组转化为string类型的数据
     * @param $bytes, 字节数组
     * @return string 一个string类型的数据
     */

    public static function tostr($bytes) {
        $str = '';
        foreach($bytes as $ch) {
            $str .= chr($ch);
        }
        return $str;
    }

    /**
     * 转换一个int为byte数组
     * @param $val 需要转换的字符串
     * @return array 返回byte数组
     */

    public static function integertobytes($val) {
        $byt = array();
        $byt[0] = ($val & 0xff);
        $byt[1] = ($val >> 8 & 0xff);
        $byt[2] = ($val >> 16 & 0xff);
        $byt[3] = ($val >> 24 & 0xff);
        return $byt;
    }

    /**
     * 从字节数组中指定的位置读取一个integer类型的数据
     * @param $bytes 字节数组
     * @param $position 指定的开始位置
     * @return integer 一个integer类型的数据
     */

    public static function bytestointeger($bytes, $position) {
        $val = 0;
        $val = $bytes[$position + 3] & 0xff;
        $val <<= 8;
        $val |= $bytes[$position + 2] & 0xff;
        $val <<= 8;
        $val |= $bytes[$position + 1] & 0xff;
        $val <<= 8;
        $val |= $bytes[$position] & 0xff;
        return $val;
    }

    /**
     * 转换一个shor字符串为byte数组
     * @param $val 需要转换的字符串
     * @return  array
     */

    public static function shorttobytes($val) {
        $byt = array();
        $byt[0] = ($val & 0xff);
        $byt[1] = ($val >> 8 & 0xff);
        return $byt;
    }

    /**
     * 从字节数组中指定的位置读取一个short类型的数据。
     * @param $bytes 字节数组
     * @param $position 指定的开始位置
     * @return int 一个short类型的数据
     */

    public static function bytestoshort($bytes, $position) {
        $val = 0;
        $val = $bytes[$position + 1] & 0xff;
        $val = $val << 8;
        $val |= $bytes[$position] & 0xff;
        return $val;
    }

}
