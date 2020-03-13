<?php
/**
 * @package Soap iDempiere
 * @version 1.6.1
 */
/*
Plugin Name: Soap-iDempiere
Plugin URI: http://wordpress.org/plugins/
Description: This is Soap Admire plugin
Author: Amit
Version: 1.6.1
Author URI: http://
*/ 
ob_start();

/*wp_enqueue_style('tabl', plugins_url().'/soap-admire/includes/css/tabl.css');
wp_enqueue_style('datablcss', plugins_url().'/soap-admire/includes/css/datatable.css');*/
function add_newstyle_stylesheet() {
    wp_register_style(
        'tabl',
        plugins_url().'/soap-admire/includes/css/tabl.css'
    );
    wp_enqueue_style( 'tabl' );
    wp_register_style(
        'datablcss',
        plugins_url().'/soap-admire/includes/css/datatable.css'
    );
    wp_enqueue_style( 'datablcss' );
}
add_action( 'wp_enqueue_scripts', 'add_newstyle_stylesheet' );

/* Runs when plugin is activated */
register_activation_hook(__FILE__,'my_plugin_install'); 

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'my_plugin_remove' );

function my_plugin_install() {

    global $wpdb;

//-------------- Verification Page --------------------------
    $verification_page_title = 'Verification';
    $verification_page_name = 'Verification';

    // the menu entry...
    delete_option("my_plugin_page_title");
    add_option("my_plugin_page_title", $verification_page_title, '', 'yes');
    // the slug...
    delete_option("my_plugin_page_name");
    add_option("my_plugin_page_name", $verification_page_name, '', 'yes');
    // the id...
    delete_option("my_plugin_page_id");
    add_option("my_plugin_page_id", '0', '', 'yes');

    $verification_page = get_page_by_title( $verification_page_title );

    if ( ! $verification_page ) {

        // Create post object
        $_pvv = array();
        $_pvv['post_title'] = $verification_page_title;
        $_pvv['post_content'] = "[user-verification]";
        $_pvv['post_status'] = 'publish';
        $_pvv['post_type'] = 'page';
        $_pvv['comment_status'] = 'closed';
        $_pvv['ping_status'] = 'closed';
        $_pvv['post_category'] = array(1); // the default 'Uncatrgorised'

        // Insert the post into the database
        $theverification_page_id = wp_insert_post( $_pvv );

    }
    else {
        // the plugin may have been previously active and the page may just be trashed...

        $theverification_page_id = $verification_page->ID;

        //make sure the page is not trashed...
        $verification_page->post_status = 'publish';
        $theverification_page_id = wp_update_post( $verification_page );

    }

    delete_option( 'my_plugin_verpage_id', $theverification_page_id);
    add_option( 'my_plugin_verpage_id', $theverification_page_id );

//-------------- Login Page --------------------------
    $login_page_title = 'User Login';
    $login_page_name = 'User Login';

    // the menu entry...
    delete_option("my_plugin_page_title");
    add_option("my_plugin_page_title", $login_page_title, '', 'yes');
    // the slug...
    delete_option("my_plugin_page_name");
    add_option("my_plugin_page_name", $login_page_name, '', 'yes');
    // the id...
    delete_option("my_plugin_page_id");
    add_option("my_plugin_page_id", '0', '', 'yes');

    $login_page = get_page_by_title( $login_page_title );

    if ( ! $login_page ) {

        // Create post object
        $_pvl = array();
        $_pvl['post_title'] = $login_page_title;
        $_pvl['post_content'] = "[user-login]";
        $_pvl['post_status'] = 'publish';
        $_pvl['post_type'] = 'page';
        $_pvl['comment_status'] = 'closed';
        $_pvl['ping_status'] = 'closed';
        $_pvl['post_category'] = array(1); // the default 'Uncatrgorised'

        // Insert the post into the database
        $thelogin_page_id = wp_insert_post( $_pvl );

    }
    else {
        // the plugin may have been previously active and the page may just be trashed...

        $thelogin_page_id = $login_page->ID;

        //make sure the page is not trashed...
        $login_page->post_status = 'publish';
        $thelogin_page_id = wp_update_post( $login_page );

    }

    delete_option( 'my_plugin_loginpage_id', $thelogin_page_id );
    add_option( 'my_plugin_loginpage_id', $thelogin_page_id );

//-------------- After Login Page --------------------------
    $afterlogin_page_title = 'User Profile';
    $afterlogin_page_name = 'User Profile';

    // the menu entry...
    delete_option("my_plugin_page_title");
    add_option("my_plugin_page_title", $afterlogin_page_title, '', 'yes');
    // the slug...
    delete_option("my_plugin_page_name");
    add_option("my_plugin_page_name", $afterogin_page_name, '', 'yes');
    // the id...
    delete_option("my_plugin_page_id");
    add_option("my_plugin_page_id", '0', '', 'yes');

    $afterlogin_page = get_page_by_title( $afterlogin_page_title );

    if ( !$afterlogin_page ) {

        // Create post object
        $_pvp = array();
        $_pvp['post_title'] = $afterlogin_page_title;
        $_pvp['post_content'] = "[user-profile]";
        $_pvp['post_status'] = 'publish';
        $_pvp['post_type'] = 'page';
        $_pvp['comment_status'] = 'closed';
        $_pvp['ping_status'] = 'closed';
        $_pvp['post_category'] = array(1); // the default 'Uncatrgorised'

        // Insert the post into the database
        $theafterlogin_page_id = wp_insert_post( $_pvp );

    }
    else {
        // the plugin may have been previously active and the page may just be trashed...

        $theafterlogin_page_id = $afterlogin_page->ID;

        //make sure the page is not trashed...
        $afterlogin_page->post_status = 'publish';
        $theafterlogin_page_id = wp_update_post( $afterlogin_page );

    }

    delete_option( 'my_plugin_profilepage_id' ,$theafterlogin_page_id);
    add_option( 'my_plugin_profilepage_id', $theafterlogin_page_id );

 //-------------- Logout Page --------------------------
    $logout_page_title = 'Logout';
    $logout_page_name = 'Logout';

    // the menu entry...
    delete_option("my_plugin_page_title");
    add_option("my_plugin_page_title", $logout_page_title, '', 'yes');
    // the slug...
    delete_option("my_plugin_page_name");
    add_option("my_plugin_page_name", $logout_page_name, '', 'yes');
    // the id...
    delete_option("my_plugin_page_id");
    add_option("my_plugin_page_id", '0', '', 'yes');

    $logout_page = get_page_by_title( $logout_page_title );

    if ( ! $logout_page ) {

        // Create post object
        $_pvlg = array();
        $_pvlg['post_title'] = $logout_page_title;
        $_pvlg['post_content'] = "[user-logout]";
        $_pvlg['post_status'] = 'publish';
        $_pvlg['post_type'] = 'page';
        $_pvlg['comment_status'] = 'closed';
        $_pvlg['ping_status'] = 'closed';
        $_pvlg['post_category'] = array(1); // the default 'Uncatrgorised'

        // Insert the post into the database
        $thelogout_page_id = wp_insert_post( $_pvlg );

    }
    else {
        // the plugin may have been previously active and the page may just be trashed...

        $thelogout_page_id = $logout_page->ID;

        //make sure the page is not trashed...
        $logout_page->post_status = 'publish';
        $thelogout_page_id = wp_update_post( $logout_page );

    }

    delete_option( 'my_plugin_logoutpage_id', $thelogout_page_id );
    add_option( 'my_plugin_logoutpage_id', $thelogout_page_id );   

//-------------- User Orders Page --------------------------
    $order_page_title = 'Partner Orders';
    $order_page_name = 'Partner Orders';

    // the menu entry...
    delete_option("my_plugin_page_title");
    add_option("my_plugin_page_title", $order_page_title, '', 'yes');
    // the slug...
    delete_option("my_plugin_page_name");
    add_option("my_plugin_page_name", $order_page_name, '', 'yes');
    // the id...
    delete_option("my_plugin_page_id");
    add_option("my_plugin_page_id", '0', '', 'yes');

    $order_page = get_page_by_title( $order_page_title );

    if ( !$order_page ) {

        // Create post object
        $_pvpl = array();
        $_pvpl['post_title'] = $order_page_title;
        $_pvpl['post_content'] = "[partner-orders]";
        $_pvpl['post_status'] = 'publish';
        $_pvpl['post_type'] = 'page';
        $_pvpl['comment_status'] = 'closed';
        $_pvpl['ping_status'] = 'closed';
        $_pvpl['post_category'] = array(1); // the default 'Uncatrgorised'

        // Insert the post into the database
        $theorder_page_id = wp_insert_post( $_pvpl );

    }
    else {
        // the plugin may have been previously active and the page may just be trashed...

        $theorder_page_id = $order_page->ID;

        //make sure the page is not trashed...
        $order_page->post_status = 'publish';
        $theorder_page_id = wp_update_post( $order_page );

    }

    delete_option( 'my_plugin_orderpage_id' ,$theorder_page_id);
    add_option( 'my_plugin_orderpage_id', $theorder_page_id );

//-------------- User Registration (Partner) --------------------------
    $puserreg_page_title = 'Partner User Registration';
    $puserreg_page_name = 'Partner User Registration';

    // the menu entry...
    delete_option("my_plugin_page_title");
    add_option("my_plugin_page_title", $puserreg_page_title, '', 'yes');
    // the slug...
    delete_option("my_plugin_page_name");
    add_option("my_plugin_page_name", $puserreg_page_name, '', 'yes');
    // the id...
    delete_option("my_plugin_page_id");
    add_option("my_plugin_page_id", '0', '', 'yes');

    $puserreg_page = get_page_by_title( $puserreg_page_title );

    if ( !$puserreg_page ) {

        // Create post object
        $_pvpb = array();
        $_pvpb['post_title'] = $puserreg_page_title;
        $_pvpb['post_content'] = "[puser-registration]";
        $_pvpb['post_status'] = 'publish';
        $_pvpb['post_type'] = 'page';
        $_pvpb['comment_status'] = 'closed';
        $_pvpb['ping_status'] = 'closed';
        $_pvpb['post_category'] = array(1); // the default 'Uncatrgorised'

        // Insert the post into the database
        $thepuserreg_page_id = wp_insert_post( $_pvpb );

    }
    else {
        // the plugin may have been previously active and the page may just be trashed...

        $thepuserreg_page_id = $puserreg_page->ID;

        //make sure the page is not trashed...
        $puserreg_page->post_status = 'publish';
        $thepuserreg_page_id = wp_update_post( $puserreg_page );

    }

    delete_option( 'my_plugin_puserreg_id' ,$thepuserreg_page_id);
    add_option( 'my_plugin_puserreg_id', $thepuserreg_page_id );

    
}

function my_plugin_remove() {

    global $wpdb;
//---------- delete Verification -------------------------
    $the_page_title = get_option( "Verification" );
    $the_page_name = get_option( "Verification" );
    $vthe_page_id = get_option( 'my_plugin_verpage_id' );
    if( $vthe_page_id ) {
        wp_delete_post( $vthe_page_id ); // this will trash, not delete
    }
    delete_option("Verification");
    delete_option("Verification");
    delete_option("my_plugin_verpage_id");
    
//-------------- delete Login ----------------------
    $the_page_title = get_option( "User Login" );
    $the_page_name = get_option( "User Login" );
    $lgthe_page_id = get_option( 'my_plugin_loginpage_id' );
    if( $lgthe_page_id ) {
        wp_delete_post( $lgthe_page_id ); // this will trash, not delete
    }
    delete_option("User Login");
    delete_option("User Login");
    delete_option("my_plugin_loginpage_id");   
    
//-------------- User Profile ----------------------
    $the_page_title = get_option( "User Profile" );
    $the_page_name = get_option( "User Profile" );
    //  the id of our page...
    $prthe_page_id = get_option( 'my_plugin_profilepage_id' );
    if( $prthe_page_id ) {
        wp_delete_post( $prthe_page_id ); // this will trash, not delete
    }
    delete_option("User Profile");
    delete_option("User Profile");
    delete_option("my_plugin_profilepage_id");  

//---------- delete logout -------------------------
    $the_page_title = get_option( "Logout" );
    $the_page_name = get_option( "Logout" );
    $vthe_page_idlg = get_option( 'my_plugin_logoutpage_id' );
    if( $vthe_page_idlg ) {
        wp_delete_post( $vthe_page_idlg ); // this will trash, not delete
    }
    delete_option("Logout");
    delete_option("Logout");
    delete_option("my_plugin_logoutpage_id");    
    
//---------- delete Partner Orders -------------------------    
    $the_page_title = get_option( "Partner Orders" );
    $the_page_name = get_option( "Partner Orders" );
    //  the id of our page...
    $pothe_page_id = get_option( 'my_plugin_orderpage_id' );
    if( $pothe_page_id ) {
        wp_delete_post( $pothe_page_id ); // this will trash, not delete
    }
    delete_option("Partner Orders");
    delete_option("Partner Orders");
    delete_option("my_plugin_orderpage_id");
    
//---------- delete Partner User Registration -------------------------    
    $the_page_title = get_option( "Partner User Registration" );
    $the_page_name = get_option( "Partner User Registration" );
    //  the id of our page...
    $purthe_page_id = get_option( 'my_plugin_puserreg_id' );
    if( $purthe_page_id ) {
        wp_delete_post( $purthe_page_id ); // this will trash, not delete
    }
    delete_option("Partner User Registration");
    delete_option("Partner User Registration");
    delete_option("my_plugin_puserreg_id");
       
}
//require_once('includes/general-setting.php');
require_once('includes/puser-registration.php');
require_once('includes/user-verification.php');
require_once('includes/user-login.php');
require_once('includes/user-profile.php');
require_once('includes/partner-orders.php');
require_once('includes/logout.php');

if(!empty($_SESSION['admin_user']) && isset($_SESSION['admin_user']))
{
 function logout_script() {?>
    <script>
    jQuery(document).ready(function(){
        jQuery('.logout').show();
    });
    </script>    
<?php } 
}
else{
  function logout_script() {
?>
    <script>
    jQuery(document).ready(function(){
        jQuery('.logout').hide();
    });
    </script>  
<?php }
}
function block_script() { 
?>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.8.0.min.js"></script>

  <script type="text/javascript">
  	jQuery(document).ready(function(){
       jQuery('.block2').hide();
  		jQuery('#block1').click(function(){
  			
  			jQuery('.block1').show();
  			jQuery('.block2').hide();
  		});
  		jQuery('#block2').click(function(){
  			
  			jQuery('.block2').show();
  			jQuery('.block1').hide();
  		});
  	});
  </script>
<?php
}
  
add_action( 'wp_enqueue_scripts', 'logout_script' );
add_action( 'wp_enqueue_scripts', 'block_script' );

?>
