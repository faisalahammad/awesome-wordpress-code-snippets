<?php
/**
 * Add Bangladeshi Taka (BDT) currency to Gravity Forms
 * @author Faisal Ahammad <me@faisalahammad.com>
 *
 * @link https://docs.gravityforms.com/gform_currencies/
 */

add_filter( 'gform_currencies', 'add_bdt_currency' );
/**
 * @param  $currencies
 * @return mixed
 */
function add_bdt_currency( $currencies )
{
 $currencies[ 'BDT' ] = array(
  'name'               => __( 'Bangladeshi Taka', 'gravityforms' ),
  'code'               => 'BDT',
  'symbol_left'        => '&#2547;',
  'symbol_right'       => '',
  'symbol_padding'     => ' ',
  'thousand_separator' => ',',
  'decimal_separator'  => '.',
  'decimals'           => 2,
 );

 return $currencies;
}
