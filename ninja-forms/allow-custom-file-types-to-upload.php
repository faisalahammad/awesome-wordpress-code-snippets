<?php
/**
 * Ninja Forms - Allow Custom File Types To Upload
 * @author Faisal Ahammad
 */

add_filter( 'ninja_forms_upload_mime_types_whitelist', 'my_ninja_forms_upload_mime_types_whitelist' );

function my_ninja_forms_upload_mime_types_whitelist( $types ) {
    // Add PNG
    $types['PNG'] = 'image/png';

    // Add CSV
    $types['CSV'] = 'text/csv';

    // Add JPG and JPEG
    $types['JPG'] = 'image/jpeg';
    $types['JPEG'] = 'image/jpeg';

    return $types;
}