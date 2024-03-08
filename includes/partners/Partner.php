<?php
/**
 * Creative Mail.
 *
 * @package NewfoldLabs\WP\Module\Activation
 */

namespace NewfoldLabs\WP\Module\Activation\Partners;

class Partner {

	/**
	 * Is fresh installation.
	 *
	 * @var Boolean
	 */
	public $isFreshInstall;

	/**
	 * Constructor.
	 * 
	 * @return void
	 */
	public function __construct() {
		if ( get_option( 'nfd_module_activation_fresh_install', false ) ) {
			$this->isFreshInstall = true;
		} else {
			$this->isFreshInstall = false;
		}
	}
}