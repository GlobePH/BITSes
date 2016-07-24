<?php
	require '../common/database.php';

	$db = new database();

	$id=$_POST['id'];

	$query=$db->query("SELECT L_name,L_ID from location where L_ID != $id");

	$result_array = array();

	while($row=$query->fetch_array()){
		$result_array[] = $row;
		}

	foreach ($result_array as $key) {
		echo "<option value='".$key['L_ID']."'>".$key['L_name']."</option>";
		}
	

?>