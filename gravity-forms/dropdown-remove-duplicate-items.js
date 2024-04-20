/**
 * Gravity Forms - Remove duplicate items from Dropdown field
 */

jQuery(document).ready(function ($) {
  var selectFields = $(".ginput_container_select select.gfield_select");

  selectFields.change(function () {
    var selectedOption = $(this).val();

    selectFields
      .not(this)
      .find('option[value="' + selectedOption + '"]')
      .remove();
  });
});
