<?php
/**
 * WP Forms.
 *
 * @package NewfoldLabs\WP\Module\Activation
 */

namespace NewfoldLabs\WP\Module\Activation\Partners;

/**
 * WP Forms class.
 */
class WpForms extends Partner {

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
	}

	/**
	 * Disable plugin activation redirect.
	 *
	 * @return void
	 */
	private function disable_redirect() {
		update_option( 'wpforms_activation_redirect', true );
	}

	/**
	 * Enable plugin activation redirect.
	 *
	 * @return void
	 */
	private function enable_redirect() {
		$current_value = get_option( 'wpforms_activation_redirect', 'none_set' );
		// If the option is false or 'none_set', do nothing.
		if ( ! $current_value || 'none_set' === $current_value ) {
			return;
		}

		delete_option( 'wpforms_activation_redirect' );
	}
}
