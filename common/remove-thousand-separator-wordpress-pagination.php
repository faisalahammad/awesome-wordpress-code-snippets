<?php

/**
 * Remove thousand separator from WordPress pagination
 * @author Faisal Ahammad
 */

/**
 * @param  $output
 * @return mixed
 */
function remove_thousand_separator_pagination( $output )
{
 $output = str_replace( ',', '', $output );

 return $output;
}

add_filter( 'paginate_links', 'remove_thousand_separator_pagination' );
