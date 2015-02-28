<?
/**
 * posting data
 * Last updated : (11.12.16) 임민형
 *
 * history
 * 11.12.16 : 멀티포스팅 시 개행 안되는 문제점 해결 
 */

include("daum.php"); 
include ("ssam_decrypt.php");
include("egloos.php");
include("tistory.php");
include("textcube.php");
include("naver.php");
include("wordpress.php");
function posting_data($subject,$body){

    $body2 = stripslashes($body);
    $body2 = str_replace("<br>", "", $body2);
	$body = str_replace("<p>","",$body);
	$body = str_replace("</p>","<br>",$body);
	$body = str_replace("\n","<br>",$body);
    $enter = chr(13) . chr(10);
    $body2=ereg_replace($enter,"",$body2);
    $body2 = str_replace("<img", "<img border=\"0\"", $body2);
    $body = htmlspecialchars_decode($body);
    $body = stripslashes($body);
    $subject = stripslashes($subject);
    
    
    $daum_access_token = get_option('daum_access_token');
    $daum_access_token_secret = get_option('daum_access_token_secret');
	$daum_blogurl = get_option('daum_blogurl');
    $daum_ac = get_option('daum_ac');

    $egloos_api = get_option('egloos_api');
    $egloos_id = get_option('egloos_id');
    $egloos_ac = get_option('egloos_ac');

    //$tistory_api= get_option('tistory_api');
    //$tistory_id = get_option('tistory_id');
    //$tistory_key = get_option('tistory_key');
    //$tistory_pw = decrypt_md5($tistory_pw, "XiTo74dOO09N48YeUmuvbL0E");
	$tistory_blogurl = get_option('tistory_blogurl');
	$tistory_token = get_option('tistory_access_token');
    $tistory_ac = get_option('tistory_ac');
    
    $textcube_api= get_option('textcube_api');
    $textcube_id = get_option('textcube_id');
    $textcube_pw = get_option('textcube_pw');
    $textcube_pw = decrypt_md5($textcube_pw, "XiTo74dOO09N48YeUmuvbL0E");
    $textcube_apiadd = get_option('textcube_ad');
    $textcube_ac = get_option('textcube_ac');

	$naver_id = get_option('naver_id');
	$naver_blogid = get_option('naver_blogid');
	$naver_api = get_option('naver_api');
	$naver_ac = get_option('naver_ac');

    //$tag = "daum tag";

	
	//$body = mb_substr($body,0,500,'utf-8');
	//$body = $subject."<br><br>".$body."...";
	//$subject = "쌈쳐넷에서 자동 포스팅된 글입니다.";
    //$subject = "";
    if(($daum_ac == 1) && isset($_POST['daum_ac']) && isset($daum_access_token) && isset($daum_access_token_secret) && isset($daum_blogurl))
        multi_posting_daum($daum_access_token,$daum_access_token_secret,$daum_blogurl,$subject,$body,$tag);
    if($tistory_ac == 1 && isset($_POST['tistory_ac']) && isset($tistory_blogurl) && isset($tistory_token))
       multi_posting_tistory($tistory_blogurl,$tistory_token,$subject,$body,$tag);
    if($egloos_ac == 1 && isset($_POST['egloos_ac']) && isset($egloos_api) && isset($egloos_id) )
        multi_posting_egloos($egloos_api,$egloos_id,$subject,$body2,$tag);
    if($textcube_ac == 1 && isset($_POST['textcube_ac']) && isset($textcube_api) && isset($textcube_pw) && isset($textcube_id) && isset($textcube_apiadd))
           multi_posting_textcube($textcube_api,$textcube_id,$textcube_pw,$textcube_apiadd,$subject,$body,$tag);
	 if($naver_ac == 1 && isset($_POST['naver_ac']) && isset($naver_id) && isset($naver_blogid) && isset($naver_api))
           multi_posting_naver($naver_id,$naver_blogid,$naver_api,$subject,$body,$tag);
	// multi_posting_wordpress('http://blog.ssamture.net','ssamture','ml68ag',$subject,$body,$tag);

}
?>