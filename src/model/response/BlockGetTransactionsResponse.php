<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 4:37
 */

namespace bumo\model\response;


use bumo\model\response\result\BlockGetTransactionsResult;

class BlockGetTransactionsResponse extends BaseResponse
{
    /** @var BlockGetTransactionsResult */
    private $result;

    /**
     * @return BlockGetTransactionsResult
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param \stdClass $result
     */
    public function setResult($result)
    {
        $this->result = new BlockGetTransactionsResult();
        $this->result->setTotalCount(isset($result->total_count) ? $result->total_count : 0);
        $this->result->setTransactions(isset($result->transactions) ? $result->transactions: []);
    }


}