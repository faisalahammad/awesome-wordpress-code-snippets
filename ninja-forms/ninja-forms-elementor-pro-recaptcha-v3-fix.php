<?php
/**
 * Fix Google reCaptcha v3 loading issue in Ninja Forms with Elementor Pro.
 *
 * @author Faisal Ahammad <me@faisalahammad.com>
 */

add_filter('ninja_forms_pre_enqueue_recaptcha_v3_js', 'nfele_enqueue_recaptcha_v3_js');

function nfele_enqueue_recaptcha_v3_js()
{
    $recaptcha_lang = Ninja_Forms()->get_setting('recaptcha_lang', 'en');
    $site_key       = Ninja_Forms()->get_setting('recaptcha_site_key_3');

    wp_enqueue_script(
        'nf-google-recaptcha',
        'https://www.google.com/recaptcha/api.js?hl=' . $recaptcha_lang . '&render=' . $site_key,
        array('jquery'),
        '3.0',
        true
    );

    return true;
}
