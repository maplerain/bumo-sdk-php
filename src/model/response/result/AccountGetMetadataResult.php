<?php
/**
 * Created by PhpStorm.
 * User: caohailiang
 * Date: 2018/9/3
 * Time: 6:47
 */

namespace bumo\model\response\result;


use bumo\model\response\result\data\Metadata;

class AccountGetMetadataResult
{
    /**
     * @var array
     */
    private $metadatas;

    /**
     * @return Metadata
     */
    public function getMetadatas()
    {
        return $this->metadatas;
    }

    /**
     * @param array $metadatas
     */
    public function setMetadatas($metadatas)
    {
        $this->metadatas = [];
        foreach ($metadatas as $metadata){
            if($metadata instanceof Metadata){
                $this->metadatas[] = $metadata;
            }else {
                $obj = new Metadata();
                $obj->setKey($metadata->key);
                $obj->setValue($metadata->value);
                $obj->setVersion($metadata->version);
                $this->metadatas[] = $obj;
            }
        }
    }


}