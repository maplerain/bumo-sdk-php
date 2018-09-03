<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 9:51
 */

namespace bumo\model\response;


use bumo\model\response\result\ContractGetInfoResult;

class ContractGetInfoResponse extends BaseResponse
{
    /** @var ContractGetInfoResult */
    private $result;

    /**
     * @return ContractGetInfoResult
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
        $resultOb = new ContractGetInfoResult();
        $resultOb->setContract(isset($result->contract)?$result->contract:null);

        $this->result = $resultOb;
    }

}