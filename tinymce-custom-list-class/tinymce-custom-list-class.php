<?php
/**
 * Plugin Name: TinyMCE Custom List Class
 * Version: 1.0
 * Description: A simple TinyMCE Plugin to add a custom list class in the Visual Editor
 */

class TinyMCE_Custom_List_Class {


    function __construct() {
        if ( is_admin() ) {
            add_action( 'init', array(  $this, 'setup_tinymce_plugin' ) );
        }
    }
    function setup_tinymce_plugin() {


        if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
            return;
        }

        if ( get_user_option( 'rich_editing' ) !== 'true' ) {
            return;
        }

        add_filter( 'mce_external_plugins', array( &$this, 'add_tinymce_plugin' ) );
        add_filter( 'mce_buttons', array( &$this, 'add_tinymce_toolbar_button' ) );


    }

    /**
     * Adds a TinyMCE plugin compatible JS file to the TinyMCE / Visual Editor instance
     *
     * @param array $plugin_array Array of registered TinyMCE Plugins
     * @return array Modified array of registered TinyMCE Plugins
     */
    function add_tinymce_plugin( $plugin_array ) {

        $plugin_array['custom_list_class'] = plugin_dir_url( __FILE__ ) . 'tinymce-custom-list-class.js';
        return $plugin_array;

    }

    /**
     * Adds a button to the TinyMCE / Visual Editor which the user can click
     * to insert a list with a custom CSS class.
     *
     * @param array $buttons Array of registered TinyMCE Buttons
     * @return array Modified array of registered TinyMCE Buttons
     */
    function add_tinymce_toolbar_button( $buttons ) {

        array_push( $buttons, '|', 'custom_list_class' );
        array_push( $buttons, 'custom_list_class1' ,'|');
        return $buttons;
    }
}

$tinymce_custom_list_class = new TinyMCE_Custom_List_Class;