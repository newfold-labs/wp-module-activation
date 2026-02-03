<?php

namespace NewfoldLabs\WP\Module\Activation;

/**
 * Partners wpunit tests.
 *
 * @coversDefaultClass \NewfoldLabs\WP\Module\Activation\Partners
 */
class PartnersWPUnitTest extends \lucatume\WPBrowser\TestCase\WPTestCase {

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
	 * Fresh install option name is consistent.
	 *
	 * @return void
	 */
	public function test_fresh_install_option_name() {
		$option = 'nfd_module_activation_fresh_install';
		update_option( $option, true );
		$this->assertTrue( get_option( $option ) );
		delete_option( $option );
		$this->assertFalse( get_option( $option ) );
	}

	/**
	 * is_fresh_install updates option when container says fresh install.
	 *
	 * @return void
	 */
	public function test_is_fresh_install_updates_option_to_true() {
		if ( ! class_exists( \NewfoldLabs\WP\ModuleLoader\Container::class ) ) {
			$this->markTestSkipped( 'Container not available (e.g. when module tested in isolation)' );
		}
		update_option( 'nfd_module_activation_fresh_install', false );

		$container = $this->createMock( \NewfoldLabs\WP\ModuleLoader\Container::class );
		$container->method( 'has' )->with( 'isFreshInstallation' )->willReturn( true );
		$container->method( 'get' )->with( 'isFreshInstallation' )->willReturn( true );

		$partners = new Partners( $container );
		$partners->is_fresh_install();

		$this->assertTrue( get_option( 'nfd_module_activation_fresh_install' ) );
	}

	/**
	 * is_fresh_install updates option to false when container says not fresh install.
	 *
	 * @return void
	 */
	public function test_is_fresh_install_updates_option_to_false() {
		if ( ! class_exists( \NewfoldLabs\WP\ModuleLoader\Container::class ) ) {
			$this->markTestSkipped( 'Container not available (e.g. when module tested in isolation)' );
		}
		update_option( 'nfd_module_activation_fresh_install', true );

		$container = $this->createMock( \NewfoldLabs\WP\ModuleLoader\Container::class );
		$container->method( 'has' )->with( 'isFreshInstallation' )->willReturn( true );
		$container->method( 'get' )->with( 'isFreshInstallation' )->willReturn( false );

		$partners = new Partners( $container );
		$partners->is_fresh_install();

		$this->assertFalse( get_option( 'nfd_module_activation_fresh_install' ) );
	}
}
