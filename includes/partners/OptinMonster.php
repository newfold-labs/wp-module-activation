<?php
/**
 * Optin Monster.
 *
 * @package NewfoldLabs\WP\Module\Activation
 */

namespace NewfoldLabs\WP\Module\Activation\Partners;

/**
 * Optin Monster class.
 */
class OptinMonster extends Partner {

	/**
	 * Initialize.
	 *
	 * @return void
	 */
	public function init() {
		if ( $this->is_fresh_install ) {
			$this->disable_redirect();
		} else {
			$this->enable_redirect();
		}

		$this->dismiss_admin_notice();
	}

	/**
	 * Disable plugin activation redirect.
	 *
	 * @return void
	 */
	private function disable_redirect() {
		update_option( 'optin_monster_api_activation_redirect_disabled', true );
	}

	/**
	 * Enable plugin activation redirect.
	 *
	 * @return void
	 */
	private function enable_redirect() {
		$current_value = get_option( 'optin_monster_api_activation_redirect_disabled', 'none_set' );
		// If the option is false or 'none_set', do nothing.
		if ( ! $current_value || 'none_set' === $current_value ) {
			return;
		}

		delete_option( 'optin_monster_api_activation_redirect_disabled' );
	}

	/**
	 * Dismiss default admin notice.
	 *
	 * Optin Monster uses 'dismissed_wp_pointers' option in the user meta to store dismissed notices.
	 *
	 * @return void
	 */
	private function dismiss_admin_notice() {
		$user_id = get_current_user_id();

		if ( $user_id > 0 ) {
			$notice_pointer     = 'omapi_please_connect_notice';
			$dismissed_pointers = array_filter( explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) ) );

			if ( ! in_array( $notice_pointer, $dismissed_pointers ) ) {
				$dismissed_pointers[] = $notice_pointer;
				$dismissed_pointers   = implode( ',', $dismissed_pointers );

				update_user_meta( $user_id, 'dismissed_wp_pointers', $dismissed_pointers );
			}
		}
	}
}
