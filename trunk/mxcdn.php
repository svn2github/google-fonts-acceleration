<?php
/*
	Plugin Name:谷歌字体与Gravatar头像加速[长期稳定,非360前端库加速源]
	Plugin URI: http://guowen.party/
	Description:本插件可针对面对中国大陆地区用户的网站调用的Google前端库服务以及字体库服务和Gravatar头像服务进行替换加速,且支持SSL加密调用加速源，感谢屌鸡提供镜像加速服务器支持。
	Version: 1.8
	Author: cqdaidong
	Author URI: http://guowen.party/
*/

/*Google公共库加速*/
function igeeklab_cdn_callback($buffer) {
	$buffer = str_replace(array( "googleapis.com"), "233.wiki", $buffer);
        return $buffer;
}
function igeeklab_buffer_start() {
	ob_start("igeeklab_cdn_callback");
}
function igeeklab_buffer_end() {
	ob_end_flush();
}
add_action('init', 'igeeklab_buffer_start');
add_action('shutdown', 'igeeklab_buffer_end');

/*gravatar头像加速*/
function igeekLab_cdn_avatar($avatar) {
	$avatar = str_replace(array( "0.gravatar.com", "1.gravatar.com",), "gravatar0.233.wiki", $avatar);
	$avatar = str_replace(array("www.gravatar.com", "2.gravatar.com","secure.gravatar.com"), "gravatar1.233.wiki", $avatar);
	return $avatar;
}
function igeeklab_avatar_start() {
	ob_start("igeeklab_cdn_avatar");
}
function igeeklab_avatar_end() {
	ob_end_flush();
}
add_action('init', 'igeeklab_avatar_start');
add_action('shutdown', 'igeeklab_avatar_end');
?>