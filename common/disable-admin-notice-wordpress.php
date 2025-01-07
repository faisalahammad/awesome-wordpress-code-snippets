<?php
/**
 * Disable Admin Notices WordPress
 * Description: Completely removes all admin notices from the WordPress dashboard,
 * including core WordPress notices and those added by plugins and themes.
 * @author Faisal Ahammad <me@faisalahammad.com>
 */

/**
 * Remove all notice actions
 */
function disable_all_admin_notices()
{
 remove_all_actions( 'admin_notices' );
 remove_all_actions( 'all_admin_notices' );
 remove_all_actions( 'user_admin_notices' );
 remove_all_actions( 'network_admin_notices' );
}
add_action( 'admin_init', 'disable_all_admin_notices', 1 );

/**
 * Add CSS to hide notice elements
 */
function hide_admin_notices_css()
{
 ?>
    <style>
        .notice,
        .notice-error,
        .notice-warning,
        .notice-success,
        .notice-info,
        .updated,
        .error,
        .update-nag {
            display: none !important;
        }
    </style>
    <?php
}
add_action( 'admin_head', 'hide_admin_notices_css', 1 );

/**
 * Disable notice output
 */
function return_false()
{
 return false;
}
add_action( 'admin_notices', 'return_false', 1 );
add_action( 'all_admin_notices', 'return_false', 1 );
add_action( 'user_admin_notices', 'return_false', 1 );
add_action( 'network_admin_notices', 'return_false', 1 );

/**
 * Remove update nags
 */
function remove_core_update_notices()
{
 remove_action( 'admin_notices', 'update_nag', 3 );
 remove_action( 'admin_notices', 'maintenance_nag', 10 );
}
add_action( 'admin_init', 'remove_core_update_notices', 1 );