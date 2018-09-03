<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 5:30
 */

namespace bumo\model\response\result;


use bumo\model\response\result\data\Priv;

class AccountGetInfoResult
{
    /** @var string */
    private $address; //String
    /** @var int */
    private $balance; //Long
    /** @var int */
    private $nonce;  //Long
    /** @var Priv */
    private $priv;

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param int $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
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
     * @return Priv
     */
    public function getPriv()
    {
        return $this->priv;
    }

    /**
     * @param Priv $priv
     */
    public function setPriv($priv)
    {
        if($priv instanceof Priv){
            $this->priv = $priv;
        }else {
            $privOb = new Priv();
            $privOb->setMasterWeight(isset($priv->master_weight)?$priv->master_weight:"");
            if(isset($priv->signers))
                $privOb->setSigners($priv->signers);
            if(isset($priv->thresholds))
                $privOb->setThreshold($priv->thresholds);
            $this->priv = $privOb;
        }
    } //Priv


}