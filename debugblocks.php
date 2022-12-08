<?php
/**
 * Plugin Name: DebugBlocks
 * Plugin URI: https://jrtashjian.com
 * Description: DebugBlocks Plugin Description.
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: JR Tashjian
 * Author URI: https://jrtashjian.com
 * Text Domain: debugblocks
 * Domain Path: /languages
 *
 * Copyright 2019-2022 JR Tashjian
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see <http://www.gnu.org/licenses/>.
 *
 * @package DebugBlocks
 */

defined( 'ABSPATH' ) || exit;

// Guard the plugin from initializing more than once.
if ( class_exists( \DebugBlocks\Application::class ) ) {
	return;
}

require_once dirname( __FILE__ ) . '/vendor/autoload.php';

/**
 * Create and retrieve the main application container instance.
 *
 * @return Application The application container.
 */
function debugblocks() {
	return \DebugBlocks\Application::getInstance();
}

debugblocks()->setBasePath( __FILE__ );

/**
 * Service Providers.
 */
debugblocks()->register( \DebugBlocks\Plugin\PluginServiceProvider::class );
debugblocks()->register( \DebugBlocks\BlockLibrary\BlockLibraryServiceProvider::class );

register_deactivation_hook( __FILE__, array( debugblocks(), 'deactivation' ) );

// Boot the plugin.
add_action( 'plugins_loaded', array( debugblocks(), 'boot' ) );
add_action( 'plugins_loaded', array( debugblocks(), 'loadTextDomain' ) );
