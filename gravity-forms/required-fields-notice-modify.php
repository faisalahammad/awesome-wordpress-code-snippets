<?php
/**
 * Gravity Forms - Required Fields Notice Modify
 *
 * @package     GravityForms
 */

add_filter( 'gform_required_legend', function ( $legend, $form ) {
 return '* indicates required fields';
}, 10, 2 );
