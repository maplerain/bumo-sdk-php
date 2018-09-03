<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 11:04
 */

namespace bumo\blockchain;


use bumo\common\Bytes;
use bumo\common\General;
use bumo\common\Http;
use bumo\crypto\Keypair;
use bumo\exception\Error;
use bumo\model\operation\TransactionEvaluateFeeRequest;
use bumo\model\request\TransactionBuildBlobRequest;
use bumo\model\request\TransactionGetInfoRequest;
use bumo\model\request\TransactionSignRequest;
use bumo\model\request\TransactionSubmitRequest;
use bumo\model\response\TransactionEvaluateFeeResponse;
use bumo\model\response\TransactionBuildBlobResponse;
use bumo\model\response\TransactionGetInfoResponse;
use bumo\model\response\TransactionSignResponse;
use bumo\SDK;
use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;

class Transaction
{
    /**
     * @param TransactionBuildBlobRequest $req
     * @throws \Exception
     * @return TransactionBuildBlobResponse
     */
    public function buildBlobObject($req)
    {
        $keyPair = new Keypair();
        $src = $req->getSourceAddress();
        $resp = new TransactionBuildBlobResponse();
        if(isset($src) && !$keyPair->checkAddress($src)){
            throw new \Exception(Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorDesc']);
        }

        $nonce = $req->getNonce();
        if(!$nonce || $nonce<1){
            throw new \Exception(Error::getError("INVALID_NONCE_ERROR")['errorDesc']);
        }


        $gasPrice = $req->getGasPrice();
        if(!$gasPrice || $gasPrice< 1000){
            throw new \Exception(Error::getError("INVALID_GASPRICE_ERROR")['errorDesc']);
        }

        $feeLimit = $req->getFeeLimit();
        if(!$feeLimit || $feeLimit< 1){
            throw new \Exception(Error::getError("INVALID_FEELIMIT_ERROR")['errorDesc']);
        }

        $ceilLedgerSeq = $req->getCeilLedgerSeq();
        if($ceilLedgerSeq && $ceilLedgerSeq<0){
            throw new \Exception(Error::getError("INVALID_CEILLEDGERSEQ_ERROR")['errorDesc']);
        }
        $metaData = $req->getMetadata();

        //1 Transaction
        $tran = new \Protocol\Transaction();
        if($metaData)
            $tran->setMetadata($metaData);
        $tran->setSourceAddress($src);
        $tran->setNonce(++$nonce);
        $tran->setFeeLimit($feeLimit);
        $tran->setGasPrice($gasPrice);
        //2 Operation
        $opers = new RepeatedField(GPBType::MESSAGE, \Protocol\Operation::class);
        $operation = $req->getOperations();
        $opers[] = $operation;
        $tran->setOperations($opers);

        //选填，区块高度限制，大于等于0，是0时不限制
        if($ceilLedgerSeq){
            $blockResponse = SDK::getInstance("")->block()->getNumber();
            if($blockResponse){
                if($blockResponse->getErrorCode()!=0){
                    throw new \Exception("get block number error");
                }
            }
            else{
                throw new \Exception(Error::getError("SYSTEM_ERROR")['errorDesc']);
            }

            $blockNumber = $blockResponse->getResult()->getHeader()->getNumber();
            $tran->setCeilLedgerSeq($ceilLedgerSeq + $blockNumber);
        }

        //3序列化，转16进制
        $serialTran = $tran->serializeToString();
        $serialTranHex = bin2hex($serialTran);
        //解析用
        // $tranParse = new \Protocol\Transaction();Parses a protocol buffer contained in a string.
        // $tranParse->mergeFromString($serialTran);
        // var_dump($tranParse->getOperations()[0]);
        // $retNew['transactionBlob'] = $serialTranHex;
        // $retNew['hash'] = $serialTran;
        $obj = new \stdClass();
        $obj->transaction_blob = $serialTranHex;
        $obj->hash = $serialTran;
        $resp->setResult($obj);
        return $resp;
    }

    /**
     * @param TransactionEvaluateFeeRequest $req
     * @return TransactionEvaluateFeeResponse
     * @throws \Exception
     */
    public function evaluateFee($req)
    {
        $keyPair = new Keypair();
        $resp = new TransactionEvaluateFeeResponse();
        if(!$keyPair->checkAddress($req->getSourceAddress())){
            $resp->setErrorCode(Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorCode']);
            $resp->setErrorDesc(Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorDesc']);
            return $resp;
        }

        $nonce = $req->getNonce();
        if(!$nonce || $nonce<1){
            $resp->setErrorCode(Error::getError("INVALID_NONCE_ERROR")['errorCode']);
            $resp->setErrorDesc(Error::getError("INVALID_NONCE_ERROR")['errorDesc']);
            return $resp;
        }

        $signatureNumber = $req->getSignatureNumber();
        if($signatureNumber && $signatureNumber<1){
            $resp->setErrorCode(Error::getError("INVALID_SIGNATURENUMBER_ERROR")['errorCode']);
            $resp->setErrorDesc(Error::getError("INVALID_SIGNATURENUMBER_ERROR")['errorDesc']);
            return $resp;
        }

        $ceilLedgerSeq = $req->getCeilLedgerSeq();
        if($ceilLedgerSeq && $ceilLedgerSeq<0){
            $resp->setErrorCode(Error::getError("INVALID_CEILLEDGERSEQ_ERROR")['errorCode']);
            $resp->setErrorDesc(Error::getError("INVALID_CEILLEDGERSEQ_ERROR")['errorDesc']);
            return $resp;
        }

        $metaData = $req->getMetadata();

        // build transaction
        $baseOperations = $req->getOperations(); //BaseOperation[]
        if(!$baseOperations ){
            $resp->setErrorCode(Error::getError("OPERATIONS_EMPTY_ERROR")['errorCode']);
            $resp->setErrorDesc(Error::getError("OPERATIONS_EMPTY_ERROR")['errorDesc']);
            return $resp;
        }

        $tran = new \Protocol\Transaction();
        $tran->setSourceAddress($req->getSourceAddress());
        $tran->setNonce(++$nonce);
        if($metaData)
            $tran->setMetadata($metaData);
        if($ceilLedgerSeq)
            $tran->setCeilLedgerSeq($ceilLedgerSeq);

        //2 Operation
        $opers = new RepeatedField(GPBType::MESSAGE, \Protocol\Operation::class);
        $opers = $baseOperations; //本身就是数组
        $tran->setOperations($opers);

        $serialTran = $tran->serializeToString();
        $transactionItem['transaction_json'] = ($tran);
        $transactionItems[0] = $transactionItem;
        $testTransactionRequest['items'] = $transactionItems;
        // var_dump($testTransactionRequest);exit;
        $evaluationFeeUrl = General::transactionEvaluationFee();
        $result = \bumo\common\Http::post($evaluationFeeUrl,$testTransactionRequest);
        // echo($result);exit;
        $resultObject = json_decode($result); //转对象
        if(isset($resultObject->error_code) ){
            if($resultObject->error_code==4)
                throw new \Exception($evaluationFeeUrl .' is error!', 1);
        }
        else{
            throw new \Exception($evaluationFeeUrl .' is not exist!', 1);
        }
        $resp->setErrorCode($resultObject->error_code);
        $resp->setResult($resultObject->result);
        return $resp;
    }

    /**
     * @param TransactionGetInfoRequest $req
     * @return TransactionGetInfoResponse
     * @throws \Exception
     */
    public function getInfo($req)
    {
        $result = Http::get(General::accountGetMetadataUrl($req->getAddress(), $req->getKey()));
        $response = new TransactionGetInfoResponse();
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
     * @param TransactionSignRequest $req
     * @return TransactionSignResponse
     * @throws \Exception
     */
    public function signObject($req)
    {
        $keyPair = new Keypair();
        $resp = new TransactionSignResponse();
        $hash = $req->getBlob();
        if(!$hash){
            $error = Error::getError("INVALID_BLOB_ERROR");
            $resp->setErrorCode($error['errorCode']);
            $resp->setErrorDesc($error['errorDesc']);
            return $resp;
        }
        $privateKey = $req->getPrivateKeys();
        if(!$privateKey || !is_array($privateKey)){
            $error = Error::getError("PRIVATEKEY_NULL_ERROR");
            $resp->setErrorCode($error['errorCode']);
            $resp->setErrorDesc($error['errorDesc']);
            return $resp;
        }
        $resultInfo = array();
        foreach ($privateKey as $key => $value) {
            $temp = array();
            //1通过私钥对交易（transaction_blob）签名。
            $sourceRawPubKeyString = Bytes::getbytes($keyPair->getRawPublic($value));
            $sourceRawPriKeyString = Bytes::getbytes($keyPair->getRawPrivate($value));

            $signData = ed25519_sign($hash,$sourceRawPriKeyString,$sourceRawPubKeyString);
            $signDataHex = bin2hex($signData);
            $temp['sign_data'] = $signDataHex;
            $temp['public_key'] = $keyPair->getRawPublic($value);
            array_push($resultInfo,$temp);
        }
        $resultObject['signatures'] = $resultInfo;
        $resultObject = json_decode(json_encode($resultObject));
        // var_dump($resultObject);
        $resp->setResult($resultObject);
        return $resp;
    }

    /**
     * @param  TransactionSubmitRequest $req
     * @return TransactionSignResponse
     * @throws \Exception
     */
    public function submitObject($req)
    {
        $result = Http::get(General::accountGetMetadataUrl($req->getAddress(), $req->getKey()));
        $response = new TransactionSignResponse();
        $blob = $req->getTransactionBlob();
        if(!$blob){
            $error = Error::getError("INVALID_BLOB_ERROR");
            $response->setErrorCode($error['errorCode']);
            $response->setErrorDesc($error['errorDesc']);
            return $response;
        }
        $getSignatures = $req->getSignatures();
        if(!$getSignatures || !is_array($getSignatures)){
            $error = Error::getError("SIGNATURE_EMPTY_ERROR");
            $response->setErrorCode($error['errorCode']);
            $response->setErrorDesc($error['errorDesc']);
            return $response;
        }

        $signatureItems = array();
        //数组
        foreach ($getSignatures as $key => $value) {
            $tempItem = array();
            $getSignData = $value->getSignData();
            if(!$getSignData){
                $error = Error::getError("SIGNDATA_NULL_ERROR");
                $response->setErrorCode($error['errorCode']);
                $response->setErrorDesc($error['errorDesc']);
                return $response;
            }
            $getPublicKey = $value->getPublicKey();
            if(!$getPublicKey){
                $error = Error::getError("PUBLICKEY_NULL_ERROR");
                $response->setErrorCode($error['errorCode']);
                $response->setErrorDesc($error['errorDesc']);
                return $response;
            }
            $tempItem['sign_data'] = $getSignData;
            $tempItem['public_key'] = $getPublicKey;
            array_push($signatureItems, $tempItem);
        }
        $transactionItem['signatures'] = $signatureItems;
        $transactionItem['transaction_blob'] = $blob;
        $transactionItems[0] = $transactionItem;
        $realData['items'] = $transactionItems;
        //2发送
        $requestBaseUrl = General::$url;
        $transactionUrl = $requestBaseUrl . "/submitTransaction";
        $ret = Http::post($transactionUrl,$realData);

        $retArr = json_decode($ret,true);
        if($retArr['success_count']==1){
            $retNew['hash'] = $retArr["results"][0]['hash'];
            $response->setErrorCode(0);
            $response->setResult(json_decode(json_encode($retNew)));
        }
        return $response;
    }

}