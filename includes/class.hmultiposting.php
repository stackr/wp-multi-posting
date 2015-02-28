<?php
if(!function_exists('encrypt_md5')){
	require_once(dirname(__FILE__).'/common.php');	
}
if(!function_exists('multiposting_init')){
	require_once(dirname(__FILE__).'/actions.php');
}

class HMultiPosting{
	function __construct(){
		add_action('admin_init', array(&$this,'mh_multi_edit_post_sideber'));
		add_action('admin_menu',array(&$this,'multi_posting_menu'));
		add_action('admin_init',array(&$this,'hot_multi_action'));
		add_action('init',array(&$this,'multiposting_init'));
	}
	function mh_multi_edit_post_sideber(){
		add_meta_box("edit_post_interface","동시 포스팅 설정", array(&$this,"mh_multiposting_setting"), "post", "side","high");
	}
	function mh_multiposting_setting(){
		$daum_ac = get_option('daum_ac');
		$egloos_ac = get_option('egloos_ac');
		$tistory_ac = get_option('tistory_ac');
		$naver_ac = get_option('naver_ac');

		/*if($daum_ac == 1)
			echo '<input type="checkbox" id="daum_ac" name="daum_ac" value="1" checked/> 다음 블로그<br/>';*/

		if($naver_ac == 1)
			echo '<input type="checkbox" id="naver_ac" name="naver_ac" value="1" checked/> 네이버 블로그<br/>';

		if($tistory_ac == 1)
			echo '<input type="checkbox" id="tistory_ac" name="tistory_ac" value="1" checked/> 티스토리<br/>';

		if($egloos_ac == 1)
			echo '<input type="checkbox" id="egloos_ac" name="egloos_ac" value="1" checked/> 이글루스';

	}
	function multi_posting_menu(){
	    add_options_page('MultiPosting', '동시포스팅', 10, basename(__FILE__), array(&$this,'multi_posting_option_page'));
	}
	function multi_posting_option_page(){
		require_once(dirname(dirname(__FILE__)).'/html/multi_posting_option_page.php');
	}
	function hot_multi_action(){
	    if(isset($_POST['maction'])){
	        switch($_POST['maction']){
	            case 'daumoauth'://다음 OAuth 인증 API 등록 
	                if(isset($_POST['daumoauth_secret']) && $_POST['daumoauth_secret'] != '' && isset($_POST['daumoauth_key']) && $_POST['daumoauth_key'] != ''){
	                    update_option('daumoauth_secret',$_POST['daumoauth_secret']);
	                    update_option('daumoauth_key',$_POST['daumoauth_key']);
	                }else{
	                    delete_option('daumoauth_secret');
	                    delete_option('daumoauth_key');
	                }
	                
	                break;
	            case 'tistoryoauth'://다음 OAuth 인증 API 등록 
	                if(isset($_POST['tistory_clientid']) && $_POST['tistory_clientid'] != '' && isset($_POST['tistory_secret']) && $_POST['tistory_secret'] != ''){
	                    update_option('tistory_clientid',$_POST['tistory_clientid']);
	                    update_option('tistory_secret',$_POST['tistory_secret']);
	                }else{
	                    delete_option('tistory_clientid');
	                    delete_option('tistory_secret');
	                }
	                
	                break;
	        }
	    }
	}
	function multiposting_init(){
		if(isset($_GET['hmp_callback']) && $_GET['hmp_callback'] == 'tistory'){
			$mh_siteurl = $_SERVER['HTTP_HOST'];
			session_set_cookie_params(0,"/",$mh_siteurl);
			$redirect_site = $_COOKIE['mh_siteurl'];
			if($_GET['access_token']){
				$access_token = $_GET['access_token'];
				update_option('tistory_access_token',$access_token);
				update_option('tistory_ac','2');
				echo '<script type="text/javascript">
					window.opener.document.location.href = window.opener.document.URL;
					window.close();
				</script>';
			}else{
				$redirect_uri = $userdata->source_domain;

				$authorization_code = $_REQUEST['code'];
				 
				$client_id = get_option('tistory_clientid');
				$client_secret = get_option('tistory_secret');
				$redirect_uri = home_url('?hmp_callback=tistory');
				$grant_type = 'authorization_code';

				$url = 'https://www.tistory.com/oauth/access_token/?code=' . $authorization_code .
						'&client_id=' . $client_id . '&client_secret=' . $client_secret .
						'&redirect_uri=' . urlencode($redirect_uri) . '&grant_type=' . $grant_type;

				$access_token = wp_remote_get($url);
				
				$access_token = $access_token['body'];
				$access_token = explode('=',$access_token);
				$href = home_url('?hmp_callback=tistory&access_token='.trim($access_token[1]));
				wp_redirect($href);
				
				exit;
				
			}
			die();
		}
	}
}
?>