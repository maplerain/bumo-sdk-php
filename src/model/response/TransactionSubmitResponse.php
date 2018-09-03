<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 13:06
 */

namespace bumo\model\response;


use bumo\model\response\result\TransactionSubmitResult;

class TransactionSubmitResponse extends BaseResponse
{
    /** @var TransactionSubmitResult */
    private $result;

    /**
     * @return TransactionSubmitResult
     */
    public function getResult()
    {
        return $this->$result;
    }

    /**
     * @param \stdClass $result
     */
    public function setResult($result)
    {
        $resultOb = new TransactionSubmitResult();
        $resultOb->setHash(isset($result->hash)?$result->hash:"");

        $this->$result = $resultOb;
    }

}