<?php
/**
 * The ServiceProvider class.
 *
 * @package DebugBlocks
 */

namespace DebugBlocks;

/**
 * The ServiceProvider class.
 */
abstract class ServiceProvider {
	/**
	 * The application instance.
	 *
	 * @var \DebugBlocks\Application
	 */
	protected $app;

	/**
	 * Create a new service provider instance.
	 *
	 * @param \DebugBlocks\Application $app The Application.
	 */
	public function __construct( $app ) {
		$this->app = $app;
	}

	/**
	 * Register any application services.
	 */
	public function register() {}
}
