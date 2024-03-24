<?php
/**
 * Remove Projects CPT
 *
 * @package Divi
 */

add_action( 'init', 'remove_divi_project_cpt' );

if ( !function_exists( 'remove_divi_project_cpt' ) ) {
 function remove_divi_project_cpt()
 {
  unregister_post_type( 'project' );
  unregister_taxonomy( 'project_category' );
  unregister_taxonomy( 'project_tag' );
 }
}
