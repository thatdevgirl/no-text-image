<?php

/**
 * Plugin Name: No Text Image!
 * Description: Scan images for text when they are uploaded to the media library.
 * Version: 1.0
 * Author: Joni Halabi
 * Author URI: https://jhalabi.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) {
  exit;
}

require_once( 'vendor/autoload.php' );
require_once( 'inc/scan-images.php' );
