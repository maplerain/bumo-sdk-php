<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 2:26
 */

namespace bumo\model\response\result\data;


class Signature
{
    /**
     * @var string
     */
    private  $signData; //String   sign_data

    /**
     * @var string
     */
    private  $publicKey;

    /**
     * @return string
     */
    public function getSignData()
    {
        return $this->signData;
    }

    /**
     * @param string $signData
     */
    public function setSignData($signData)
    {
        $this->signData = $signData;
    }

    /**
     * @return string
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * @param string $publicKey
     */
    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;
    } //String    public_key

}