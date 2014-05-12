<?php

/**
 * =====================================================
 * @package   GG Utility Panel
 * @author    Ishihara Takashi <akeome1369@gmail.com>
 * @license   GPL-2.0+
 * @link      http://grow-group.jp
 * @copyright 2014 Ishihara Takashi
 * =====================================================
 */

/**
 * @package UtilityPanelAdmin
 * @author  ishihara takashi <akeome1369@gmail.com>
 */
class UtilityPanelAdmin
{

    /**
     * Instance of this class.
     *
     * @since    1.0.0
     * @var      object
     */
    protected static $instance                  = null;

    /**
     * Slug of the plugin screen.
     *
     * @since    1.0.0
     * @var      string
     */
    protected $plugin_screen_hook_suffix = null;

    /**
     * Initialize the plugin by loading admin scripts & styles and adding a
     * settings page and menu.
     *
     * @since     1.0.0
     */
    private function __construct() {

        $plugin              = UtilityPanel::get_instance();
        $this->plugin_slug   = $plugin->get_plugin_slug();

        // // Load admin style sheet and JavaScript.
        add_action('admin_enqueue_scripts', array(
            $this,
            'enqueue_admin_styles'
        ));
        add_action('admin_enqueue_scripts', array(
            $this,
            'enqueue_admin_scripts'
        ));

        // Add the options page and menu item.
        add_action('admin_menu', array(
            $this,
            'add_plugin_admin_menu'
        ));

        // Add an action link pointing to the options page.
        $plugin_basename = plugin_basename(plugin_dir_path(realpath(dirname(__FILE__))) . $this->plugin_slug . '.php');
        add_filter('plugin_action_links_' . $plugin_basename, array(
            $this,
            'add_action_links'
        ));

        /*
         * print html admin footer
        */
        add_action('admin_footer', array(
            $this,
            'print_panel_footer'
        ));

        /*
         * Define custom functionality.
        */
        add_filter('@TODO', array(
            $this,
            'filter_method_name'
        ));
    }

    /**
     * Return an instance of this class.
     *
     * @since     1.0.0
     *
     * @return    object    A single instance of this class.
     */
    public static function get_instance() {

        // If the single instance hasn't been set, set it now.
        if (null == self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Register and enqueue admin-specific style sheet.
     *
     * @since     1.0.0
     * @return    null    Return early if no settings page is registered.
     */
    public function enqueue_admin_styles() {

        // if (!isset($this->plugin_screen_hook_suffix)) {
        //     return;
        // }

        // $screen = get_current_screen();
        // if ( $this->plugin_screen_hook_suffix == $screen->id) {
            wp_enqueue_style( $this->plugin_slug . '-admin-styles', GGUPANEL_URI . 'assets/css/utility-panel.css' , array() , UtilityPanel::VERSION);
        // }
    }

    /**
     * Register and enqueue admin-specific JavaScript.
     *
     * @access public
     * @since     1.0.0
     * @return    null    Return early if no settings page is registered.
     */
    public function enqueue_admin_scripts() {
            wp_enqueue_script( $this->plugin_slug . '-admin-script', GGUPANEL_URI . 'assets/js/utility-panel.js' , array(
                'jquery'
            ) , UtilityPanel::VERSION);
    }

    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */
    public function add_plugin_admin_menu() {
        $this->plugin_screen_hook_suffix = add_options_page(__('ユーティリティパネル', $this->plugin_slug) , __('ユーティリティパネル', $this->plugin_slug ) , 'manage_options', $this->plugin_slug, array(
            $this,
            'display_plugin_admin_page'
        ));
    }

    /**
     * Render the settings page for this plugin.
     *
     * @since    1.0.0
     */
    public function display_plugin_admin_page() {
        include GGUPANEL_PATH . 'views/admin.php';
    }

    /**
     * Add settings action link to the plugins page.
     *
     * @since    1.0.0
     */
    public function add_action_links($links) {

        return array_merge(array(
            'settings' => '<a href="' . admin_url('options-general.php?page=' . $this->plugin_slug) . '">' . __('設定', $this->plugin_slug) . '</a>'
        ) , $links);
    }

    /**
     * print footer
     * @since    1.0.0
     */
    public function print_panel_footer() {
      $panel_module_type = UtilityPanelType::get_instance();
      include GGUPANEL_PATH . 'views/view.php';
    }

    /**
     * filter
     * @since    1.0.0
     */
    public function filter_method_name() {
        // @TODO: Define your filter hook callback here
    }

}
