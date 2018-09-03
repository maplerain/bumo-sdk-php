<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 5:34
 */

include_once "../autoload.php";

use bumo\SDK;

$sdk = SDK::getInstance("http://seed1.bumotest.io:26002");

if(0){
    $result = $sdk->account()->create();
}

if(0){
    $req = new \bumo\model\request\AccountGetInfoRequest();
    $req->setAddress("buQqbkDYkxVkrzwrt6Xq2FBDF64CryW8zNPX");
    $result = $sdk->account()->getInfo($req);
}

if(0){
    $req = new \bumo\model\request\AccountGetNonceRequest();
    $req->setAddress("buQqbkDYkxVkrzwrt6Xq2FBDF64CryW8zNPX");
    $result = $sdk->account()->getNonce($req);
}

if(0){
    $req = new \bumo\model\request\AccountGetBalanceRequest();
    $req->setAddress("buQqbkDYkxVkrzwrt6Xq2FBDF64CryW8zNPX");
    $result = $sdk->account()->getBalance($req);
}

if(0){
    $req = new \bumo\model\request\AccountGetAssetsRequest();
    $req->setAddress("buQswSaKDACkrFsnP1wcVsLAUzXQsemauEjf");
    $result = $sdk->account()->getAssets($req);
}

if(0){
    $req = new \bumo\model\request\AccountGetMetadataRequest();
    $req->setAddress("buQswSaKDACkrFsnP1wcVsLAUzXQsemauEjf");
    $req->setKey("A");
    $result = $sdk->account()->getMetadata($req);
}

if(1){
    $req = new \bumo\model\request\AccountCheckValidRequest();
    $req->setAddress("buQswSaKDACkrFsnP1wcVsLAUzXQsemauEjf");
    $result = $sdk->account()->checkValid($req);
}
var_dump($result);