<?php
/**
 * Partners.
 *
 * @package NewfoldLabs\WP\Module\Activation
 */

namespace NewfoldLabs\WP\Module\Activation;

use NewfoldLabs\WP\ModuleLoader\Container;
use NewfoldLabs\WP\Module\Activation\Partners\CreativeMail;
use NewfoldLabs\WP\Module\Activation\Partners\MonsterInsights;
use NewfoldLabs\WP\Module\Activation\Partners\OptinMonster;
use NewfoldLabs\WP\Module\Activation\Partners\WpForms;

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
			update_option( 'nfd_module_activation_fresh_install', true );
		} else {
			update_option( 'nfd_module_activation_fresh_install', false );
		}

		$creativeMail   = new CreativeMail();
		$optinMonster   = new OptinMonster();
		$WpForms        = new WpForms();
		$monsterInsight = new MonsterInsights();

		$creativeMail->init();
		$optinMonster->init();
		$WpForms->init();
		$monsterInsight->init();
	}
}
