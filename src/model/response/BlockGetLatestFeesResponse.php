<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 1:46
 */

namespace bumo\model\response;


use bumo\model\response\result\BlockGetFeesResult;

class BlockGetLatestFeesResponse extends BaseResponse
{
    /**
     * @var BlockGetFeesResult
     */
    private $result;

    /**
     * @return BlockGetFeesResult
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param \stdClass|BlockGetFeesResult $result
     */
    public function setResult($result)
    {
        $this->result = new BlockGetFeesResult();
        $this->result->setFees($result);
    }


}