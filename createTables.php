<?php

	$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
							id int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
							name varchar(50) NOT NULL,
							email varchar(255) UNIQUE NOT NULL,
							password varchar(255) NOT NULL,
							note longtext NULL DEFAULT NULL,
							PRIMARY KEY (id), UNIQUE email_UNIQUE (email)
						) ENGINE = InnoDB;";
						
	if(!mysqli_query($connection, $createUsersTable))
		echo "Error: Table Creation query failed";

?>
