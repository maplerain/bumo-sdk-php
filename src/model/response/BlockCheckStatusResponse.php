<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/2
 * Time: 23:35
 */

namespace bumo\model\response;


use bumo\model\response\BaseResponse;

class BlockCheckStatusResponse extends BaseResponse
{
    /**
     * @var result\BlockCheckStatusResult
     */
    private $result;

    /**
     * @return result\BlockCheckStatusResult
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param \stdClass | result\BlockCheckStatusResult $result
     */
    public function setResult($result)
    {
        if($result instanceof result\BlockCheckStatusResult){
            $this->$result = $result;
        }else{
            $this->result = new result\BlockCheckStatusResult();

        }
    }

}