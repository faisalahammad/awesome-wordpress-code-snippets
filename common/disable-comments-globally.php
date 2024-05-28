<?php
/**
 * Disables comments site-wide.
 * 
 * Hooks into the 'comments_open' filter and forces it to return false, 
 * effectively preventing comments from being displayed.
 *
 * @param bool $open Whether the current post is open for comments.
 * @param int $post_id The ID of the current post.
 * @return bool Always returns false.
 */
add_filter( 'comments_open', '__return_false' );

/**
 * Disables pingbacks and trackbacks site-wide.
 *
 * Hooks into the 'pings_open' filter and forces it to return false,
 * preventing pingbacks and trackbacks.
 *
 * @param bool $open Whether the current post is open for pingbacks and trackbacks.
 * @param int $post_id The ID of the current post.
 * @return bool Always returns false.
 */
add_filter( 'pings_open', '__return_false' );
