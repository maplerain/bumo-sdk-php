<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/8/21
 * Time: 16:13
 */

namespace bumo\model\operation;


class AccountActivateOperation extends OperationBase
{
    /**
     * @var string
     */
    private $destAddress;
    /**
     * @var int
     */
    private $initBalance;

    public function __construct()
    {
        $this->destAddress = null;
        $this->initBalance = 0;
        parent::__construct();
    }

    /**
     * @param $address
     */
    public function setDestAddress($address)
    {
        $this->destAddress = $address;
    }

    /**
     * @return null|string
     */
    public function getDestAddress(){
        return $this->destAddress;
    }

    /**
     * @param $balance
     */
    public function setInitBalance($balance){
        $this->initBalance = $balance;
    }

    /**
     * @return int
     */
    public function getInitBalance(){
        return $this->initBalance;
    }
}