<?php
/*************CODE**************/
How to disable Theme Editor and Plugin Editor in WordPress admin panel?

define('DISALLOW_FILE_EDIT', true);
define( 'DISALLOW_FILE_MODS', true );
/***************************/

/*************CODE**************/
Use "WPS Hide Login" for hide default login that is wp-admin and wp-login.php
/***************************/


/*************CODE**************/
Changing WordPress Login Logo and URL without Plugin (Code)
https://www.wpbeginner.com/plugins/how-to-create-custom-login-page-for-wordpress/#:~:text=Changing%20WordPress%20Login%20Logo%20and%20URL%20without%20Plugin%20(Code)&text=Simply%20go%20to%20Media%20%C2%BB%20Add,Edit'%20link%20next%20to%20it.


function wpb_login_logo() { ?>
    <style type="text/css">
      #login h1 a {
        background-image: url(<?php bloginfo('url'); ?>/wp-content/themes/demo/assets/images/Livpure_LOGO_Purple.png);
        height:60px;
        width:180px;
        background-size: 180px 60px;
        background-repeat: no-repeat;
      }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wpb_login_logo' );


function wpb_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'wpb_login_logo_url' );
  

function wpb_login_logo_url_title() {
    return 'Smart Livpure';
}
add_filter( 'login_headertitle', 'wpb_login_logo_url_title' );

/***************************/


/*************CODE**************/
Change config file path
<?php
include(__DIR__.'/wp-admin/secure/secure.php');
?>
/******************************/

/****new role***/
add_action('init', 'CreatecloneRoleSubscriber');

function CreatecloneRoleSubscriber()
{
    global $wp_roles;
    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();

    $sub = $wp_roles->get_role('agent');
    //Adding a 'new_role' with all subscriber caps
    $wp_roles->add_role('customer_service', 'Customer Service', $sub->capabilities);
}
/****new role***/
/*************CODE**************/
add_action( 'wp_authenticate' , 'check_custom_authentication' );
  function check_custom_authentication ( $username ) {

    $username;
     $user = new WP_User($username);
     $user_role_member=$user;



    if($user_role_member == 'author' || $user_role_member == 'editor'){
        session_destroy();
        wp_redirect( home_url() );
        exit;
    }

 }

/******************************/

Creating a simple REST API in PHP

https://shareurcodes.com/blog/creating%20a%20simple%20rest%20api%20in%20php#:~:text=1)%20CREATION%20OF%20REST%20API,php%20file%20is%20given%20below.&text=The%20above%20script%20file%20is,gives%20JSON%20output%20for%20standardization.


/*************CODE**************/
How to Show the Logged in Username in the WordPress Sidebar
function show_loggedin_function( $atts ) {

	global $current_user, $user_login;
      	get_currentuserinfo();
	add_filter('widget_text', 'do_shortcode');
	if ($user_login) 
		return 'Welcome ' . $current_user->display_name . '!';
	else
		return '<a href="' . wp_login_url() . ' ">Login</a>';
	
}
add_shortcode( 'show_loggedin_as', 'show_loggedin_function' );
[show_loggedin_as] -- shortcode
/*******************************/

/*************CODE**************/
if(!current_user_can('administrator')) {
    wp_redirect( wp_login_url() );
}
/*******************************/


/*************CODE**************/
WordPress Custom Forget Password Page
https://www.kvcodes.com/2016/10/wordpress-custom-forgot-password-page/
/*******************************/


/*************CODE**************/
password confirm password
<table border="0" cellpadding="3" cellspacing="0">
    <tr>
        <td>
            Password:
        </td>
        <td>
            <input type="password" id="txtPassword" />
        </td>
    </tr>
    <tr>
        <td>
            Confirm Password:
        </td>
        <td>
            <input type="password" id="txtConfirmPassword" />
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <input type="button" id="btnSubmit" value="Submit" onclick="return Validate()" />
        </td>
    </tr>
</table>
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        } else {
			alert("Passwords match.");
		}
        return true;
    }
</script>
/*******************************/


https://wordpress.stackexchange.com/questions/233086/how-to-fetch-data-in-wordpress-using-mysqli-or-wpdb



/*************CODE**************/
show product list
<ul>
<?php
$query = new WP_Query( array(
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => -1
    
) );

while ( $query->have_posts() ) : $query->the_post();
    echo '<li><a href="'. get_permalink() .'"><div class="product__preview"><img src="' . get_the_post_thumbnail_url() . '"></div><span>' . get_the_title() . '</span></a></li>';
endwhile;

wp_reset_postdata();
?>
</ul>
/******************************/


/******************************/
change text using hook->

add_filter( 'gettext', 'wpfi_change_text', 20 );
function wpfi_change_text( $translated_text ) {
if ( $translated_text == 'Subscriptions' ) {
$translated_text = 'My Subscriptions';
}
return $translated_text;
}
/******************************/

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

/******************************/
//support tab add in navigation
/*function custom_tab_support() {
    add_rewrite_endpoint( 'support-help', EP_ROOT | EP_PAGES );
}
  
add_action( 'init', 'custom_tab_support' );
 
 
function ts_custom_premium_support_query_vars( $vars ) {
    $vars[] = 'support-help';
    return $vars;
}
  
add_filter( 'woocommerce_get_query_vars', 'ts_custom_premium_support_query_vars', 0 );
  
   */

function custom_support_nav( $items ) {
	 $items['support-help'] = 'Support & Help';
    return $items;
}
  
add_filter( 'woocommerce_account_menu_items', 'custom_support_nav' );
  


/**
 * @important-note	"add_action" must follow 'woocommerce_account_{your-endpoint-slug}_endpoint' format
 */
//add_action( 'woocommerce_account_support-help_endpoint', 'ts_custom_premium_support_content' );
/******************************/  

/******************************/  
// add my account tab new field
add_action( 'woocommerce_edit_account_form', 'new_add_account_details' );
function new_add_account_details() {
	$user = wp_get_current_user();
	?>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="mobile"><?php esc_html_e( 'Phone Number', 'your-text-domain' ); ?></label>
		<input type="number" class="woocommerce-Input woocommerce-Input--text input-text" name="phone" id="phone" value="<?php echo esc_attr( $user->phone ); ?>" />
	</p>
	<?php
}

add_action( 'woocommerce_save_account_details', 'new_save_account_details' );
function new_save_account_details( $user_id ) {
	if ( isset( $_POST['phone'] ) ) {
		update_user_meta( $user_id, 'phone', sanitize_text_field( $_POST['phone'] ) );
	}
}
/******************************/  

/******************************/ 
add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
  wp_redirect( home_url() );
  exit();
}
/******************************/ 

/************show field on order page on admin******************/ 
/**
 * @snippet       Add Column to Orders Table (e.g. Billing Country) - WooCommerce
 * @how-to        Get CustomizeWoo.com FREE
 * @sourcecode    https://businessbloomer.com/?p=78723
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.4.5
 */
 
add_filter( 'manage_edit-shop_order_columns', 'bbloomer_add_new_order_admin_list_column' );
 
function bbloomer_add_new_order_admin_list_column( $columns ) {
    $columns['billing_phone'] = 'Phone';
    return $columns;
}
 
add_action( 'manage_shop_order_posts_custom_column', 'bbloomer_add_new_order_admin_list_column_content' );
 
function bbloomer_add_new_order_admin_list_column_content( $column ) {
   
    global $post;
 
    if ( 'billing_phone' === $column ) {
 
        $order = wc_get_order( $post->ID );
        echo $order->get_billing_phone();
      
    }
}
/******************************/




/***********add custom field on order page on admin*******************/
add_filter( 'manage_edit-shop_order_columns', 'set_custom_edit_shop_order_columns' );
function set_custom_edit_shop_order_columns($columns) {
    $columns['custom_column'] = __( 'Custom Column', 'your_text_domain' );
    return $columns;
}

// Add the data to the custom columns for the order post type:
add_action( 'manage_shop_order_posts_custom_column' , 'custom_shop_order_column', 10, 2 );
function custom_shop_order_column( $column, $post_id ) {
    switch ( $column ) {

        case 'custom_column' :
            echo esc_html( get_post_meta( $post_id, 'custom_column', true ) );
            break;

    }
}

// For display and saving in order details page.
add_action( 'add_meta_boxes', 'add_shop_order_meta_box' );
function add_shop_order_meta_box() {

    add_meta_box(
        'custom_column',
        __( 'Custom Column', 'your_text_domain' ),
		'shop_order_display_callback',
		'shop_order'
    );

}

// For displaying.
function shop_order_display_callback( $post ) {

    $value = get_post_meta( $post->ID, 'custom_column', true );

    echo '<textarea style="width:100%" id="custom_column" name="custom_column">' . esc_attr( $value ) . '</textarea>';
}

// For saving.
function save_shop_order_meta_box_data( $post_id ) {

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( isset( $_POST['post_type'] ) && 'shop_order' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_shop_order', $post_id ) ) {
            return;
        }
    }

    // Make sure that it is set.
    if ( ! isset( $_POST['custom_column'] ) ) {
        return;
    }

    // Sanitize user input.
    $my_data = sanitize_text_field( $_POST['custom_column'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, 'custom_column', $my_data );
}

add_action( 'save_post', 'save_shop_order_meta_box_data' );
/******************************/



/*******************add to cart sms*****************************/
<?php  
/**
Plugin Name: Add to card sms
Description: Add to card sms
Author: SAR
Version: 1.0.0
*/

global $woocommerce;



// cart msg
add_action( 'woocommerce_after_add_to_cart_button', 'mish_before_add_to_cart_btn' );

function mish_before_add_to_cart_btn(){
	if ( is_user_logged_in() ) {
		 //echo "logged in";
		 global $product; 
		 global $current_user;
		 $useremail = $current_user->user_email;
		 $phonenumber = $current_user->shipping_phone;
		 
		/*$urllink = site_url( '/checkout/', 'https' );	
	$message ="You are one step away for getting a ".$product->name."Complete your payment process by clicking on <a href=".$urllink.">Checkout</a>.";	
    $url="https://www.myvaluefirst.com/smpp/sendsms?username=livpurehtptrns&password=livpur01&from=LVSMRT&to=7018216542&text=".urlencode( trim($message)); */


$url="https://www.myvaluefirst.com/smpp/sendsms?username=livpurehtptrns&password=livpur01&from=LVSMRT&to=7018216542&text=".urlencode( trim("123456 is your OTP to login to your Livpure Smart account. For any help, please contact us at 8800762226"));
        
 
$ch = curl_init( $url);
   // echo $url;
	
	  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    
            $result = curl_exec($ch);
    
            
    
              if (curl_errno($ch)) {
    
                $error_msg = curl_error($ch);
    
            }
    
            curl_close($ch);
    
            
    
            if (isset($error_msg)) {
    
                 echo "<pre>$error_msg</pre>";
    
                echo "error";
    
            }else{
    
                 echo "<pre>$result</pre>";
    
                 echo "done";
    
            }
	
	}	
		 
       
 
 
	
}
/************************************************/

/************************************************/
//logged-out user redirection 
function redirect_user() {
  if ( ! is_user_logged_in() && is_account_page() ) {
    $return_url = esc_url( home_url( '/login/' ) );
    wp_redirect( $return_url );
    exit;
  }
}
add_action( 'template_redirect', 'redirect_user' );
/************************************************/

/*************************create table***********************/
global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
$table_name = $wpdb->prefix . 'stay_connected1';

$sql = "CREATE TABLE IF NOT EXISTS $table_name (
  s_id int(11) NOT NULL AUTO_INCREMENT,
  time datetime NOT NULL,
  s_name VARCHAR(255) NOT NULL,
  s_email VARCHAR(255) NOT NULL,
  s_phone VARCHAR(255) NOT NULL,
  s_pincode VARCHAR(255) NOT NULL,
  PRIMARY KEY  (s_id)
) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );
/************************************************/

/*******************delete table*****************************/

 global $wpdb;
    $table_name = $wpdb->prefix . 'stay_connected1111';
    $sql = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query($sql);
/************************************************/
/******add social buttons*****/
add_shortcode('social-share-buttons','social_share_buttons');
function social_share_buttons(){
    ?>
        <section class="sharing-box content-margin content-background clearfix">
        <div class="share-button-wrapper">
            <a target="_blank" class="share-button share-twitter" href="https://twitter.com/intent/tweet?url=<?php echo $postUrl; ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta( 'twitter' ); ?>" title="Tweet this"><i class="fa-brands fa-square-twitter"></i></a>
            <a target="_blank" class="share-button share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="Share on Facebook"><i class="fa-brands fa-square-facebook"></i></a>
            <a target="_blank" class="share-button share-linkedin" href="https://www.linkedin.com/shareArticle?url=<?php echo $postUrl; ?>" title="Share on linkedin"><i class="fa-brands fa-linkedin"></i></a>
        </div>
    </section>
    <?php
}
/******add social buttons*****/
/********disable right click on webiste*********/
document.addEventListener('contextmenu', function(e) {
  e.preventDefault();
});
/********disable right click on webiste*********/
/************* Hide cart number if cart is empty ********/
add_action( 'wp_footer', function() {
    if ( WC()->cart->is_empty() ) {
        echo '<style type="text/css">.cart-contents .count { display:none !important; }</style>';
    }
});
/*******************alter table*****************************/
global $wpdb; 
    $added= $wpdb->query("ALTER TABLE wp_support_ticket ADD business_type ENUM('one','two') NOT NULL");

/************************show all tables************************/
global $wpdb;
$mytables=$wpdb->get_results("SHOW TABLES");
foreach ($mytables as $mytable)
{
    foreach ($mytable as $t) 
    {       
        echo $t . "<br>";
    }
}
/************************************************/
/*======================================Code by Anjum==========================================*/
function redirect_user() {
  if ( ! is_user_logged_in() && is_account_page() ) {
    $return_url = esc_url( home_url( '/login/' ) );
    wp_redirect( $return_url );
    exit;
  }
}
add_action( 'template_redirect', 'redirect_user' );

//add_action( 'woocommerce_add_to_cart_message', 'mish_before_add_to_cart_btn' );

function mish_before_add_to_cart_btn(){
	
	if ( is_user_logged_in() ) {
		global $woocommerce; 
		 global $current_user;
		 $useremail = $current_user->user_email;
		 $items = $woocommerce->cart->get_cart();

        foreach($items as $item => $values) { 
            $_product =  wc_get_product( $values['data']->get_id()); 
            $prduct_name = $_product->get_title(); 
        } 
		 
        $subject = "Your item in cart...";
        
       
        $to = $useremail;
        $fromemail="care@smartdev.livpure.com";
        
        $headers[] = 'From: No-Reply <'.$fromemail.'>';
          
        $url = site_url( '/checkout/', 'https' );

        $message ='You are one step away for getting a Smart AC controller "'.$prduct_name.'". Complete your payment process by clicking on 
		<a href='.$url.'>Checkout</a>.
        <br><br>Thank You,<br>Smart Livpure Team.';
        $sent = wp_mail($to, $subject, ($message), $headers); 
	}
}

add_shortcode('login-logout','userprofile');
function userprofile(){
    global $current_user;
    if(is_user_logged_in()){
        ?>
            <li class="custom-profile-links"><i class='digitaz-icon- digitaz-icon-account'></i> <?php echo $current_user->user_firstname; ?>
                <ul class="" style="display:none;">
                    <li><a href="<?php echo site_url('/my-account-2/'); ?>"><i class='far fa-user'></i> My Profile</a></li>
                    <li><a href="<?php echo site_url('/my-account-2/customer-logout/'); ?>"><i class='fas fa-power-off'></i> Logout</a></li>
                </ul>
            </li>
        <?php
    } else { 
        ?>
            <li class="custom-profile-links custom-profile-links-logout"><i class='digitaz-icon- digitaz-icon-account'></i>
                <ul class="" style="display:none;">
                    <li><a href="<?php echo site_url('/login/'); ?>"><i class='fa fa-sign-in'></i> login</a></li>
                </ul>
            </li>
        <?php
    }
}

// add customer phone on admin
add_filter( 'manage_edit-shop_order_columns', 'add_phone_order_admin_list_column', 20);
 
function add_phone_order_admin_list_column( $columns ) {
    $columns['billing_phone'] = 'Customer Phone';
  //  return $columns;
	
	$new_columns = array();

    foreach ( $columns as $column_name => $column_info ) {

        $new_columns[ $column_name ] = $column_info;

        if ( 'order_number' === $column_name ) {
            $new_columns['billing_phone'] = __( 'Customer Phone', 'my-textdomain' );
        }
    }
    return $new_columns;
}
 
add_action( 'manage_shop_order_posts_custom_column', 'add_phone_order_admin_list_column_content' );
 
function add_phone_order_admin_list_column_content( $column ) {

    global $post;
 
    if ( 'billing_phone' === $column ) {
 
        $order = wc_get_order( $post->ID );
        echo $order->get_billing_phone();
      
    }
}

/***********Add service request tab*********/
function add_service_request_endpoint() {
    add_rewrite_endpoint( 'service-request', EP_ROOT | EP_PAGES );
}
add_action( 'init', 'add_service_request_endpoint' );
function service_request_query_vars( $vars ) {
    $vars[] = 'service-request';
    return $vars;
}
add_filter( 'query_vars', 'service_request_query_vars', 0 );
function add_service_request_link_my_account( $items ) {
    $items['service-request'] = 'Service Request';
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'add_service_request_link_my_account' );
function service_request_content() {
   wc_get_template('myaccount/service-request.php');
}
add_action( 'woocommerce_account_service-request_endpoint', 'service_request_content' );

/***********Add faq tab on account menu page************/
function add_faqs_endpoint() {
    add_rewrite_endpoint( 'faqs', EP_ROOT | EP_PAGES );
} 
add_action( 'init', 'add_faqs_endpoint' );
function faqs_query_vars( $vars ) {
    $vars[] = 'faqs';
    return $vars;
}
add_filter( 'query_vars', 'faqs_query_vars', 0 );
function add_faqs_link_my_account( $items ) {
    $items['faqs'] = 'FAQs';
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'add_faqs_link_my_account' );
function faqs_content() {
   wc_get_template('myaccount/faqs.php');
}
add_action( 'woocommerce_account_faqs_endpoint', 'faqs_content' );


/***********remove_address_tab_my_account************/
add_filter( 'woocommerce_account_menu_items', 'remove_address_tab_my_account' );
function remove_address_tab_my_account( $items ) {
   $remove_address_tab = array( 'edit-address' => __( 'Addresses', 'woocommerce' ) ); 
   unset( $items['edit-address'] ); 
   return $items;
}
/***********change account menus position************/
add_filter( 'woocommerce_account_menu_items', 'change_add_link_my_account1' );
function change_add_link_my_account1( $items ) {
   $save_for_later = array( 'customer-logout' => __( 'Logout', 'woocommerce' ) ); 
   unset( $items['customer-logout'] ); 
   $items = array_merge( array_slice( $items, 0, 5 ), $save_for_later, array_slice( $items, 5 ) );
   
   $save_for_later = array( 'wishlist' => __( 'Wishlist', 'woocommerce' ) ); 
   unset( $items['wishlist'] ); 
   $items = array_merge( array_slice( $items, 0, 4 ), $save_for_later, array_slice( $items, 4 ) );   
   
   $save_for_later = array( 'service-request' => __( 'Service Request', 'woocommerce' ) ); 
   unset( $items['service-request'] ); 
   $items = array_merge( array_slice( $items, 0, 2 ), $save_for_later, array_slice( $items, 2 ) );  
   
   $save_for_later = array( 'faqs' => __( 'FAQs', 'woocommerce' ) ); 
   unset( $items['faqs'] ); 
   $items = array_merge( array_slice( $items, 0, 4 ), $save_for_later, array_slice( $items, 4 ) );  
   
   return $items;
}
/*********************add support menu tabs on admin panel***************************/
add_action( 'admin_menu', 'support_menu' );
function support_menu(){    
    add_menu_page('Support Details', 'Support Details', 'manage_options', 'support-details', 'support_menu_detail', 'dashicons-text', 2);
		add_submenu_page('support-details', 'Stay Connected', 'Stay Connected', 'manage_options', 'stay-connected', 'stay_connected_details' );
		add_submenu_page('support-details', 'Support Tickets', 'Support Tickets', 'manage_options', 'support-tickets', 'support_ticket_details' );
		add_submenu_page('support-details', 'Request Callback', 'Request Callback', 'manage_options', 'request-callback', 'request_callback_details' );
}

function support_menu_detail() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	include_once get_template_directory()."-child/support-details.php";
}
function stay_connected_details() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	include_once get_template_directory()."-child/stay-connected.php";
}
function support_ticket_details() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	include_once get_template_directory()."-child/support-tickets.php";
}
function request_callback_details() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	include_once get_template_directory()."-child/request-callback.php";
}
//delete recode from table
add_action("wp_ajax_stay_form_data_delete", "stay_form_data_delete");
add_action("wp_ajax_nopriv_stay_form_data_delete", "stay_form_data_delete");

function stay_form_data_delete($isajax=true){
	global $wpdb;
	$stay_id = $_POST['stay_del_id'];
	$sql = "DELETE FROM wp_stay_connected WHERE stay_id = '$stay_id'";
	$run = $wpdb->query($sql);
	
}
/*********************add support menu on admin panel***************************/
/**********************************************************/

import sql using cmd->
C:\xampp\mysql\bin>mysql -u root -p smartstag < C:\Users\Anjum\Downloads\Anuradha\Anuradha\post.sql
Enter password:

-------------- Go to wampserver mysql console------------
import db using wamp command:

mysql> use mooving_staging_new

mysql> source D:/mooving_staging_new.sql




it help desk->
mac card 
system frequently internet issue ???

---
change dashboard navigation->
plugin/woocommerce/include/wc-account-functions.php

footer enquiry button popup

<?php
		$urllink = site_url().'/checkout/';	
		$url = 'https://rb.gy/zfovwo';
		$mobile_no = '9807785352';
		$product='Arshad Ji';
		$messagee = "You are one step away for getting $product. Complete your payment process by clicking on $url - Livpure Smart";	
		echo $urlmsg="https://www.myvaluefirst.com/smpp/sendsms?username=livpurehtptrns&password=livpur01&from=LVSMRT&to=".$mobile_no."&text=".urlencode($messagee);  

		$ch = curl_init( $urlmsg); 
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
            $result = curl_exec($ch); 
              if (curl_errno($ch)) { 
                $error_msg = curl_error($ch); 
            } 
            curl_close($ch); 
            if (isset($error_msg)) {
                 echo "<pre>$error_msg</pre>";    
                 echo "error";    
            }else{  
                 echo "<pre>$result</pre>";   
                 echo "done";   
            }
?>



<img class="" src="<?php echo get_theme_file_uri(); ?>/templates/assets/images/nookvideo-img_mob.png" alt="">



<!------scroll to top------>
<div class="scrolltop" style="display:none;">
	<div class="scrolltotop">
		<a href=""><i class="fas fa-chevron-up"></i></a>
	</div>
</div>	
<script>
jQuery(document).scroll(function(){
	var y = jQuery(this).scrollTop();
	if(jQuery(window).width() > 1024) { 
		if(y > 200) {
			jQuery('.scrolltop').css('display','block');
		} else {
			jQuery('.scrolltop').css('display','none');
		}
	} else { 
		if(y > 100) {
			jQuery('.scrolltop').css('display','block');
		} else {
		jQuery('.scrolltop').css('display','none');
		}
	}
	
})
jQuery("body").on('click', '.scrolltop', function(e){
	e.preventDefault();
	jQuery("html, body").animate({scrollTop: 0});
});
</script>
/********scroll to top start*************/
.scrolltotop i.fas.fa-chevron-up {
    color: #fff;
    font-size: 16px;
}
.scrolltotop {
    background: #452f8a;
    width: 40px;
    height: 40px;
    text-align: center;
    border-radius: 6px;
    cursor: pointer;
    line-height: 44px;
}
.scrolltotop:hover {
    background: #f47920;
}
.scrolltop {
    position: fixed;
    left: 10px;
    z-index: 9999999 !important;
    bottom: 10px;
}

/********scroll to top end*************/
<!------scroll to top------>

<!------Best Way to Resize Google reCAPTCHA------>
#html_element iframe {
    transform: scale(0.77);
    -webkit-transform: scale(0.77);
    transform-origin: 0 0;
    -webkit-transform-origin: 0 0;
}
<!------Best Way to Resize Google reCAPTCHA------>

<?php
/*global $wpdb;
echo '<pre>';
$array = $wpdb->get_results("SELECT * FROM wp_order_lead");
print_r($array);*/

/*$email_check = "SELECT DISTINCT email from register";
	$runs = mysqli_query($conn, $email_check);
	if(mysqli_num_rows($runs) > 0){
		while($row = mysqli_fetch_array($runs)){
			echo $email=$row['email'].'<br>';
			
	} }*/
?>

/****************wordpress select**********/
 $select = $wpdb->get_results("SELECT * FROM wp_support_ticket WHERE req_num ='$req_num'");
    echo '<pre>';
    print_r($select)
	
/*************add custom field on agent portal page********/
function customer_detail_add_custom_meta_box() {
    //this will add the metabox for the member post type
    $screens = array( 'page' );
    foreach ( $screens as $screen ) {
        add_meta_box(
            'agent_sectionid', __( 'Agent portal custom fields'), 'customer_detail_meta_box_callback', $screen
        );
     }
}
add_action( 'add_meta_boxes', 'customer_detail_add_custom_meta_box' );
    
/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function customer_detail_meta_box_callback( $post ) { 
// Add a nonce field so we can check for it later.
wp_nonce_field( 'customer_detail_save_meta_box_data', 'customer_detail_meta_box_nonce' );
/*
    * Use get_post_meta() to retrieve an existing value
    * from the database and use the value for the form.
    */
$value = get_post_meta( $post->ID, 'customer_detail_value', true );
    echo '<label>';
    _e( 'Customer Detail Title' );
    echo '</label> ';
    echo '<input type="text" id="customer_detail_field" name="customer_detail_field" value="' . esc_attr( $value ) . '" size="25" />';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function customer_detail_save_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['customer_detail_meta_box_nonce'] ) ) {
    return;
    }
    if ( ! wp_verify_nonce( $_POST['customer_detail_meta_box_nonce'], 'customer_detail_save_meta_box_data' ) ) {
    return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
    }
    // Check the user's permissions.
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
    if ( ! current_user_can( 'edit_page', $post_id ) ) {
        return;
    }
    } else {
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    }
    if ( ! isset( $_POST['customer_detail_field'] ) ) {
    return;
    }
    $my_data = sanitize_text_field( $_POST['customer_detail_field'] );
    update_post_meta( $post_id, 'customer_detail_value', $my_data );
}
add_action( 'save_post', 'customer_detail_save_meta_box_data' );





/********** get url param in codeigniter 3 ********/
$this->uri->segment('3');
/********** get url param in codeigniter 3 ********/

/**********add new meta in user meta in wordpress********/
  global $wpdb;
    $user = wp_get_current_user();
    $userid= get_user_meta($user->ID);
    echo '<pre>';
    print_r($userid);

    $users = get_users( [
        'fields' => 'id', 
        'meta_key' => 'heka_user_id', 
        'meta_compare' => 'NOT EXISTS'
    ] ); 
    if ( is_array($users) )
    {
        $meta_value = $_SESSION['user-data']['uid'];
        foreach( $users as $user_id ) {
            add_user_meta( $user_id, 'heka_user_id', $meta_value, true);
        }
    }
	
/**********update meta value in user meta in wordpress********/
    $user = wp_get_current_user();
    $userid = get_user_meta($user->ID); 
    $metas = array( 
        'heka_user_id'   => $_SESSION['user-data']['uid']
    );
    foreach($metas as $key => $value) {
        update_user_meta( $user->ID, $key, $value );
    } 	
	
	
	
/*******check template for mobile msg******/
	$prduct_name = 'nook';
    $mobile_no = '7018216542';
    $urllink = 'https://rb.gy/zfovwo';	
    $messagee ="You are one step away for getting $prduct_name. Complete your payment process by clicking on $urllink - Livpure Smart";	
    $urlmsg="https://www.myvaluefirst.com/smpp/sendsms?username=livpurehtptrns&password=livpur01&from=LVSMRT&to=".$mobile_no."&text=".urlencode( trim($messagee)); 
    $ch = curl_init( $urlmsg); 
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
        $result = curl_exec($ch); 
            if (curl_errno($ch)) { 
            $error_msg = curl_error($ch); 
        } 
        curl_close($ch); 
        if (isset($error_msg)) {
            echo "<pre>$error_msg</pre>";    
            echo "error";    
        }else{  
            echo "<pre>$result</pre>";   
            echo "done";   
        }	
/*******check template for mobile msg******/	

/***input field focus highlight**/
https://codepen.io/mauritiusdsilva/pen/JOddzY


/*** thankyou mail format **/
<center>
    <a href="https://www.livgreenpetproducts.com/"><img src="https://www.livgreenpetproducts.com/wp-content/uploads/elementor/thumbs/logo-q89giuo6xr3hdh1rbqr8psrfijijdab1w0sp4c8kdc.png" alt="Livgreen Logo"></a>
    <p>Dear Administrator,<br> Following user wants to contact you. His/her details are as mentioned below:</p>
    
    <table>
        <tr>
            <th>Name:</th><td>name</td>
        </tr>
        <tr>
            <th>Email:</th><td>name</td>
        </tr>
        <tr>
            <th>Phone:</th><td>name</td>
        </tr>
        <tr>
            <th>Message:</th><td>name</td>
        </tr>
    </table> 
    <p>Thank You!</p>
</center>
/*** thankyou mail **/

/**slick slider**/
<section class="logos-slider">
      <div class="slide"><a href=""><img src="https://www.livgreenpetproducts.com/wp-content/uploads/2023/07/sargroup_logo.png"></a></div>
      <div class="slide"><img src="https://www.livgreenpetproducts.com/wp-content/uploads/2023/07/newlogo.svg"></div>
      <div class="slide"><img src="https://www.livgreenpetproducts.com/wp-content/uploads/2023/07/ncubate-logo.png"></div>
      <div class="slide"><img src="https://www.livgreenpetproducts.com/wp-content/uploads/2023/07/logo-light.svg"></div>
      <div class="slide"><img src="https://www.livgreenpetproducts.com/wp-content/uploads/2023/07/Livpure_LOGO_Purple.webp"></div>
      <div class="slide"><img src="https://www.livgreenpetproducts.com/wp-content/uploads/2023/07/Mooving1-scaled.jpg"></div>
      <div class="slide"><img src="https://www.livgreenpetproducts.com/wp-content/uploads/2023/07/lectrix.png"></div>
      <div class="slide"><img src="https://www.livgreenpetproducts.com/wp-content/uploads/2023/07/logo.svg"></div>
   </section>
<style> 
    /* Slider */
.slick-slide {
margin: 0px 20px;
}
.slick-slide img {
width: 100%;
}

.slick-list
{
position: relative;
display: block;
overflow: hidden;
margin: 0;
padding: 0;
}
.slick-list:focus
{
outline: none;
}
.slick-list.dragging
{
cursor: pointer;
cursor: hand;
}
.slick-slider .slick-track,
.slick-slider .slick-list
{
-webkit-transform: translate3d(0, 0, 0);
-moz-transform: translate3d(0, 0, 0);
-ms-transform: translate3d(0, 0, 0);
-o-transform: translate3d(0, 0, 0);
transform: translate3d(0, 0, 0);
}
.slick-track
{
position: relative;
top: 0;
left: 0;
display: block;
}
.slick-track:before,
.slick-track:after
{
display: table;
content: '';
}
.slick-track:after
{
clear: both;
}
.slick-loading .slick-track
{
visibility: hidden;
}
.slick-slide
{
display: none;
float: left;
height: 100%;
min-height: 1px;
}
[dir='rtl'] .slick-slide
{
float: right;
}
.slick-slide img
{
display: block;
}
.slick-slide.slick-loading img
{
display: none;
}
.slick-slide.dragging img
{
pointer-events: none;
}
.slick-initialized .slick-slide
{
display: block;
}
.slick-loading .slick-slide
{
visibility: hidden;
}
.slick-vertical .slick-slide
{
display: block;
height: auto;
border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
display: none;
}
</style>
<script>
    //logo slider
jQuery( document ).ready(function() {
jQuery('.logos-slider').slick({
slidesToShow: 6,
slidesToScroll: 1,
autoplay: true,
autoplaySpeed: 1500,
arrows: false,
dots: false,
pauseOnHover: false,
responsive: [{
breakpoint: 768,
settings: {
slidesToShow: 3
}
}, {
breakpoint: 520,
settings: {
slidesToShow: 2
}
}]
});
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

/**slick slider**/


/*==========================SHOPIFY====================*/

/**************************/
{% if product.tags contains 'ACMC' %} 
	{% else %}
{%endif%}

{% if product.title == '' %}
{% endif %}

/**********add class on body tag*************/
class="template-{{ request.page_type | handle }}template-{{ page.handle }}"



/*** add project to git ***/

Anjum@LSHP-HO-L-426 MINGW64 /c/wamp64/www/fashion
$ git config --global user.name Anjum-Akhtar

Anjum@LSHP-HO-L-426 MINGW64 /c/wamp64/www/fashion
$ git config --global user.email anjumakhtar216@outlook.com

Anjum@LSHP-HO-L-426 MINGW64 /c/wamp64/www/fashion
$ git init
Initialized empty Git repository in C:/wamp64/www/fashion/.git/

Anjum@LSHP-HO-L-426 MINGW64 /c/wamp64/www/fashion (master)
$ git add .
-------all files..............
Anjum@LSHP-HO-L-426 MINGW64 /c/wamp64/www/fashion (master)
$ git add .

Anjum@LSHP-HO-L-426 MINGW64 /c/wamp64/www/fashion (master)
$ git commit -m first_commit
------all files..............
Anjum@LSHP-HO-L-426 MINGW64 /c/wamp64/www/fashion (master)
$ git remote add origin https://github.com/Anjum-Akhtar/fashion

Anjum@LSHP-HO-L-426 MINGW64 /c/wamp64/www/fashion (master)
$ git push -u origin master
remote: Write access to repository not granted.
fatal: unable to access 'https://github.com/Anjum-Akhtar/fashion/': The requested URL returned error: 403

Anjum@LSHP-HO-L-426 MINGW64 /c/wamp64/www/fashion (master)
$ git push -u origin master

Anjum@LSHP-HO-L-426 MINGW64 /c/wamp64/www/fashion (master)
$ git status

/*** add project to git ***/


/*** mobile number start with 6-9 ***/
(function() {
    var input = document.getElementById('erickshaw_mobile');
    var pattern = /^[6-9][0-9]{0,9}$/;
    var value = input.value;
    !pattern.test(value) && (input.value = value = '');
    input.addEventListener('input', function() {
        var currentValue = this.value;
        if(currentValue && !pattern.test(currentValue)) this.value = value;
        else value = currentValue;
    });
})();
/*** mobile number start with 6-9 ***/


/*==========================ANJUM====================*/
CI:	
	Traits
	hooks
	routing

OOPS
My SQL (https://www.mysqltutorial.org/)

CSS->
	https://materializecss.com/showcase.html
	
WORDPRESS:
	- Hooks, types
	- What is shortcode snd how to use and why
	- How to call ajax, what is ajax
	- How to create a theme 
	- Wordpress function for data insert update delete -> 
		https://phpesperto.com/post/insert-update-delete-select-query-in-wordpress#:~:text=Here%20I%20will%20explain%20how,php.
	- How to create plugin
	- Page speed major issue SEO
	
	
	
	
Controller->

 public function new_user(){ 
         $this->load->view('include/header');
         $this->load->view('add_user_new_ui','');
         $this->load->view('include/footer');
    }
	
	
Download laravel:
composer create-project laravel/laravel example-app
	
Laravel start:
php artisan serve	


Token query:
SELECT * FROM ia_user_login_logs WHERE user_id = '106' AND is_deleted = '0'


/* ============ Agent Portal ============== */
.agentLogin-form h3 {
    text-align: center;
    font-size: 22px;
    color: #442c8b;
    font-weight: 600;
}
.agentLogin-form span {
    color: #f58220;
    font-size: 20px;
}
.agentLogin-form p {
    font-weight: normal; 
    color: #999999;
    font-size: 13px;
}



/************ API ***************/
<?php
// API endpoint
$url = "http://your-api-url.com/api/v1/resource";

// Data to be sent in the POST request
$data = [
    'key1' => 'value1',
    'key2' => 'value2'
];

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

// Execute the POST request
$response = curl_exec($ch);

// Check for cURL errors
if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    // Decode and display the response
    $responseData = json_decode($response, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        // Process the data
        echo "Response: ";
        print_r($responseData);
    } else {
        echo "JSON decode error: " . json_last_error_msg();
    }
}

// Close cURL session
curl_close($ch);
?>



Webflow
https://anus-five-star-site.design.webflow.com/




function emailTrigger($UserEmail,$subject,$email_body){
		
		$emailObj 			= new Email();
		$defaults 			= $emailObj->getSystemDefaultEmail(); 
		$mail 				= new SugarPHPMailer();
		$mail->setMailerForSystem(); 
		$mail->From 		= $defaults['email'];
		$mail->FromName 	= $defaults['name'];
		$mail->Subject 		= $subject;

		$mail->addAddress($UserEmail);              
		$date = date('Ymd');
		// $email_entry = "Dear ".$UserName.", </br></br>You have got the indent for approval, to approve click on below link.<br><br><a href=".$url.">Click Here</a></br></br> Team Livpure";                               
		$mail->Subject 		= $subject;
		$mail->Body    		= $email_body.'</br></br>';
		$mail->AltBody 		= 'This is the body in plain text for non-HTML mail clients';
		$sms_send ='';
		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			$sms_send = 'Sent.';
		}
	}
	
	
// check last query
echo $this->db->last_query();
                die("jii");
				


------------------- ADD NEW BRANCH GIT COMMAND--------------------
$ git reset --hard origin/anjum
$ git pull
$ git checkout dev_anjum_moov
$ git pull origin master
$ git status
$ git reset HEAD file path // if you revert add file

--------------------- Checkout -------------------------
Checkout from that particular branch where you want to do a new code
	git checkout branchname like GIT/GRN
Now create a new branch
	git checkout -b ""
------------------------------------------------------------------




if(isset($_SESSION['visited'])) { 
		
} else { 
	 //echo do_shortcode('[onload-form]');
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
	<script>
			jQuery(window).on('load', function($) {
				setTimeout(function(){
					jQuery('#onload-popup').show();
					jQuery('.popup-close').click(function() {
						jQuery('#onload-popup').hide();
					});
				
				}, 15000);
			});
		</script>

	<?php
	$_SESSION['visited'] = true; 
} 



  
LARAVEL:
	php artisan migrate //migrate db
	php artisan migrate:rollback // rollback db automatic generated tables
	php artisan make:migration cst  // create custom table
	php artisan make:model Pagemodel // create model
	php artisan make:controller Pagecontroller // create controller
	php artisan serve // start laravel
	

https://www.itsolutionstuff.com/post/laravel-10-custom-login-and-registration-exampleexample.html	


<!DOCTYPE html>
<html>
<body>

<?php
for($i=0;$i<=5;$i++){
	for($j=1;$j<=$i;$j++){
		echo "*";
	}
    echo "<br>";
}
echo "<br>";

for($i=0;$i<=5;$i++){
	for($j=5-$i;$j>=1;$j--){
    	echo "*";
    }
    echo "<br>";
}

echo "<br>";

$size = 5;
for($i=1;$i<=$size;$i++){
    for($j=1;$j<=$size-$i;$j++){
        echo "&nbsp;&nbsp;";
    }
    for($k=1;$k<=$i;$k++){
                echo "*&nbsp;&nbsp;";
    }
echo "<br />";
}

?> 

</body>
</html>




<?php
// API endpoint
$url = "http://your-api-url.com/api/v1/resource";
 
// Data to be sent in the POST request
$data = [
    'key1' => 'value1',
    'key2' => 'value2'
];
 
// Initialize cURL session
$ch = curl_init();
 
// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
 
// Execute the POST request
$response = curl_exec($ch);
 
// Check for cURL errors
if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    // Decode and display the response
    $responseData = json_decode($response, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        // Process the data
        echo "Response: ";
        print_r($responseData);
    } else {
        echo "JSON decode error: " . json_last_error_msg();
    }
}
 
// Close cURL session
curl_close($ch);
?>


INSERT INTO `orders` (`order_id`, `customer_id`, `employee_id`, `order_date`, `shipper_id`) 
VALUES ('10309', '37', '3', CURRENT_TIMESTAMP, '1'),
('10310', '77', '78', CURRENT_TIMESTAMP, '2');
 
INNER JOIN:
The INNER JOIN keyword selects records that have matching values in both tables.
SELECT customer_name FROM customers AS cus IINER JOIN orders AS ord ON cus.customer_id=ord.customer_id;
 
LEFT JOIN:
The LEFT JOIN keyword returns all records from the left table (table1), and the matching records (if any) from the right table (table2).
SELECT customer_name FROM customers AS cus LEFT JOIN orders AS ord ON cus.customer_id=ord.customer_id;
 
 
https://www.w3schools.com/mysql/mysql_union.asp
 
RIGHT JOIN:
The RIGHT JOIN keyword returns all records from the right table (table2), and the matching records (if any) from the left table (table1).
SELECT customer_name FROM customers AS cus RIGHT JOIN orders AS ord ON cus.customer_id=ord.customer_id;
 
CROSS JOIN:
The CROSS JOIN keyword returns all records from both tables (table1 and table2).
SELECT customer_name FROM customers CROSS JOIN orders WHERE customers.customer_id=orders.customer_id;
 
SELF JOIN:
A self join is a regular join, but the table is joined with itself.
SELECT column_name(s)
FROM table1 T1, table1 T2
WHERE condition;
T1 and T2 are different table aliases for the same table.
SELECT A.customer_name AS cust_name1,B.customer_name AS cust_name2, A.city FROM customers AS A, customers AS B WHERE A.customer_id <> B.customer_id AND A.city=B.city ORDER BY A.city;