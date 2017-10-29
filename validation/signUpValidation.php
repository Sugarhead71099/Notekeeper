<?php

	function validate_user_sign_up_info($whitelist) {		
		$allFieldsValid = true;
		$fields = array();

		// Populate field array with whitelisted fields only
		foreach($whitelist as $value)
			$fields[$value] = (object) array('value' => $_POST[$value],
											 'is_valid' => true,
											 'is_empty' => false
											);

		// Validate Custom 'Capatcha' (Is this user human?)
		$submittedNum1 = $_SESSION['human_validation_pair' . ( count($_SESSION) - 1 )]->randomNum1;
		$submittedNum2 = $_SESSION['human_validation_pair' . ( count($_SESSION) - 1 )]->randomNum2;
		if( isset($fields['human_validation']->value) && intval($fields['human_validation']->value) !== $submittedNum1 + $submittedNum2 ) {
			$fields['human_validation']->is_valid = false;
			$allFieldsValid = false;
		}

		// Validate email
		if( isset($fields['email']->value) && !filter_var($fields['email']->value, FILTER_VALIDATE_EMAIL) ) {
			$fields['email']->is_valid = false;
			$allFieldsValid = false;
		}

		// Validate password
		if( ( isset($fields['password']->value) && !( strlen($fields['password']->value) >= 8 && strlen($fields['password']->value) <= 20 ) ) || $fields['password']->value !== $_POST['confirm_password']) {
			$fields['password']->is_valid = false;
			$allFieldsValid = false;
		}

		// Check whether the data in each field is null
		foreach($fields as $field => $data)
			if(!$data->value) {
				$data->is_empty = true;
				$allFieldsValid = false;
			}

		if($allFieldsValid)
			save_user_info($fields);

		return $fields;

	}

	function save_user_info($fields) {
		global $connection;

		$emailExists = "SELECT * FROM users WHERE email = '" . mysqli_real_escape_string($connection, htmlentities($fields['email']->value)) . "' LIMIT 1;";
		$result = mysqli_fetch_assoc(mysqli_query($connection, $emailExists));
		if(count($result)) { ?>

			<div class="alert alert-danger text-center text-capitalize">Email is already in use - try using a different email</div>

		<?php
			
			$fields['email']->is_valid = false;

		} else {

			$formattedFields = array();

			foreach($fields as $key => $value)
				$formattedFields[$key] = mysqli_real_escape_string($connection, htmlentities($value->value));

			$formattedFields['password'] = password_hash($formattedFields['password'], PASSWORD_DEFAULT);

			$insertUserInfo = "INSERT INTO users (name, email, password) VALUES ('{$formattedFields['name']}', '{$formattedFields['email']}', '{$formattedFields['password']}');";
			mysqli_query($connection, $insertUserInfo);

			$_SESSION['id'] = mysqli_insert_id($connection);
			$_SESSION['name'] = $fields['name'];
			$_SESSION['email'] = $fields['email'];

			header('Location: userNotes.php');

		}
	}

?>