<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 3:14
 */

namespace bumo\model\response\result\data;


class Operation
{
    /** @var string */
    private $sourceAddress;
    /** @var int */
    private $type;
    /** @var string */
    private $metadata;
    /** @var CreateAccount */
    private $createAccount;
    /** @var IssueAsset */
    private $issueAsset;
    /** @var PayAsset */
    private $payAsset;
    /** @var PayCoin */
    private $payCoin;
    /** @var SetMetadata */
    private $setMetadata;
    /** @var SetPrivilege */
    private $setPrivilege;
    /** @var Log */
    private $log;

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return CreateAccount
     */
    public function getCreateAccount()
    {
        return $this->createAccount;
    }

    /**
     * @param CreateAccount|\stdClass $createAccount
     */
    public function setCreateAccount($createAccount)
    {
        if($createAccount instanceof CreateAccount){
            $this->createAccount = $createAccount;
        }else{
            $temp = new CreateAccount();
            $temp->setDestAddress(isset($createAccount->dest_address)?$createAccount->dest_address:"");
            $temp->setContract(isset($createAccount->contract)?$createAccount->contract:"");
            $temp->setPriv(isset($createAccount->priv)?$createAccount->priv:"");
            $temp->setMetadatas(isset($createAccount->metadatas)?$createAccount->metadatas:[]);
            $temp->setInitBalance(isset($createAccount->init_balance)?$createAccount->init_balance:0);
            $temp->setInitInput(isset($createAccount->init_input)?$createAccount->init_input:"");
            $this->createAccount = $temp;
        }
    }

    /**
     * @return IssueAsset
     */
    public function getIssueAsset()
    {
        return $this->issueAsset;
    }

    /**
     * @param IssueAsset|\stdClass $issueAsset
     */
    public function setIssueAsset($issueAsset)
    {
        if($issueAsset instanceof IssueAsset){
            $this->issueAsset = $issueAsset;
        }else{
            $temp = new IssueAsset();
            $temp->setCode(isset($createAccount->code)?$createAccount->code:"");
            $temp->setAmount(isset($createAccount->amount)?$createAccount->amount:0);

            $this->issueAsset = $temp;
        }
    }

    /**
     * @return PayAsset
     */
    public function getPayAsset()
    {
        return $this->payAsset;
    }

    /**
     * @param PayAsset|\stdClass $payAsset
     */
    public function setPayAsset($payAsset)
    {
        if($payAsset instanceof PayAsset){
            $this->payAsset = $payAsset;
        }else{
            $temp = new PayAsset();
            $temp->setDestAddress(isset($sendAsset->dest_address)?$sendAsset->dest_address:"");
            $temp->setAsset(isset($sendAsset->token)?$sendAsset->token: null);
            $temp->setInput(isset($sendAsset->input)?$sendAsset->input:"");
            $this->payAsset = $temp;
        }
    }

    /**
     * @return PayCoin
     */
    public function getPayCoin()
    {
        return $this->payCoin;
    }

    /**
     * @param PayCoin|\stdClass $payCoin
     */
    public function setPayCoin($payCoin)
    {
        if($payCoin instanceof PayCoin){
            $this->payCoin = $payCoin;
        }else{
            $temp = new PayCoin();
            $temp->setDestAddress(isset($payCoin->dest_address)?$payCoin->dest_address:"");
            $temp->setAmount(isset($payCoin->amount)?$payCoin->amount:"");
            $temp->setInput(isset($payCoin->input)?$payCoin->input:"");
            $this->payCoin = $temp;
        }
        $this->payCoin = $payCoin;
    }

    /**
     * @return SetMetadata
     */
    public function getSetMetadata()
    {
        return $this->setMetadata;
    }

    /**
     * @param SetMetadata|\stdClass $setMetadata
     */
    public function setSetMetadata($setMetadata)
    {
        if($setMetadata instanceof SetMetadata){
            $this->setMetadata = $setMetadata;
        }else{
            $temp = new SetMetadata();
            $temp->setKey(isset($setMetadata->key)?$setMetadata->key:"");
            $temp->setValue(isset($setMetadata->value)?$setMetadata->value:"");
            $temp->setVersion(isset($setMetadata->version)?$setMetadata->version:0);
            $temp->setDeleteFlag(isset($setMetadata->delete_flag)?$setMetadata->delete_flag:false);

            $this->setMetadata = $temp;
        }
    }

    /**
     * @return SetPrivilege
     */
    public function getSetPrivilege()
    {
        return $this->setPrivilege;
    }

    /**
     * @param SetPrivilege|\stdClass $setPrivilege
     */
    public function setSetPrivilege($setPrivilege)
    {
        if($setPrivilege instanceof SetMetadata){
            $this->setPrivilege = $setPrivilege;
        }else{
            $temp = new SetPrivilege();
            $temp->setMasterWeight(isset($setPrivilege->master_weight)?$setPrivilege->master_weight:"");
            $temp->setSigners(isset($setPrivilege->signers)?$setPrivilege->signers:[]);
            $temp->setTxThreshold(isset($setPrivilege->tx_threshold)?$setPrivilege->tx_threshold:"");
            $temp->setTypeThresholds(isset($setPrivilege->type_thresholds)?$setPrivilege->type_thresholds:[]);

            $this->setPrivilege = $temp;
        }
    }

    /**
     * @return Log
     */
    public function getLog()
    {
        return $this->log;
    }

    /**
     * @param Log|\stdClass $log
     */
    public function setLog($log)
    {
        if($log instanceof Log){
            $this->log = $log;
        }else{
            $this->log = new Log();
            $this->log->setTopic(isset($log->topic)? $log->topic : "");
            $this->log->setDatas(isset($log->datas) ? $log->datas : []);
        }
    }


}