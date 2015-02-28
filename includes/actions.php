<?php
add_action('admin_init','multiposting_init');
function multiposting_init(){
	if(isset($_POST['multi']) && $_POST['multi'] == 5 && isset($_POST['naver_ac']) && $_POST['naver_ac'] == 1){
	    if($_POST['naver_api'] == ''){
	        wp_die( __('네이버 API를 입력해 주세요.') );
	    }elseif($_POST['naver_id'] == ''){
	        wp_die( __('네이버 ID를 입력해 주세요.') );
	    }elseif($_POST['naver_blogid'] == ''){
	        wp_die( __('네이버 블로그 ID를 입력해 주세요.') );
	    }else{
	        update_option('naver_id',$_POST['naver_id']);
	        update_option('naver_blogid',$_POST['naver_blogid']);
	        update_option('naver_api',$_POST['naver_api']);
			update_option('naver_ac',$_POST['naver_ac']);
	        $multi_error = '';
	    }
	}elseif(isset($_POST['multi']) && $_POST['multi'] == 5 && isset($_POST['naver_ac']) && $_POST['naver_ac'] == 0) {
	    update_option('naver_ac',$_POST['naver_ac']);
	}elseif(isset($_POST['multi']) && $_POST['multi'] == 5 && isset($_POST['naver_ac']) && $_POST['naver_ac'] == 2) {
	    update_option('naver_ac',$_POST['naver_ac']);
	    delete_option('naver_api');
	    delete_option('naver_blogid');
		delete_option('naver_id');
	}

	if(isset($_POST['multi']) && $_POST['multi'] == 1 && isset($_POST['daum_ac']) && $_POST['daum_ac'] == 1){
	    if($_POST['daum_blogurl'] == ''){
	        wp_die( __('다음 블로그 아이디를 입력해 주세요.') );
	    /*}elseif($_POST['daum_sig'] == ''){
	        wp_die( __('다음 SIG를 입력해 주세요.') );*/
	    }else{
	        //update_option('daum_sig',$_POST['daum_sig']);
	        update_option('daum_blogurl',$_POST['daum_blogurl']);
	        update_option('daum_ac',$_POST['daum_ac']);
	        //$multi_error = '';
	    }
	}elseif(isset($_POST['multi']) && $_POST['multi'] == 1 && isset($_POST['daum_ac']) && $_POST['daum_ac'] == 0) {
	    update_option('daum_ac',$_POST['daum_ac']);
	}elseif(isset($_POST['multi']) && $_POST['multi'] == 1 && isset($_POST['daum_ac']) && $_POST['daum_ac'] == 2) {
	    update_option('daum_ac',$_POST['daum_ac']);
		delete_option('daum_blogurl');
	    delete_option('daum_access_token');
	    delete_option('daum_access_token_secret');
	}
	if(isset($_POST['multi']) && $_POST['multi'] == 2 && isset($_POST['tistory_ac']) && $_POST['tistory_ac'] == 1) {
		if($_POST['tistory_blogurl']==''){
	       wp_die( __('티스토리 주소를 입력해 주세요.') );
	    }else{
	        update_option('tistory_blogurl',$_POST['tistory_blogurl']);
	        update_option('tistory_ac',$_POST['tistory_ac']);
		}
	}elseif(isset($_POST['multi']) && $_POST['multi'] == 2 && isset($_POST['tistory_ac']) && $_POST['tistory_ac'] == 0) {
	    update_option('tistory_ac',$_POST['tistory_ac']);
	}elseif(isset($_POST['multi']) && $_POST['multi'] == 2 && isset($_POST['tistory_ac']) && $_POST['tistory_ac'] == 2) {
	    update_option('tistory_ac',$_POST['tistory_ac']);
	    delete_option('tistory_access_token');
		delete_option('tistory_blogurl');
	    delete_option('tistory_clientid');
	    delete_option('tistory_secret');
	}
	if(isset($_POST['multi']) && $_POST['multi'] == 3 && isset($_POST['egloos_ac']) && $_POST['egloos_ac'] == 1) {
	    if($_POST['egloos_api']==''){
	       wp_die( __('이글루스 API를 입력해 주세요.') );
	    }elseif($_POST['egloos_id']==''){
	       wp_die( __('이글루스 ID를 입력해 주세요.') );
	    }else{
	        update_option('egloos_id',$_POST['egloos_id']);
	        update_option('egloos_api',$_POST['egloos_api']);
	        update_option('egloos_ac',$_POST['egloos_ac']);
	    }
	}elseif(isset($_POST['multi']) && $_POST['multi'] == 3 && isset($_POST['egloos_ac']) && $_POST['egloos_ac'] == 0) {
	    update_option('egloos_ac',$_POST['egloos_ac']);
	}elseif(isset($_POST['multi']) && $_POST['multi'] == 3 && isset($_POST['egloos_ac']) && $_POST['egloos_ac'] == 2) {
	    update_option('egloos_ac',$_POST['egloos_ac']);
	    delete_option('egloos_id');
	    delete_option('egloos_api');
	}
	if(isset($_POST['multi']) && $_POST['multi'] == 4 && isset($_POST['textcube_ac']) && $_POST['textcube_ac'] == 1) {
	    if($_POST['textcube_api']==''){
	       wp_die( __('텍스트큐브 API를 입력해 주세요.') );
	    }elseif($_POST['textcube_id']==''){
	       wp_die( __('테스트큐브 ID를 입력해 주세요.') );
	    }elseif($_POST['textcube_pw']==''){
	       wp_die( __('텍스트큐브 비밀번호 입력해 주세요.') );
	    }elseif($_POST['textcube_ad']==''){
	      wp_die( __('텍스트큐브 주소를 입력해 주세요.') );
	    }else{
	        update_option('textcube_api',$_POST['textcube_api']);
	        update_option('textcube_id',$_POST['textcube_id']);
	        $textcube_pass = encrypt_md5($_POST['textcube_pw'],"XiTo74dOO09N48YeUmuvbL0E");
	        update_option('textcube_pw',$textcube_pass);
	        update_option('textcube_ad',$_POST['textcube_ad']);
	        update_option('textcube_ac',$_POST['textcube_ac']);
	    }
	}elseif(isset($_POST['multi']) && $_POST['multi'] == 4 && isset($_POST['textcube_ac']) && $_POST['textcube_ac'] == 0) {
	    update_option('textcube_ac',$_POST['textcube_ac']);
	}elseif(isset($_POST['multi']) && $_POST['multi'] == 4 && isset($_POST['textcube_ac']) && $_POST['textcube_ac'] == 2) {
	    update_option('textcube_ac',$_POST['textcube_ac']);
	    delete_option('textcube_api');
	    delete_option('textcube_pw');
	    delete_option('textcube_ad');
	    delete_option('textcube_id');
	}
}