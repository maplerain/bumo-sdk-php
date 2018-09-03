<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 11:33
 */

namespace bumo\model\response\result\data;


class TransactionFees
{
    /**
     * @var int
     */
    private $feeLimit; //long  fee_limit
    /** @var int */
    private $gasPrice;

    /**
     * @return int
     */
    public function getFeeLimit()
    {
        return $this->feeLimit;
    }

    /**
     * @param int $feeLimit
     */
    public function setFeeLimit($feeLimit)
    {
        $this->feeLimit = $feeLimit;
    }

    /**
     * @return int
     */
    public function getGasPrice()
    {
        return $this->gasPrice;
    }

    /**
     * @param int $gasPrice
     */
    public function setGasPrice($gasPrice)
    {
        $this->gasPrice = $gasPrice;
    } //long  gas_price


}