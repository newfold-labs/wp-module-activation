<?php

namespace NewfoldLabs\WP\Module\Activation;

use NewfoldLabs\WP\Module\Activation\Partners\WpForms;

/**
 * WP Forms partner wpunit tests.
 *
 * @coversDefaultClass \NewfoldLabs\WP\Module\Activation\Partners\WpForms
 */
class WpFormsWPUnitTest extends \lucatume\WPBrowser\TestCase\WPTestCase {

	/**
	 * Tear down after each test.
	 *
	 * @return void
	 */
	public function tearDown(): void {
		remove_filter( 'wpforms_setup_wizard_setup_wizard_is_disabled', '__return_true' );
		delete_option( 'wpforms_activation_redirect' );
		parent::tearDown();
	}

	/**
	 * Init opts out of the Setup Wizard so our onboarding experience is used.
	 *
	 * @return void
	 */
	public function test_init_disables_setup_wizard() {
		$wp_forms = new WpForms();
		$wp_forms->init();

		$this->assertTrue(
			(bool) apply_filters( 'wpforms_setup_wizard_setup_wizard_is_disabled', false )
		);
	}

	/**
	 * Init still disables the legacy activation redirect.
	 *
	 * @return void
	 */
	public function test_init_disables_activation_redirect() {
		delete_option( 'wpforms_activation_redirect' );

		$wp_forms = new WpForms();
		$wp_forms->init();

		$this->assertTrue( get_option( 'wpforms_activation_redirect' ) );
	}
}
