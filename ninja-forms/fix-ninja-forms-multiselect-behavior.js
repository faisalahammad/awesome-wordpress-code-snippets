/**
 * Fixes the behavior of the Ninja Forms multiselect field.
 * @author Faisal Ahammad <me@faisalahammad.com>
 * @description This script ensures that the multiselect field in Ninja Forms behaves correctly by allowing users to select multiple options without the default browser behavior interfering.
 */

jQuery(document).ready(function ($) {
  function fixMultiSelect() {
    $("select[multiple].ninja-forms-field:not([data-fixed])").each(function () {
      $(this)
        .attr("data-fixed", "true")
        .on("mousedown", function (e) {
          e.preventDefault();
          if (e.target.tagName === "OPTION") {
            var $opt = $(e.target);
            $opt.prop("selected", !$opt.prop("selected"));
            $(this).trigger("change").trigger("input");
          }
        })
        .on("click", function (e) {
          e.preventDefault();
        });
    });
  }

  var attempts = 0;
  var maxAttempts = 50;

  function waitAndFix() {
    attempts++;
    if ($("select[multiple].ninja-forms-field").length > 0) {
      fixMultiSelect();
    }
    if (attempts < maxAttempts) {
      setTimeout(waitAndFix, 200);
    }
  }

  waitAndFix();

  $(document).ajaxComplete(function () {
    setTimeout(fixMultiSelect, 100);
  });
});
