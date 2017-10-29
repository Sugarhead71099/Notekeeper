<?php

	define('DB_HOST', 'shareddb1c.hosting.stackcp.net');
	define('DB_USER', 'root-user');
	define('DB_PASSWORD', 'Anthony71099');
	define('DB_NAME', 'notekeeper-31363efb');

	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die("Connection Could Not Be Established: " . mysqli_error());
	
?>