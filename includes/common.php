<?php
/*
* 패스워드 암호화
* Last updated (09.08.18) 임민형
*/

$key="XiTo74dOO09N48YeUmuvbL0E";

/*function encrypt($string, $key) {
    $enc = "";
    global $iv;
    $enc= @ mcrypt_cbc (MCRYPT_TripleDES, $key, $string, MCRYPT_ENCRYPT);

  return base64_encode($enc);
}*/
function bytexor($a,$b)
{
        $c="";
        for($i=0;$i<16;$i++)$c.=$a{$i}^$b{$i};
        return $c;
}
function encrypt_md5($msg,$key)
{
        $string="";
        $buffer="";
        $key2="";

        while($msg)
        {
                $key2=pack("H*",md5($key.$key2.$buffer));
                $buffer=substr($msg,0,16);
                $string.=bytexor($buffer,$key2);
                $msg=substr($msg,16);
        }
        return base64_encode($string);
}

function here_setcookie($name, $value, $expire, $path='/', $domain )
{
    if (headers_sent()) {
        $cookie = $name.'='.urlencode($value).';';
        if ($expire) $cookie .= '; path=/; domain='.$domain.'; expires='.gmdate('D, d M Y H:i:s', $expire).' GMT';
        echo '<script language="javascript">document.cookie="'.$cookie.'";</script>';
    } else {
        setcookie($name, $value, $expire, $path, $domain);
    }

}
function mh_post_request($url, $data, $referer='') {
 
    // Convert the data array into URL Parameters like a=b&foo=bar etc.
    $data = http_build_query($data);
 
    // parse the given URL
    $url = parse_url($url);
 
    if ($url['scheme'] != 'http'){
		if($url['scheme'] != 'https') { 
			die('Error: Only HTTP request are supported !');
		}
    }
 
    // extract host and path:
    $host = $url['host'];
    $path = $url['path'];
 
    // open a socket connection on port 80 - timeout: 30 sec
    $fp = fsockopen($host, 80, $errno, $errstr, 30);
 
    if ($fp){
 
        // send the request headers:
        fputs($fp, "POST $path HTTP/1.1\r\n");
        fputs($fp, "Host: $host\r\n");
 
        if ($referer != '')
            fputs($fp, "Referer: $referer\r\n");
 
        fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
        fputs($fp, "Content-length: ". strlen($data) ."\r\n");
        fputs($fp, "Connection: close\r\n\r\n");
        fputs($fp, $data);
 
        $result = ''; 
        while(!feof($fp)) {
            // receive the results of the request
            $result .= fgets($fp, 128);
        }
    }
    else { 
        return array(
            'status' => 'err', 
            'error' => "$errstr ($errno)"
        );
    }
 
    // close the socket connection:
    fclose($fp);
 
    // split the result header from the content
    $result = explode("\r\n\r\n", $result, 2);
 
    $header = isset($result[0]) ? $result[0] : '';
    $content = isset($result[1]) ? $result[1] : '';
 
    // return as structured array:
    return array(
        'status' => 'ok',
        'header' => $header,
        'content' => $content
    );
}
?>