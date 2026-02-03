<?php

namespace NewfoldLabs\WP\Module\Activation;

use NewfoldLabs\WP\Module\Activation\Partners\Partner;
use NewfoldLabs\WP\Module\Activation\Partners\Akismet;

/**
 * Module loading wpunit tests.
 *
 * @coversDefaultClass \NewfoldLabs\WP\Module\Activation\Activation
 */
class ModuleLoadingWPUnitTest extends \lucatume\WPBrowser\TestCase\WPTestCase {

	/**
	 * Verify core module classes exist.
	 *
	 * @return void
	 */
	public function test_module_classes_load() {
		$this->assertTrue( class_exists( Activation::class ) );
		$this->assertTrue( class_exists( Partners::class ) );
		$this->assertTrue( class_exists( Partner::class ) );
		$this->assertTrue( class_exists( Akismet::class ) );
		$this->assertTrue( class_exists( Partners\WpForms::class ) );
		$this->assertTrue( class_exists( Partners\Jetpack::class ) );
		$this->assertTrue( class_exists( Partners\Yoast::class ) );
	}

	/**
	 * Verify WordPress factory is available.
	 *
	 * @return void
	 */
	public function test_wordpress_factory_available() {
		$this->assertTrue( function_exists( 'get_option' ) );
		$this->assertNotEmpty( get_option( 'blogname' ) );
	}
}
