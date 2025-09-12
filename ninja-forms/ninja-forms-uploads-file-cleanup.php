<?php
/**
 * Ninja Forms Uploads File Cleanup every 15 days
 * @author Faisal Ahammad <me@faisalahammad.com>
 */

function schedule_ninja_forms_photo_cleanup() {
    if ( ! wp_next_scheduled( 'ninja_forms_photo_cleanup_event' ) ) {
        // Run immediately first time, then every 15 days
        cleanup_ninja_forms_photos();
        wp_schedule_event( time() + (15 * DAY_IN_SECONDS), 'ninja_forms_cleanup_interval', 'ninja_forms_photo_cleanup_event' );
    }
}
add_action( 'wp', 'schedule_ninja_forms_photo_cleanup' );

function ninja_forms_cleanup_cron_schedules( $schedules ) {
    $schedules['ninja_forms_cleanup_interval'] = array(
        'interval' => 15 * DAY_IN_SECONDS,
        'display'  => esc_html__( 'Every 15 Days', 'textdomain' ),
    );
    return $schedules;
}
add_filter( 'cron_schedules', 'ninja_forms_cleanup_cron_schedules' );

add_action( 'ninja_forms_photo_cleanup_event', 'cleanup_ninja_forms_photos' );

function cleanup_ninja_forms_photos() {
    // Configure which form folders to clean
    $forms = array( 1, 2, 3, 4 );

    $upload_dir = wp_upload_dir();
    $ninja_forms_base = trailingslashit( $upload_dir['basedir'] ) . 'ninja-forms/';
    $photo_extensions = array( 'jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg' );

    try {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        WP_Filesystem();
        global $wp_filesystem;

        $deleted_count = 0;
        $error_count = 0;

        foreach ( $forms as $form_id ) {
            $form_dir = $ninja_forms_base . $form_id . '/';

            if ( ! is_dir( $form_dir ) ) {
                continue;
            }

            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator( $form_dir, RecursiveDirectoryIterator::SKIP_DOTS ),
                RecursiveIteratorIterator::CHILD_FIRST
            );

            foreach ( $files as $file_info ) {
                if ( $file_info->isFile() ) {
                    $file_path = $file_info->getPathname();
                    $file_extension = strtolower( pathinfo( $file_path, PATHINFO_EXTENSION ) );

                    if ( in_array( $file_extension, $photo_extensions, true ) ) {
                        if ( $wp_filesystem->delete( $file_path ) ) {
                            $deleted_count++;
                        } else {
                            $error_count++;
                        }
                    }
                }
            }
        }

    } catch ( Exception $e ) {
        error_log( 'Ninja Forms cleanup error: ' . $e->getMessage() );
    }
}

function unschedule_ninja_forms_photo_cleanup() {
    $timestamp = wp_next_scheduled( 'ninja_forms_photo_cleanup_event' );
    if ( $timestamp ) {
        wp_unschedule_event( $timestamp, 'ninja_forms_photo_cleanup_event' );
    }
}
register_deactivation_hook( __FILE__, 'unschedule_ninja_forms_photo_cleanup' );