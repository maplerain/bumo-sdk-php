<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 7:06
 */

namespace bumo\model\response;


use bumo\model\response\result\AccountCheckValidResult;

class AccountCheckValidResponse
{
    /** @var AccountCheckValidResult */
    private $result;

    /**
     * @return AccountCheckValidResult
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
        $this->result = new AccountCheckValidResult();
        $this->result->setIsValid($result->isValid);
    }


}