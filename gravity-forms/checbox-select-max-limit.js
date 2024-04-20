/**
 * Gravity Forms - Checkbox Max Select Limit
 */

jQuery(document).ready(function ($) {
  var maxCheckboxLimit = 3;

  $(".allow_max_three .gfield_checkbox input.gfield-choice-input").click(function () {
    var checkedCount = $("input[type='checkbox']:checked").length;

    if (checkedCount > maxCheckboxLimit) {
      $(this).prop("checked", false);
    }

    if (checkedCount >= maxCheckboxLimit) {
      $("input[type='checkbox']:not(:checked)").prop("disabled", true);
    } else {
      $("input[type='checkbox']").prop("disabled", false);
    }
  });
});
