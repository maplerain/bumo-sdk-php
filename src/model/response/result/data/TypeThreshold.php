<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 2:17
 */

namespace bumo\model\response\result\data;


class TypeThreshold
{
    /**
     * @var int
     */
    private $type;  //Integer  type
    /**
     * @var int
     */
    private $threshold;

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getThreshold()
    {
        return $this->threshold;
    }

    /**
     * @param int $threshold
     */
    public function setThreshold($threshold)
    {
        $this->threshold = $threshold;
    } //Long  threshold

}