<?php
/*
config.php

stores configuration information for our web application

*/

//removes header already sent errors
ob_start();

define('SECURE',false); #force secure, https, for all site pages

define('PREFIX', 'widgets_wn18_'); #Adds uniqueness to your DB table names.  Limits hackability, naming collisions

header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching

define('DEBUG',true); #we want to see all errors

include 'credentials.php';//stores database info
include 'common.php';//stores favorite functions

//prevents date errors
date_default_timezone_set('America/Los_Angeles');

//create config object
$config = new stdClass;

//navigation links
$config->nav1 = [];
$config->nav1['index.php'] = "HOME";
$config->nav1['customer_list.php'] = "CUSTOMERS";
$config->nav1['daily.php'] = "DAILY";
$config->nav1['contact.php'] = "CONTACT";

//create default page identifier
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//START NEW THEME STUFF - be sure to add trailing slash!
$sub_folder = 'widgets2/';//change to 'widgets' or 'sprockets' etc.
$config->theme = 'Coffee';//sub folder to themes

//will add sub-folder if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
//force secure website
if (SECURE && $_SERVER['SERVER_PORT'] != 443) {#force HTTPS
	header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}else{
    //adjust protocol
    $protocol = (SECURE==true ? 'https://' : 'http://'); // returns true
    
}
$config->virtual_path = $protocol . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;

define('ADMIN_PATH', $config->virtual_path . '/admin/'); # Could change to sub folder
define('INCLUDE_PATH', $config->physical_path . '/includes/');

//END NEW THEME STUFF

//set website defaults
$config->title = THIS_PAGE;
$config->banner = 'Widgets2';
$config->loadhead = '';//place items in <head> element

switch(THIS_PAGE){
        
    case 'index.php':    
        $config->title = 'Home Page';    
    break;
    
    case 'customer_list.php':    
        $config->title = 'Customer Page';
        $config->banner = 'Customers!';
    break;
        
    case 'daily.php':    
        $config->title = 'Daily Page';    
    break;    
        
    case 'contact.php':    
        $config->title = 'Contact Page';    
    break;    
}

//START NEW THEME STUFF
//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . 'themes/' . $config->theme . '/';
//END NEW THEME STUFF

/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
if(startSession() && isset($_SESSION['AdminID']))
{#add admin logged in info to sidebar or nav
    
    $config->adminWidget = '
        <a href="' . ADMIN_PATH . 'admin_dashboard.php">ADMIN</a> 
        <a href="' . ADMIN_PATH . 'admin_logout.php">LOGOUT</a>
    ';
}else{//show login (YOU MAY WANT TO SET TO EMPTY STRING FOR SECURITY)
    
    $config->adminWidget = '
        <a  href="' . ADMIN_PATH . 'admin_login.php">LOGIN</a>
    ';
}


function widgets2_links($nav1) 
{
    foreach($nav1 as $url => $text) {
//        echo '<li><a href="' . $url . '">' . $text . '</a></li>';
        
        if(THIS_PAGE == $url) {
            echo '
            <li class="nav-item active px-lg-4">
                <a class="nav-link text-uppercase text-expanded" href="' . $url . '">' . $text . '</a>
            </li>
        ';   
        } else {
            echo '
            <li class="nav-item px-lg-4">
                <a class="nav-link text-uppercase text-expanded" href="' . $url . '">' . $text . '</a>
            </li>
        ';   
        } 
    }
    
} //end widgets2_links

?>