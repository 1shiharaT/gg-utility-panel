<?php
/**
 * @package   GG Utility Panel
 * @author    Ishihara Takashi <akeome1369@gmail.com>
 * @license   GPL-2.0+
 * @link      http://grow-group.jp
 * @copyright 2014 Ishihara Takashi
 *
 * Plugin Name:       Utility Panel
 * Plugin URI:        https://github.com/1shiharaT/gg-utility-panel
 * Description:       管理画面にショートカットパネルを設置
 * Version:           1.0.0
 * Author:            ishihara takashi
 * Author URI:        http://web-layman.com
 * Text Domain:       gg-utility-panel
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/1shiharaT/gg-utility-panel
 */

if ( ! defined( 'WPINC' ) ) {
  die;
}

/**
 * define
 */

define( 'GGUPANEL_PATH' , plugin_dir_path( __FILE__ ) ) ;
define( 'GGUPANEL_URI' , plugin_dir_url( __FILE__ ) ) ;

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'classes/UtilityPanel.php' );
require_once( plugin_dir_path( __FILE__ ) . 'classes/UtilityPanelType.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 */

register_activation_hook( __FILE__, array( 'UtilityPanel', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'UtilityPanel', 'deactivate' ) );

/**
 * loaded plugin
 *
 */
add_action( 'plugins_loaded', array( 'UtilityPanel', 'get_instance' ) );
add_action( 'plugins_loaded', array( 'UtilityPanelType', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/
// if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

  require_once( plugin_dir_path( __FILE__ ) . 'classes/UtilityPanelAdmin.php' );
  add_action( 'plugins_loaded', array( 'UtilityPanelAdmin', 'get_instance' ) );

// }
