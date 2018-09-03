<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 8:39
 */

namespace bumo\model\response;


use bumo\model\response\result\AssetGetInfoResult;

class AssetGetInfoResponse extends BaseResponse
{
    /** @var AssetGetInfoResult */
    private $result;

    /**
     * @return AssetGetInfoResult
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
        $this->result = new AssetGetInfoResult();
        if(isset($result->assets)){
            $this->result->setAssets($$result->assets);
        }
    }

}