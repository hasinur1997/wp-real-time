<?php
/**
 * Get wp real time settings
 * @return array
 */
function wp_rt_get_option() {
    $wp_real_time_settings = get_option( 'wp_real_time_settings', true );

    return $wp_real_time_settings;
}

/**
 * Get app id
 *
 * @return mixed|string
 */
function wp_rt_get_app_id() {
	$settings = wp_rt_get_option();
	$app_id = isset( $settings['app_id'] ) ? $settings['app_id'] : '';

	return $app_id;
}

/**
 * Get app key
 *
 * @return mixed|string
 */
function wp_rt_get_app_key() {
	$settings = wp_rt_get_option();
	$app_key = isset( $settings['app_key'] ) ? $settings['app_key'] : '';

	return $app_key;
}

/**
 * Get app secret
 *
 * @return mixed|string
 */
function wp_rt_get_app_secret() {
	$settings = wp_rt_get_option();
	$app_secret = isset( $settings['app_secret'] ) ? $settings['app_secret'] : '';

	return $app_secret;
}

/**
 * Get app cluster
 *
 * @return mixed|string
 */
function wp_rt_get_app_cluster() {
	$settings = wp_rt_get_option();
	$app_cluster = isset( $settings['app_cluster'] ) ? $settings['app_cluster'] : '';

	return $app_cluster;
}