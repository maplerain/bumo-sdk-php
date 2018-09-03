<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 2:36
 */

namespace bumo\model\response\result\data;


class Asset
{
    /**
     * @var int
     */
    private $amount;
    /**
     * @var Key
     */
    private $key;

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return Key
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param \stdClass|Key $key
     */
    public function setKey($key)
    {
        if($key instanceof Key){
            $this->key = $key;
        }else{
            $this->key = new Key();
            $this->key->setCode(isset($key->code)?$key->code:"");
            $this->key->setIssuer(isset($key->issuer)?$key->issuer:"");
        }
    }

}