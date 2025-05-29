/**
 * Gravity Forms: Disable Submit Button if URL is Present in Paragraph or Name Field
 *
 * @author Faisal Ahammad <me@faisalahammad.com>
 * @source: https://community.gravityforms.com/t/blocking-urls-in-paragraph-text-fields/
 */
jQuery(document).ready(function ($) {
  // Function to check the text and update button visibility
  function updateButtonVisibility() {
    var messageText = $("#input_1_74").val() || "";

    if (
      messageText.toLowerCase().includes("http") ||
      messageText.toLowerCase().includes("https")
    ) {
      $("#gform_submit_button_1").css("display", "none");
    } else {
      $("#gform_submit_button_1").css("display", "block");
    }
  }

  $(document).on("change keyup paste", "#input_1_74", updateButtonVisibility);

  if ($("#input_1_74").length) {
    updateButtonVisibility();
  }
});
