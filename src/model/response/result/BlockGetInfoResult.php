<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 0:09
 */

namespace bumo\model\response\result;


use bumo\model\response\result\data\BlockHeader;

class BlockGetInfoResult
{
    /**
     * @var BlockHeader
     */
    private $header;

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