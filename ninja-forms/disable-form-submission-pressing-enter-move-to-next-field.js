/**
 * Disable form submission pressing Enter key and move to next field
 * @author Faisal Ahammad <me@faisalahammad.com>
 */

jQuery(document).ready(function ($) {
  $(".nf-form-cont").on("keydown", "input, select, textarea", function (e) {
    // Check if the pressed key is Enter
    if (e.keyCode === 13 || e.which === 13) {
      e.preventDefault();

      var focusable = $(
        '.nf-form-cont input:not([type="submit"]):not([type="button"]), .nf-form-cont select, .nf-form-cont textarea'
      ).filter(":visible");

      var currentIndex = focusable.index(this);

      // Focus the next element if it exists, otherwise stay on current field
      if (currentIndex > -1 && currentIndex < focusable.length - 1) {
        focusable.eq(currentIndex + 1).focus();
      }

      return false;
    }
  });
});
