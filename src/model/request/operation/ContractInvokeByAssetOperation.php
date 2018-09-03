<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 9:07
 */

namespace bumo\model\operation;


class ContractInvokeByAssetOperation extends OperationBase
{
    /** @var int */
    private  $contractAddress; //Long
    /** @var string */
    private  $code; //string
    /** @var string */
    private  $issuer; //string
    /** @var int */
    private  $assetAmount; //Long
    /** @var int */
    private  $input;

    /**
     * @return int
     */
    public function getContractAddress()
    {
        return $this->contractAddress;
    }

    /**
     * @param int $contractAddress
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
    public function getAssetAmount()
    {
        return $this->assetAmount;
    }

    /**
     * @param int $assetAmount
     */
    public function setAssetAmount($assetAmount)
    {
        $this->assetAmount = $assetAmount;
    }

    /**
     * @return int
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param int $input
     */
    public function setInput($input)
    {
        $this->input = $input;
    } //Long


}