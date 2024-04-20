<?php
/**
 * Gravity Forms - Remove and Add New Country
 * Source: https: //docs.gravityforms.com/gform_countries/
 */

add_filter( 'gform_countries', 'modify_countries_list' );

/**
 * @param  $countries
 * @return array
 */
function modify_countries_list( $countries )
{
 // remove country from list
 $key = array_search( 'United States', $countries );

 if ( $key !== false ) {
  unset( $countries[ $key ] );
 }

 // Add new country
 $countries[  ] = 'United States of America';

 // sort countries by alphabetical order
 asort( $countries );

 return $countries;
}

/* Remove country from list */
add_filter( 'gform_countries', 'remove_countries_list' );

/**
 * @param  $countries
 * @return array
 */
function remove_countries_list( $countries )
{
 // remove country from list
 $key = array_search( 'United States', $countries );

 if ( $key !== false ) {
  unset( $countries[ $key ] );
 }

 return $countries;
}

/* Add new country to the list */
add_filter( 'gform_countries', 'add_new_country' );

/**
 * @param  $countries
 * @return array
 */
function add_new_country( $countries )
{

// Add new country
 $countries[  ] = 'United States of America';
 $countries[  ] = 'New Country';

// sort countries by alphabetical order
 asort( $countries );

 return $countries;
}
