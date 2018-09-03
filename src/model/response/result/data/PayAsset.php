<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 2:50
 */

namespace bumo\model\response\result\data;


class PayAsset
{
    /**
     * @var string
     */
    private  $destAddress;//String dest_address
    /**
     * @var Asset
     */
    private  $asset;//AssetInfo token
    /**
     * @var string
     */
    private  $input;

    /**
     * @return string
     */
    public function getDestAddress()
    {
        return $this->destAddress;
    }

    /**
     * @param string $destAddress
     */
    public function setDestAddress($destAddress)
    {
        $this->destAddress = $destAddress;
    }

    /**
     * @return Asset
     */
    public function getAsset()
    {
        return $this->asset;
    }

    /**
     * @param Asset|\stdClass $asset
     */
    public function setAsset($asset)
    {
        if($asset instanceof Asset){
            $this->asset = $asset;
        }else{
            $this->asset = new Asset();
            $this->asset->setKey(isset($asset->key)?$asset->key:"");
            $this->asset->setAmount(isset($asset->amount)?$asset->amount:0);
        }
        $this->asset = $asset;
    }

    /**
     * @return string
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param string $input
     */
    public function setInput($input)
    {
        $this->input = $input;
    }//String input


}