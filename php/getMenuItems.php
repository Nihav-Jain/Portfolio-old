<?php
	include('sqlconnect.php');

	if(!isset($_REQUEST['parentid']))
		die("Invalid Request");
	$parentid = $_REQUEST['parentid'];
	// check for sql injection here
	while(1){
		$query = "SELECT id, menu_name, menu_icon, menu_alias FROM nihav_menu WHERE parent_id='".$parentid."' ORDER BY weight ASC";
		$result = mysql_query($query) or die(mysql_error());
		if(mysql_num_rows($result) == 0)
		{
			$query = "SELECT parent_id FROM nihav_menu WHERE id='".$parentid."'";
			$res = mysql_query($query) or die(mysql_error());
			$r = mysql_fetch_array($res, MYSQL_ASSOC);
			$parentid = $r['parent_id'];
			continue;
		}
		$info = array();
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			array_push($info, $row);
		}
		echo json_encode($info);
		break;
	}
	mysql_close($connect);
?>