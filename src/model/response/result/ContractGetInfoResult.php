<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 9:50
 */

namespace bumo\model\response\result;


use bumo\model\response\result\data\Contract;

class ContractGetInfoResult
{
    /** @var Contract */
    private $contract;

    /**
     * @return Contract
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * @param \stdClass $contract
     */
    public function setContract($contract)
    {
        $resultOb = new Contract();
        $resultOb->setType(isset($contract->type)?$contract->type:"");
        $resultOb->setPayload(isset($contract->payload)?$contract->payload:"");
        $this->contract = $resultOb;
    }


}