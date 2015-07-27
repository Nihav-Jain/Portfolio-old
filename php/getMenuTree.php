<?php
	include('sqlconnect.php');

	function getMenuItemInfo($id, $parentAlias){

		$info = array();
		$query = "SELECT id, menu_name, menu_icon, menu_alias, parent_id FROM nihav_menu WHERE id='".$id."' AND active=1 ORDER BY weight ASC";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		if($id != 0)
			$row['menu_alias'] = $parentAlias."/".$row['menu_alias'];
		array_push($info, $row);
		$info[0]["children"] = array();

		$query = "SELECT id, menu_alias FROM nihav_menu WHERE parent_id='".$id."' AND active=1 ORDER BY weight ASC";
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			array_push($info[0]["children"], getMenuItemInfo($row["id"], $info[0]['menu_alias']));
		}
		return $info;
	}

	$info = getMenuItemInfo(0, "");
	echo json_encode($info);

	mysql_close($connect);
?>