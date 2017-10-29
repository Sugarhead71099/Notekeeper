<?php session_start(); ob_start();

	// Get and store the pair of numbers for human_validation (custom capatcha)
	$_SESSION['human_validation_pair' . ( count($_SESSION) + 1 )] = (object) array('randomNum1' => rand(1, 10),
																				   'randomNum2' => rand(1, 10)
																				   );

	require_once('config.inc.php');
	include_once('createTables.php');

	if(!empty($_POST))
		if(isset($_GET['signup']) && $_GET['signup'] == 1) {
			include_once('validation/signUpValidation.php');
			$fields = validate_user_sign_up_info(array('name', 'email', 'password', 'human_validation'));
		} /*else if(isset($_GET['resetpassword']) && $_GET['resetpassword'] == 1) {
			include_once('resetPasswordValidation.php');
		} */ else {
			include_once('validation/loginValidation.php');
		}
	else if(isset($_GET['logout']) && $_GET['logout'] == 1) {
		session_unset();
		if(isset($_COOKIE['notekeeper_rememberme']))
			setcookie('notekeeper_rememberme', 'deleted', time() - (60 * 60 * 24 * 366), '/');
		header("Location: index.php");
	} else
		include_once('validation/loginValidation.php');

	include_once("header.php");

?>

		<div class="container">


			<?php

				if(isset($_GET['signup']) && $_GET['signup'] == 1)
					include_once('signUp.php');
				// else if(isset($_GET['resetpassword']) && $_GET['resetpassword'] == 1)
				// 	include_once('resetPassword.php');
				else
					include_once('login.php');

			?>



		</div>

<?php include_once("footer.php"); ?>
