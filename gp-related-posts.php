<?php
/*
Plugin Name: GP Related Posts
Plugin URI: https://github.com/WestCoastDigital/GP-Related-Posts
Description: Add related posts to the bottom of your single posts page
Version: 1.0
Author: Jon Mather
Author URI: https://github.com/WestCoastDigital
Text Domain: generatepress
Domain Path: /languages
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$theme = wp_get_theme(); // gets the current theme
if ( 'GeneratePress' == $theme->name || 'GeneratePress' == $theme->parent_theme ) {

    include_once( 'inc/frontend-hook.php' );
    include_once( 'inc/settings.php' );

}
