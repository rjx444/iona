<?php

/**
 * Fired when the plugin is uninstalled.
 *
 *
 * @package    Iona_plugin
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}