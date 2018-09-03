<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 14:13
 */

namespace bumo\model\response\result;


class ContractCheckValidResult
{
    /** @var boolean */
    private $isValid;

    /**
     * @return bool
     */
    public function getIsValid()
    {
        return $this->isValid;
    }

    /**
     * @param bool $isValid
     */
    public function setIsValid($isValid)
    {
        $this->isValid = $isValid;
    }

}