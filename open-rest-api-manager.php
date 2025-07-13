<?php
namespace OpenRestApiManager;
/**
 * Open REST API Manager
 *
 * @package       Open_REST_API_Manager
 * @author        Joe Wnukoski
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   Open REST API Manager
 * Plugin URI:    https://github.com/jwnukoski/wp-open-rest-api-manager
 * Description:   Open source REST API manager for WordPress.
 * Version:       1.0.0
 * Author:        Joe Wnukoski
 * Author URI:    https://jwnukoski.com
 * Text Domain:   open-rest-api-manager
 * Domain Path:   /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;


// Settings page
require_once plugin_dir_path( __FILE__ ) . 'settings/index.php';