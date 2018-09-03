<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 11:56
 */

namespace bumo\model\response;


use bumo\model\response\result\TransactionEvaluateFeeResult;

class TransactionEvaluateFeeResponse extends BaseResponse
{
    /** @var TransactionEvaluateFeeResult */
    private $result;

    /**
     * @return TransactionEvaluateFeeResult
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
        $resultOb = new TransactionEvaluateFeeResult();
        $resultOb->setTxs(isset($result->txs)?$result->txs: []);

        $this->result = $resultOb;
    }

}