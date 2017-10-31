<?php if(!session_id()) session_start(); ob_start();

	include_once('config.inc.php');

	if(!isset($_SESSION['email']))
		header('Location: index.php');

	$getUserNote = "SELECT name, note FROM users WHERE id = '{$_SESSION['id']}' LIMIT 1;";
	$userNote = mysqli_fetch_assoc(mysqli_query($connection, $getUserNote));

	include_once('header.php');
	include_once('navbar.php');

?>

	<div id="noteContainer" class="container">
		<textarea name="note" id="note" class="form-control text-justify"><?php echo $userNote['note']; ?></textarea>
	</div>

<?php include_once("footer.php"); ?>
