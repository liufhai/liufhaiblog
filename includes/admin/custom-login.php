<?php

//在顶部添加内容
function liuronghuan_login_header() {

    //添加自定义CSS
    echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo( 'template_directory' ).'/login/css/login.css" />';
    echo "<script type='text/javascript' src='http://apps.bdimg.com/libs/jquery/1.7.2/jquery.min.js'></script>";
    echo "<script type='text/javascript' src='https://cdn.bootcss.com/particles.js/2.0.0/particles.min.js'></script>";
    remove_action('login_head', 'wp_shake_js', 12);
}
add_action('login_head', 'liuronghuan_login_header');


//在登陆页面添加粒子元素
function liuronghuan_ligin_particle() {
    echo '<div id="particles-js"></div>';
}
add_action('login_body_class', 'liuronghuan_ligin_particle');


//在底部添加内容
function liuronghuan_login_footer(){
    echo "<script type='text/javascript' src='".get_bloginfo( 'template_directory' )."/login/js/script.js'></script>";
}
add_filter( 'login_footer', 'liuronghuan_login_footer' );


//自定义登录页面的LOGO链接为首页链接
add_filter('login_headerurl', create_function(false,"return get_bloginfo('url');"));
//自定义登录页面的LOGO提示为网站名称
add_filter('login_headertitle', create_function(false,"return get_bloginfo('name');"));
?>