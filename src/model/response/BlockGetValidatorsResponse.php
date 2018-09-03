<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 0:43
 */

namespace bumo\model\response;


use bumo\model\response\result\BlockGetValidatorsResult;

class BlockGetValidatorsResponse extends BaseResponse
{
    /**
     * @var BlockGetValidatorsResult
     */
    private $result;

    /**
     * @return BlockGetValidatorsResult
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param array | BlockGetValidatorsResult $result
     */
    public function setResult($result)
    {
        if($result instanceof BlockGetValidatorsResult){
            $this->$result = $result;
        }else{
            $this->result = new BlockGetValidatorsResult();
            $this->result->setValidators($result);
        }
    }
}