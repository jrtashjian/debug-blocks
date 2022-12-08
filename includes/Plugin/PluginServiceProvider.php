<?php
/**
 * The PluginServiceProvider class.
 *
 * @package DebugBlocks
 */

namespace DebugBlocks\Plugin;

use DebugBlocks\ServiceProvider;

/**
 * The PluginServiceProvider class.
 */
class PluginServiceProvider extends ServiceProvider {

	/**
	 * This method will be used for hooking into WordPress with actions/filters.
	 */
	public function boot() {
		add_action( 'admin_enqueue_scripts', array( $this, 'registerScripts' ) );

		add_action(
			'admin_menu',
			function () {
				add_menu_page(
					esc_html__( 'DebugBlocks', 'debugblocks' ),
					esc_html__( 'DebugBlocks', 'debugblocks' ),
					'manage_options',
					'debugblocks',
					function () {
						?>
						<div id="debugblocks" class="hide-if-no-js"></div>

						<?php // JavaScript is disabled. ?>
						<div class="wrap hide-if-js">
							<h1 class="wp-heading-inline">DebugBlocks</h1>
							<div class="notice notice-error notice-alt">
								<p><?php esc_html_e( 'DebugBlocks requires JavaScript. Please enable JavaScript in your browser settings.', 'debugblocks' ); ?></p>
							</div>
						</div>
						<?php
					},
					'',
					2
				);
			}
		);
	}

	/**
	 * Enqueue required scripts and styles.
	 */
	public function registerScripts() {
		$current_screen = get_current_screen();

		if ( 'toplevel_page_debugblocks' !== $current_screen->base ) {
			return;
		}

		// Prevent default hooks rendering content to the page.
		remove_all_actions( 'network_admin_notices' );
		remove_all_actions( 'user_admin_notices' );
		remove_all_actions( 'admin_notices' );
		remove_all_actions( 'all_admin_notices' );

		$asset_loader = $this->app->makeWith(
			Asset::class,
			array( 'handle' => strtolower( str_replace( '\\', '-', __NAMESPACE__ ) ) )
		);

		$asset_loader->setPackageName( strtolower( basename( __DIR__ ) ) );
		$asset_loader->enqueueScript();
		$asset_loader->enqueueStyle();

		$init_script = <<<JS
		( function() {
			window._loadDebugBlocks = new Promise( function( resolve ) {
				wp.domReady( function() {
					resolve( debugblocks.plugin.initialize( 'debugblocks', %s ) );
				} );
			} );
		} )();
		JS;

		$script = sprintf(
			$init_script,
			wp_json_encode( array() )
		);
		wp_add_inline_script( $asset_loader->getHandle(), $script );
	}
}
