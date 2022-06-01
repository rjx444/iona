<?php
/**
 * This is the core plugin class
 */

class Iona_Plugin {

    /**
     * This defines all the plugins core functionality
     * 
     * This will load the dependencies and all the needed hooks for admin and public side inside the wordpress site
     */
    public function __construct() {
        $this->load_dependencies();
    }

    /**
     * Load all required dependencies for the plugin
     */
    public function load_dependencies() {
        /**
         * The class that holds all the core functionalities for the plugin including action and filters needed
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-iona-plugin-core.php';

        /**
		 * The class that defines all actions that occur in the public side of the site.		  
		 */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-iona-plugin-public.php';
    }

    /**
     * Executes all the hooks from core class
     */
    public function run() {
        $core = new Iona_Plugin_Core();
        $core->run();
    }
}