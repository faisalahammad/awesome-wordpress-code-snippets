/**
 * Ninja Forms - Disable Form Submit Pressing Enter
 * @author Faisal Ahammad
 */

jQuery(document).ready(function ($) {
  setTimeout(function () {
    $(".nf-form-cont form").on("keypress", function (e) {
      if (e.which === 13) {
        e.preventDefault();
        return false;
      }
    });
  }, 2000);
});
