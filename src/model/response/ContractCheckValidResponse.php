<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 14:14
 */

namespace bumo\model\response;


use bumo\model\response\result\ContractCheckValidResult;

class ContractCheckValidResponse extends BaseResponse
{
    /** @var ContractCheckValidResult */
    private $result;

    /**
     * @return ContractCheckValidResult
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
        $resultOb = new ContractCheckValidResult();
        $resultOb->setIsValid(isset($result->is_valid)?$result->is_valid: false);

        $this->result = $resultOb;
    }


}