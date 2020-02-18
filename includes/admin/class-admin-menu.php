<?php

/**
 * Class Admin_Menu
 */
class Admin_Menu {
	/**
	 * Admin_Menu constructor.
	 */
    public function __construct() {
    	add_action( 'admin_menu', [$this, 'add_admin_menu_page'] );
    	add_action( 'admin_init', [$this, 'save_real_time_settings'] );
    }

	/**
	 * Add menu page
	 *
	 * @return void
	 */
    public function add_admin_menu_page() {
    	add_menu_page( __('Real Time', 'wp-real-time'), __('Real Time', 'wp-real-time'), 'manage_options', 'real-time', [$this, 'get_menu_page'], 'dashicons-admin-site-alt3' );
    }

	/**
	 * Get admin menu page view
     * @return void
	 */
    public function get_menu_page() {
        require_once WPRT_VIEWS . '/real-time-settings.php';
    }

	/**
	 * Save real time settings
	 * @return void
	 */
    public function save_real_time_settings() {
    	$nonce = isset( $_POST['_wpnonce'] ) ? sanitize_text_field( $_POST['_wpnonce'] ) : '';
    	if ( ! wp_verify_nonce( $nonce, 'wp_real_time_settings' ) ) {
			return;
	    }

    	$app_id = isset( $_POST['pusher-app-id'] ) ? sanitize_text_field( $_POST['pusher-app-id'] ) : '';
    	$app_key = isset( $_POST['pusher-app-key'] ) ? sanitize_text_field( $_POST['pusher-app-key'] ) : '';
    	$app_secret = isset( $_POST['pusher-app-secret'] ) ? sanitize_text_field( $_POST['pusher-app-secret'] ) : '';
    	$app_cluster = isset( $_POST['pusher-app-cluster'] ) ? sanitize_text_field( $_POST['pusher-app-cluster'] ) : '';

    	$data = [
    	    'app_id'    =>  $app_id,
		    'app_key'   =>  $app_key,
		    'app_secret'    =>  $app_secret,
		    'app_cluster'   =>  $app_cluster
	    ];

    	update_option( 'wp_real_time_settings',  $data );
    }
}