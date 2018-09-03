<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 11:53
 */

namespace bumo\model\response\result;


use bumo\model\response\result\data\TestTx;

class TransactionEvaluateFeeResult
{
    /** @var array */
    private $txs;

    /**
     * @return array
     */
    public function getTxs()
    {
        return $this->txs;
    }

    /**
     * @param array $txs
     */
    public function setTxs($txs)
    {
        if($txs){
            $this->txs = [];
            foreach ($txs as $key => $value) {
                $temp = new TestTx();
                $temp->setTransactionEnv(isset($value->transaction_env)?$value->transaction_env:"");
                array_push($this->txs,$txs);
            }
        }
    }

}