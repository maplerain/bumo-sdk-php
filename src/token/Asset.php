<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 7:51
 */

namespace bumo\token;


use bumo\crypto\Keypair;

use bumo\exception\Error;
use bumo\model\operation\AssetIssueOperation;
use bumo\model\operation\AssetSendOperation;
use Protocol\Operation;

class Asset
{
    public function __construct()
    {
    }

    /**
     * @param  AssetIssueOperation $operation
     * @throws \Exception
     * @return Operation
     */
    public function issue($operation)
    {
        $keyPair = new Keypair();
        if(null != $operation->getSourceAddress()){
            if(false == $keyPair->checkAddress($operation->getSourceAddress())){
                throw new \Exception(Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorCode'],
                    Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorDesc']);
            }
        }
        $code = $operation->getCode();
        $lenCode = strlen($code);
        if($lenCode > 64 || $lenCode == 0){
            throw new \Exception(Error::getError("INVALID_ASSET_CODE_ERROR")['errorCode'],
                Error::getError("INVALID_ASSET_CODE_ERROR")['errorDesc']);
        }

        if($operation->getAmount() <=0 ){
            throw new \Exception(Error::getError("INVALID_ISSUE_AMMOUNT_ERROR")['errorCode'],
                Error::getError("INVALID_ISSUE_AMMOUNT_ERROR")['errorDesc']);
        }
        $OperationIssueAsset = new \Protocol\OperationIssueAsset();
        $OperationIssueAsset->setCode($code);
        $OperationIssueAsset->setAmount($operation->getAmount());

        //2
        $oper = new Operation();
        if(!$operation->getSourceAddress())
            $oper->setSourceAddress($operation->getSourceAddress());
        $oper->setMetadata($operation->getMetadata());
        $opertype = 2;
        $oper->setType($opertype);
        $oper->setIssueAsset($OperationIssueAsset);
        return $oper;
    }

    /**
     * @param  AssetSendOperation $operation
     * @throws \Exception
     * @return Operation
     */
    public function send($operation)
    {
        $keyPair = new Keypair();
        if(false == $keyPair->checkAddress($operation->getIssuer())){
            throw new \Exception(Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorCode'],
                Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorDesc']);
        }
        $code = $operation->getCode();
        $lenCode = strlen($code);
        if($lenCode > 64 || $lenCode == 0){
            throw new \Exception(Error::getError("INVALID_ASSET_CODE_ERROR")['errorCode'],
                Error::getError("INVALID_ASSET_CODE_ERROR")['errorDesc']);
        }

        if($operation->getAmount() < 0 ){
            throw new \Exception(Error::getError("INVALID_ISSUE_AMMOUNT_ERROR")['errorCode'],
                Error::getError("INVALID_ISSUE_AMMOUNT_ERROR")['errorDesc']);
        }
        if(false == $keyPair->checkAddress($operation->getDestAddress())){
            throw new \Exception(Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorCode'],
                Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorDesc']);
        }

        // build operation
        //1该数据结构
        $OperationPayAsset = new \Protocol\OperationPayAsset();
        $OperationPayAsset->setDestAddress($operation->getDestAddress());

        $Asset = new \Protocol\Asset();
        $AssetKey = new \Protocol\AssetKey();
        $AssetKey->setCode($code);
        $AssetKey->setIssuer($operation->getIssuer());
        $Asset->setKey($AssetKey);
        $Asset->setAmount($operation->getAmount());
        $OperationPayAsset->setAsset($Asset);

        //2
        $oper = new \Protocol\Operation();
        if(!$operation->getSourceAddress())
            $oper->setSourceAddress($operation->getSourceAddress());
        if(!$operation->getMetadata())
            $oper->setMetadata($operation->getMetadata());
        $opertype = 3;
        $oper->setType($opertype);
        $oper->setPayAsset($OperationPayAsset);
        return $oper;
    }
}