<?php
	session_start();

	require ('common/database.php');

	$db = new database();
	$c_id = $_SESSION['C_ID'];
	$route = $_POST['route'];
	$pick_up = $_POST['pick_up'];
	$dest = $_POST['dest'];
	$date = date("Y-m-d");
	$expiry = date("Y-m-d", strtotime("$date +7 day"));
	$status = "unused";

	$query=$db->query("SELECT S_Fare from stops where S_R_ID = $route and S_Pickup_ID = $pick_up and S_Dest_ID = $dest");

	$result_array = $query->fetch_array();
	$fare = $result_array['S_Fare'];

	$query=$db->query("INSERT into transaction (T_c_ID, T_price, T_date, T_expiry_date, T_pick_up, T_destination, T_status) VALUES ($c_id, $fare, now(), $expiry, $pick_up, $dest, '$status')");
	
	
?>