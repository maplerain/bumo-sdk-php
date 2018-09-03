<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 10:12
 */

namespace bumo\model\response;


use bumo\model\response\result\ContractGetAddressResult;

class ContractGetAddressResponse extends BaseResponse
{
    /** @var ContractGetAddressResult */
    private $result;

    /**
     * @return ContractGetAddressResult
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param ContractGetAddressResult $result
     */
    public function setResult($result)
    {
        $resultOb = new ContractGetAddressResult();
        $resultOb->setContractAddressInfos(isset($result->contract_address_infos)?$result->contract_address_infos:[]);

        $this->result = $resultOb;
    }

}