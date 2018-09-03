<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/2
 * Time: 21:36
 */

namespace bumo\model\response\result;


use bumo\model\response\result\data\BlockHeader;
use bumo\model\response\result\data\BlockNumber;

class BlockGetNumberResult
{
    /**
     * @var \bumo\model\response\result\data\BlockHeader
     */
    private $header;
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


    /**
     * @return BlockHeader
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param \stdClass | BlockHeader $header
     */
    public function setHeader($header)
    {
        if($header instanceof BlockHeader){
            $this->header = $header;
        }else{
            $result = new BlockHeader();
            $result->setVersion($header->version);
            $result->setCloseTime($header->close_time);
            $result->setTxCount(isset($header->tx_count) ? $header->tx_count : 0);
            $result->setNumber($header->seq);
            $this->header = $result;
        }
    }


}