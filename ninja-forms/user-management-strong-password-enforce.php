<?php
/**
 * Enforce strong passwords for Ninja Forms user registration and profile update actions.
 * @description Enforce strong password for Ninja Forms User Management (register/update) — WordPress snippet that validates passwords (8+ chars, uppercase, lowercase, number, special) for Ninja Forms register-user and update-profile actions. Paste into theme functions.php or use a code snippets plugin.
 *
 * @author Faisal Ahammad <me@faisalahammad.com>
 */

add_filter('ninja_forms_submit_data', function ($form_data) {
	if (!function_exists('Ninja_Forms')) {
		return $form_data;
	}

	// In this filter, the form ID is available as 'id' (not 'form_id' yet).
	if (empty($form_data['id'])) {
		return $form_data;
	}

	$form_id = (int) $form_data['id'];
	$form    = Ninja_Forms()->form($form_id);

	// Build a quick lookup: field key => [id, value]
	$fields_by_key = [];
	if (!empty($form_data['fields']) && is_array($form_data['fields'])) {
		foreach ($form_data['fields'] as $fld) {
			if (isset($fld['key'])) {
				$fields_by_key[$fld['key']] = [
					'id'    => isset($fld['id']) ? $fld['id'] : null,
					'value' => isset($fld['value']) ? $fld['value'] : '',
				];
			}
		}
	}

	// Strong password rule: 8+ chars, 1 upper, 1 lower, 1 number, 1 special
	$is_strong = function ($password) {
		return (bool) preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[^A-Za-z0-9]).{8,}$/', (string) $password);
	};

	// Check actions to see if this form is registering or updating a user
	$actions = $form->get_actions();
	foreach ($actions as $action) {
		$type   = $action->get_setting('type');
		$active = (int) $action->get_setting('active');

		if (!$active || !in_array($type, ['register-user', 'update-profile'], true)) {
			continue;
		}

		// If registration emails credentials (random password), skip validation.
		if ($type === 'register-user' && (int) $action->get_setting('register_user_email') === 1) {
			continue;
		}

		// The password mapping is a merge tag like {field:your_password_key}
		$password_mt  = (string) $action->get_setting('password');
		$password_key = trim(str_replace(['{field:', '}'], '', $password_mt));

		if ($password_key === '' || !isset($fields_by_key[$password_key])) {
			continue; // no mapped password field
		}

		$password_field = $fields_by_key[$password_key];
		$password_value = (string) $password_field['value'];

		// Update Profile: only validate if user entered a new password
		if ($type === 'update-profile' && $password_value === '') {
			continue;
		}

		if (!$is_strong($password_value)) {
			$message = __('Password must be at least 8 characters and include an uppercase letter, a lowercase letter, a number, and a special
  character.', 'ninja-forms-user-management');

			if (!empty($password_field['id'])) {
				$form_data['errors']['fields'][$password_field['id']] = [
					'message' => $message,
					'slug'    => 'user-management',
				];
			} else {
				$form_data['errors']['form']['user-management'] = $message;
			}

			// Stop at first failure
			return $form_data;
		}
	}

	return $form_data;
}, 10);