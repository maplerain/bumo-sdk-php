<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 0:05
 */

namespace bumo\model\response\result\data;


class Fees
{
    /**
     * @var int
     */
    private $baseReserve; //long base_reserve
    /**
     * @var int
     */
    private $gasPrice;

    /**
     * @return int
     */
    public function getBaseReserve()
    {
        return $this->baseReserve;
    }

    /**
     * @param int $baseReserve
     */
    public function setBaseReserve($baseReserve)
    {
        $this->baseReserve = $baseReserve;
    }

    /**
     * @return int
     */
    public function getGasPrice()
    {
        return $this->gasPrice;
    }

    /**
     * @param int $gasPrice
     */
    public function setGasPrice($gasPrice)
    {
        $this->gasPrice = $gasPrice;
    }  //long gas_price

}