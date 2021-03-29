<?php
/**
 * Plugin Dependency.
 *
 * The purpose of the following hooks is to mimic the behavior of something
 * called 'plugin dependency' which enables a plugin to have plugins of their
 * own in a safe and reliable way.
 *
 * Mirroring existing WordPress hooks in many places allowing dependant plugins
 * to hook into the plugin specific ones, thus guaranteeing proper code execution
 * only when this plugin is active.
 *
 * The following functions are wrappers for hooks, allowing them to be
 * manually called and/or piggy-backed on top of other hooks if needed.
 *
 * PHP version 7.4.1
 *
 * @package   GnistEngine
 * @author    The Gnist Coding Team <devs@gnistdesign.no>
 * @copyright 2020 Gnist Design AS
 * @license   MIT
 * @link      https://gnistdesign.no
 * @since     1.0.0
 * @version   1.0.2
 *
 * Copyright (c) 2020 Gnist Design AS
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

declare( strict_types = 1 );

namespace Gnist\Engine\WP;

defined( 'ABSPATH' ) || exit;

/** Activation / Deactivation *************************************************/

/**
 * This function is fired on the plugin activation hook.
 *
 * Usage: add_action( 'activate_{$basename}', 'Gnist\Engine\WP\activation' )
 *
 * * @hook gnist/activation
 *
 * @since 1.0.2
 */
function activation() {
	\do_action( 'gnist/activation' );
}

/**
 * This function is fired on the plugin deactivation hook.
 *
 * Usage: add_action( 'deactivate_{$basename}', 'Gnist\Engine\WP\deactivation' )
 *
 * * @hook gnist/deactivation
 *
 * @since 1.0.2
 */
function deactivation() {
	\do_action( 'gnist/deactivation' );
}

/** Main Actions **************************************************************/

/**
 * Fires once activated plugins have loaded.
 *
 * Main action responsible for defining constants, globals, and includes.
 *
 * * @hook gnist/loaded
 * * @hooked plugins_loaded
 *
 * @link https://developer.wordpress.org/reference/hooks/plugins_loaded/
 */
function loaded() {
	\do_action( 'gnist/loaded' );
}

/**
 * Fires after WordPress has finished loading but before any headers are sent.
 *
 * Main action responsible for initializing methods etc.
 *
 * * @hook gnist/init
 * * @hooked init
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 */
function init() {
	\do_action( 'gnist/init' );
}

/**
 * Fires after WordPress has finished loading but before any headers are sent.
 *
 * Main action responsible for executing actions usually hooked directly to init.
 *
 * * @hook gnist/actions
 * * @hooked init
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 */
function actions() {
	\do_action( 'gnist/actions' );
}

/**
 * Register custom post types.
 *
 * * @hook gnist/register/custom_post_type
 * * @hooked init
 *
 * @since 1.0.1 Hooked to init
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 */
function register_custom_post_type() {
	\do_action( 'gnist/register/custom_post_type' );
}

/**
 * Register taxonomy.
 *
 * * @hook gnist/register/taxonomy
 * * @hooked init
 *
 * @since 1.0.1 Hooked to init
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
function register_taxonomy() {
	\do_action( 'gnist/register/taxonomy' );
}

/**
 * Fires before the theme is loaded.
 *
 * * @hook gnist/setup_theme
 * * @hooked setup_theme
 *
 * @link https://developer.wordpress.org/reference/hooks/setup_theme/
 */
function setup_theme() {
	\do_action( 'gnist/setup_theme' );
}

/**
 * Fires after the theme is loaded.
 *
 * This hook is called during each page load, after the theme is initialized.
 * It is generally used to perform basic setup, registration, and init actions for a theme.
 *
 * * @hook gnist/after/setup_theme
 * * @hooked after_setup_theme
 *
 * @link https://developer.wordpress.org/reference/hooks/after_setup_theme/
 */
function after_setup_theme() {
	\do_action( 'gnist/after/setup_theme' );
}

/**
 * This hook is fired once WP, all plugins, and the theme are fully loaded and instantiated.
 *
 * * @hook gnist/wp_loaded
 * * @hooked wp_loaded
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_loaded/
 */
function wp_loaded() {
	\do_action( 'gnist/wp_loaded' );
}

/**
 * This hook is fired once the WordPress environment has been set up.
 *
 * * @hook gnist/wp
 * * @hooked wp
 *
 * @link https://developer.wordpress.org/reference/hooks/wp/
 *
 * @since 1.0.2
 */
function wp() {
	\do_action( 'gnist/wp' );
}

/** Admin Actions *************************************************************/

/**
 * Enqueue scripts for all admin pages.
 *
 * * @hook gnist/admin/scripts
 * * @hooked admin_enqueue_scripts
 *
 * @link https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
 *
 * @param string $hook_suffix Current admin page.
 */
function admin_enqueue_scripts( $hook_suffix ) {
	/**
	 * Allowed admin screens.
	 *
	 * Make sure scripts and styles only runs in allowed admin screens.
	 *
	 * * @hook gnist/admin/screens
	 *
	 * @var array $screens Allowed admin screens.
	 */
	$screens = \apply_filters( 'gnist/admin/screens', array() );

	/**
	 * Enqueue scripts and styles in admin.
	 *
	 * * @hook gnist/admin/scripts
	 *
	 * @param string $hook_suffix Current admin page.
	 * @param array  $screens     Allowed admin screens.
	 */
	\do_action( 'gnist/admin/scripts', $hook_suffix, $screens );
}

/**
 * Prints admin screen notices.
 *
 * * @hook gnist/admin/notices
 * * @hooked admin_notices
 *
 * @link https://developer.wordpress.org/reference/hooks/admin_notices/
 */
function admin_notices() {
	\do_action( 'gnist/admin/notices' );
}

/**
 * Fires as an admin screen or script is being initialized.
 *
 * * @hook gnist/admin/init
 * * @hooked admin_init
 *
 * @link https://developer.wordpress.org/reference/hooks/admin_init/
 */
function admin_init() {
	\do_action( 'gnist/admin/init' );
}

/**
 * Fires before the administration menu loads in the admin.
 *
 * * @hook gnist/admin/menu
 * * @hooked admin_menu
 *
 * @link https://developer.wordpress.org/reference/hooks/admin_menu/
 */
function admin_menu() {
	\do_action( 'gnist/admin/menu' );
}

/**
 * Fires in head section for all admin pages.
 *
 * * @hook gnist/admin/head
 * * @hooked admin_head
 *
 * @link https://developer.wordpress.org/reference/hooks/admin_head/
 */
function admin_head() {
	\do_action( 'gnist/admin/head' );
}

/** Public Actions ************************************************************/

/**
 * Fires when scripts and styles are enqueued.
 *
 * * @hook gnist/public/scripts
 * * @hooked wp_enqueue_scripts
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 */
function wp_enqueue_scripts() {
	\do_action( 'gnist/public/scripts' );
}

/**
 * Prints scripts or data in the head tag on the front end.
 *
 * * @hook gnist/wp/head
 * * @hooked wp_head
 *
 * @since 1.0.1 Put `wp` in action-namespace.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_head/
 */
function wp_head() {
	\do_action( 'gnist/wp/head' );
}

/**
 * Triggered after the opening body tag.
 *
 * * @hook gnist/wp/body_open
 * * @hooked wp_body_open
 *
 * @since 1.0.1 Put `wp` in action-namespace.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_body_open/
 */
function wp_body_open() {
	\do_action( 'gnist/wp/body_open' );
}

/**
 * Prints scripts or data before the closing body tag on the front end.
 *
 * * @hook gnist/wp/footer
 * * @hooked wp_footer
 *
 * @since 1.0.1 Put `wp` in action-namespace.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_footer/
 */
function wp_footer() {
	\do_action( 'gnist/wp/footer' );
}

/** Supplemental Actions - gnist/init *****************************************/

/**
 * Load translations for the current language.
 *
 * * @hook gnist/load_textdomain
 * * @hooked gnist/init
 */
function load_textdomain() {
	\do_action( 'gnist/load_textdomain' );
}

/**
 * Check for plugin updates.
 *
 * * @hook gnist/plugin_update_checker
 * * @hooked gnist/init
 */
function plugin_update_checker() {
	\do_action( 'gnist/plugin_update_checker' );
}

/**
 * Installer.
 *
 * * @hook gnist/install
 * * @hooked gnist/init
 */
function install() {
	\do_action( 'gnist/install' );
}

/**
 * Setup requirements.
 *
 * * @hook gnist/setup_requirements
 * * @hook gnist/requirements_included
 * * @hooked gnist/init
 *
 * @since 1.0.1 [Add] gnist/requirements_included
 */
function setup_requirements() {
	\do_action( 'gnist/setup_requirements' );
	\do_action( 'gnist/requirements_included' );
}

/**
 * Setup globals.
 *
 * Main action responsible for overriding globals set within the gnist/loaded-action.
 *
 * * @hook gnist/setup_globals
 * * @hook gnist/globals_included
 * * @hooked gnist/init
 *
 * @since 1.0.1 [Add] gnist/globals_included
 */
function setup_globals() {
	\do_action( 'gnist/setup_globals' );
	\do_action( 'gnist/globals_included' );
}

/**
 * Setup instances.
 *
 * * @hook gnist/setup_instances
 * * @hook gnist/instances_included
 * * @hooked gnist/init
 *
 * TODO: Remove in future versions.
 */
function setup_instances() {
	\do_action( 'gnist/setup_instances' );
	\do_action( 'gnist/instances_included' );
}
