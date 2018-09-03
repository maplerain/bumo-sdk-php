<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/2
 * Time: 22:00
 */

namespace bumo\model\response\result\data;


class BlockHeader
{
    /**
     * @var int
     */
    private $closeTime;
    /**
     * @var int
     */
    private $number;
    /**
     * @var int
     */
    private $txCount; //long  tx_count
    /**
     * @var int
     */
    private $version;

    /**
     * @return int
     */
    public function getCloseTime()
    {
        return $this->closeTime;
    }

    /**
     * @param int $closeTime
     */
    public function setCloseTime($closeTime)
    {
        $this->closeTime = $closeTime;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return int
     */
    public function getTxCount()
    {
        return $this->txCount;
    }

    /**
     * @param int $txCount
     */
    public function setTxCount($txCount)
    {
        $this->txCount = $txCount;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    } //long version

}