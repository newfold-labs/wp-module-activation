<?php
/**
 * Creative Mail.
 *
 * @package NewfoldLabs\WP\Module\Activation
 */

namespace NewfoldLabs\WP\Module\Activation\Partners;

class CreativeMail {

	/**
	 * Initialize.
	 *
	 * @return void
	 */
	public static function init() {
		self::disable_redirect();
		self::dismiss_admin_notice();
	}

	/**
	 * Disable plugin activation redirect.
	 *
	 * @return void
	 */
	private static function disable_redirect() {
		update_option( 'ce4wp_activation_redirect', false );
	}

	/**
	 * Dismiss default admin notice.
	 *
	 * @return void
	 */
	private static function dismiss_admin_notice() {
		update_option( 'ce4wp_hide_banner:get_started' , true );
	}
}
