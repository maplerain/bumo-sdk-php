<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/2
 * Time: 6:31
 */

include_once "../autoload.php";

use bumo\SDK;

$sdk = SDK::getInstance("http://seed1.bumotest.io:26002");
try{
if(0){//test for block::getNumber
    $result = $sdk->block()->getNumber();
}

if(0){
    $result = $sdk->block()->checkStatus();
}

if(0){
    $result = $sdk->block()->getLatestInfo();
}

if(0){
    $req = new \bumo\model\request\BlockGetInfoRequest();
    $req->setBlockNumber(10);
    $result = $sdk->block()->getInfo($req);
}

if(0){
    $req = new \bumo\model\request\BlockGetValidatorsRequest();
    $req->setBlockNumber(1001849);
    $result = $sdk->block()->getValidators($req);
}

if(0){
    $result = $sdk->block()->getLatestValidators();
}
if(0) {
    $req = new \bumo\model\request\BlockGetRewardRequest();
    $req->setBlockNumber(1001849);
    $result = $sdk->block()->getReward($req);
}

if(0){
    $result = $sdk->block()->getLatestReward();
    var_dump($result->getResult()->getValidatorsReward());
}

if(0) {
    $req = new \bumo\model\request\BlockGetFeesRequest();
    $req->setBlockNumber(1001849);
    $result = $sdk->block()->getFees($req);
}

if(0){
    $result = $sdk->block()->getLatestFees();
}
if(1) {
    $req = new \bumo\model\request\BlockGetTransactionRequest();
    $req->setBlockNumber(1046036);
    $result = $sdk->block()->getTransactions($req);
    var_dump($result->getResult());
}

}catch (\Exception $e){
    echo $e->getMessage();
}
var_dump($result);