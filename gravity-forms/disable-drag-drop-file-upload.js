/**
 * Disable drag and drop file upload
 * Ensure to add the "disableDragDrop" class to the File Upload field
 */

jQuery(document).ready(function ($) {
  $(".disableDragDrop").on("dragover", function (event) {
    event.preventDefault();
  });

  $(".disableDragDrop").on("drop", function (event) {
    event.preventDefault();
  });
});
