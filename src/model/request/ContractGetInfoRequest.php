<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 9:59
 */

namespace bumo\model\request;


class ContractGetInfoRequest
{
    /** @var string */
    private $contractAddress;

    /**
     * @return string
     */
    public function getContractAddress()
    {
        return $this->contractAddress;
    }

    /**
     * @param string $contractAddress
     */
    public function setContractAddress($contractAddress)
    {
        $this->contractAddress = $contractAddress;
    }


}