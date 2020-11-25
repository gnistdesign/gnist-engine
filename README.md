# Gnist Engine

Contributors: henjak, stiand, galantini  
Donate link: https://gnistdesign.no  
Requires at least: 5.4  
Tested up to: 5.5  
Requires PHP: 7.3  
Stable tag: 1.0.1  
License: MIT  
License URI: https://opensource.org/licenses/MIT  

Gnist Engine | WordPress Plugin Dependency.   

## Description

This library uses its own internal actions to help aid in third-party plugin
development, and to limit the amount of potential future code changes when
updates to WordPress core occur.

These actions exist to create the concept of 'plugin dependencies'. They
provide a safe way for plugins to execute code *only* when this plugin is
installed and activated, without needing to do complicated guesswork.

## Installation

Install using Composer:

`composer require gnistdesign/gnist-engine`

### Minimum Requirements

* PHP 7.3 or greater is required.

## Changelog

### 1.0.1 [25-11-2020]

* [Tweak] `gnist/head` now called `gnist/wp/head`.
* [Tweak] `gnist/body_open` now called `gnist/wp/body_open`.
* [Tweak] `gnist/footer` now called `gnist/wp/footer`.
* [Tweak] `Gnist\Engine\WP\register_custom_post_type` now hooked to `init` instead of `gnist/init`.
* [Tweak] `Gnist\Engine\WP\register_taxonomy` now hooked to `init` instead of `gnist/init`.

### 1.0.0 [18-11-2020]

* [Release] Initial release of the library [28-10-2020].
* [Tweak] License and composer config.