<?php	global $userdata;
	

	$mh_siteurl = $_SERVER['HTTP_HOST'];

	here_setcookie("mh_siteurl",$mh_siteurl,time()+3600,"/",$mh_siteurl );
?>
<style type="text/css">
div.hotpack_admin .col-2{
	width: 45%;
	float:left;
	position: relative;
	min-height: 1px;
	padding-right: 15px;
	padding-left: 15px;
}

div.hotpack_admin .panel{
	box-shadow: none;
	border-radius: 2px;
	margin-bottom: 20px;
	background-color: #fff;
	border: 1px solid #ccc;
	border-radius: 4px;
	-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
div.hotpack_admin .panel-header{
	border-color: #eeeff8;
	border-top-left-radius: 0;
	border-top-right-radius: 0;
	padding: 10px 15px;
	border-bottom: 1px solid #ccc;
	border-top-left-radius: 3px;
	border-top-right-radius: 3px;
	background:#0074a2;
	color:#fff;
	font-weight:700;
}
div.hotpack_admin .naver{
	background: #1ec800;
}
div.hotpack_admin .daum{
	background: #5b99fb;
}
div.hotpack_admin .kakao{
	background: #ffeb00;
	color:#3b3b3b;
}
div.hotpack_admin .nate{
	background: #ed1f01;
}
div.hotpack_admin .facebook{
	background: #45619d;
}
div.hotpack_admin .twitter{
	background: #55acee;
}
div.hotpack_admin .google{
	background: #4d4d4d;
}
div.hotpack_admin .tistory{
	background:#eb531f;
}
div.hotpack_admin .egools{
	background:#3e9ece;
}

div.hotpack_admin .panel-body{
	padding: 15px;
}
div.hotpack_admin .form-group{
	margin-bottom: 15px;
}
div.hotpack_admin label{
	display: inline-block;
	max-width: 100%;
	margin-bottom: 5px;
	font-weight: 600;
}
div.hotpack_admin .form-control{
	display:block;
	width:100%;
}
div.hotpack_admin .row:before{
	display: table;
	content: " ";
}
div.hotpack_admin .row:after{
	clear:both;
}
</style>
	<script type="text/javascript">
		function daum(){
			window.open('<?php echo home_url("/wp-content/plugins/hotpack/modules/multi_posting/authorize/daum/");?>',"winDaum");
		}
		function tistory(){
			var tistoryWin = window.open("about:blank","winName");
			var frm = document.tistory_authorize;
			frm.action = "https://www.tistory.com/oauth/authorize/";
			frm.target = "winName";
			frm.submit();
		}
	</script>
	
	<div class="wrap hotpack_admin">
	<h2>멀티 포스팅 설정</h2>
	<div class="row">
		<div class="col-2">
			<section class="panel">
				<header class="panel-header naver"><?php echo __('NAVER Blog','hotpack');?></header>
				<div class="panel-body">
					<form method="post">
					<input type="hidden" name="multi" value="5">
					<div class="form-group">
						<label for="naver_ac"><?php echo __('Actived','hotpack');?></label>
						<input type="radio" name="naver_ac" id="naver_ac" value='1' <?php if(get_option('naver_ac')==1) echo "checked"?>> 예<input type="radio" name="naver_ac" value='0' <?php if(get_option('naver_ac')==0) echo "checked"?>> 아니오<input type="radio" name="naver_ac" value='2' <?php if(get_option('naver_ac')!=1 && get_option('naver_ac')!=0) echo "checked"?>> 초기화
					</div>
					<div class="form-group">
						<label for="naver_id"><?php echo __('네이버ID','hotpack');?></label>
						<input type="text" name="naver_id" class="form-control" id="naver_id" value="<?php echo get_option('naver_id')?>"/>
					</div>
					<div class="form-group">
						<label for="naver_blogid"><?php echo __('블로그ID','hotpack');?></label>
						<input type="text" name="naver_blogid" class="form-control" id="naver_blogid" value="<?php echo get_option('naver_blogid')?>"/>
					</div>
					<div class="form-group">
						<label for="naver_api">API<?php echo $multi_error;?></label>
						<input type="text" name="naver_api" class="form-control" id="naver_api" value="<?php if($multi_error!=null){echo $multi_error;}else{echo get_option('naver_api');}?>"/>
					</div>
					<div class="buttons">
						<input type="submit" class="button-primary" value="네이버 설정 업데이트 &raquo;">
					</div>
					</form>
				</div>
			</section>
		</div>
		<?php /*
		<div class="col-2">
			<section class="panel">
				<header class="panel-header daum"><?php echo __('Daum Blog','hotpack');?></header>
				<div class="panel-body">
					<?php if(get_option('daum_access_token')) :?>
					<form method="post">
						<input type="hidden" name="multi" value="1">
						<div class="form-group">
							<label for="daum_ac"><?php echo __('Actived','hotpack');?></label>
							<input type="radio" name="daum_ac" value='1' <?php if(get_option('daum_ac')==1) echo "checked"?>> 예<input type="radio" name="daum_ac" value='0' <?php if(get_option('daum_ac')==0) echo "checked"?>> 아니오<input type="radio" name="daum_ac" value='2' <?php if(get_option('daum_ac')!=1 && get_option('daum_ac')!=0) echo "checked"?>> 초기화
						</div>
						<div class="form-group">
							<label for="daum_blogurl"><?php echo __('블로그ID','hotpack');?></label>
							<input type="text" name="daum_blogurl" class="form-control" id="daum_blogurl" value="<?php echo get_option('daum_blogurl')?>"/>
						</div>
						<div class="form-group">
							<label for="daum_blogurl"><?php echo __('블로그주소','hotpack');?></label>
							<input type="text" name="daum_blogurl" class="form-control" id="daum_blogurl" value="<?php echo get_option('daum_blogurl')?>"/>
							<br/>http://blog.daum.net/xxx 일경우 xxx 만 입력
						</div>
						<div class="form-group">
							<label for="daum_access"><?php echo __('인증','hotpack');?></label>
							<input type="text" name="" class="form-control" id="daum_access" value="<?php _e('인증되었습니다.','hotpack');?>" readonly/>
						</div>
						<p class="submit"><input type="submit" class="button-primary" value="다음 설정 업데이트 &raquo;"></input></p>
					</form>
					<?php elseif(get_option('daumoauth_key') && get_option('daumoauth_secret')):?>
						<p class="submit"><input type="button" class="button-primary" value="다음 인증하기 &raquo;" onclick="daum();"></input></p>
					<?php else:?>
					<form method="post">
						<input type="hidden" name="maction" value="daumoauth">
						<div class="form-group">
							<label for="daumoauth_key"><?php echo __('다음 OAuth 컨슈머 키','hotpack');?></label>
							<input type="text" name="daumoauth_key" class="form-control" id="daumoauth_key" value="<?php echo get_option('daumoauth_key')?>"/>
						</div>
						<div class="form-group">
							<label for="daumoauth_secret"><?php echo __('다음 OAuth 컨슈머 시크릿','hotpack');?></label>
							<input type="text" name="daumoauth_secret" class="form-control" id="daumoauth_secret" value="<?php echo get_option('daumoauth_secret')?>"/>
						</div>
						<p class="submit"><input type="submit" class="button-primary" value="다음 설정 업데이트 &raquo;"></input></p>
					</form>
					<?php endif;?>
				</div>
			</section>
		</div>
		*/?>
		<div class="col-2">
			<section class="panel">
				<header class="panel-header tistory"><?php echo __('Tistory Blog','hotpack');?></header>
				<div class="panel-body">
					<?php if(get_option('tistory_access_token')) :?>
					<form method="post" name="tistory_authorize" action="">
						<input type="hidden" name="multi" value="2">
						<div class="form-group">
							<label for="tistory_ac"><?php echo __('Actived','hotpack');?></label>
							<input type="radio" name="tistory_ac" value='1' <?php if(get_option('tistory_ac')==1) echo "checked"?>> 예<input type="radio" name="tistory_ac" value='0' <?php if(get_option('tistory_ac')==0) echo "checked"?>> 아니오<input type="radio" name="tistory_ac" value='2' <?php if(get_option('tistory_ac')!=1 && get_option('tistory_ac')!=0) echo "checked"?>> 인증해제
						</div>
						<div class="form-group">
							<label for="tistory_blogurl"><?php echo __('블로그주소','hotpack');?></label>
							<input type="text" name="tistory_blogurl" class="form-control" id="tistory_blogurl" value="<?php echo get_option('tistory_blogurl')?>"/>
							<br/>http://xxx.tistory.com 일경우 xxx 만 입력, 2차도메인일 경우 http://제거한 url 입력
						</div>
						<div class="form-group">
							<label for="tistory_access"><?php echo __('인증','hotpack');?></label>
							<input type="text" name="" class="form-control" id="tistory_access" value="<?php _e('인증되었습니다.','hotpack');?>" readonly/>
						</div>
						<p class="submit"><input type="submit" class="button-primary" value="티스토리 설정 업데이트 &raquo;"></input></p>
					</form>
					<?php elseif(get_option('tistory_clientid') && get_option('tistory_secret')):?>
					<form method="post" name="tistory_authorize" action="">
					<input type="hidden" name="client_id" value="<?php echo get_option('tistory_clientid');?>"/>
					<input type="hidden" name="redirect_uri" value="<?php echo home_url('?hmp_callback=tistory');?>"/>
					<input type="hidden" name="response_type" value="code"/>
					<p class="submit"><input type="button" class="button-primary" value="티스토리 인증하기 &raquo;" onclick="tistory();"></input></p>
					</form>
					<?php else: ?>
					<form method="post">
						<input type="hidden" name="maction" value="tistoryoauth">
						<div class="form-group">
							<label for="tistory_clientid"><?php echo __('티스토리 Client ID','hotpack');?></label>
							<input type="text" name="tistory_clientid" class="form-control" id="tistory_clientid" value="<?php echo get_option('tistory_clientid')?>"/>
						</div>
						<div class="form-group">
							<label for="tistory_secret"><?php echo __('티스토리 Secrete Key','hotpack');?></label>
							<input type="text" name="tistory_secret" class="form-control" id="tistory_secret" value="<?php echo get_option('tistory_secret')?>"/>
						</div>
						<div class="form-group">
							<label for="tistory_consumer_callback"><?php echo __('Callback URL','hotpack');?></label>
							<input type="text" name="" class="form-control" id="tistory_consumer_callback" value="<?php echo home_url('?hmp_callback=tistory');?>" readonly/>
						</div>
						<p class="submit"><input type="submit" class="button-primary" value="티스토리 설정 업데이트 &raquo;"></input></p>
					</form>
					<?php endif;?>
				</div>
			</section>
		</div>
		<div class="col-2">
			<section class="panel">
				<header class="panel-header egloos"><?php echo __('Egloos Blog','hotpack');?></header>
				<div class="panel-body">
					<form method="post">
					<input type="hidden" name="multi" value="5">
					<div class="form-group">
						<label for="egloos_ac"><?php echo __('Actived','hotpack');?></label>
						<input type="radio" name="egloos_ac" value='1' <?php if(get_option('egloos_ac')==1) echo "checked"?>> 예<input type="radio" name="egloos_ac" value='0' <?php if(get_option('egloos_ac')==0) echo "checked"?>> 아니오<input type="radio" name="egloos_ac" value='2' <?php if(get_option('egloos_ac')!=1 && get_option('egloos_ac')!=0) echo "checked"?>> 초기화
					</div>
					<div class="form-group">
						<label for="egloos_api"><?php echo __('API','hotpack');?></label>
						<input type="text" name="egloos_api" class="form-control" id="egloos_api" value="<?php echo get_option('egloos_api')?>"/>
					</div>
					<div class="form-group">
						<label for="egloos_id"><?php echo __('아이디','hotpack');?></label>
						<input type="text" name="egloos_id" class="form-control" id="egloos_id" value="<?php echo get_option('egloos_id')?>"/>
					</div>
					<div class="form-group">
						<label for="naver_api">API<?php echo $multi_error;?></label>
						<input type="text" name="naver_api" class="form-control" id="naver_api" value="<?php if($multi_error!=null){echo $multi_error;}else{echo get_option('naver_api');}?>"/>
					</div>
					<div class="buttons">
						<input type="submit" class="button-primary" value="이글루스 설정 업데이트 &raquo;">
					</div>
					</form>
				</div>
			</section>
		</div>
	</div>