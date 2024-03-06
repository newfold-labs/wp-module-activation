<?php
/**
 * Monster Insights.
 *
 * @package NewfoldLabs\WP\Module\Activation
 */

namespace NewfoldLabs\WP\Module\Activation\Partners;

class MonsterInsights {

	/**
	 * Initialize.
	 *
	 * @return void
	 */
	public static function init() {
		self::disable_redirect();
		self::dismiss_admin_notice();
	}

	/**
	 * Disable plugin activation redirect.
	 *
	 * @return void
	 */
	private static function disable_redirect() {
		add_filter('monsterinsights_enable_onboarding_wizard', function() {
			return false;
		});
	}

	/**
	 * Dismiss default admin notice.
	 * 
	 * The default admin notice is indismisible and doesn't have a data base option to dismiss it.
	 * Instead, Monster Insights decides to show it based on a series of logic checks.
	 * So, we have to unregister the admin notice action.
	 *
	 * @return void
	 */
	private static function dismiss_admin_notice() {
		remove_action('admin_notices', 'monsterinsights_admin_setup_notices');
	}
}
