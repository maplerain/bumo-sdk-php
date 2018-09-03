<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 12:26
 */

namespace bumo\model\response;


use bumo\model\response\result\TransactionGetInfoResult;

class TransactionGetInfoResponse extends BaseResponse
{
    /** @var TransactionGetInfoResult */
    private $result;

    /**
     * @return TransactionGetInfoResult
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
        $resultOb = new TransactionGetInfoResult();
        $resultOb->setTotalCount(isset($result->total_count)?$result->total_count:"");
        $resultOb->setTransactions(isset($result->transactions)?$result->transactions:[]);

        $this->result = $resultOb;
    } //TransactionGetInfoResult


}