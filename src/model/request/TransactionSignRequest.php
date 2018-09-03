<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 12:32
 */

namespace bumo\model\request;


class TransactionSignRequest
{
    /** @var string */
    private $blob;
    /** @var array  */
    private $privateKeys=array();

    /**
     * @return string
     */
    public function getBlob()
    {
        return $this->blob;
    }

    /**
     * @param string $blob
     */
    public function setBlob($blob)
    {
        $this->blob = $blob;
    }

    /**
     * @return array
     */
    public function getPrivateKeys()
    {
        return $this->privateKeys;
    }

    /**
     * @param array $privateKeys
     */
    public function setPrivateKeys($privateKeys)
    {
        $this->privateKeys = $privateKeys;
    } //string[]

}