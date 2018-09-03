<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 1:13
 */

namespace bumo\model\response;



use bumo\model\response\result\BlockGetRewardResult;

class BlockGetRewardResponse extends BaseResponse
{
    /**
     * @var BlockGetRewardResult
     */
    private $result;

    /**
     * @return BlockGetRewardResult
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param BlockGetRewardResult|array $result
     */
    public function setResult($result)
    {
        if($result instanceof BlockGetRewardResult){
            $this->result = $result;
        }else{
            $this->result = new BlockGetRewardResult();
            $this->result->setBlockReward($result->block_reward);
            $this->result->setValidatorsReward($result->validators_reward);
        }
    }
}