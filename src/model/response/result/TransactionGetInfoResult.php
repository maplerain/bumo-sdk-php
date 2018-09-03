<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 12:22
 */

namespace bumo\model\response\result;


use bumo\model\response\result\data\TransactionHistory;

class TransactionGetInfoResult
{
    /** @var int */
    private $totalCount;//Long     total_count
    /** @var array  */
    private $transactions=array();

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }

    /**
     * @param int $totalCount
     */
    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;
    }

    /**
     * @return array
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param array $transactions
     */
    public function setTransactions($transactions)
    {
        if($transactions){
            foreach ($transactions as $key => $value) {
                // var_dump($value);exit;
                $temp = new TransactionHistory();
                $temp->setActualFee(isset($value->actual_fee)?$value->actual_fee:'');
                $temp->setCloseTime(isset($value->close_time)?$value->close_time:0);
                $temp->setErrorCode(isset($value->error_code)?$value->error_code:0);
                $temp->setErrorDesc(isset($value->error_desc)?$value->error_desc:'');
                $temp->setHash(isset($value->hash)?$value->hash:'');
                $temp->setLedgerSeq(isset($value->ledger_seq)?$value->ledger_seq:'');
                $temp->setSignatures(isset($value->signatures)?$value->signatures:[]);
                $temp->setTransaction(isset($value->transaction)?$value->transaction:null);
                $temp->setTxSize(isset($value->tx_size)?$value->tx_size:0);
                array_push($this->transactions,$temp);
            }
        }
    }

}