<?
/*
**   hash_hmac_php4(http://dna.daum.net)
**   Last updated : (09.08.14) 임민형
*/
function hash_hmac_php4($algo,$data,$passwd){
	$algo=strtolower($algo);
	$p=array('md5'=>'H32','sha1'=>'H40');
	if(strlen($passwd)>64) $passwd=pack($p[$algo],$algo($passwd));
	if(strlen($passwd)<64) $passwd=str_pad($passwd,64,chr(0));
	$ipad=substr($passwd,0,64) ^ str_repeat(chr(0x36),64);
	$opad=substr($passwd,0,64) ^ str_repeat(chr(0x5C),64);
	return($algo($opad.pack($p[$algo],$algo($ipad.$data))));
}
?>
