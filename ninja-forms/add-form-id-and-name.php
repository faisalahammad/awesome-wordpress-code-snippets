<?php
/**
 * Add Form ID and Name to the Ninja Forms
 */

add_filter( 'ninja_forms_render_form_attrs', function ( $attrs ) {
 $attrs[ 'id' ]   = 'nf-1'; // Set your desired ID here
 $attrs[ 'name' ] = 'ninja-form'; // Set your desired name here

 return $attrs;
} );
