<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 2:53
 */

namespace bumo\model\response\result\data;


class IssueAsset
{
    /**
     * @var string
     */
    private $code;//String   code
    /**
     * @var int
     */
    private $amount;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    } //Long amount

}