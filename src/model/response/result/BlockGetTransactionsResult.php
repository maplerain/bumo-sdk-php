<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/2
 * Time: 23:53
 */

namespace bumo\model\response\result;


use bumo\model\response\result\data\TransactionHistory;

class BlockGetTransactionsResult
{
    /** @var   int */
    private $totalCount;//Long  total_count
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
        $this->transactions = [];
        foreach ($transactions as $transaction){
            $temp = new TransactionHistory();
            $temp->setActualFee(isset($transaction->actual_fee)?$transaction->actual_fee:"");
            $temp->setCloseTime(isset($transaction->close_time)?$transaction->close_time:"");
            $temp->setErrorCode(isset($transaction->error_code)?$transaction->error_code:"");
            $temp->setErrorDesc(isset($transaction->error_desc)?$transaction->error_desc:"");
            $temp->setHash(isset($transaction->hash)?$transaction->hash:"");
            $temp->setLedgerSeq(isset($transaction->ledger_seq)?$transaction->ledger_seq:"");
            $temp->setSignatures(isset($transaction->signatures)?$transaction->signatures: []);
            $temp->setTransaction(isset($transaction->transaction)?$transaction->transaction: null );
            $temp->setTxSize(isset($transaction->tx_size)?$transaction->tx_size:"");
            array_push($this->transactions , $temp);
        }
    }


}