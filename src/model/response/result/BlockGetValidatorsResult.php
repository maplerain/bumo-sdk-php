<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/3
 * Time: 0:38
 */

namespace bumo\model\response\result;


use bumo\model\response\result\data\Validator;

class BlockGetValidatorsResult
{
    /**
     * @var array result\Validator
     */
    private $validators;

    /**
     * @return array
     */
    public function getValidators()
    {
        return $this->validators;
    }

    /**
     * @param array $validators
     */
    public function setValidators($validators)
    {
        $this->validators = [];
        foreach ($validators as $validator) {
            if($validator instanceof Validator){
                $this->validators[] = $validator;
             }else{
                $obj = new Validator();
                $obj->setAddress(isset($validator->address) ? $validator->address : "");
                $obj->setPledgeCoinAmount(isset($validator->pledge_coin_amount)?$validator->pledge_coin_amount:0);
                $this->validators[] = $obj;
            }
        }
    }


}