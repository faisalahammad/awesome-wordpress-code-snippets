/**
 * Gravity Forms - Date Field To Dropdown Field Conversation
 * Source: https://community.gravityforms.com/t/formatting-fields-in-a-list/16409/16
 */

jQuery(document).ready(function ($) {
  function updateFieldTypes() {
    var $firstInput = $(".gf_change_list_fields input:eq(0)");
    var $secondInput = $(".gf_change_list_fields input:eq(1)");
    var $thirdInput = $(".gf_change_list_fields input:eq(2)");

    $firstInput.replaceWith('<select name="' + $firstInput.attr("name") + '">' + '<option value="Father">Father</option>' + '<option value="Mother">Mother</option>' + '<option value="Brother">Brother</option>' + "</select>");

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
