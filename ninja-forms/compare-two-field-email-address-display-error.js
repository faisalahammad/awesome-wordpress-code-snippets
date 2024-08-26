/**
 * Ninja Forms - Compare Two Field Email Address and Display Error
 * @author Faisal Ahammad
 */

/**
 * Form ID: replace the #nf-form-1-cont form ID with your desire form ID
 * Email 1 class: add student_email or different class to the field "Email field setting → Display → Element"
 * Email 2 class: add agent_email or different class to the field "Email field setting → Display → Element"
 * Warning Message class: add warning_message or different class to the "HTML field setting → Display → Container"
 */

document.addEventListener("DOMContentLoaded", function () {
  const formInterval = setInterval(function () {
    const studentEmail = document.querySelector("#nf-form-1-cont input.student_email");
    const agentEmail = document.querySelector("#nf-form-1-cont input.agent_email");
    const warningMessage = document.querySelector("#nf-form-1-cont .warning_message");
    const submitButton = document.querySelector("#nf-form-1-cont .submit-wrap input.ninja-forms-field");

    if (studentEmail && agentEmail && warningMessage && submitButton) {
      clearInterval(formInterval);

      // Initially hide the warning message and enable the submit button
      warningMessage.style.display = "none";
      submitButton.disabled = false;

      // Function to check if the email fields match
      function checkEmails() {
        if (studentEmail.value === agentEmail.value && studentEmail.value !== "" && agentEmail.value !== "") {
          // Show the warning message and disable the submit button if the emails match
          warningMessage.style.display = "block";
          submitButton.disabled = true;
        } else {
          // Hide the warning message and enable the submit button if the emails don't match
          warningMessage.style.display = "none";
          submitButton.disabled = false;
        }
      }

      studentEmail.addEventListener("input", checkEmails);
      agentEmail.addEventListener("input", checkEmails);
    }
  }, 100);
});
