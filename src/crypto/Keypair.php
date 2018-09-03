<?php
/**
 * Created by PhpStorm.
 * User: dw
 * Date: 2018/8/9
 * Time: 18:02
 */

namespace bumo\crypto;
use bumo\common\Bytes;
use bumo\common\Base58;

class Keypair
{
    public function __construct()
    {

    }

    /**
     * @return \stdClass
     */
    public function create()
    {
        $rawPrivate = [];
        for($i = 0; $i < 32; $i++){
            $rawPrivate[] = mt_rand(0, 255);
        }
        $rawPublic = Bytes::getbytes(ed25519_publickey(Bytes::tostr($rawPrivate)));
//        return [
//            "privateKey"=>$this->encodePrivate($rawPrivate),
//            "publicKey"=>$this->encodePublic($rawPublic),
//            "address"=>$this->encodeAddreee($rawPublic)
//        ];
        $result = new \stdClass();
        $result->privateKey = $this->encodePrivate($rawPrivate);
        $result->publicKey = $this->encodePublic($rawPublic);
        $result->address = $this->encodeAddreee($rawPublic);
        return $result;
    }

    public function checkAddress($address)
    {
        if(!isset($address) || "" == $address){
            return false;
        }
        $decAdd = Base58::decode($address);
        $byteAdd = Bytes::getbytes($decAdd);
        if(!(0x01 == $byteAdd[0] && 0x56 == $byteAdd[1])){
            return false;
        }else if(!(1 == $byteAdd[2])){
            return false;
        }
        $daddr = array_slice($byteAdd, 0, 23);
        $checkSum = Bytes::getbytes(hash("sha256", hash("sha256", Bytes::tostr($daddr), true), true));
        if($checkSum[0] == $byteAdd[23] && $checkSum[1] == $byteAdd[24] &&
            $checkSum[2] == $byteAdd[25]&& $checkSum[3] == $byteAdd[26]){
            return true;
        }else{
            return false;
        }
    }

    public function checkPrivate($private)
    {
        if(!isset($private) || "" == $private){
            return false;
        }
        $bytePriv = Bytes::getbytes(Base58::decode($private));
        if(41 != count($bytePriv) || 0xda != $bytePriv[0] || 0x37 != $bytePriv[1] ||
            0x9f != $bytePriv[2] || 1 != $bytePriv[3] || 0x00 != $bytePriv[36]){
            return false;
        }
        $dByte = array_slice($bytePriv, 0, 37);
        $checkSum = $checkSumBuf = Bytes::getbytes(hash("sha256",
            hash("sha256", Bytes::tostr($dByte), true), true));
        if($checkSum[0] != $bytePriv[37] || $checkSum[1] != $bytePriv[38] ||
            $checkSum[2] != $bytePriv[39] || $checkSum[3] != $bytePriv[40]){
            return false;
        }
        return true;
    }

    public function checkPublic($public)
    {
        if(!isset($public) || "" == $public){
            return false;
        }
        $bytePublic = [];
        for($i = 0; $i < 76; $i += 2){
            $bytePublic[] = hexdec(substr($public, $i, 2));
        }
        if(38 != count($bytePublic) || 0xb0 != $bytePublic[0] || 1 != $bytePublic[1]){
            return false;
        }
        $checkSumBuf = Bytes::getbytes(hash("sha256", hash("sha256",
            Bytes::tostr(array_slice($bytePublic, 0, 34)), true), true));
        if($checkSumBuf[0] != $bytePublic[34] || $checkSumBuf[1] != $bytePublic[35] ||
            $checkSumBuf[2] != $bytePublic[36] || $checkSumBuf[3] != $bytePublic[37]){
            return false;
        }
        return true;

    }

    private function encodePrivate($privateBuf)
    {
        if(!isset($privateBuf)){
            return false;
        }
        $prevBuf = [0xda, 0x37, 0x9f, 1];
        $resultBuf = array_merge($prevBuf, $privateBuf);
        $resultBuf[] = 0;
        $resultStr = Bytes::tostr($resultBuf);
        $checkSumBuf = Bytes::getbytes(hash("sha256", hash("sha256", $resultStr, true), true));
        for($i = 0; $i < 4; $i++){
            $resultBuf[] = $checkSumBuf[$i];
        }
        return Base58::encode(Bytes::tostr($resultBuf));
    }

    private function encodePublic($publicBuf)
    {
        if(!isset($publicBuf)){
            return false;
        }
        $resultBuf = array_merge([0xb0, 1], $publicBuf);
        $checkSumBuf = Bytes::getbytes(hash("sha256", hash("sha256", Bytes::tostr($resultBuf), true), true));
        for($i = 0; $i < 4; $i++){
            $resultBuf[] = $checkSumBuf[$i];
        }
        $resultStr = "";
        foreach ($resultBuf as $index => $item){
            if(16 > $item){
		$resultStr .= "0";
            }
            $ret = base_convert($item, 10, 16);
	    $resultStr = $resultStr . $ret;
        }
        return $resultStr;
    }

    private function encodeAddreee($publicBuf)
    {
        if(!isset($publicBuf)){
            return false;
        }
        $resultBuf = [0X01,0X56, 1];
        $checkSumBuf = Bytes::getbytes(hash("sha256", Bytes::tostr($publicBuf), true));
        for($i = 12; $i < 32; $i++){
            $resultBuf[] = $checkSumBuf[$i];
        }
        $checkSumBuf2 = Bytes::getbytes(hash("sha256", hash("sha256", Bytes::tostr($resultBuf), true), true));
        for($i = 0; $i < 4; $i++){
            $resultBuf[] = $checkSumBuf2[$i];
        }
        return Base58::encode(Bytes::tostr($resultBuf));
    }

    public function getPublic($private){
        return $this->encodePublic($this->getRawPublic($private));
    }

    public function getRawPublic($private)
    {
        $rawPublic = Bytes::getbytes(ed25519_publickey(Bytes::tostr($this->getRawPrivate($private))));
        return $rawPublic;
    }

    public function getRawPrivate($private)
    {
        if(!isset($private)){
            return false;
        }
        $bytePrivate = Bytes::getbytes(Base58::decode($private));
        $rawByte = array_slice($bytePrivate, 4, 32);
        return $rawByte;
    }

}
