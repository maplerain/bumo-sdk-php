<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/8/10
 * Time: 17:25
 */

namespace bumo\common;


class Http
{
    /**
     * @param $url
     * @param $data
     * @param null $header
     * @param int $post
     * @return mixed
     */
    function post($url,$data,$header = null,$post=1)
    {
        //初始化curl
        $ch = curl_init();
        //参数设置
        $res= curl_setopt ($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt ($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, $post);
        if($post)
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        if(null !== $header){
            curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
        }
        $result = curl_exec ($ch);
        //连接失败
        if($result == FALSE){
            $result = "{\"error_code\":\"20000\",\"error_desc\":\"System error\"}";
        }

        curl_close($ch);
        return json_decode($result);
    }

    /**
     * @param $url
     * @param null $header
     * @return mixed
     */
    public static function get($url, $header = null)
    {
        $ch = curl_init();
        //参数设置
        $res= curl_setopt ($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt ($ch, CURLOPT_HEADER, 0);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        if(null !== $header){
            curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
        }
        $result = curl_exec ($ch);
        //连接失败
        if($result == FALSE){
            $result = "{\"error_code\":\"20000\",\"error_desc\":\"System error\"}";
        }
        curl_close($ch);
        return json_decode($result);
    }
}