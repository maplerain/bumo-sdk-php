<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 5:50
 */

namespace bumo\model\response;


use bumo\model\response\result\AccountGetNonceResult;

class AccountGetNonceResponse extends BaseResponse
{
    /** @var AccountGetNonceResult */
    private $result;

    /**
     * @return AccountGetNonceResult
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
        $this->result = new AccountGetNonceResult();
        $this->result->setNonce($result->nonce);
    }


}