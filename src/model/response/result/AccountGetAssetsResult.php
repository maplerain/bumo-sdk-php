<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 6:29
 */

namespace bumo\model\response\result;


use bumo\model\response\result\data\Asset;

class AccountGetAssetsResult
{
    /** @var array  */
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
        if(isset($assets)){
            $this->assets = [];
            foreach ($assets as $asset){
                if($assets instanceof Asset){
                    $this->assets[] = $asset;
                }else{
                    $obj = new Asset();
                    $obj->setAmount(isset($asset->amount)?$asset->amount: 0);
                    $obj->setKey(isset($asset->key)?$asset->key: null);
                    $this->assets[] = $obj;
                }
            }
        }
    }

}