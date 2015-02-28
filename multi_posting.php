<?php
/*
 * Plugin Name: 동시 포스팅
 * Plugin URI: http://wpmaru.org
 * Description: 사이트에서 포스팅 할때 네이버블로그, 티스토리, 이글루스 등 타 블로그로 동시에 포스팅을 할 수 있는 플러그인입니다.
 * Version: 2.0.1Beta
 * Author:Stackr Inc.
 * License: GPL2+
 * Author URI: http://www.stackr.co.kr
 */
require_once('xmlrpc/xmlrpc/xmlrpc.inc');
require_once('xmlrpc/posting_data.php');
if(!class_exists('HMultiPosting')){
  require_once(dirname(__FILE__).'/includes/class.hmultiposting.php');
  $hmulti = new HMultiPosting();
}



function multi_posting_publish(){
    posting_data($_POST['post_title'],$_POST['content']);
}
add_filter('publish_post','multi_posting_publish');

?>