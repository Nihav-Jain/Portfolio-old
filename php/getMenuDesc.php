<?php
	include('sqlconnect.php');

	if(!isset($_REQUEST['menuid']))
		die("Invalid Request");
	$menuid = mysql_real_escape_string($_REQUEST['menuid']);
	// check for sql injection here
	$query = "SELECT id, menu_name, menu_alias, menu_desc FROM nihav_menu WHERE id='".$menuid."'";
	$result = mysql_query($query) or die(mysql_error());
	$info = array();
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		array_push($info, $row);
	}
	echo json_encode($info, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	mysql_close($connect);
?>