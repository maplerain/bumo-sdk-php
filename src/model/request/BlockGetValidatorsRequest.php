<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 0:26
 */

namespace bumo\model\request;


class BlockGetValidatorsRequest
{
    /**
     * @var int;
     */
    private $blockNumber;

    /**
     * @return int
     */
    public function getBlockNumber()
    {
        return $this->blockNumber;
    }

    /**
     * @param int $blockNumber
     */
    public function setBlockNumber($blockNumber)
    {
        $this->blockNumber = $blockNumber;
    }


}