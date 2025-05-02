<?php
/**
 * Yoast.
 *
 * @package NewfoldLabs\WP\Module\Activation
 */

namespace NewfoldLabs\WP\Module\Activation\Partners;

/**
 * Yoast class.
 */
class Yoast extends Partner {

	/**
	 * Initialize.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'admin_init', array( $this, 'disable_notice' ) );
		add_action( 'admin_init', array( $this, 'disable_onboarding_redirect' ) );
	}

	/**
	 * Dismiss admin notice for Yoast onboarding.
	 *
	 * @return void
	 */
	public function disable_notice() {
		if ( class_exists( 'WPSEO_Options' ) ) {
			// Dismiss admin notice
			\WPSEO_Options::set( 'dismiss_configuration_workout_notice', true );
		}
	}

	/**
	 * Disable redirect to Yoast onboarding.
	 *
	 * @return void
	 */
	public function disable_onboarding_redirect() {
		if ( class_exists( 'WPSEO_Options' ) ) {
			// Disable redirect to Yoast onboarding
			\WPSEO_Options::set( 'should_redirect_after_install_free', false );
		}
	}
}
