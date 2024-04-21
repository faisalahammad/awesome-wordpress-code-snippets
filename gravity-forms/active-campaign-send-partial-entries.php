<?php
/**
 * Gravity Forms - Send partial entries to ActiveCampaign
 * Source: https: //community.gravityforms.com/t/sending-partial-entries-to-active-campaign-for-different-forms-resolved/14549/2
 */

add_action( 'gform_partialentries_post_entry_saved', 'send_to_activecampaign_on_partial_entry_saved', 10, 2 );

function send_to_activecampaign_on_partial_entry_saved( $partial_entry, $form )
{

 if ( class_exists( 'GFAPI' ) && function_exists( 'gf_activecampaign' ) ) {

  $form_id = $form[ 'id' ];
  $feeds   = GFAPI::get_feeds( null, $form_id, 'gravityformsactivecampaign', false );

  foreach ( $feeds as $feed ) {
   if ( $feed[ 'meta' ][ 'feed_name' ] == 'Partial entries - IC tag' ) {
    gf_activecampaign()->process_feed( $feed, $partial_entry, $form );
   }

   if ( $feed[ 'meta' ][ 'feed_name' ] == 'Partial entries - IC Custom' ) {
    gf_activecampaign()->process_feed( $feed, $partial_entry, $form );
   }
  }
 }
}
