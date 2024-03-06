<?php
/**
 * WP Forms.
 *
 * @package NewfoldLabs\WP\Module\Activation
 */

namespace NewfoldLabs\WP\Module\Activation\Partners;

class Wpforms {

	/**
	 * Initialize.
	 *
	 * @return void
	 */
	public static function init() {
		self::disable_redirect();
	}

	/**
	 * Disable plugin activation redirect.
	 *
	 * @return void
	 */
	private static function disable_redirect() {
		// disable redirect
		update_option( 'wpforms_activation_redirect', true );
	}
}
