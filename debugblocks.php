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

/**
 * Registers the plugin script.
 */
function debugblocks_init() {
	$asset_file = include plugin_dir_path( __FILE__ ) . 'build/index.asset.php';

	wp_register_script(
		'debug-blocks',
		plugin_dir_url( __FILE__ ) . 'build/index.js',
		$asset_file['dependencies'],
		$asset_file['version'],
		false
	);

	load_plugin_textdomain( 'debug-blocks', false, plugin_dir_path( __FILE__ ) . 'languages' );
}

/**
 * Enqueues the plugin script.
 */
function debugblocks_enqueue_scripts() {
	wp_enqueue_script( 'debug-blocks' );
}

add_action( 'init', 'debugblocks_init' );
add_action( 'enqueue_block_editor_assets', 'debugblocks_enqueue_scripts' );
