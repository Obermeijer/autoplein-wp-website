<?php

/************* LOAD REQUIRED SCRIPTS AND STYLES *************/

function pixchild_loadCss()


{
    $pix_options = isset($_POST['options']) ? $_POST['options'] : get_option('pix_general_settings');
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
		
		
		wp_enqueue_style('style', get_stylesheet_uri() );
    
	    wp_enqueue_style('theme', str_replace('/style.css', '', get_stylesheet_uri()) . '/css/custom.css'); /*This custom css or override CSS*/

    }
}

function custom_login_css() {
echo '<link rel="stylesheet" type="text/css" href="https://www.aardbei-communicatie.nl/styling/style.css" />';
}
add_action('login_head', 'custom_login_css');

add_action('wp_enqueue_scripts', 'pixchild_loadCss'); //Load All Css


