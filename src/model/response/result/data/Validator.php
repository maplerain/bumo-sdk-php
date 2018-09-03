<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 0:36
 */

namespace bumo\model\response\result\data;


class Validator
{
    /**
     * @var string
     */
    private $address;//String address
    /**
     * @var int
     */
    private  $pledgeCoinAmount;

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getPledgeCoinAmount()
    {
        return $this->pledgeCoinAmount;
    }

    /**
     * @param int $pledgeCoinAmount
     */
    public function setPledgeCoinAmount($pledgeCoinAmount)
    {
        $this->pledgeCoinAmount = $pledgeCoinAmount;
    }


}