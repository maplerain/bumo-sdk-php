<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: chain.proto

namespace Protocol;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>protocol.Account</code>
 */
class Account extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string address = 1;</code>
     */
    private $address = '';
    /**
     *last transaction seq
     *
     * Generated from protobuf field <code>int64 nonce = 2;</code>
     */
    private $nonce = 0;
    /**
     * Generated from protobuf field <code>.protocol.AccountPrivilege priv = 3;</code>
     */
    private $priv = null;
    /**
     *metadatas_hash = merklehash(metadatas);
     *
     * Generated from protobuf field <code>bytes metadatas_hash = 4;</code>
     */
    private $metadatas_hash = '';
    /**
     *assets_hash = merkelhash(assets)
     *
     * Generated from protobuf field <code>bytes assets_hash = 5;</code>
     */
    private $assets_hash = '';
    /**
     * Generated from protobuf field <code>.protocol.Contract contract = 6;</code>
     */
    private $contract = null;
    /**
     * Generated from protobuf field <code>int64 balance = 7;</code>
     */
    private $balance = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $address
     *     @type int|string $nonce
     *          last transaction seq
     *     @type \Protocol\AccountPrivilege $priv
     *     @type string $metadatas_hash
     *          metadatas_hash = merklehash(metadatas);
     *     @type string $assets_hash
     *          assets_hash = merkelhash(assets)
     *     @type \Protocol\Contract $contract
     *     @type int|string $balance
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Chain::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string address = 1;</code>
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Generated from protobuf field <code>string address = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setAddress($var)
    {
        GPBUtil::checkString($var, True);
        $this->address = $var;

        return $this;
    }

    /**
     *last transaction seq
     *
     * Generated from protobuf field <code>int64 nonce = 2;</code>
     * @return int|string
     */
    public function getNonce()
    {
        return $this->nonce;
    }

    /**
     *last transaction seq
     *
     * Generated from protobuf field <code>int64 nonce = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setNonce($var)
    {
        GPBUtil::checkInt64($var);
        $this->nonce = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.protocol.AccountPrivilege priv = 3;</code>
     * @return \Protocol\AccountPrivilege
     */
    public function getPriv()
    {
        return $this->priv;
    }

    /**
     * Generated from protobuf field <code>.protocol.AccountPrivilege priv = 3;</code>
     * @param \Protocol\AccountPrivilege $var
     * @return $this
     */
    public function setPriv($var)
    {
        GPBUtil::checkMessage($var, \Protocol\AccountPrivilege::class);
        $this->priv = $var;

        return $this;
    }

    /**
     *metadatas_hash = merklehash(metadatas);
     *
     * Generated from protobuf field <code>bytes metadatas_hash = 4;</code>
     * @return string
     */
    public function getMetadatasHash()
    {
        return $this->metadatas_hash;
    }

    /**
     *metadatas_hash = merklehash(metadatas);
     *
     * Generated from protobuf field <code>bytes metadatas_hash = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setMetadatasHash($var)
    {
        GPBUtil::checkString($var, False);
        $this->metadatas_hash = $var;

        return $this;
    }

    /**
     *assets_hash = merkelhash(assets)
     *
     * Generated from protobuf field <code>bytes assets_hash = 5;</code>
     * @return string
     */
    public function getAssetsHash()
    {
        return $this->assets_hash;
    }

    /**
     *assets_hash = merkelhash(assets)
     *
     * Generated from protobuf field <code>bytes assets_hash = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setAssetsHash($var)
    {
        GPBUtil::checkString($var, False);
        $this->assets_hash = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.protocol.Contract contract = 6;</code>
     * @return \Protocol\Contract
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * Generated from protobuf field <code>.protocol.Contract contract = 6;</code>
     * @param \Protocol\Contract $var
     * @return $this
     */
    public function setContract($var)
    {
        GPBUtil::checkMessage($var, \Protocol\Contract::class);
        $this->contract = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 balance = 7;</code>
     * @return int|string
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Generated from protobuf field <code>int64 balance = 7;</code>
     * @param int|string $var
     * @return $this
     */
    public function setBalance($var)
    {
        GPBUtil::checkInt64($var);
        $this->balance = $var;

        return $this;
    }

}

