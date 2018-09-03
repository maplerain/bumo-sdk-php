<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 7:05
 */

namespace bumo\model\response\result;


class AccountCheckValidResult
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