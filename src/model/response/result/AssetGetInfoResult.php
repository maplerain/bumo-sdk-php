<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 8:34
 */

namespace bumo\model\response\result;


use bumo\model\response\result\data\Asset;

class AssetGetInfoResult
{
    /** @var array */
    private $assets;

    /**
     * @return array
     */
    public function getAssets()
    {
        return $this->assets;
    }

    /**
     * @param array $assets
     */
    public function setAssets($assets)
    {
        $this->assets = [];
        foreach ($assets as $asset){
            $obj = new Asset();
            $obj->setKey($asset->key);
            $obj->setAmount($asset->amount);
            $this->assets[] = $obj;
        }
    }

}