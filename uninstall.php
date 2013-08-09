<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   TUS
 * @author    Daniel Zilli
 * @version   1.0.0
 */


/* If uninstall, not called from WordPress, then exit */
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit;


/* Delete settings page options from wp_options table. */
delete_option( 'tus_settings' );


/* Delete meta_key data. */
delete_post_meta_by_key( '_tus_background_id_bg_image' );
delete_post_meta_by_key( '_tus_background_id_bg_color' );
delete_post_meta_by_key( 'tus_elements_id' );
