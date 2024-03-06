<?php
/**
 * Partner.
 *
 * @package NewfoldLabs\WP\Module\Activation
 */

namespace NewfoldLabs\WP\Module\Activation;

use CreativeMail\CreativeMail as CreativeMailCreativeMail;
use NewfoldLabs\WP\ModuleLoader\Container;
use NewfoldLabs\WP\Module\Activation\Partners\CreativeMail;
use NewfoldLabs\WP\Module\Activation\Partners\MonsterInsights;
use NewfoldLabs\WP\Module\Activation\Partners\OptinMonster;
use NewfoldLabs\WP\Module\Activation\Partners\Wpforms;

/**
 * Partner class.
 */
class Partners {

	/**
	 * Dependency injection container.
	 *
	 * @var Container
	 */
	protected $container;

	/**
	 * Constructor.
	 *
	 * @param Container $container The plugin container.
	 */
	public function __construct( Container $container ) {
		$this->container = $container;

		$isFreshInstall = $container->has( 'isFreshInstallation' ) ? $container->get( 'isFreshInstallation' ) : false;
		if ( $isFreshInstall ) {
			CreativeMail::init();
			OptinMonster::init();
			Wpforms::init();
		}

		MonsterInsights::init();
	}
}
