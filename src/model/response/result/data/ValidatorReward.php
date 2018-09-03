<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 1:05
 */

namespace bumo\model\response\result\data;


class ValidatorReward
{
    /**
     * @var string
     */
    private $validator;//String validator

    /**
     * @var int
     */
    private  $reward;

    /**
     * @return string
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @param string $validator
     */
    public function setValidator($validator)
    {
        $this->validator = $validator;
    }

    /**
     * @return int
     */
    public function getReward()
    {
        return $this->reward;
    }

    /**
     * @param int $reward
     */
    public function setReward($reward)
    {
        $this->reward = $reward;
    } //Long   reward


}