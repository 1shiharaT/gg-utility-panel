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
 * Plugin main class.
 *
 * @package UtilityPanel
 * @author  ishihara takashi <akeome1369@gmail.com>
 */

class UtilityPanel
{

    /**
     * Plugin version
     *
     * @since   0.1
     * @var     string
     */
    const VERSION      = '0.1';

    /**
     * slug of plugin
     *
     * @since    0.1
     * @var      string
     */
    protected $plugin_slug = 'gg-utility-panel';

    /**
     * Instance of this class.
     *
     * @since    0.1
     * @var      object
     */
    protected static $instance    = null;


    /**
     * Initialize the plugin by setting localization and loading public scripts
     *
     * @since     0.1
     */
    private function __construct() {

        // Load plugin text domain
        add_action('init', array(
            $this,
            'load_plugin_textdomain'
        ));

        // Activate plugin when new blog is added
        add_action('wpmu_new_blog', array(
            $this,
            'activate_new_site'
        ));

        $this->type = $this->get_pane_type;
    }

    /**
     * Return the plugin slug.
     *
     * @since    0.1
     *
     * @return    Plugin slug variable.
     */
    public function get_plugin_slug() {
        return $this->plugin_slug;
    }

    /**
     * Return an instance of this class.
     *
     * @since     0.1
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
     * Fired when the plugin is activated.
     *
     * @since    0.1
     *
     * @param    boolean    $network_wide    True if WPMU superadmin uses
     *                                       "Network Activate" action, false if
     *                                       WPMU is disabled or plugin is
     *                                       activated on an individual blog.
     */
    public static function activate($network_wide) {

        if (function_exists('is_multisite') && is_multisite()) {

            if ($network_wide) {

                // Get all blog ids
                $blog_ids = self::get_blog_ids();

                foreach ($blog_ids as $blog_id) {

                    switch_to_blog($blog_id);
                    self::single_activate();
                }

                restore_current_blog();
            } else {
                self::single_activate();
            }
        } else {
            self::single_activate();
        }
    }

    /**
     * Fired when the plugin is deactivated.
     *
     * @since    0.1
     *
     * @param    boolean    $network_wide    True if WPMU superadmin uses
     *                                       "Network Deactivate" action, false if
     *                                       WPMU is disabled or plugin is
     *                                       deactivated on an individual blog.
     */
    public static function deactivate($network_wide) {

        if (function_exists('is_multisite') && is_multisite()) {

            if ($network_wide) {

                $blog_ids = self::get_blog_ids();

                foreach ($blog_ids as $blog_id) {

                    switch_to_blog($blog_id);
                    self::single_deactivate();
                }

                restore_current_blog();
            } else {
                self::single_deactivate();
            }
        } else {
            self::single_deactivate();
        }
    }

    /**
     * Fired when a new site is activated with a WPMU environment.
     *
     * @since    0.1
     *
     * @param    int    $blog_id    ID of the new blog.
     */
    public function activate_new_site($blog_id) {

        if (1 !== did_action('wpmu_new_blog')) {
            return;
        }

        switch_to_blog($blog_id);
        self::single_activate();
        restore_current_blog();
    }

    /**
     * Get all blog ids of blogs in the current network that are:
     * - not archived
     * - not spam
     * - not deleted
     *
     * @since    0.1
     *
     * @return   array|false    The blog ids, false if no matches.
     */
    private static function get_blog_ids() {

        global $wpdb;

        // get an array of blog ids
        $sql = "SELECT blog_id FROM $wpdb->blogs
      WHERE archived = '0' AND spam = '0'
      AND deleted = '0'";

        return $wpdb->get_col($sql);
    }

    /**
     * Fired for each blog when the plugin is activated.
     *
     * @since    0.1
     */
    private static function single_activate() {



    }

    /**
     * Fired for each blog when the plugin is deactivated.
     *
     * @since    0.1
     */
    private static function single_deactivate() {

        // @TODO: Define deactivation functionality here

    }

    /**
     * Load the plugin text domain for translation.
     *
     * @since    0.1
     */
    public function load_plugin_textdomain() {

        $domain = $this->plugin_slug;
        $locale = apply_filters('plugin_locale', get_locale() , $domain);

        load_textdomain($domain, trailingslashit(WP_LANG_DIR) . $domain . '/' . $domain . '-' . $locale . '.mo');
        load_plugin_textdomain($domain, FALSE, basename(plugin_dir_path(dirname(__FILE__))) . '/languages/');
    }

}
