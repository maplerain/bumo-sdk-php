<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: chain.proto

namespace Protocol;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>protocol.AccountPrivilege</code>
 */
class AccountPrivilege extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int64 master_weight = 1;</code>
     */
    private $master_weight = 0;
    /**
     * Generated from protobuf field <code>repeated .protocol.Signer signers = 2;</code>
     */
    private $signers;
    /**
     * Generated from protobuf field <code>.protocol.AccountThreshold thresholds = 3;</code>
     */
    private $thresholds = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $master_weight
     *     @type \Protocol\Signer[]|\Google\Protobuf\Internal\RepeatedField $signers
     *     @type \Protocol\AccountThreshold $thresholds
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Chain::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int64 master_weight = 1;</code>
     * @return int|string
     */
    public function getMasterWeight()
    {
        return $this->master_weight;
    }

    /**
     * Generated from protobuf field <code>int64 master_weight = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setMasterWeight($var)
    {
        GPBUtil::checkInt64($var);
        $this->master_weight = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .protocol.Signer signers = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSigners()
    {
        return $this->signers;
    }

    /**
     * Generated from protobuf field <code>repeated .protocol.Signer signers = 2;</code>
     * @param \Protocol\Signer[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSigners($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Protocol\Signer::class);
        $this->signers = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.protocol.AccountThreshold thresholds = 3;</code>
     * @return \Protocol\AccountThreshold
     */
    public function getThresholds()
    {
        return $this->thresholds;
    }

    /**
     * Generated from protobuf field <code>.protocol.AccountThreshold thresholds = 3;</code>
     * @param \Protocol\AccountThreshold $var
     * @return $this
     */
    public function setThresholds($var)
    {
        GPBUtil::checkMessage($var, \Protocol\AccountThreshold::class);
        $this->thresholds = $var;

        return $this;
    }

}

