<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/8/21
 * Time: 16:02
 */

namespace bumo\model\operation;


class OperationBase
{
    /**
     * @var string
     */
    private $sourceAddress;
    /**
     * @var string
     */
    private $metadata;

    public function __construct()
    {
        $this->sourceAddress = null;
        $this->metadata = null;
    }

    /**
     * @return string
     */
    public function getSourceAddress()
    {
        return $this->sourceAddress;
    }

    /**
     * @param string $sourceAddress
     */
    public function setSourceAddress($sourceAddress)
    {
        $this->sourceAddress = $sourceAddress;
    }

    /**
     * @return string
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param string $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }


}