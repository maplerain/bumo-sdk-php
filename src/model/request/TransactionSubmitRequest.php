<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 13:01
 */

namespace bumo\model\request;


class TransactionSubmitRequest
{
    /** @var string */
    private $transactionBlob;
    /** @var array  */
    private $signatures=array();

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
        if($signatures){
            $this->signatures = [];
            foreach ($signatures as $key => $value) {
                array_push($this->signatures , $value);
            }
        }
    } //Signature[]

}