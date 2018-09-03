<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 9:09
 */

namespace bumo\model\operation;


class ContractInvokeByBUOperation extends OperationBase
{
    /** @var int */
    private  $contractAddress; //Long
    /** @var int */
    private  $buAmount; //Long
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
     * @return int
     */
    public function getBuAmount()
    {
        return $this->buAmount;
    }

    /**
     * @param int $buAmount
     */
    public function setBuAmount($buAmount)
    {
        $this->buAmount = $buAmount;
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
    }

}