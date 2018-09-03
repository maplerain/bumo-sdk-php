<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/2
 * Time: 21:34
 */

namespace bumo\model\response\result\data;


class BlockNumber
{
    /**
     * @var int
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