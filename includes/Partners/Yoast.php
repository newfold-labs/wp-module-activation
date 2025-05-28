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
		// Remove dashboard-specific premium blocks
		add_filter( 'wpseo_premium_upgrade_admin_block', '__return_false' );
		add_filter( 'wpseo_remove_premium_upsell_admin_block', '__return_true' );
	}

	/**
	 * Dismiss promotional admin notices for Yoast that appear on dashboard.
	 *
	 * @return void
	 */
	public function disable_notice() {
		if ( class_exists( 'WPSEO_Options' ) ) {
			// Dismiss only dashboard-specific promotional notifications
			\WPSEO_Options::set( 'dismiss_premium_notices', true );
			\WPSEO_Options::set( 'dismiss_upsell_notice', true );
		}
	}
}
