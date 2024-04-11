document.ready(function () {
  // replace the core-skills and secondary-skills with your own field class
  $(
    '.core-skills input[type="checkbox"], .secondary-skills input[type="checkbox"]'
  ).change(function () {
    var selectedCoreSkills = $('.core-skills input[type="checkbox"]:checked')
      .map(function () {
        return $(this).val();
      })
      .get();

    var selectedSecondarySkills = $(
      '.secondary-skills input[type="checkbox"]:checked'
    )
      .map(function () {
        return $(this).val();
      })
      .get();

    $(
      '.core-skills input[type="checkbox"], .secondary-skills input[type="checkbox"]'
    ).prop("disabled", false);

    selectedCoreSkills.forEach(function (skill) {
      $('.secondary-skills input[type="checkbox"][value="' + skill + '"]').prop(
        "disabled",
        true
      );
    });

    selectedSecondarySkills.forEach(function (skill) {
      $('.core-skills input[type="checkbox"][value="' + skill + '"]').prop(
        "disabled",
        true
      );
    });
  });
});
