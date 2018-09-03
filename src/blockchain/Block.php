<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/2
 * Time: 6:46
 */

namespace bumo\blockchain;

use bumo\common\General;
use bumo\common\Http;
use bumo\exception\Error;
use bumo\model\request\BlockGetFeesRequest;
use bumo\model\request\BlockGetRewardRequest;
use bumo\model\request\BlockGetTransactionRequest;
use bumo\model\request\BlockGetValidatorsRequest;
use bumo\model\response\BlockGetFeesResponse;
use bumo\model\response\BlockGetInfoResponse;
use bumo\model\response\BlockGetLatestFeesResponse;
use bumo\model\response\BlockGetLatestRewardResponse;
use bumo\model\response\BlockGetLatestValidatorsResponse;
use bumo\model\response\BlockGetNumberResponse;
use bumo\model\response\BlockCheckStatusResponse;
use bumo\model\response\BlockGetRewardResponse;
use bumo\model\response\BlockGetTransactionsResponse;
use bumo\model\response\BlockGetValidatorsResponse;
use bumo\model\response\result\BlockGetInfoResult;

class Block
{
    public function __construct()
    {
    }

    /**
     * @return BlockGetNumberResponse
     * @throws \Exception
     */
    public function getNumber()
    {
        $result = Http::get(General::blockGetNumberUrl());
        $response = new BlockGetNumberResponse();
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
            $response->setResult($result->result->header);
        }
        return $response;
    }

    /**
     * @return BlockCheckStatusResponse
     * @throws \Exception
     */
    public function checkStatus()
    {
        $result = Http::get(General::blockCheckStatusUrl());
        $response = new BlockCheckStatusResponse();
        if(isset($result->error_code) && 0 != $result->error_code){
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
            $obj = new \stdClass();
            $obj->isSynchronous = ($result->ledger_manager->chain_max_ledger_seq ==
                $result->ledger_manager->ledger_sequence);
            $response->setResult($obj);
        }
        return $response;
    }

    /**
     * @return BlockGetInfoResponse
     * @throws \Exception
     */
    function getLatestInfo(){
        $result = Http::get(General::blockGetLatestInfoUrl());
        $response = new BlockGetInfoResponse();
        if(isset($result->error_code) && 0 != $result->error_code){
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
            $response->setResult($result->result->header);
        }
        return $response;
    }

    /**
     * @param $req \bumo\model\request\BlockGetInfoRequest
     * @return BlockGetInfoResponse
     * @throws \Exception
     */
    function getInfo($req){
        $result = Http::get(General::blockGetInfoUrl($req->getBlockNumber()));
        $response = new BlockGetInfoResponse();
        if(isset($result->error_code) && 0 != $result->error_code){
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
            $response->setResult($result->result->header);
        }
        return $response;
    }

    /**
     * @param BlockGetValidatorsRequest $req
     * @return BlockGetValidatorsResponse
     * @throws \Exception
     */
    public function getValidators($req){
        $result = Http::get(General::blockGetValidatorsUrl($req->getBlockNumber()));
        $response = new BlockGetValidatorsResponse();
        if(isset($result->error_code) && 0 != $result->error_code){
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
            $response->setResult($result->result->validators);
        }
        return $response;
    }

    /**
     * @return BlockGetLatestValidatorsResponse
     * @throws \Exception
     */
    public function getLatestValidators(){
        $result = Http::get(General::blockGetLatestValidatorsUrl());
        $response = new BlockGetLatestValidatorsResponse();
        if(isset($result->error_code) && 0 != $result->error_code){
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
            $response->setResult($result->result->validators);
        }
        return $response;
    }

    /**
     *
     * @param BlockGetRewardRequest $req
     * @return BlockGetRewardResponse
     * @throws \Exception
     */
    public function getReward($req){
        $result = Http::get(General::blockGetRewardUrl($req->getBlockNumber()));
        $response = new BlockGetRewardResponse();
        if(isset($result->error_code) && 0 != $result->error_code){
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
     * @return BlockGetLatestRewardResponse
     * @throws \Exception
     */
    public function getLatestReward(){
        $result = Http::get(General::blockGetLatestRewardUrl());
        $response = new BlockGetLatestRewardResponse();
        if(isset($result->error_code) && 0 != $result->error_code){
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
     *
     * @param BlockGetFeesRequest $req
     * @return BlockGetFeesResponse
     * @throws \Exception
     */
    public function getFees($req){
        $result = Http::get(General::blockGetFeesUrl($req->getBlockNumber()));
        $response = new BlockGetFeesResponse();
        if(isset($result->error_code) && 0 != $result->error_code){
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
            $response->setResult($result->result->fees);
        }
        return $response;
    }

    /**
     * @return BlockGetLatestFeesResponse
     * @throws \Exception
     */
    public function getLatestFees(){
        $result = Http::get(General::blockGetLatestFeeUrl());
        $response = new BlockGetLatestFeesResponse();
        if(isset($result->error_code) && 0 != $result->error_code){
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
            $response->setResult($result->result->fees);
        }
        return $response;
    }

    /**
     * @param  BlockGetTransactionRequest $req
     * @return BlockGetTransactionsResponse
     * @throws \Exception
     */
    public function getTransactions($req)
    {
        $result = Http::get(General::blockGetTransactionsUrl($req->getBlockNumber()));
        $response = new BlockGetTransactionsResponse();
        if(isset($result->error_code) && 0 != $result->error_code){
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