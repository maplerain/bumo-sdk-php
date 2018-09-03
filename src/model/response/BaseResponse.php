<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/9/2
 * Time: 21:44
 */

namespace bumo\model\response;


class BaseResponse
{
    /**
     * @var int
     */
    private $errorCode;
    /**
     * @var string
     */
    private $errorDesc;

    /**
     * @return int
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param int $errorCode
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
    }

    /**
     * @return string
     */
    public function getErrorDesc()
    {
        return $this->errorDesc;
    }

    /**
     * @param string $errorDesc
     */
    public function setErrorDesc($errorDesc)
    {
        $this->errorDesc = $errorDesc;
    }

}