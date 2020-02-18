<?php
/**
 * Plugin Name: WP Real Time
 * Plugin URI: https://hasinur.me/wp/plugins/wp-real-time
 * Description: A real time notification for WordPress based application.
 * Version: 1.0
 * Author: Hasinur Rahman
 * Author URI: https://hasinur.me
 * Text Domain: wp-real-time
 * Domain Path: /i18n/languages/
 *
 * @package WooCommerce
 */

if ( ! defined('ABSPATH') ) {
	return;
}

/**
 * Class WP_Real_Time
 */
class WP_Real_Time {
	/**
	 * @var
	 */
	private static $instance;

	/**
	 * Constructor for WP_Real_Time class
	 */
	public function __construct() {
		$this->define_constants();
		$this->includes();
		$this->init_hooks();
		$this->init_classes();
	}

	/**
	 * Instantiate the class
	 *
	 * @return WP_Real_Time
	 */
	public static function init() {
		if ( ! isset(self::$instance) ) {
			self::$instance = new WP_Real_Time();
		}

		return self::$instance;
	}

	/**
	 * Define constants
	 *
	 * @return void
	 */
	public function define_constants() {
//		define( 'WPRT_VERSION', $this->version );
		define( 'WPRT_FILE', __FILE__ );
		define( 'WPRT_PATH', dirname( WPRT_FILE ) );
		define( 'WPRT_INCLUDES', WPRT_PATH . '/includes' );
		define( 'WPRT_MODULES', WPRT_PATH . '/modules' );
		define( 'WPRT_URL', plugins_url( '', WPRT_FILE ) );
		define( 'WPRT_ASSETS', WPRT_URL . '/assets' );
		define( 'WPRT_VIEWS', WPRT_INCLUDES . '/admin/views' );
	}

	/**
	 * Initiate classes
	 *
	 * @return void
	 */
	public function init_classes() {
		new Admin_Menu();
	}
	public function init_hooks() {
		add_action('admin_enqueue_scripts', [ $this, 'wp_enqueue_scripts' ] );
		add_action('admin_init', [$this, 'init_test_event'] );
	}

	/**
	 * Includes all require files
	 *
	 * @return void
	 */
	public function includes () {
		require_once  WPRT_PATH . '/vendor/autoload.php';
//		require_once  WPRT_INCLUDES . '/events/class-event.php';
//		require_once  WPRT_INCLUDES . '/events/class-test-event.php';
//		require_once  WPRT_INCLUDES . '/admin/class-admin-menu.php';
//		require_once  WPRT_INCLUDES . '/functions.php';
	}

	/**
	 * Enqueue scripts
	 *
	 * @return void
	 */
	public function wp_enqueue_scripts() {
		// Enqueue style
		wp_enqueue_style( 'toastr-css', WPRT_ASSETS . '/css/toastr.min.css', array(), time(), 'all' );

		// Enqueue Scripts
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'pusher-script', 'https://js.pusher.com/5.0/pusher.min.js', array(), time(), false);
		wp_enqueue_script( 'toastr-script', WPRT_ASSETS . '/js/toastr.min.js', array(), time(), false );
		wp_enqueue_script( 'test-script', WPRT_ASSETS . '/js/script.js', array( 'jquery', 'pusher-script', 'toastr-script'),
			time(), false);

		wp_localize_script('test-script', 'wpRealTime', [
			'pusher'    =>  [
				'app_id'    =>  wp_rt_get_app_id(),
				'app_key'    =>  wp_rt_get_app_key(),
				'app_secret'    =>  wp_rt_get_app_secret(),
				'app_cluster'    =>  wp_rt_get_app_cluster(),
			]
		]);

	}

	public function init_test_event() {
		$message = "This is test message !";
		new Test_Event($message);
	}
}

function wp_real_time() {
	return WP_Real_Time::init();
}

wp_real_time();