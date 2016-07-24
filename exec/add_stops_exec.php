<?php
	require '../common/database.php';

	$db = new database();

	$query = $db->query("INSERT INTO stops(S_R_ID, S_Pickup_ID, S_Dest_Id, S_Price) values('".$_POST['route']."', '".$_POST['source']."', '".$_POST['dest']."', '".$_POST['name']."')");

	echo "INSERT INTO stops(S_R_ID, S_Pickup_ID, S_Dest_Id, S_Price) values('".$_POST['route']."', '".$_POST['source']."', '".$_POST['dest']."', '".$_POST['name']."')";
?>