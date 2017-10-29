<?php // Create a database of your own an place your connection info in here

    define('DB_HOST', ''); // User Specified
    define('DB_USER', ''); // User Specified
    define('DB_PASSWORD', '') // User Specified
    define('DB_NAME', '') // User Specified

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die("Could not establish connection to database " . mysqli_error());

?>
