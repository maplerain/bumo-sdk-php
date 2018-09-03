<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 2:48
 */

namespace bumo\model\response\result\data;


class PayCoin
{
    /**
     * @var string
     */
    private  $destAddress;//String  dest_address
    /**
     * @var string
     */
    private  $amount;//Long amount
    /**
     * @var string
     */
    private  $input;

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

}