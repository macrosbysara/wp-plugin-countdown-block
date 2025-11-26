<?php
/**
 * Plugin Name:       Countdown Block
 * Description:       A countdown block.
 * Requires:          6.5.0
 * Requires at least: 6.7.0
 * Requires PHP:      8.2
 * Version:           1.0.1
 * Author:            K.J. Roelke
 * Author URI:        https://www.kjroelke.online
 * License:           GPL-3.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package MacrosBySara
 * @subpackage CountdownBlock
 */

use MacrosBySara\CountdownBlock\Plugin_Init;
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/inc/class-plugin-init.php';
$plugin_init = new Plugin_Init( plugin_dir_path( __FILE__ ) );

// Register activation and deactivation hooks.
register_activation_hook( __FILE__, array( $plugin_init, 'activate' ) );
register_deactivation_hook( __FILE__, array( $plugin_init, 'deactivate' ) );
