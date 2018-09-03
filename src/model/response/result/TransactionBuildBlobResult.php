<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 10:59
 */

namespace bumo\model\response\result;


class TransactionBuildBlobResult
{
    /**
     * @var string
     */
    private $transactionBlob;//String    transaction_blob
    /** @var string */
    private $hash;

    /**
     * @return string
     */
    public function getTransactionBlob()
    {
        return $this->transactionBlob;
    }

    /**
     * @param string $transactionBlob
     */
    public function setTransactionBlob($transactionBlob)
    {
        $this->transactionBlob = $transactionBlob;
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
    }//String   hash


}