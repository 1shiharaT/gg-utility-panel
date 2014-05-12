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
 * @package UtilityPanelType
 * @author  ishihara takashi <akeome1369@gmail.com>
 */
class UtilityPanelType
{

    /**
     * Instance of this class.
     *
     * @since    0.0.1
     * @var      object
     */
    protected static $instance                  = null;

    /**
     * Slug of the plugin screen.
     *
     * @since    0.0.1
     * @var      string
     */
    protected $plugin_screen_hook_suffix = null;

    /**
     * panel module type
     * @since 0.0.1
     */
    protected $panel_type = array();

    /**
     * Initialize the plugin by loading admin scripts & styles and adding a
     * settings page and menu.
     *
     * @since     0.0.1
     */
    private function __construct() {
        $this->panel_type  = $this->get_panel_type();
    }

    /**
     * Return an instance of this class.
     *
     * @since     0.0.1
     * @return    object    A single instance of this class.
     */
    public static function get_instance() {

        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * panel pane module get
     *
     * @since    0.0.1
     * @param (array) $args
     * @return  (array) $panel_type
     */
    public function get_panel_type() {
      $type = $this->add_panel_module_add();
      return $type;
    }

    /**
     * add add module
     *
     * @since    0.0.1
     * @param (array) $args
     * @return  (array) $panel_type
     */
    public function add_panel_module_add( $args = array() ) {
      global $post;

      $post_type_names = get_post_types( array(
         'public'   => true,
      ) , 'objects' );
      foreach ( $post_type_names as $key => $post_type_name ) {
        $post_type["new_" . $key] = array(
          'url'   => admin_url( "post-new.php?post_type=" . $key ),
          'label' => $post_type_name->labels->add_new,
          'class' => $post_type_name->labels->name,
        );
      }

      $taxonomy_names = get_taxonomies();

      foreach ( $taxonomy_names as $key => $taxonomy_name ) {
        $taxonomy["new_" . $taxonomy_name ] = admin_url( "edit-tags.php?taxonomy=" . $taxonomy_name );
      }

      $panel_modules = array(
        'add' => array_merge( $post_type , $taxonomy ),
      );

      return $panel_modules ;
    }

    /**
     * add design module
     *
     * @since    0.0.1
     * @param (array) $args
     * @return  (array) $panel_type
     */
    public function add_panel_module_desgin( $args=array() ) {
      $panel_modules = array(
        'design' => array(
          'themes'    => '',
          'widgets'   => '',
          'nav_menus' => '',
        ),
      );
      return $panel_modules ;
    }

    /**
     * add manege module
     *
     * @since    0.0.1
     * @param (array) $args
     * @return  (array) $panel_type
     */
    public function add_panel_module_manege( $args=array() ) {
      $panel_modules  = array(
        'manege' => array(
          'edit_comments' => '',
          'users' => '',
          'option_general' => '',
          'plugins' => '',
         ),
      );
      return $panel_modules;
    }

    /**
     * save option
     *
     * @since    0.0.1
     * @param (array) $args
     * @param (string) $key
     * @return  (bool)
     */
    public function save_option( $key , $args=array() ) {
      $update = false ;
      if ( '' !== get_option( $key ) ||
           $args != get_option( $key ) ) {
        add_option( $key , $value = '', $deprecated = '', $autoload = 'yes' );
        $update = update_option( $key , $args );
      }
      return $update;
    }
}
