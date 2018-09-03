<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 13:59
 */

namespace bumo\model\response\result;


use bumo\model\response\result\data\ContractStat;
use bumo\model\response\result\data\TransactionEnvs;

class ContractCallResult
{
    private $logs;//JSONObject logs
    private $queryRets;//JSONArray query_rets
    /** @var ContractStat */
    private $stat;//ContractStat stat
    /** @var array  */
    private $txs=array();

    /**
     * @return mixed
     */
    public function getLogs()
    {
        return $this->logs;
    }

    /**
     * @param mixed $logs
     */
    public function setLogs($logs)
    {
        $this->logs = $logs;
    }

    /**
     * @return mixed
     */
    public function getQueryRets()
    {
        return $this->queryRets;
    }

    /**
     * @param mixed $queryRets
     */
    public function setQueryRets($queryRets)
    {
        $this->queryRets = $queryRets;
    }

    /**
     * @return ContractStat
     */
    public function getStat()
    {
        return $this->stat;
    }

    /**
     * @param \stdClass $stat
     */
    public function setStat($stat)
    {
        $temp = new ContractStat();
        $temp->setApplyTime($stat->apply_time);
        $temp->setMemoryUsage($stat->memory_usage);
        $temp->setStackUsage($stat->stack_usage);
        $temp->setStep($stat->stack_usage);
        $this->stat = $temp;
    }

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
                $temp = new TransactionEnvs();
                $temp->setTransactionEnv($value->transaction_env);
                array_push($this->txs, $temp);
            }
        }
    }//TransactionEnvs[] txs

}