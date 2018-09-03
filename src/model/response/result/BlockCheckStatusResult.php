<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/2
 * Time: 23:33
 */

namespace bumo\model\response\result;


class BlockCheckStatusResult
{
    /**
     * @var bool
     */
    private $isSynchronous;

    /**
     * @return bool
     */
    public function getIsSynchronous()
    {
        return $this->isSynchronous;
    }

    /**
     * @param bool $isSynchronous
     */
    public function setIsSynchronous($isSynchronous)
    {
        $this->isSynchronous = $isSynchronous;
    }


}