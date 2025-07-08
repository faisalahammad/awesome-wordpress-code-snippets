<?php
/**
 * Gravity Forms: Redirect to Newly Created Post After Submission
 *
 * @author Faisal Ahammad <me@faisalahammad.com>
 */

add_filter( 'gform_confirmation_123', 'gfapc_redirect_to_created_post', 10, 4 );
function gfapc_redirect_to_created_post( $confirmation, $form, $entry, $is_ajax ) {
    // Get the post(s) created by the Advanced Post Creation add-on
    $created_posts = gform_get_meta( $entry['id'], 'gravityformsadvancedpostcreation_post_id' );
    if ( ! empty( $created_posts ) && is_array( $created_posts ) ) {
        // If multiple posts, use the first one
        $post_id = $created_posts[0]['post_id'] ?? $created_posts[0];
        $redirect_url = get_permalink( $post_id );
        if ( $redirect_url ) {
            $confirmation = array( 'redirect' => $redirect_url );
        }
    }
    return $confirmation;
}