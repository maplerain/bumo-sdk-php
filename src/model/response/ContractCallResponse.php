<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 14:02
 */

namespace bumo\model\response;


use bumo\model\response\result\ContractCallResult;

class ContractCallResponse extends BaseResponse
{
    /** @var ContractCallResult */
    private $result;

    /**
     * @return ContractCallResult
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
        $resultOb = new ContractCallResult();
        $resultOb->setLogs(isset($result->logs)?$result->logs:"");
        $resultOb->setQueryRets(isset($result->query_rets)?$result->query_rets:"");
        $resultOb->setStat(isset($result->stat)?$result->stat: null);
        $resultOb->setTxs(isset($result->txs)?$result->txs: []);

        $this->result = $resultOb;
    }


}