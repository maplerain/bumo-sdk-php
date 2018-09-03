<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 10:25
 */

namespace bumo\log;


use bumo\crypto\Keypair;
use bumo\exception\Error;
use bumo\model\operation\LogCreateOperation;
use Protocol\Operation;

class Log
{
    /**
     * @param LogCreateOperation $operation
     * @return Operation
     * @throws \Exception
     */
    public function create($operation)
    {
        $keyPair = new Keypair();
        $src = $operation->getSourceAddress();
        if(isset($src) && !$keyPair->checkAddress($src)){
            throw new \Exception(Error::getError("INVALID_SOURCEADDRESS_ERROR")['errorDesc']);
        }
        $lenTopic = strlen($operation->getTopic());
        if(128 < $lenTopic || 0 >= $lenTopic){
            throw new \Exception(Error::getError("INVALID_LOG_TOPIC_ERROR")['errorDesc']);
        }
        if($operation->getDatas() == null){
            throw new \Exception(Error::getError("INVALID_LOG_TOPIC_ERROR")['errorDesc']);
        }
        foreach ($operation->getDatas() as $data){
            $len = strlen($data);
            if($len > 1024 || $len <= 0){
                throw new \Exception(Error::getError("INVALID_LOG_DATA_ERROR")['errorDesc']);
            }
        }
        $metadata = $operation->getMetadata();
        // build operation
        //1该数据结构用于创建日志
        $OperationLog = new \Protocol\OperationLog();
        $OperationLog->setTopic($operation->getTopic());
        $OperationLog->setDatas($operation->getDatas());

        //2
        $oper = new \Protocol\Operation();
        if($operation->getSourceAddress())
            $oper->setSourceAddress($operation->getSourceAddress());
        if($metadata)
            $oper->setMetadata($metadata);
        $oper->setType(8); //log=8
        $oper->setLog($OperationLog);
        return $oper;
    }
}