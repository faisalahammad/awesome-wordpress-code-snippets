<?php
function gw_required_placeholder_asterisk( $form ) {
	foreach ( $form['fields'] as &$field ) {
		// Skip fields that don't support placeholders
		if ( ! is_callable( array( $field, 'get_entry_inputs' ) ) ) {
			continue;
		}

		// Single input fields
		if ( is_array( $field->inputs ) ) {
			$inputs = $field->inputs;
			foreach ( $inputs as &$input ) {
				if ( $field->isRequired && isset( $input['placeholder'] ) ) {
					$input['placeholder'] = gw_append_asterisk( $input['placeholder'] );
				}
			}
			$field->inputs = $inputs;
		} elseif ( $field->isRequired && isset( $field->placeholder ) ) {
				$field->placeholder = gw_append_asterisk( $field->placeholder );
		}
	}
	return $form;
}

function gw_append_asterisk( $text ) {
	// Avoid double-adding an asterisk
	if ( substr( $text, -1 ) !== '*' ) {
		$text .= ' *';
	}
	return $text;
}
