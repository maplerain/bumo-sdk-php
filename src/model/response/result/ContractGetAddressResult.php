<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 10:09
 */

namespace bumo\model\response\result;


use bumo\model\response\result\data\ContractAddressInfo;

class ContractGetAddressResult
{
    /** @var array */
    private $contractAddressInfos;

    /**
     * @return array
     */
    public function getContractAddressInfos()
    {
        return $this->contractAddressInfos;
    }

    /**
     * @param array $contractAddressInfos
     */
    public function setContractAddressInfos($contractAddressInfos)
    {
        $this->contractAddressInfos = [];
        foreach ($contractAddressInfos as $contractAddressInfo) {
            $obj = new ContractAddressInfo();
            $obj->setContractAddress($contractAddressInfo->contractAddress);
            $obj->setOperationIndex($contractAddressInfo->operationIndex);
            $this->contractAddressInfos[] = $obj;
        }
    }
    
    
}