<?php
// Redirect after logout to the home page.
function AWCS_logout_redirect() {
    wp_redirect( home_url() ); // Redirect to the home URL.
    exit();
}
add_action( 'wp_logout', 'AWCS_logout_redirect' );
