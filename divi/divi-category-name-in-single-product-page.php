<?php
/**
 * Add category name in single product page before the "Add To Cart" button.
 *
 * @package Divi
 */

function display_product_category_before_add_to_cart()
{
 global $product;
 $terms = get_the_terms( $product->get_id(), 'product_cat' );

 if ( $terms && !is_wp_error( $terms ) ) {
  echo '<div class="product-category">';
  $category_links = array();
  foreach ( $terms as $term ) {
   $category_links[  ] = '<a href="' . get_term_link( $term ) . '">' . $term->name . '</a>';
  }

  echo implode( ', ', $category_links );
  echo '</div>';
 }
}

add_action( 'woocommerce_single_product_summary', 'display_product_category_before_add_to_cart', 9 );
