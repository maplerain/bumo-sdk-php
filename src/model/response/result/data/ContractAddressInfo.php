<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 10:07
 */

namespace bumo\model\response\result\data;


class ContractAddressInfo
{
    /** @var int */
    private $contractAddress; //Integer  contract_address
    /** @var string */
    private $operationIndex;

    /**
     * @return int
     */
    public function getContractAddress()
    {
        return $this->contractAddress;
    }

    /**
     * @param int $contractAddress
     */
    public function setContractAddress($contractAddress)
    {
        $this->contractAddress = $contractAddress;
    }

    /**
     * @return string
     */
    public function getOperationIndex()
    {
        return $this->operationIndex;
    }

    /**
     * @param string $operationIndex
     */
    public function setOperationIndex($operationIndex)
    {
        $this->operationIndex = $operationIndex;
    } //String  operation_index

}