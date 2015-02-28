<?php
/*
* 패스워드 복호화
* Last updated (09.08.18) 임민형
*/
$key="XiTo74dOO09N48YeUmuvbL0E";

/*function decrypt($string, $key) {
    $dec = "";
    $string = trim(base64_decode($string));
    global $iv;
    $dec = @ mcrypt_cbc (MCRYPT_TripleDES, $key, $string, MCRYPT_DECRYPT);
    return $dec;
}*/

function bytexor1($a,$b)
{
        $c="";
        for($i=0;$i<16;$i++)$c.=$a{$i}^$b{$i};
        return $c;
}


function decrypt_md5($msg,$key)
{
        $string="";
        $buffer="";
        $key2="";
        $msg =  base64_decode($msg);

        while($msg)
        {
                $key2=pack("H*",md5($key.$key2.$buffer));
                $buffer=bytexor1(substr($msg,0,16),$key2);
                $string.=$buffer;
                $msg=substr($msg,16);
        }
        return($string);
}
?>