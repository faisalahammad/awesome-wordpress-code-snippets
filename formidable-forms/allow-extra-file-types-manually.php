<?php
/**
 * Allow extra file types manually
 */

add_filter( 'upload_mimes', 'restrict_mime' );
/**
 * @param  $mimes
 * @return mixed
 */
function restrict_mime( $mimes )
{
 $mimes[ 'mp4' ]  = 'video/mp4';
 $mimes[ 'csv' ]  = 'text/csv'; //allow csv files
 $mimes[ 'avi' ]  = 'video/x-msvideo'; //add avi
 $mimes[ 'mov' ]  = 'video/quicktime'; //add mov
 $mimes[ 'epub' ] = 'application/epub+zip'; //add epub
 $mimes[ 'ai' ]   = 'application/postscript'; //add ai
 $mimes[ 'eps' ]  = 'application/postscript'; //add eps
 $mimes[ 'xml' ]  = 'application/xml'; //add xml

 return $mimes;
}
