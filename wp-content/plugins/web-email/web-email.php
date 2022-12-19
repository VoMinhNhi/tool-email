<?php
/*
Plugin Name: Web create email
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: Using create email
Author: MinhNhi
Version: 1.0.0
Author URI: http://ma.tt/
Text domain: web-data
*/




define('WEB_EMAIL_DIR_PATH', plugin_dir_path(__FILE__));


require WEB_EMAIL_DIR_PATH . 'inc/plugin-init.php';
// require WEB_EMAIL_DIR_PATH . 'inc/create-user.php';
require WEB_EMAIL_DIR_PATH . 'inc/user-write.php';


// function run_web_email()
// {
//      Web_Email_Innit::instance();
// }
