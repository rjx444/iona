<?php
/**
 * This class holds all the core functionalities of the plugin
 */

if( !class_exists( 'Iona_Plugin_Core' ) ) {
 class Iona_Plugin_Core {
    /**
     * Initialize the class
     */
    public function __construct() {
        
    }

    /**
     * This will register all the hooks and needed core functions
     */
    public function run() {
        $this->add_public_hooks();
    }

    /**
     * Register all the hooks for public side
     */
    public function add_public_hooks() {
        $plugin_public = new Iona_Plugin_Public();

        add_filter( 'template_include', array( $plugin_public, 'load_custom_frontend' ), 99 );
        add_action( 'wp_enqueue_scripts', array( $plugin_public, 'enqueue_styles' ) );
        add_action( 'wp_enqueue_scripts', array( $plugin_public, 'enqueue_scripts' ) );
    }
 }
}