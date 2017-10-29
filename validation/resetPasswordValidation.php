<?php

	function check_email_exists() {
		global $connection;

		$getEmail = "SELECT email FROM users WHERE email = '" . htmlentities($_POST['email']) . "' LIMIT 1;";
		$query = mysqli_query($connection, $getEmail);
		$email = mysqli_fetch_assoc($query);
		if(count($email)) {
			$to = $_POST['email'];

			$subject = 'This is our test email';

			// $message = '<h1>Reset Password Request</h1><p style="text-align: center;">This email was sent to you from a "reset password" request made. If you did not request this, please ignore this email. Otherwise, you can click this link to reset your password: <a href="https://projects.braijonglover.com/notekeeper/?resetpassword=</p>';

			$headers = "From: The Sender Name <support@braijonglover.com>\r\n";
			$headers .= "Reply-To: support@braijonglover.com\r\n";
			$headers .= "Content-type: text/html\r\n";

			// Send email
			$sent = mail($to, $subject, $message, $headers);

			if($sent) {
				if(!isset($_COOKIE['resetpassword']) && !$_COOKIE['resetpassword'] === $_POST['email'])
					setcookie('resetpassword', $_POST['email'], time() + (60 * 60), "/");
			} else { ?>

				<div class="alert alert-danger text-center text-capitalize">Password reset failed - verification email not sent, please try again later</div>

	<?php
			}
		} else { ?>

			<div class="alert alert-danger text-center text-capitalize">Email doesn't exist</div>

	<?php

		}
	}

	function validate_new_user_password() {
		if( ( $_POST['password'] && !( strlen($_POST['password']) >= 8 && strlen($_POST['password']) <= 20 ) ) || $_POST['password'] !== $_POST['confirm_password'])
			$fields['password']->is_valid = false;


			change_new_user_password();
	}

	function change_new_user_password() {
		global $connection;


	}

?>