=== Gnist Engine ===

Contributors: henjak, stiand, galantini
Donate link: https://gnistdesign.no
Requires at least: 5.4
Tested up to: 5.7
Requires PHP: 7.3
Stable tag: 1.0.2
License: MIT
License URI: https://opensource.org/licenses/MIT

Gnist Engine | WordPress Plugin Dependency.

== Description ==

This library uses its own internal actions to help aid in third-party plugin
development, and to limit the amount of potential future code changes when
updates to WordPress core occur.

These actions exist to create the concept of 'plugin dependencies'. They
provide a safe way for plugins to execute code *only* when this plugin is
installed and activated, without needing to do complicated guesswork.

== Installation ==

Install using Composer:

`composer require gnistdesign/gnist-engine`

= Minimum Requirements =

* PHP 7.3 or greater is required.

== Changelog ==

= 1.0.2 [29.03.2021] =

* [Add] `gnist/wp` loaded on `wp`
* [Add] `Gnist\Engine\WP\activation`
  * Initialize: add_action( 'activate_{$basename}', 'Gnist\Engine\WP\activation' )
* [Add] `Gnist\Engine\WP\deactivation`
  * Initialize: add_action( 'deactivate_{$basename}', 'Gnist\Engine\WP\deactivation' )
