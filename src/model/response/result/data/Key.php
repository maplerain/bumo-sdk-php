<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 2:34
 */

namespace bumo\model\response\result\data;


class Key
{
    /**
     * @var string
     */
    private $code;
    /**
     * @var string
     */
    private $issuer;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getIssuer()
    {
        return $this->issuer;
    }

    /**
     * @param string $issuer
     */
    public function setIssuer($issuer)
    {
        $this->issuer = $issuer;
    }

}