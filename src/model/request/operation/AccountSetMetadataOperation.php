<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/8/31
 * Time: 16:38
 */

namespace bumo\model\operation;


class AccountSetMetadataOperation extends OperationBase
{
    /**
     * @var string
     */
    private $key;
    /**
     * @var string
     */
    private $value;
    /**
     * @var int
     */
    private $version;

    /**
     * @var bool
     */
    private $deleteFlag;

    public function __construct()
    {
        $this->key = "";
        $this->value = "";
        $this->version = 0;
        $this->deleteFlag = false;
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return bool
     */
    public function getDeleteFlag()
    {
        return $this->deleteFlag;
    }

    /**
     * @param bool $deleteFlag
     */
    public function setDeleteFlag($deleteFlag)
    {
        $this->deleteFlag = $deleteFlag;
    }

}