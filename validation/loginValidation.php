<?php validate_user_login_info();

	function validate_user_login_info() {
		global $connection;

		if($_POST['email'] && $_POST['password']) {
			$query = "SELECT id, email, password FROM users WHERE email = '" . htmlentities($_POST['email']) . "';";
			$userExists = mysqli_query($connection, $query);
			$queryResults = mysqli_fetch_assoc($userExists);
			if(count($queryResults) && password_verify(htmlentities($_POST['password']), $queryResults['password'])) {
				if(isset($_POST['remember_me']) && $_POST['remember_me'])
					if(!isset($_COOKIE['notekeeper_rememberme']))
						setcookie('notekeeper_rememberme', $queryResults['id'], time() + (60 * 60 * 24 * 365), '/');
				login_user($queryResults['id'], $queryResults['name'], $queryResults['email']);
			} else {
		?>

				<div class="alert alert-danger text-center text-capitalize">Email and / or password invalid</div>

		<?php
			}
		} else if(isset($_COOKIE['notekeeper_rememberme'])) {
			$userInfo = mysqli_fetch_assoc(mysqli_query($connection, "SELECT id, name, email FROM users WHERE id = '" . htmlentities(intval($_COOKIE['notekeeper_rememberme'])) . "' LIMIT 1;"));
			if(count($userInfo))
				login_user($userInfo['id'], $userInfo['name'], $userInfo['email']);
			else {
				setcookie('notekeeper_rememberme', '', time() - (60 * 60 * 24 * 366), '/');
				header('Refresh:0');
			}

		}
	}

	function login_user($id, $name, $email) {
		$_SESSION['id'] = $id;
		$_SESSION['name'] = $name;
		$_SESSION['email'] = $email;
		header('Location: userNotes.php');
	}

?>