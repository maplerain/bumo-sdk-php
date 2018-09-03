<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 6:35
 */

namespace bumo\model\response;


use bumo\model\response\result\AccountGetAssetsResult;
use bumo\model\response\result\data\Asset;

class AccountGetAssetsResponse extends BaseResponse
{
    /** @var AccountGetAssetsResult */
    private $result;

    /**
     * @return AccountGetAssetsResult
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
        $this->result = new AccountGetAssetsResult();
        $this->result->setAssets(isset($result->assets) ? $result->assets : []);
    }

}