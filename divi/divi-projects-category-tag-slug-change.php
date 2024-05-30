<?php
/**
 * Divi - Change Projects Category/Tag Slug
 * @package Divi v4.x.x
 */

/**
 * @param  $args
 * @param  $taxonomy
 * @return mixed
 */
function change_project_category_slug( $args, $taxonomy )
{
 /*Project category*/
 if ( 'project_category' === $taxonomy ) {
  $args[ 'rewrite' ][ 'slug' ] = 'your-own-category';
 }

 /*Project tag*/
 if ( 'project_tag' === $taxonomy ) {
  $args[ 'rewrite' ][ 'slug' ] = 'your-own-slug';
 }

 return $args;
}

add_filter( 'register_taxonomy_args', 'change_project_category_slug', 10, 2 );
