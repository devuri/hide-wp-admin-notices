<?php
/**
 * @wordpress-plugin
 * Plugin Name:       Hide Admin Notice.
 * Plugin URI:        https://github.com/devuri
 * Description:       Hides admin notices in WordPress for non admin users.
 * Version:           0.0.1
 * Requires PHP:      5.6
 * Author:            Uriel Wilson
 * Author URI:        https://urielwilson.com
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

	// deny direct access.
	if ( ! defined( 'WPINC' ) ) {
		die;
	}

	/**
	 * Check if user can manage_options if not hide the notice.
	 *
	 * @link https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
	 * @link https://wordpress.org/support/article/roles-and-capabilities/
	 * @link https://gist.github.com/digisavvy/174a8a65accce24d9bc8c8f2441e9bdb
	 */
	add_action('admin_enqueue_scripts', function () {
		if ( ! current_user_can( 'manage_options' ) ) {
			echo '<style>.update-nag, .updated, .error, .is-dismissible { display: none; }</style>';
		}
	});
