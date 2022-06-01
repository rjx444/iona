<?php
/**
 * This class holds all the functions related to public side of the website that are catered by the plugin
 */

 class Iona_Plugin_Public {

     public function __construct() {

     }

    /**
     * This will register all the styles for the public side
     */
    public function enqueue_styles() {
        wp_enqueue_style( IONA_PLUGIN_NAME, IONA_PLUGIN_URL . 'public/assets/css/iona-plugin-core.css', array(), IONA_PLUGIN_VERSION, 'all' );
    }

    /**
     * This will register all the javascripts for the public side
     */
    public function enqueue_scripts() {
        wp_enqueue_script( IONA_PLUGIN_NAME, IONA_PLUGIN_URL . 'public/assets/js/iona-plugin-core.js', array( 'jquery' ), IONA_PLUGIN_VERSION, false );
        
        $pluginNameUnderScore = str_replace( "-", "_", IONA_PLUGIN_NAME);

        $localizedData = array(
			'plugin_name'	=> IONA_PLUGIN_NAME,
			'nonce'	=> wp_create_nonce( IONA_PLUGIN_NAME.'_nonce' ),
			'home_url' => home_url(),
			'breeds_api_url' => 'https://api.thecatapi.com/v1/breeds',
			'breed_search_url' => 'https://api.thecatapi.com/v1/images/search',
		);

		wp_localize_script( IONA_PLUGIN_NAME, $pluginNameUnderScore.'_localized', $localizedData );
    }

    /**
     * This loads the custom template that will be used for the frontpage
     */
    public function load_custom_frontend($template) {
       if ( is_home() || is_front_page() ) {
           if( isset( $_GET['single'] ) ) {
                $data = @file_get_contents("https://api.thecatapi.com/v1/images/".$_GET['single']);
                
                if($data === FALSE) {
                    $breedInfo = null;
                } else {
                    $breedInfo = json_decode($data);
                }

                include_once IONA_PLUGIN_BASE_DIR . 'templates/single.php';
                exit;
           } else {
                return IONA_PLUGIN_BASE_DIR . 'templates/frontpage.php';
           }
       }

       return $template;
   }
 }