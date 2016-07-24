<?php
	require '../common/database.php';

	$db = new database();

	$id=$_POST['id'];
	
	$query=$db->query("SELECT R_l_ID from route where R_ID = $id");

	$results = array();
	while($row = $query->fetch_array()){
		$results[] = $row['R_l_ID'];
	}

	$imp_result = implode(",", $results);

	$query=$db->query("SELECT * from location where L_ID IN ($imp_result)");

	$result_array = array();

	while($row=$query->fetch_array()){
		$result_array[] = $row;
		}

	foreach ($result_array as $key) {
		echo "<option value='".$key['L_ID']."'>".$key['L_name']."</option>";
		}
	

?>