<?php
/**
 * Gravity Forms - Remove Required Field Notice
 */

add_filter( 'gform_required_legend', '__return_empty_string' );
