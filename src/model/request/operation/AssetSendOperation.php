<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 7:46
 */

namespace bumo\model\operation;


use bumo\model\response\BaseResponse;

class AssetSendOperation extends OperationBase
{
    /** @var int */
    private  $destAddress; //Long
    /** @var string */
    private  $code; //string
    /** @var string */
    private  $issuer; //string
    /** @var int */
    private  $amount;

    /**
     * @return int
     */
    public function getDestAddress()
    {
        return $this->destAddress;
    }

    /**
     * @param int $destAddress
     */
    public function setDestAddress($destAddress)
    {
        $this->destAddress = $destAddress;
    }

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

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    } //Long


}