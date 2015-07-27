<?php

	$DB_USER = "db_user";
	$DB_PASS = "db_password";
	$DB_URL = "localhost";
	$DB_DBNAME = "db_name";
	$connect = mysql_connect($DB_URL, $DB_USER, $DB_PASS);
	if(!$connect)
		die("Database Connection Failed!!!");
	$db_select = mysql_select_db($DB_DBNAME, $connect);
	if(!$db_select)
		die("Database Connection Failed!!!");
?>