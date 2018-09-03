<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 11:31
 */

namespace bumo\model\operation;


class TransactionEvaluateFeeRequest
{
    /** @var string  */
    private $sourceAddress; //String
    /** @var int */
    private $nonce;//Long
    /** @var array */
    private $operations;//BaseOperation[]
    /** @var int */
    private $ceilLedgerSeq;//Long
    /** @var string */
    private $metadata;//String
    /** @var string */
    private $signatureNumber;

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
    }

    /**
     * @return string
     */
    public function getSignatureNumber()
    {
        return $this->signatureNumber;
    }

    /**
     * @param string $signatureNumber
     */
    public function setSignatureNumber($signatureNumber)
    {
        $this->signatureNumber = $signatureNumber;
    }//String


}