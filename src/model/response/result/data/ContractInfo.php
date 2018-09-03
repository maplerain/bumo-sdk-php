<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 0:00
 */

namespace bumo\model\response\result\data;


class ContractInfo
{
    /**
     * @var string
     */
    private $Ctp;
    /**
     * @var string
     */
    private $Name;
    /**
     * @var string
     */
    private $Symbol;
    /**
     * @var int
     */
    private $Decimals;
    /**
     * @var string
     */
    private $TotalSupply;
    /**
     * @var string
     */
    private $contractOwner;
    /**
     * @var string
     */
    private $Balance;

    /**
     * @return string
     */
    public function getCtp()
    {
        return $this->Ctp;
    }

    /**
     * @param string $Ctp
     */
    public function setCtp($Ctp)
    {
        $this->Ctp = $Ctp;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->Symbol;
    }

    /**
     * @param string $Symbol
     */
    public function setSymbol($Symbol)
    {
        $this->Symbol = $Symbol;
    }

    /**
     * @return int
     */
    public function getDecimals()
    {
        return $this->Decimals;
    }

    /**
     * @param int $Decimals
     */
    public function setDecimals($Decimals)
    {
        $this->Decimals = $Decimals;
    }

    /**
     * @return string
     */
    public function getTotalSupply()
    {
        return $this->TotalSupply;
    }

    /**
     * @param string $TotalSupply
     */
    public function setTotalSupply($TotalSupply)
    {
        $this->TotalSupply = $TotalSupply;
    }

    /**
     * @return string
     */
    public function getContractOwner()
    {
        return $this->contractOwner;
    }

    /**
     * @param string $contractOwner
     */
    public function setContractOwner($contractOwner)
    {
        $this->contractOwner = $contractOwner;
    }

    /**
     * @return string
     */
    public function getBalance()
    {
        return $this->Balance;
    }

    /**
     * @param string $Balance
     */
    public function setBalance($Balance)
    {
        $this->Balance = $Balance;
    }


}