<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 5:39
 */

namespace bumo\model\response;


use bumo\model\response\result\AccountGetInfoResult;

class AccountGetInfoResponse extends BaseResponse
{
    /** @var AccountGetInfoResult */
    private $result;

    /**
     * @return AccountGetInfoResult
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param AccountGetInfoResult $result
     */
    public function setResult($result)
    {
        if($result instanceof AccountGetInfoResult){
            $this->result = $result;
        }else{
            $resultOb = new AccountGetInfoResult();
            $resultOb->setAddress(isset($result->address)?$result->address:"");
            $resultOb->setBalance(isset($result->balance)?$result->balance:"");
            $resultOb->setNonce(isset($result->nonce)?$result->nonce:"");
            if(isset($result->priv))
                $resultOb->setPriv($result->priv);
            $this->result = $resultOb;
        }
    }


}