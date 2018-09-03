<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 8:49
 */

namespace bumo\model\operation;


class BUSendOperation extends OperationBase
{
    /**
     * @var string
     */
    private $destAddress; //string
    /**
     * @var string
     */
    private $amount;

    /**
     * @return string
     */
    public function getDestAddress()
    {
        return $this->destAddress;
    }

    /**
     * @param string $destAddress
     */
    public function setDestAddress($destAddress)
    {
        $this->destAddress = $destAddress;
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    } //long


}