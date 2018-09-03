<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 4:18
 */

namespace bumo\model\response\result\data;


class Transaction
{
    /** @var string */
    private  $sourceAddress; // String source_address
    /** @var int */
    private  $feeLimit; //Long fee_limit
    /** @var integer */
    private  $gasPrice; //Long gas_price
    /** @var int */
    private  $nonce; //Long nonce
    /** @var string */
    private  $metadata; //String metadata
    /** @var array  */
    private  $operations;

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
     * @return int
     */
    public function getFeeLimit()
    {
        return $this->feeLimit;
    }

    /**
     * @param int $feeLimit
     */
    public function setFeeLimit($feeLimit)
    {
        $this->feeLimit = $feeLimit;
    }

    /**
     * @return int
     */
    public function getGasPrice()
    {
        return $this->gasPrice;
    }

    /**
     * @param int $gasPrice
     */
    public function setGasPrice($gasPrice)
    {
        $this->gasPrice = $gasPrice;
    }

    /**
     * @return int
     */
    public function getNonce()
    {
        return $this->nonce;
    }

    /**
     * @param int $nonce
     */
    public function setNonce($nonce)
    {
        $this->nonce = $nonce;
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

    /**
     * @return array
     */
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * @param array $operations
     */
    public function setOperations($operations)
    {
        if($operations){
            $this->operations = [];
            foreach ($operations as $operation) {
                $temp = new Operation();
                $temp->setType(isset($operation->type)?$operation->type:0);
                $temp->setSourceAddress(isset($operation->source_address)?$operation->source_address:'');
                $temp->setMetadata(isset($operation->metadata)?$operation->metadata:'');
                $temp->setCreateAccount(isset($operation->create_account)?$operation->create_account: null);
                $temp->setIssueAsset(isset($operation->issue_asset)?$operation->issue_asset: null);
                $temp->setPayAsset(isset($operation->pay_asset)?$operation->pay_asset:  null);
                $temp->setPayCoin(isset($operation->pay_coin)?$operation->pay_coin: null);
                $temp->setMetadata(isset($operation->set_metadata)?$operation->set_metadata:'');
                $temp->setSetPrivilege(isset($operation->set_privilege)?$operation->set_privilege:null);
                $temp->setLog(isset($operation->log)?$operation->log:null);
                array_push($this->operations,$temp);
            }
        }
        $this->operations = $operations;
    }//Operation[] operations


}