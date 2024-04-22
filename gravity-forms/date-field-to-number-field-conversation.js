/**
 * Gravity Forms - Date Field to Number Field Conversation with currency added at beginning
 * Source: https://community.gravityforms.com/t/formatting-fields-in-a-list/16409/15
 */

jQuery(document).ready(function ($) {
  function updateFieldTypes() {
    var $secondInput = $(".gf_change_list_fields input:eq(1)");
    var $thirdInput = $(".gf_change_list_fields input:eq(2)");

    $secondInput.attr("type", "date");
    $thirdInput.attr("type", "text");

    $thirdInput.on("input", function () {
      var inputValue = $(this).val();

      inputValue = inputValue.replace(/[^0-9]/g, "").replace(/^0+/, "");

      var formattedValue = "$" + parseFloat(inputValue).toLocaleString("en-US");

      $(this).val(formattedValue);
    });
  }

  updateFieldTypes();

  $(".add_list_item").on("click", function () {
    updateFieldTypes();
  });
});
