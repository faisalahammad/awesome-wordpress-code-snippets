<?php
/**
 * Disable WordPress RSS Feeds
 * Description: Completely disables all WordPress RSS feeds, including feeds for posts, comments, and categories.
 * @author Faisal Ahammad <me@faisalahammad.com>
 */
function wpb_disable_feed()
{
 wp_die( __( 'No feed available, please visit our <a href="' . get_bloginfo( 'url' ) . '">homepage</a>!' ) );
}

add_action( 'do_feed', 'wpb_disable_feed', 1 );
add_action( 'do_feed_rdf', 'wpb_disable_feed', 1 );
add_action( 'do_feed_rss', 'wpb_disable_feed', 1 );
add_action( 'do_feed_rss2', 'wpb_disable_feed', 1 );
add_action( 'do_feed_atom', 'wpb_disable_feed', 1 );
add_action( 'do_feed_rss2_comments', 'wpb_disable_feed', 1 );
add_action( 'do_feed_atom_comments', 'wpb_disable_feed', 1 );
