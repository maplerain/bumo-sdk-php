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
use bumo\model\request\ContractCallRequest;
use bumo\model\request\ContractCheckValidRequest;
use bumo\model\request\ContractGetAddressRequest;
use bumo\model\request\ContractGetInfoRequest;
use bumo\model\response\ContractCallResponse;
use bumo\model\response\ContractCheckValidResponse;
use bumo\model\response\ContractGetAddressResponse;
use bumo\model\response\ContractGetInfoResponse;
use bumo\model\response\result\ContractGetInfoResult;
use bumo\model\response\TransactionGetInfoResponse;
use bumo\SDK;

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
        //通过hash，获取信息
        $result = SDK::getInstance("")->transaction()->getTransactionInfo($hash);
        // echo $result;exit;
        $ContractGetAddressResponse = new ContractGetAddressResponse();
        $resultObject = json_decode($result); //转对象
        if($resultObject->error_code ==4 ){
            throw new  \Exception($hash .' is error!', 1);
        }

        $TransactionGetInfoResponse = new TransactionGetInfoResponse();
        $TransactionGetInfoResponse->setErrorCode($resultObject->error_code);
        $TransactionGetInfoResponse->setResult($resultObject->result);
        // var_dump($TransactionGetInfoResponse->getResult()->getTransactions()[0]);exit;
        $transactionHistory = $TransactionGetInfoResponse->getResult()->getTransactions()[0];
        $contractAddress = $transactionHistory->getErrorDesc();
        $contractAddressOb = json_decode($contractAddress);
        // foreach ($$contractAddressOb as $key => $value) {
        //     $temp = new \src\model\response\result\data\ContractAddressInfo();
        //     $temp
        // }
        // $resultOb = new \src\model\response\result\ContractGetAddressResult();
        $result=array();
        $result['contract_address_infos'] = $contractAddressOb;
        // var_dump(json_decode(json_encode($result)));exit;
        $ContractGetAddressResponse->setErrorCode($resultObject->error_code);
        $ContractGetAddressResponse->setResult(json_decode(json_encode($result)));

        return $ContractGetAddressResponse;
    }

    /**
     * @param $req ContractCallRequest
     * @return ContractCallResponse
     * @throws \Exception
     */
    public function call($req)
    {
        $result = Http::get(General::accountGetInfoUrl($req->getContractAddress()));
        $keyPair = new Keypair();
        $response = new ContractCallResponse();
        $getSourceAddress = $req->getSourceAddress();
        if($getSourceAddress && !$keyPair->checkAddress($getSourceAddress)){
            $error = Error::getError("INVALID_CONTRACTADDRESS_ERROR");
            $response->setErrorCode($error['errorCode']);
            $response->setErrorDesc($error['errorDesc']);
            return $response;
        }

        $getContractAddress = $req->getContractAddress();
        if($getContractAddress && !$keyPair->checkAddress($getContractAddress)){
            $error = Error::getError("INVALID_CONTRACTADDRESS_ERROR");
            $response->setErrorCode($error['errorCode']);
            $response->setErrorDesc($error['errorDesc']);
            return $response;
        }

        if ($getSourceAddress && $getContractAddress && $getContractAddress==$getSourceAddress) {
            $error = Error::getError("SOURCEADDRESS_EQUAL_CONTRACTADDRESS_ERROR");
            $response->setErrorCode($error['errorCode']);
            $response->setErrorDesc($error['errorDesc']);
            return $response;
        }

        $code = $req->getCode();
        if(!$code && !$getContractAddress){
            $error = Error::getError("CONTRACTADDRESS_CODE_BOTH_NULL_ERROR");
            $response->setErrorCode($error['errorCode']);
            $response->setErrorDesc($error['errorDesc']);
            return $response;
        }

        $feeLimit = $req->getFeeLimit();
        if(!$feeLimit || $feeLimit< 1){
            $error = Error::getError("INVALID_FEELIMIT_ERROR");
            $response->setErrorCode($error['errorCode']);
            $response->setErrorDesc($error['errorDesc']);
            return $response;
        }

        $optType = $req->getOptType();
        if(is_null($optType) || $optType< 0 || $optType> 2){
            $error = Error::getError("INVALID_OPTTYPE_ERROR");
            $response->setErrorCode($error['errorCode']);
            $response->setErrorDesc($error['errorDesc']);
            return $response;
        }
        $input = $req->getInput();
        $contractBalance = $req->getContractBalance();
        $gasPrice = $req->getGasPrice();


        if(!General::$url){
            $error = Error::getError("URL_EMPTY_ERROR");
            $response->setErrorCode($error['errorCode']);
            $response->setErrorDesc($error['errorDesc']);
            return $response;
        }

        $param = array();
        $param['opt_type'] = $optType;
        $param['fee_limit'] = $feeLimit;
        // echo $getContractAddress;exit;
        if($getSourceAddress)
            $param['source_address'] = $getSourceAddress;
        if($getContractAddress)
            $param['contract_address'] = $getContractAddress;
        if($code)
            $param['code'] = $code;
        if($input)
            $param['input'] = $input;
        if($contractBalance)
            $param['contract_balance'] = $contractBalance;
        if($gasPrice)
            $param['gas_price'] = $gasPrice;

// var_dump($param);exit;
        $contractGetInfoUrl = General::contractCallUrl();
        $result = Http::post($contractGetInfoUrl,$param);
        $resultObject = json_decode($result); //转对象
        if($resultObject->error_code==4){
            $error = Error::getError("SYSTEM_ERROR");
            $response->setErrorCode($error['errorCode']);
            $response->setErrorDesc($error['errorDesc']);
            return $response;
        }
        // var_dump($resultObject);exit;

        $response->setErrorCode($resultObject->error_code);
        $response->setResult($resultObject->result);
        return $response;
    }

    /**
     * @param $req ContractCheckValidRequest
     * @return ContractCheckValidResponse
     * @throws \Exception
     */
    public function checkValid($req)
    {
        $result = Http::get(General::accountGetInfoUrl($req->getContractAddress()));
        $response = new ContractCheckValidResponse();
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