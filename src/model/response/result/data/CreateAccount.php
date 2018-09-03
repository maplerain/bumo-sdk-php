<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 2:57
 */

namespace bumo\model\response\result\data;


class CreateAccount
{
    /**
     * @var string
     */
    private $destAddress;// String  dest_address
    /** @var Contract */
    private $contract;
    /** @var Priv */
    private $priv;// Priv priv
    /** @var array  */
    private $metadatas;//MetadataInfo[]  metadatas
    /** @var int */
    private $initBalance;// Long init_balance
    /** @var string */
    private $initInput;

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
     * @return Contract
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * @param Contract|\stdClass $contract
     */
    public function setContract($contract)
    {
        if($contract instanceof Contract){
            $this->contract = $contract;
        }else{
            $this->contract = new Contract();
            $this->contract->setType(isset($contract->type)?$contract->type:0);
            $this->contract->setPayload(isset($contract->payload)?$contract->payload:"");
        }
    }

    /**
     * @return Priv
     */
    public function getPriv()
    {
        return $this->priv;
    }

    /**
     * @param Priv|\stdClass $priv
     */
    public function setPriv($priv)
    {
        if($priv instanceof Priv){
            $this->priv = $priv;
        }else{
            $temp = new Priv();
            $temp->setMasterWeight(isset($priv->master_weight)?$priv->master_weight:0);
            // var_dump($priv);
            $temp->setSigners(isset($priv->signers)?$priv->signers: []);
            // echo 3;exit;
            $temp->setThreshold(isset($priv->thresholds)?$priv->thresholds:null);
            $this->priv = $temp;
        }
    }

    /**
     * @return array
     */
    public function getMetadatas()
    {
        return $this->metadatas;
    }

    /**
     * @param array $metadatas
     */
    public function setMetadatas($metadatas)
    {
        if(isset($metadatas)){
            $this->metadatas = [];
            foreach ($metadatas as $metadata){
                if($metadatas instanceof SetMetadata){
                    $this->metadatas[] = $metadata;
                }else{
                    $obj = new SetMetadata();
                    $obj->setKey(isset($metadata->key) ? $metadata->key : "");
                    $obj->setValue(isset($metadata->value) ? $metadata->value : "");
                    $obj->setVersion(isset($metadata->version) ? $metadata->version : "");
                    $this->metadatas[] = $obj;
                }
            }
        }
    }

    /**
     * @return int
     */
    public function getInitBalance()
    {
        return $this->initBalance;
    }

    /**
     * @param int $initBalance
     */
    public function setInitBalance($initBalance)
    {
        $this->initBalance = $initBalance;
    }

    /**
     * @return string
     */
    public function getInitInput()
    {
        return $this->initInput;
    }

    /**
     * @param string $initInput
     */
    public function setInitInput($initInput)
    {
        $this->initInput = $initInput;
    }//String  init_input

}