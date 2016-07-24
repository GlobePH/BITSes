<?php
	session_start();

	require ('common/database.php');

	$db = new database();
	$c_id = $_SESSION['C_ID'];
	$cpumber = $_POST['cp_numbers'];

	$query=$db->query("SELECT B_access_token from bus where B_cpumber == $cpumber");

	$result_array = $query->fetch_array();
	
	
?>