<?php
/**
* Plugin Name: Grid PHP INI Modifer (GPIM)
* Plugin URI:  http://mediatemple.net
* Description: This plugin will help our customers modify php ini settings easier, this was built
* for customers that are not confortable with the normal way of setting up the ini file.
* Version:     Alpha 0.1
* Author:      Daniel I. Rodriguez (mt) Media Temple
* Author URI: http://mediatemple.net
* Plugin URI: http://mediatemple.net
* License: GPL2
* Copyright 2014-2015 (mt) Media Temple, Inc. All Rights Reserved.
*/

// Setup global variables
global $plugin_update_ver;
$plugin_update_ver = '0.1'
global $path_to_ini;
$path_to_ini = '\/home/' . $grid_site_idenfier . '\/etc/'
global $grid_site_idenfier;
$grid_site_idenfier = getenv( $SITE );

// Make sure it's wordpress
if ( !defined( 'ABSPATH' ) ) {
    die( 'Forbidden' );
}

// Create .user.ini if does not exist
function gpim_Create_User_ini(){
  $create_user_ini = fopen(".user.ini", "r");
  // some code to be executed....
  fclose( $create_user_ini );
}

// Create php.ini if does not exist
function gpim_Create_Php_ini(){
  $create_php_ini = fopen( "php.ini", "r" );
  // some code to be executed....
  fclose( $create_php_ini );
}


// (Title of the menu, Label for admin panel, user group with access, function to build html page)
function gpim_setup_menu(){
  add_menu_page( 'Grid PHP INI Modifer', 'Grid PHP INI Modifer', 'manage_options', 'gpim-plugin', 'gpim_init' );
}
// Hook into Admin menu load
add_action( 'admin_menu', 'gpim_setup_menu' );

// This function loads the admin page for GPIM
function gpim_init(){
  // PHP.ini file path
  $inipath = php_ini_loaded_file();
  // Check if ini exist, if show loaded from + path
  if( $inipath ){
    echo 'PHP.ini loaded from: ' . $inipath;
    echo $path_to_ini
    echo $grid_site_idenfier
  } else {
    echo "ERROR: Could not find php.ini";
  }

}
// Hook into Admin menu load
add_action( 'admin_init', 'gpim_init' );

function gpim_self_upgrade() {
    //some code to be executed
}
add_action( 'admin_init', 'gpim_self_upgrade' );

?>
