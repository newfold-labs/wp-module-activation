<?php

namespace NewfoldLabs\WP\Module\Activation;

use NewfoldLabs\WP\Module\Activation\Partners\Partner;

/**
 * Partner wpunit tests.
 *
 * @coversDefaultClass \NewfoldLabs\WP\Module\Activation\Partners\Partner
 */
class PartnerWPUnitTest extends \lucatume\WPBrowser\TestCase\WPTestCase {

	/**
	 * Tear down after each test.
	 *
	 * @return void
	 */
	public function tearDown(): void {
		delete_option( 'nfd_module_activation_fresh_install' );
		parent::tearDown();
	}

	/**
	 * Partner sets is_fresh_install false when option is not set.
	 *
	 * @return void
	 */
	public function test_is_fresh_install_false_when_option_unset() {
		delete_option( 'nfd_module_activation_fresh_install' );
		$partner = new Partner();
		$this->assertFalse( $partner->is_fresh_install );
	}

	/**
	 * Partner sets is_fresh_install true when option is true.
	 *
	 * @return void
	 */
	public function test_is_fresh_install_true_when_option_set() {
		update_option( 'nfd_module_activation_fresh_install', true );
		$partner = new Partner();
		$this->assertTrue( $partner->is_fresh_install );
	}
}
