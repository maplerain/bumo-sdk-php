<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 5:19
 */

namespace bumo\model\response;


use bumo\model\response\result\AccountCreateResult;

class AccountCreateResponse extends  BaseResponse
{
    /** @var AccountCreateResult */
    private $result;

    /**
     * @return AccountCreateResult
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param \stdClass|AccountCreateResult $result
     */
    public function setResult($result)
    {
        if($result instanceof AccountCreateResult){
            $this->result = $result;
        }else{
            $this->result = new AccountCreateResult();
            $this->result->setAddress($result->address);
            $this->result->setPrivateKey($result->privateKey);
            $this->result->setPublicKey($result->publicKey);
        }
    }


}