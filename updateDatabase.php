<?php session_start();

	if(isset($_POST['content'])) {
		include_once('config.inc.php');
		$content = mysqli_real_escape_string($connection, htmlentities($_POST['content']));
		$sendContent = "UPDATE users SET note = '$content' WHERE id = '{$_SESSION['id']}' LIMIT 1;";
		$sent = mysqli_query($connection, $sendContent);
	}

?>