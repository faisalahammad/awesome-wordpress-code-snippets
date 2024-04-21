/**
 * Gravity Forms - Next Prev Buttons Push To Top
 * Source: https://community.gravityforms.com/t/prev-next-buttons-at-the-top-resolved/15478
 */

jQuery(document).ready(function ($) {
  // executes when HTML-Document is loaded and DOM is ready
  $(".gform_page_footer:visible").clone().appendTo(".gf_progressbar_wrapper").closest();
});
