<?php
/**
 * Customize the "Max x files are allowed" message in Ninja Forms File Uploads
 * @author Faisal Ahammad <me@faisalahammad.com>
 */


// Customize the "Max x files are allowed" message in Ninja Forms File Uploads
add_filter( 'ninja_forms_uploads_js_strings', 'custom_ninja_forms_uploads_js_strings' );

function custom_ninja_forms_uploads_js_strings( $strings ) {
    // Change default message to German: "Max %n Dateien sind erlaubt"
    $strings['file_limit'] = __( 'Max %n Dateien sind erlaubt', 'ninja-forms-uploads' );

    return $strings;
}