<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 5:59
 */

namespace bumo\model\response;


use bumo\model\response\result\AccountGetBalanceResult;

class AccountGetBalanceResponse extends BaseResponse
{
    /** @var AccountGetBalanceResult */
    private $result;

    /**
     * @return AccountGetBalanceResult
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param \stdClass $result
     */
    public function setResult($result)
    {
        $this->result = new AccountGetBalanceResult();
        $this->result->setBalance($result->balance);
    }

}