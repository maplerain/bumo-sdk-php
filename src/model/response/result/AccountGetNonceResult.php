<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 5:47
 */

namespace bumo\model\response\result;


class AccountGetNonceResult
{
    /** @var int */
    private $nonce;

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

}