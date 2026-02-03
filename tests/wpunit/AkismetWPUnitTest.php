<?php

namespace NewfoldLabs\WP\Module\Activation;

use NewfoldLabs\WP\Module\Activation\Partners\Akismet;

/**
 * Akismet partner wpunit tests.
 *
 * @coversDefaultClass \NewfoldLabs\WP\Module\Activation\Partners\Akismet
 */
class AkismetWPUnitTest extends \lucatume\WPBrowser\TestCase\WPTestCase {

	/**
	 * Tear down after each test.
	 *
	 * @return void
	 */
	public function tearDown(): void {
		delete_option( 'Activated_Akismet' );
		parent::tearDown();
	}

	/**
	 * Disable_redirect removes Activated_Akismet option when set.
	 *
	 * @return void
	 */
	public function test_disable_redirect_deletes_activation_option() {
		update_option( 'Activated_Akismet', true );
		$this->assertNotFalse( get_option( 'Activated_Akismet' ) );

		$akismet = new Akismet();
		$akismet->disable_redirect();

		$this->assertFalse( get_option( 'Activated_Akismet' ) );
	}

	/**
	 * Disable_redirect does nothing when option not set.
	 *
	 * @return void
	 */
	public function test_disable_redirect_when_option_not_set() {
		delete_option( 'Activated_Akismet' );
		$akismet = new Akismet();
		$akismet->disable_redirect();
		$this->assertFalse( get_option( 'Activated_Akismet' ) );
	}
}
