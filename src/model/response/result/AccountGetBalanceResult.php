<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 5:59
 */

namespace bumo\model\response\result;


class AccountGetBalanceResult
{
    /** @var int */
    private $balance;

    /**
     * @return int
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param int $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

}