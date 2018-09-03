<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 4:24
 */

namespace bumo\model\response\result\data;


class TransactionHistory
{
    /** @var string */
    private $actualFee;//String  actual_fee
    /** @var int */
    private $closeTime;//Long  close_time
    /** @var int */
    private $errorCode;//Integer  error_code
    /** @var string */
    private $errorDesc;//String  error_desc
    /** @var string */
    private $hash;//String  hash
    /** @var int */
    private $ledgerSeq;//Long  ledger_seq
    /** @var array  */
    private $signatures;//Signature[]  signatures
    /** @var Transaction */
    private $transaction;//TransactionInfo  transaction
    /** @var int */
    private $txSize;

    /**
     * @return string
     */
    public function getActualFee()
    {
        return $this->actualFee;
    }

    /**
     * @param string $actualFee
     */
    public function setActualFee($actualFee)
    {
        $this->actualFee = $actualFee;
    }

    /**
     * @return int
     */
    public function getCloseTime()
    {
        return $this->closeTime;
    }

    /**
     * @param int $closeTime
     */
    public function setCloseTime($closeTime)
    {
        $this->closeTime = $closeTime;
    }

    /**
     * @return int
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param int $errorCode
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
    }

    /**
     * @return string
     */
    public function getErrorDesc()
    {
        return $this->errorDesc;
    }

    /**
     * @param string $errorDesc
     */
    public function setErrorDesc($errorDesc)
    {
        $this->errorDesc = $errorDesc;
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @return int
     */
    public function getLedgerSeq()
    {
        return $this->ledgerSeq;
    }

    /**
     * @param int $ledgerSeq
     */
    public function setLedgerSeq($ledgerSeq)
    {
        $this->ledgerSeq = $ledgerSeq;
    }

    /**
     * @return array
     */
    public function getSignatures()
    {
        return $this->signatures;
    }

    /**
     * @param array $signatures
     */
    public function setSignatures($signatures)
    {
        if(isset($signatures)){
            $this->signatures = [];
            foreach ($signatures as $signature){
                if($signature instanceof Signature){
                    $this->signatures[] = $signature;
                }else{
                    $temp = new Signature();
                    $temp->setSignData(isset($signature->sign_data)?$signature->sign_data:"");
                    $temp->setPublicKey(isset($signature->public_key)?$signature->public_key:"");
                    $this->signatures[] = $temp;
                }
            }
        }
    }

    /**
     * @return Transaction
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param Transaction|\stdClass $transaction
     */
    public function setTransaction($transaction)
    {
        if($transaction instanceof Transaction){
            $this->transaction = $transaction;
        }else{
            $temp = new Transaction();
            $temp->setSourceAddress(isset($transaction->source_address)?$transaction->source_address:"");
            $temp->setFeeLimit(isset($transaction->fee_limit)?$transaction->fee_limit:"");
            $temp->setGasPrice(isset($transaction->gas_price)?$transaction->gas_price:"");
            $temp->setNonce(isset($transaction->nonce)?$transaction->nonce:"");
            $temp->setMetadata(isset($transaction->metadata)?$transaction->metadata:"");
            $temp->setOperations(isset($transaction->operations)?$transaction->operations:[]);
            $this->transaction = $temp;
        }
    }

    /**
     * @return int
     */
    public function getTxSize()
    {
        return $this->txSize;
    }

    /**
     * @param int $txSize
     */
    public function setTxSize($txSize)
    {
        $this->txSize = $txSize;
    }

}