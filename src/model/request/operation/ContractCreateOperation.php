<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 9:05
 */

namespace bumo\model\operation;


class ContractCreateOperation extends OperationBase
{
    /** @var int */
    private $initBalance;//Long
    /** @var int */
    private $type;//Integer
    /** @var string */
    private $payload;//String
    /** @var string */
    private $initInput;

    /**
     * @return int
     */
    public function getInitBalance()
    {
        return $this->initBalance;
    }

    /**
     * @param int $initBalance
     */
    public function setInitBalance($initBalance)
    {
        $this->initBalance = $initBalance;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param string $payload
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
    }

    /**
     * @return string
     */
    public function getInitInput()
    {
        return $this->initInput;
    }

    /**
     * @param string $initInput
     */
    public function setInitInput($initInput)
    {
        $this->initInput = $initInput;
    }//String


}