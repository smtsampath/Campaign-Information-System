<?php
			
require("db_constants.php");
	
	// 1. Create a database connection
	$con = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
	if (!$con) {
		die("Could not connect to the Database server ".mysql_error());
	}
	
	// 2. Select a database to use
	$db_select = mysql_select_db(DB_NAME, $con);
	if (!$db_select) {
		die("Could not open the database ".mysql_error());
	}

?>
