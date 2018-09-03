<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 10:05
 */

namespace bumo\model\request;


class ContractCallRequest
{
    /** @var string */
    private $sourceAddress; //String
    /** @var string */
    private $contractAddress;//String
    /** @var string */
    private $code;//String
    /** @var string */
    private $input;//String
    /** @var int */
    private $contractBalance;//Long
    /** @var int */
    private $optType;//Integer
    /** @var int */
    private $feeLimit;//Long
    /** @var int */
    private $gasPrice;

    /**
     * @return string
     */
    public function getSourceAddress()
    {
        return $this->sourceAddress;
    }

    /**
     * @param string $sourceAddress
     */
    public function setSourceAddress($sourceAddress)
    {
        $this->sourceAddress = $sourceAddress;
    }

    /**
     * @return string
     */
    public function getContractAddress()
    {
        return $this->contractAddress;
    }

    /**
     * @param string $contractAddress
     */
    public function setContractAddress($contractAddress)
    {
        $this->contractAddress = $contractAddress;
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
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param string $input
     */
    public function setInput($input)
    {
        $this->input = $input;
    }

    /**
     * @return int
     */
    public function getContractBalance()
    {
        return $this->contractBalance;
    }

    /**
     * @param int $contractBalance
     */
    public function setContractBalance($contractBalance)
    {
        $this->contractBalance = $contractBalance;
    }

    /**
     * @return int
     */
    public function getOptType()
    {
        return $this->optType;
    }

    /**
     * @param int $optType
     */
    public function setOptType($optType)
    {
        $this->optType = $optType;
    }

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
    }//Long


}