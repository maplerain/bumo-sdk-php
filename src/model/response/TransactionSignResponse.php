<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 12:35
 */

namespace bumo\model\response;


use bumo\model\response\result\TransactionSignResult;

class TransactionSignResponse extends BaseResponse
{
    /** @var TransactionSignResult */
    private $result;

    /**
     * @return TransactionSignResult
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
        $resultOb = new TransactionSignResult();
        $resultOb->setSignatures(isset($result->signatures)?$result->signatures:[]);
        $this->result = $resultOb;
    }

}