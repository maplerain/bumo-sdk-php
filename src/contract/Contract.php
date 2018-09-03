<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 9:12
 */

namespace bumo\contract;


use bumo\common\General;
use bumo\common\Http;
use bumo\crypto\Keypair;
use bumo\exception\Error;
use bumo\model\operation\ContractCreateOperation;
use bumo\model\operation\ContractInvokeByAssetOperation;
use bumo\model\operation\ContractInvokeByBUOperation;
use bumo\model\request\ContractGetAddressRequest;
use bumo\model\request\ContractGetInfoRequest;
use bumo\model\response\ContractGetAddressResponse;
use bumo\model\response\ContractGetInfoResponse;
use bumo\model\response\result\ContractGetInfoResult;

class Contract
{
    /**
     * @param $operation ContractCreateOperation
     * @throws \Exception
     * @return \Protocol\Operation
     */
    public function create($operation)
    {
        $keyPair = new Keypair();
        $src = $operation->getSourceAddress();
        if(isset($src) && !$keyPair->checkAddress($src)){
            throw new \Exception(Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorDesc']);
        }
        if(0 >= $operation->getInitBalance()){
            throw new \Exception(Error::getError("INVALID_INITBALANCE_ERROR")['errorDesc']);
        }

        if("" == $operation->getPayload()){
            throw new \Exception(Error::getError("INVALID_PAYLOAD_ERROR")['errorDesc']);
        }
        $metadata = $operation->getMetadata();
        $initInput = $operation->getInitInput();

        //1该数据结构用于创建账户

        $createAccount = new \Protocol\OperationCreateAccount();
        $createAccount->setInitBalance($operation->getInitBalance());
        if(!$initInput)
            $createAccount->setInitInput($initInput);
        $accountThreshold = new \Protocol\AccountThreshold();
        $accountThreshold->setTxThreshold(1);
        $accountPrivilege = new \Protocol\AccountPrivilege();
        $accountPrivilege->setMasterWeight(0);
        $accountPrivilege->setThresholds($accountThreshold);
        $createAccount->setPriv($accountPrivilege);

        $contractinfo = new \Protocol\Contract();
        $contractinfo->setPayload($operation->getPayload());
        $createAccount->setContract($contractinfo);

        //2
        $oper = new \Protocol\Operation();
        $oper->setSourceAddress($operation->getSourceAddress());
        $oper->setMetadata($metadata);
        $opertype = 1;//$ContractCreateOperation->getOperationType();
        $oper->setType($opertype);
        $oper->setCreateAccount($createAccount);
        return $oper;
    }

    /**
     * @param $operation ContractInvokeByAssetOperation
     * @throws \Exception
     * @return \Protocol\Operation
     */
    public function invokeByAsset($operation)
    {
        $keyPair = new Keypair();
        $src = $operation->getSourceAddress();
        if(isset($src) && !$keyPair->checkAddress($src)){
            throw new \Exception(Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorDesc']);
        }

        if(!$keyPair->checkAddress($operation->getContractAddress())){
            throw new \Exception(Error::getError("SOURCEADDRESS_EQUAL_CONTRACTADDRESS_ERROR")['errorDesc']);
        }

        if(strlen($operation->getCode()) > 64){
            throw new \Exception(Error::getError("INVALID_ASSET_CODE_ERROR")['errorDesc']);
        }

        if($operation->getAssetAmount() < 0){
            throw new \Exception(Error::getError("INVALID_ASSET_AMOUNT_ERROR")['errorDesc']);
        }

        if("" != $operation->getIssuer() && !$keyPair->checkAddress($operation->getIssuer())){
            throw new \Exception(Error::getError("INVALID_ISSUER_ADDRESS_ERROR")['errorDesc']);
        }
        $metadata = $operation->getMetadata();
        $initInput = $operation->getInput();

        //1数据结构
        $OperationPayAsset = new \Protocol\OperationPayAsset();
        $OperationPayAsset->setDestAddress($operation->getContractAddress());
        if(!$initInput)
            $OperationPayAsset->setInput($initInput);

        if(!$operation->getCode() && !$operation->getIssuer() &&
            !$operation->getAssetAmount() && $operation->getAssetAmount>0){
            $Asset = new \Protocol\Asset();
            $AssetKey = new \Protocol\AssetKey();
            $AssetKey->setCode($operation->getCode());
            $AssetKey->setIssuer($operation->getIssuer());
            $Asset->setAmount($operation->getAssetAmount());
            $Asset->setKey($AssetKey);
            $OperationPayAsset->setAsset($Asset);
        }
// echo 2;exit;
        //2
        $oper = new \Protocol\Operation();
        $oper->setSourceAddress($operation->getSourceAddress());
        $oper->setMetadata($metadata);
        $opertype = 3;//PAY_ASSE
        $oper->setType($opertype);
        $oper->setPayAsset($OperationPayAsset);
        return $oper;
    }

    /**
     * @param $operation ContractInvokeByBUOperation
     * @throws \Exception
     * @return \Protocol\Operation
     */
    public function invokeByBU($operation)
    {
        $keyPair = new Keypair();
        $src = $operation->getSourceAddress();
        if(isset($src) && !$keyPair->checkAddress($src)){
            throw new \Exception(Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorDesc']);
        }

        if(!$keyPair->checkAddress($operation->getContractAddress())){
            throw new \Exception(Error::getError("SOURCEADDRESS_EQUAL_CONTRACTADDRESS_ERROR")['errorDesc']);
        }

        if($operation->getBuAmount() < 0){
            throw new \Exception(Error::getError("INVALID_BU_AMOUNT_ERROR")['errorDesc']);
        }

        if($operation->getSourceAddress() && $operation->getSourceAddress() == $operation->getContractAddress()){
            throw new \Exception(Error::getError("SOURCEADDRESS_EQUAL_CONTRACTADDRESS_ERROR")['errorDesc']);
        }
        $metadata = $operation->getMetadata();
        $initInput = $operation->getInput();

        //1数据结构
        $OperationPayCoin = new \Protocol\OperationPayCoin();
        $OperationPayCoin->setDestAddress($operation->getContractAddress());
        $OperationPayCoin->setAmount($operation->getBuAmount());
        if(!$initInput)
            $OperationPayCoin->setInput($initInput);

        //2
        $oper = new \Protocol\Operation();
        $oper->setSourceAddress($operation->getSourceAddress());
        $oper->setMetadata($metadata);
        $opertype = 7;//pay_coin
        $oper->setType($opertype);
        $oper->setPayCoin($OperationPayCoin);
        return $oper;
    }


    /**
     * @param $req ContractGetInfoRequest
     * @return ContractGetInfoResponse
     * @throws \Exception
     */
    public function getInfo($req)
    {
        $result = Http::get(General::accountGetInfoUrl($req->getContractAddress()));
        $response = new ContractGetInfoResponse();
        if(0 != $result->error_code){
            if(4 == $result->error_code){
                $error = Error::getError("SYSTEM_ERROR");
                $response->setErrorCode($error['errorCode']);
                $response->setErrorDesc($error['errorDesc']);
            }else{
                $response->setErrorCode($result->error_code);
                $response->setErrorDesc($result->error_desc);
            }
        }else{
            $error = Error::getError("SUCCESS");
            $response->setErrorCode($error['errorCode']);
            $response->setErrorDesc($error['errorDesc']);
            var_dump($result->result);
            $response->setResult($result->result);
        }
        return $response;
    }
    /**
     * @param $req ContractGetAddressRequest
     * @return ContractGetAddressResponse
     * @throws \Exception
     */
    public function getAddress($req)
    {
        $result = Http::get(General::c($req->getContractAddress()));
        $response = new ContractGetAddressResponse();
        if(0 != $result->error_code){
            if(4 == $result->error_code){
                $error = Error::getError("SYSTEM_ERROR");
                $response->setErrorCode($error['errorCode']);
                $response->setErrorDesc($error['errorDesc']);
            }else{
                $response->setErrorCode($result->error_code);
                $response->setErrorDesc($result->error_desc);
            }
        }else{
            $error = Error::getError("SUCCESS");
            $response->setErrorCode($error['errorCode']);
            $response->setErrorDesc($error['errorDesc']);
            var_dump($result->result);
            $response->setResult($result->result);
        }
        return $response;
    }
}