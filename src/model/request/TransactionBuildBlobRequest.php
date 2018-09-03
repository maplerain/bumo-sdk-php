<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 10:56
 */

namespace bumo\model\request;


class TransactionBuildBlobRequest
{
    /** @var string */
    private $sourceAddress; //String
    /** @var int */
    private $nonce;//Long
    /** @var int */
    private $gasPrice;//Long
    /** @var  int */
    private $feeLimit;//Long
    /** @var array */
    private $operations;//BaseOperation[]
    /** @var int */
    private $ceilLedgerSeq;
    /** @var string */
    private $metadata;

    /**
     * @return string
     */
    public function getSourceAddress()
    {
        return $this->sourceAddress;
    }

    /**
     * @param string $sourceAddress
     */
    public function setSourceAddress($sourceAddress)
    {
        $this->sourceAddress = $sourceAddress;
    }

    /**
     * @return int
     */
    public function getNonce()
    {
        return $this->nonce;
    }

    /**
     * @param int $nonce
     */
    public function setNonce($nonce)
    {
        $this->nonce = $nonce;
    }

    /**
     * @return int
     */
    public function getGasPrice()
    {
        return $this->gasPrice;
    }

    /**
     * @param int $gasPrice
     */
    public function setGasPrice($gasPrice)
    {
        $this->gasPrice = $gasPrice;
    }

    /**
     * @return int
     */
    public function getFeeLimit()
    {
        return $this->feeLimit;
    }

    /**
     * @param int $feeLimit
     */
    public function setFeeLimit($feeLimit)
    {
        $this->feeLimit = $feeLimit;
    }

    /**
     * @return array
     */
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * @param array $operations
     */
    public function setOperations($operations)
    {
        $this->operations = $operations;
    }

    /**
     * @return int
     */
    public function getCeilLedgerSeq()
    {
        return $this->ceilLedgerSeq;
    }

    /**
     * @param int $ceilLedgerSeq
     */
    public function setCeilLedgerSeq($ceilLedgerSeq)
    {
        $this->ceilLedgerSeq = $ceilLedgerSeq;
    }

    /**
     * @return string
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param string $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }//String


}