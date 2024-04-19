<?php
/**
 * Disable upload filtering
 */

add_action( 'pre_get_posts', 'frm_remove_media_filtering', 1 );
function frm_remove_media_filtering()
{
 remove_action( 'pre_get_posts', 'FrmProFileField::filter_media_library', 99 );
}
