<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 11:00
 */

namespace bumo\model\response;


use bumo\model\response\result\TransactionBuildBlobResult;

class TransactionBuildBlobResponse extends BaseResponse
{
    /** @var TransactionBuildBlobResult */
    private $result;

    /**
     * @return TransactionBuildBlobResult
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param \stdClass $result
     */
    public function setResult($result)
    {
        $resultOb = new TransactionBuildBlobResult();
        $resultOb->setTransactionBlob(isset($result->transaction_blob) ? $result->transaction_blob : "");
        $resultOb->setHash(isset($result->hash)?$result->hash:"");

        $this->result = $resultOb;
    }

}