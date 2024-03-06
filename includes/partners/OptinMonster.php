<?php
/**
 * Optin Monster.
 *
 * @package NewfoldLabs\WP\Module\Activation
 */

namespace NewfoldLabs\WP\Module\Activation\Partners;

class OptinMonster {

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
		update_option( 'optin_monster_api_activation_redirect_disabled', true );
	}

	/**
	 * Dismiss default admin notice.
	 * 
	 * Optin Monster uses 'dismissed_wp_pointers' option in the user meta to store dismissed notices.
	 *
	 * @return void
	 */
	private static function dismiss_admin_notice() {
		$user_id = get_current_user_id();

		if ( $user_id > 0 ) {
			$pointer = 'omapi_please_connect_notice';
			$dismissed_pointers = array_filter( explode( ',', ( string ) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) ) );

			if ( ! in_array( $pointer, $dismissed_pointers ) ) {
				$dismissed_pointers[] = $pointer;
				$dismissed_pointers = implode( ',', $dismissed_pointers );

				update_user_meta( get_current_user_id(), 'dismissed_wp_pointers', $dismissed_pointers );
			}
		}
	}
}
