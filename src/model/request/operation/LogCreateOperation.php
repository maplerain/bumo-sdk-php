<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 10:22
 */

namespace bumo\model\operation;


class LogCreateOperation extends OperationBase
{
    /** @var string */
    private  $topic; //string
    /** @var array */
    private  $datas;

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
        $this->datas = [];
        foreach ($datas as $data){
            $this->datas[] = $data;
        }
    }

}