<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 8:51
 */

namespace bumo\token;


use bumo\crypto\Keypair;
use bumo\exception\Error;
use bumo\model\operation\BUSendOperation;
use Protocol\Operation;

class Bu
{
    /**
     * @param BUSendOperation $operation
     * @throws \Exception
     * @return Operation
     */
    public function send($operation)
    {
        $keyPair = new Keypair();
        $amount = $operation->getAmount();
        if(0 > $amount || 9223372036854775807 < $amount){
            throw new \Exception(Error::getError("INVALID_BU_AMOUNT_ERROR")['errorDesc']);
        }
        $dest = $operation->getDestAddress();
        if(!isset($dest) || !$keyPair->checkAddress($dest)){
            throw new \Exception(Error::getError("INVALID_DESTADDRESS_ERROR")['errorDesc']);
        }
        $src = $operation->getSourceAddress();
        //1该数据结构用于构建BU
        $createAccount = new \Protocol\OperationPayCoin();
        $createAccount->setDestAddress($dest);
        $createAccount->setAmount($amount);

        $oper = new Operation();
        $oper->setSourceAddress($src);
        $oper->setType(7);
        $oper->setPayCoin($createAccount);
        return $oper;
    }
}