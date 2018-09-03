<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 2:15
 */

namespace bumo\model\response\result\data;


class Log
{
    /**
     * @var string
     */
    private $topic;
    /**
     * @var array string
     */
    private $datas;

    /**
     * @return string
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param string $topic
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }

    /**
     * @return array
     */
    public function getDatas()
    {
        return $this->datas;
    }

    /**
     * @param array $datas
     */
    public function setDatas($datas)
    {
        $this->datas = $datas;
    }


}