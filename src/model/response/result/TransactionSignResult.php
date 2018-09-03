<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 12:33
 */

namespace bumo\model\response\result;


use bumo\model\response\result\data\Signature;

class TransactionSignResult
{
    /** @var array  */
    private $signatures=array();

    /**
     * @return array
     */
    public function getSignatures()
    {
        return $this->signatures;
    }

    /**
     * @param array $signatures
     */
    public function setSignatures($signatures)
    {
        if($signatures){
            $this->signatures = [];
            foreach ($signatures as $key => $value) {
                $resultOb = new Signature();
                $resultOb->setSignData($value->sign_data);
                $resultOb->setPublicKey($value->public_key);
                array_push($this->signatures , $resultOb);
            }
        }
    }

}