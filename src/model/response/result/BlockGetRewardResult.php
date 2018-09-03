<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 1:06
 */

namespace bumo\model\response\result;


use bumo\model\response\result\data\ValidatorReward;

class BlockGetRewardResult
{
    /**
     * @var int
     */
    private $blockReward;// Long  block_reward
    /**
     * @var array
     */
    private $validatorsReward ;

    /**
     * @return int
     */
    public function getBlockReward()
    {
        return $this->blockReward;
    }

    /**
     * @param int $blockReward
     */
    public function setBlockReward($blockReward)
    {
        $this->blockReward = $blockReward;
    }

    /**
     * @return array
     */
    public function getValidatorsReward()
    {
        return $this->validatorsReward;
    }

    /**
     * @param array $validatorsReward
     */
    public function setValidatorsReward($validatorsReward)
    {
        $this->validatorsReward = [];
        foreach ($validatorsReward as $validator => $reward){
            $obj = new ValidatorReward();
            $obj->setReward($reward);
            $obj->setValidator($validator);
            $this->validatorsReward[] = $obj;
        }
    }


}