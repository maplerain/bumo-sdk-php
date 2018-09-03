<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 5:14
 */

namespace bumo\account;
use bumo\common\General;
use bumo\common\Http;
use bumo\crypto\Keypair;
use bumo\exception\Error;
use bumo\model\request\AccountCheckValidRequest;
use bumo\model\request\AccountGetAssetsRequest;
use bumo\model\request\AccountGetBalanceRequest;
use bumo\model\request\AccountGetInfoRequest;
use bumo\model\request\AccountGetMetadataRequest;
use bumo\model\request\AccountGetNonceRequest;
use bumo\model\response\AccountCheckValidResponse;
use bumo\model\response\AccountGetAssetsResponse;
use bumo\model\response\AccountGetBalanceResponse;
use bumo\model\response\AccountGetInfoResponse;
use bumo\model\response\AccountGetMetadataResponse;
use bumo\model\response\AccountGetNonceResponse;
use bumo\model\response\result\AccountGetAssetsResult;

use Protocol\Operation;

class Account
{
    public function __construct()
    {
    }

    /**
     * @return \bumo\model\response\AccountCreateResponse
     * @throws \Exception
     */
    public function create()
    {
        $response = new \bumo\model\response\AccountCreateResponse();
        $keyPair = new \bumo\crypto\Keypair();
        $result = $keyPair->create();
        $response->setErrorCode(Error::getError("SUCCESS")['errorCode']);
        $response->setErrorDesc(Error::getError("SUCCESS")['errorDesc']);
        $response->setResult($result);
        return $response;
    }

    /**
     * @param AccountGetInfoRequest $req
     * @return AccountGetInfoResponse
     * @throws \Exception
     */
    public function getInfo($req)
    {
        $result = Http::get(General::accountGetInfoUrl($req->getAddress()));
        $response = new AccountGetInfoResponse();
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
            $response->setErrorDesc($error['errorDesc']);;
            $response->setResult($result->result);
        }
        return $response;
    }

    /**
     * @param AccountGetNonceRequest $req
     * @return AccountGetNonceResponse
     * @throws \Exception
     */
    public function getNonce($req)
    {
        $result = Http::get(General::accountGetInfoUrl($req->getAddress()));
        $response = new AccountGetNonceResponse();
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
            $response->setResult($result->result);
        }
        return $response;
    }

    /**
     * @param AccountGetBalanceRequest $req
     * @return AccountGetBalanceResponse
     * @throws \Exception
     */
    public function getBalance($req)
    {
        $result = Http::get(General::accountGetInfoUrl($req->getAddress()));
        $response = new AccountGetBalanceResponse();
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
            $response->setResult($result->result);
        }
        return $response;
    }

    /**
     * @param AccountGetAssetsRequest $req
     * @return AccountGetAssetsResponse
     * @throws \Exception
     */
    public function getAssets($req)
    {
        $result = Http::get(General::accountGetAssetsUrl($req->getAddress()));
        $response = new AccountGetAssetsResponse();
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
            $response->setResult($result->result);
        }
        return $response;
    }

    /**
     * @param AccountGetMetadataRequest $req
     * @return AccountGetMetadataResponse
     * @throws \Exception
     */
    public function getMetadata($req)
    {
        $result = Http::get(General::accountGetMetadataUrl($req->getAddress(), $req->getKey()));
        $response = new AccountGetMetadataResponse();
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
     * @param AccountCheckValidRequest $req
     * @return AccountCheckValidResponse
     */
    public function checkValid($req)
    {
        $response = new AccountCheckValidResponse();
        $keyPair = new Keypair();
        $ret = $keyPair->checkAddress($req->getAddress());
        $obj = new \stdClass();
        $obj->isValid = $ret;
        $response->setResult($obj);
        return $response;
    }

    /**
    * @param $accountActivateOperation \bumo\model\operation\AccountActivateOperation
    * @return Operation
    * @throws \Exception
    */
    public function activate($accountActivateOperation)
    {
        $keyPair = new Keypair();
        if(null != $accountActivateOperation->getSourceAddress()){
            if(false == $keyPair->checkAddress($accountActivateOperation->getSourceAddress())){
                throw new \Exception(Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorCode'],
                    Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorDesc']);
            }
        }
        if(false == $keyPair->checkAddress($accountActivateOperation->getDestAddress())){
            throw new \Exception(Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorCode'],
                Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorDesc']);
        }
        if($accountActivateOperation->getDestAddress() == $accountActivateOperation->getSourceAddress() &&
            "" != $accountActivateOperation->getSourceAddress()){
            throw new \Exception(Error::getError("SOURCEADDRESS_EQUAL_DESTADDRESS_ERROR")['errorCode'],
                Error::getError("SOURCEADDRESS_EQUAL_DESTADDRESS_ERROR")['errorDesc']);
        }
        if( 0 >= $accountActivateOperation->getInitBalance()){
            throw new \Exception(Error::getError("INVALID_INITBALANCE_ERROR")['errorCode'],
                Error::getError("INVALID_INITBALANCE_ERROR")['errorDesc']);
        }
        $oper = new Operation();
        if(null != $accountActivateOperation->getSourceAddress()){
            $oper->setSourceAddress($accountActivateOperation->getSourceAddress());
        }
        if(null != $accountActivateOperation->getMetadata()){
            $oper->setMetadata($accountActivateOperation->getMetadata());
        }
        $oper->setType(1);

        $createAccount = new \Protocol\OperationCreateAccount();
        $createAccount->setDestAddress($accountActivateOperation->getDestAddress());
        $createAccount->setInitBalance($accountActivateOperation->getInitBalance());
        $accountThreshold = new \Protocol\AccountThreshold();
        $accountThreshold->setTxThreshold(1);
        $accountPrivilege = new \Protocol\AccountPrivilege();
        $accountPrivilege->setMasterWeight(1);
        $accountPrivilege->setThresholds($accountThreshold);
        $createAccount->setPriv($accountPrivilege);
        $oper->setCreateAccount($createAccount);
        return $oper;
    }

    /**
     * @param $accountSetMetadataOperation \bumo\model\operation\AccountSetMetadataOperation
     * @return Operation
     * @throws \Exception
     */
    function setMetaData($accountSetMetadataOperation){
        $keyPair = new Keypair();
        if(null != $accountSetMetadataOperation->getSourceAddress()){
            if(false == $keyPair->checkAddress($accountSetMetadataOperation->getSourceAddress())){
                throw new \Exception(Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorCode'],
                    Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorDesc']);
            }
        }
        $keyLen = strlen($accountSetMetadataOperation->getKey());
        if(0 >= $keyLen || 1024 < $keyLen){
            throw new \Exception(Error::getError("INVALID_DATAKEY_ERROR")['errorCode'],
                Error::getError("INVALID_DATAKEY_ERROR")['errorDesc']);
        }
        $valueLen = strlen($accountSetMetadataOperation->getValue());
        if(0 >= $valueLen || (1024 * 256) < $valueLen){
            throw new \Exception(Error::getError("INVALID_DATAVALUE_ERROR")['errorCode'],
                Error::getError("INVALID_DATAVALUE_ERROR")['errorDesc']);
        }

        if($accountSetMetadataOperation->getVersion() < 0){
            throw new \Exception(Error::getError("INVALID_DATAVERSION_ERROR")['errorCode'],
                Error::getError("INVALID_DATAVERSION_ERROR")['errorDesc']);
        }
        $oper = new Operation();
        if(null != $accountSetMetadataOperation->getSourceAddress()){
            $oper->setSourceAddress($accountSetMetadataOperation->getSourceAddress());
        }
        if(null != $accountSetMetadataOperation->getMetadata()){
            $oper->setMetadata($accountSetMetadataOperation->getMetadata());
        }
        $setMetadataOper = new \Protocol\OperationSetMetadata();
        $setMetadataOper->setKey($accountSetMetadataOperation->getKey());
        $setMetadataOper->setValue($accountSetMetadataOperation->getValue());
        $setMetadataOper->setVersion($accountSetMetadataOperation->getVersion());
        $setMetadataOper->setDeleteFlag($accountSetMetadataOperation->getDeleteFlag());

        $oper->setType(4);
        $oper->setSetMetadata($setMetadataOper);
        return $oper;
    }

    /**
     * @param $setPrivilegeOperation \bumo\model\operation\AccountSetPrivilegeOperation
     * @return Operation
     * @throws \Exception
     */
    public function setPrivilege($setPrivilegeOperation)
    {
        $keyPair = new Keypair();
        if(null != $setPrivilegeOperation->getSourceAddress()){
            if(false == $keyPair->checkAddress($setPrivilegeOperation->getSourceAddress())){
                throw new \Exception(Error::getError("INVALID_SOURCEADDRESS_ERROR"),
                    Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorDesc']);
            }
        }
        if("" != $setPrivilegeOperation->getMasterWeight()){
            $masterWeightInt = intval($setPrivilegeOperation->getMasterWeight());
            if($masterWeightInt < 0 || $masterWeightInt > 4294967295){
                throw new \Exception(Error::getError("INVALID_MASTERWEIGHT_ERROR")['errorCode'],
                    Error::getError("INVALID_MASTERWEIGHT_ERROR")['errorDesc']);
            }
        }
        $getMasterWeight = $setPrivilegeOperation->getMasterWeight();
        if(!$getMasterWeight){
            if(!preg_match("^[-\\+]?[\\d]*$",$getMasterWeight))
                throw new \Exception(Error::getError("INVALID_MASTERWEIGHT_ERROR")['errorDesc']);

        }
        $getTxThreshold = $setPrivilegeOperation->getTxThreshold();
        if(!$getTxThreshold){
            if(!preg_match("^[-\\+]?[\\d]*$",$getTxThreshold))
                throw new \Exception(Error::getError("INVALID_TX_THRESHOLD_ERROR")['errorDesc']);
        }
        $metadata = $setPrivilegeOperation->getMetadata();
        $getSigners = $setPrivilegeOperation->getSigners();
        $typeThresholds = $setPrivilegeOperation->getTypeThresholds();

        // build operation
        //1该数据结构
        $OperationSetPrivilege = new \Protocol\OperationSetPrivilege();
        $OperationSetPrivilege->setMasterWeight($getMasterWeight);
        $OperationSetPrivilege->setTxThreshold($getTxThreshold);
        $protocolSignarr = array();
        if($getSigners){
            foreach ($getSigners as $key => $value) {
                $signer = $value;
                $tempadderss = $signer->getAddress();
                if(!$keyPair->checkAddress($tempadderss)){
                    throw new \Exception(Error::getError("INVALID_SIGNER_ADDRESS_ERROR")['errorDesc']);
                }
                $tempweight = $signer->getWeight();
                if($tempweight<0){
                    throw new \Exception(Error::getError("INVALID_SIGNER_WEIGHT_ERROR")['errorDesc']);
                }


                $SignerPro = new \Protocol\Signer();
                $SignerPro->setAddress($value->getAddress());
                $SignerPro->setWeight($value->getWeight());
                array_push($protocolSignarr,$SignerPro);
            }
        }

        $OperationSetPrivilege->setSigners($protocolSignarr);


        $protocolThresholds = array();
        if($typeThresholds){
            foreach ($typeThresholds as $key => $value) {
                $typethreshold = $value;
                $temptype = $typethreshold->getType();
                if($temptype<1){
                    throw new \Exception(Error::getError("INVALID_TYPETHRESHOLD_TYPE_ERROR")['errorDesc']);
                }
                $tempholod = $typethreshold->getThreshold();
                if($tempholod<0){
                    throw new \Exception(Error::getError("INVALID_TYPE_THRESHOLD_ERROR")['errorDesc']);
                }

                $SignerPro = new \Protocol\OperationTypeThreshold();
                $SignerPro->setType($value->getType());
                $SignerPro->setThreshold($value->getThreshold());
                array_push($protocolThresholds,$SignerPro);
            }
        }
        $OperationSetPrivilege->setTypeThresholds($protocolThresholds);

        //2
        $oper = new \Protocol\Operation();
        $oper->setSourceAddress($setPrivilegeOperation->getSourceAddress());
        $oper->setMetadata($metadata);
        // $opertype = $OperationSetPrivilege->getOperationType();
        $oper->setType(9);
        $oper->setSetPrivilege($OperationSetPrivilege);
        return $oper;
    }
}