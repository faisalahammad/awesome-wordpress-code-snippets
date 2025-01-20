<?php
/**
 * Add Korean Won (KRW) currency to Gravity Forms
 * @author Faisal Ahammad <me@faisalahammad.com>
 *
 * @link https://docs.gravityforms.com/gform_currencies/
 */

add_filter( 'gform_currencies', 'add_krw_currency' );

/**
 * @param  $currencies
 * @return mixed
 */
function add_krw_currency( $currencies )
{
 $currencies[ 'KRW' ] = array(
  'name'               => __( 'Korean Won', 'gravityforms' ),
  'code'               => 'KRW',
  'symbol_left'        => '₩',
  'symbol_right'       => '',
  'symbol_padding'     => ' ',
  'thousand_separator' => ',',
  'decimal_separator'  => '.',
  'decimals'           => 0,
 );

 return $currencies;
}
