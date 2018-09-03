<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/2
 * Time: 21:49
 */

namespace bumo\model\response;


use bumo\model\response\result\BlockGetNumberResult;

class BlockGetNumberResponse extends BaseResponse
{
    /**
     * @var BlockGetNumberResult
     */
    private $result;

    /**
     * @return BlockGetNumberResult
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param BlockGetNumberResult $result
     */
    public function setResult($result)
    {
        if($result instanceof BlockGetNumberResult){
            $this->result = $result;
        }else{
            $this->result = new BlockGetNumberResult();
            $this->result->setBlockNumber($result->seq);
            $this->result->setHeader($result);
        }
    }

}