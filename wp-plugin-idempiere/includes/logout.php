<?php ob_start();
session_start();
add_shortcode('user-logout', 'user_logout');
function user_logout() {
	session_destroy(); 
	header('Location: '.site_url().'/index.php/user-login');
}	
