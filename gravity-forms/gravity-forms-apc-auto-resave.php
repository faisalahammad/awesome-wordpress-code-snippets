<?php
/**
 * Gravity Forms Advanced Post Creation Auto Resave
 *
 * This code automatically resaves posts created by the Gravity Forms Advanced Post Creation add-on.
 * It ensures that the post is properly saved and updated in the database.
 * Visit https://yoursite.com/?force_cron if the code doesn’t run automatically. This URL will force the cron to run.
 *
 * @author Faisal Ahammad <me@faisalahammad.com>
 */

add_action( 'gform_advancedpostcreation_post_after_creation_5', function( $post_id, $feed, $entry, $form ) {
    if ( ! wp_next_scheduled( 'gfapc_resave_post', array( $post_id ) ) ) {
        wp_schedule_single_event( time() + 5, 'gfapc_resave_post', array( $post_id ) );
    }

    if ( ! wp_next_scheduled( 'gfapc_resave_post_alt', array( $post_id ) ) ) {
        wp_schedule_single_event( time() + 10, 'gfapc_resave_post_alt', array( $post_id ) );
    }
}, 10, 4 );

add_action( 'gfapc_resave_post', function( $post_id ) {
    $post = get_post( $post_id );
    if ( ! $post ) {
        return;
    }

    $postarr = array(
        'ID'           => $post_id,
        'post_title'   => $post->post_title,
        'post_content' => $post->post_content,
        'post_status'  => $post->post_status,
    );

    wp_update_post( $postarr );
});

add_action( 'gfapc_resave_post_alt', function( $post_id ) {
    $post = get_post( $post_id );
    if ( ! $post ) {
        return;
    }

    $postarr = array(
        'ID'           => $post_id,
        'post_title'   => $post->post_title,
        'post_content' => $post->post_content,
        'post_status'  => $post->post_status,
    );

    wp_update_post( $postarr );
});

add_action( 'wp_loaded', function() {
    if ( isset( $_GET['force_cron'] ) && current_user_can( 'manage_options' ) ) {
        spawn_cron();
        wp_die( 'Cron forced to run' );
    }
});