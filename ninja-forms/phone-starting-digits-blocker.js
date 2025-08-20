/**
 * Ninja Forms Phone Starting Digits Blocker
 * @author Faisal Ahammad <me@faisalahammad.com)
 */

jQuery(document).ready(function ($) {
  // Configuration: Add numbers you want to block from starting the phone number
  const BLOCKED_STARTING_NUMBERS = ["0", "1", "88"];

  function initPhoneValidation() {
    let phoneInput = $(".phone-container .phone-wrap input.ninja-forms-field");

    if (phoneInput.length > 0) {
      phoneInput.each(function () {
        const $input = $(this);

        $input.off(".phoneValidation");

        $input.on(
          "keypress.phoneValidation keydown.phoneValidation",
          function (e) {
            if (BLOCKED_STARTING_NUMBERS.includes(e.key)) {
              const value = $(this).val();
              const cursorPos = $(this).prop("selectionStart");
              const digitsOnly = value.replace(/\D/g, "");

              if (value.includes("(") && value.includes(")")) {
                if (cursorPos <= 1) {
                  e.preventDefault();
                  return false;
                }
              } else {
                if (digitsOnly.length === 0) {
                  e.preventDefault();
                  return false;
                }
              }
            }

            // Handle multi-digit blocked numbers like '88'
            const value = $(this).val();
            const digitsOnly = value.replace(/\D/g, "");
            const potentialStart = digitsOnly + e.key;

            BLOCKED_STARTING_NUMBERS.forEach((blocked) => {
              if (blocked.length > 1 && potentialStart.startsWith(blocked)) {
                e.preventDefault();
                return false;
              }
            });
          }
        );

        $input.on("input.phoneValidation", function (e) {
          const value = $(this).val();
          const digitsOnly = value.replace(/\D/g, "");
          let shouldClean = false;
          let cleanedDigits = digitsOnly;

          // Check if starts with any blocked number
          BLOCKED_STARTING_NUMBERS.forEach((blocked) => {
            if (digitsOnly.startsWith(blocked)) {
              cleanedDigits = digitsOnly.substring(blocked.length);
              shouldClean = true;
            }

            // Handle masked input format
            if (value.startsWith("(" + blocked)) {
              const newValue = value.replace("(" + blocked, "(");
              $(this).val(newValue);
              setTimeout(() => {
                this.setSelectionRange(1, 1);
              }, 1);
              shouldClean = false; // Already handled
            }
          });

          if (shouldClean && cleanedDigits !== digitsOnly) {
            $(this).focus().val("");

            setTimeout(() => {
              $(this).val(cleanedDigits);
              $(this).trigger("input");
            }, 10);
          }
        });

        $input.on("focus.phoneValidation", function () {
          const value = $(this).val();
          if (value === "(000) 000-0000" || value.includes("000")) {
            setTimeout(() => {
              this.setSelectionRange(1, 1);
            }, 1);
          }
        });
      });

      return true;
    }
    return false;
  }

  initPhoneValidation();
  setTimeout(initPhoneValidation, 100);
  setTimeout(initPhoneValidation, 500);
  setTimeout(initPhoneValidation, 1000);
});
