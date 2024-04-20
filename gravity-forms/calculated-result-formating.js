/**
 * Gravity Forms - Calculated Result Formating
 * Source: https://docs.gravityforms.com/gform_calculation_format_result/
 */

gform.addFilter("gform_calculation_format_result", function (formattedResult, result, formulaField, formId, calcObj) {
  if (formulaField.field_id == "4") {
    formattedResult = result.toFixed(0);
  }

  return formattedResult;
});
