<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 0:14
 */

namespace bumo\model\response;


use bumo\model\response\result\BlockGetInfoResult;

class BlockGetInfoResponse extends BaseResponse
{
    /**
     * @var BlockGetInfoResult
     */
    private $result;

    /**
     * @return BlockGetInfoResult
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param \stdClass | result\BlockGetInfoResult $result
     */
    public function setResult($result)
    {
        if($result instanceof result\BlockGetInfoResult){
            $this->$result = $result;
        }else{
            $this->result = new result\BlockGetInfoResult();
            $this->result->setHeader($result);
        }
    }

}