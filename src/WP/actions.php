<?php
/**
 * This file contains the actions that are used through-out this library. They are
 * consolidated here to make searching for them easier, and to help developers
 * understand at a glance the order in which things occur.
 *
 * This library uses its own internal actions to help aid in third-party plugin
 * development, and to limit the amount of potential future code changes when
 * updates to WordPress core occur.
 *
 * These actions exist to create the concept of 'plugin dependencies'. They
 * provide a safe way for plugins to execute code *only* when this plugin is
 * installed and activated, without needing to do complicated guesswork.
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

/**
 * Attach to WordPress.
 */
\add_action( 'plugins_loaded',    __NAMESPACE__ . '\\loaded',                    5  );
\add_action( 'init',              __NAMESPACE__ . '\\init',                      0  );
\add_action( 'init',              __NAMESPACE__ . '\\actions',                   5  );
\add_action( 'init',              __NAMESPACE__ . '\\register_custom_post_type', 5  );
\add_action( 'init',              __NAMESPACE__ . '\\register_taxonomy',         5  );
\add_action( 'setup_theme',       __NAMESPACE__ . '\\setup_theme',               10 );
\add_action( 'after_setup_theme', __NAMESPACE__ . '\\after_setup_theme',         10 );
\add_action( 'wp_loaded',         __NAMESPACE__ . '\\wp_loaded',                 10 );
\add_action( 'wp',                __NAMESPACE__ . '\\wp',                        10 );

/**
 * Admin actions.
 */
\add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\\admin_enqueue_scripts', 10 );
\add_action( 'admin_notices',         __NAMESPACE__ . '\\admin_notices',         10 );
\add_action( 'admin_init',            __NAMESPACE__ . '\\admin_init',            10 );
\add_action( 'admin_menu',            __NAMESPACE__ . '\\admin_menu',            10 );
\add_action( 'admin_head',            __NAMESPACE__ . '\\admin_head',            10 );

/**
 * Public actions.
 */
\add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\wp_enqueue_scripts', 10 );
\add_action( 'wp_head',            __NAMESPACE__ . '\\wp_head',            10 );
\add_action( 'wp_body_open',       __NAMESPACE__ . '\\wp_body_open',       10 );
\add_action( 'wp_footer',          __NAMESPACE__ . '\\wp_footer',          10 );

/**
 * Action: gnist/init - Attached to 'init' above.
 *
 * Attach various initialization actions to the init action.
 * The load order helps to execute code at the correct time.
 */
\add_action( 'gnist/init', __NAMESPACE__ . '\\load_textdomain',           0  );
\add_action( 'gnist/init', __NAMESPACE__ . '\\plugin_update_checker',     5  );
\add_action( 'gnist/init', __NAMESPACE__ . '\\install',                   5  );
\add_action( 'gnist/init', __NAMESPACE__ . '\\setup_requirements',        10 );
\add_action( 'gnist/init', __NAMESPACE__ . '\\setup_instances',           10 );
\add_action( 'gnist/init', __NAMESPACE__ . '\\setup_globals',             10 );
