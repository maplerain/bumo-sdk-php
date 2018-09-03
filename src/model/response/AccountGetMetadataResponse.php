<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 6:53
 */

namespace bumo\model\response;


use bumo\model\response\result\AccountGetMetadataResult;

class AccountGetMetadataResponse extends BaseResponse
{
    /** @var AccountGetMetadataResult */
    private $result;

    /**
     * @return AccountGetMetadataResult
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
        $this->result = new AccountGetMetadataResult();
        $this->result->setMetadatas(isset($result->metadatas) ? $result->metadas : []);
    }


}