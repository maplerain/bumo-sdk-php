<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/2
 * Time: 6:27
 */

namespace bumo;


use bumo\account\Account;
use bumo\common\General;

class SDK
{
    private static $instance;

    private function __construct($url)
    {
        General::$url = $url;
    }

    public static function getInstance($url)
    {
        if(!self::$instance instanceof self){
            self::$instance = new self($url);
        }
        return self::$instance;
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public function block()
    {
        return new blockchain\Block();
    }

    public function account()
    {
        return new Account();
    }
}