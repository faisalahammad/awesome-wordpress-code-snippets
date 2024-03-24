<?php
/**
 * Set min/max year limit in the Gravity Forms Date field dropdown.
 *
 * @package GravityForms
 */

/**
 * @param  $min_year
 * @return mixed       (last 25 years)
 */
function set_min_year( $min_year )
{
 return $year = date( "Y" ) - 25;
}

add_filter( 'gform_date_min_year', 'set_min_year' );

/**
 * @param  $max_date
 * @return mixed
 */
function set_max_year( $max_date )
{
 return $year = date( "Y" );
}

add_filter( 'gform_date_max_year', 'set_max_year' );
