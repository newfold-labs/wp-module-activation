<?php
/**
 * Creative Mail.
 *
 * @package NewfoldLabs\WP\Module\Activation
 */

namespace NewfoldLabs\WP\Module\Activation\Partners;

class CreativeMail extends Partner {

	/**
	 * Initialize.
	 *
	 * @return void
	 */
	public function init() {
		if ( $this->isFreshInstall ) {
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
		update_option( 'ce4wp_activation_redirect', false );
	}

	/**
	 * Enable plugin activation redirect.
	 *
	 * @return void
	 */
	private function enable_redirect() {
		$current_value = get_option( 'ce4wp_activation_redirect', 'none_set' );
		// If the option is true or 'none_set', do nothing.
		if ( $current_value || 'none_set' === $current_value ) {
			return;
		}

		delete_option( 'ce4wp_activation_redirect' );
	}

	/**
	 * Dismiss default admin notice.
	 *
	 * @return void
	 */
	private function dismiss_admin_notice() {
		if ( ! get_option( 'ce4wp_hide_banner:get_started', false ) ) {
			update_option( 'ce4wp_hide_banner:get_started' , true );
		}
	}
}
