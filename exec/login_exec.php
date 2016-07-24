<?php
	require ('../common/database.php');

	session_start();

	$errmsg_arr=array();

	$username=$_POST['username'];
	$password=$_POST['password'];

	$db = new database();

	$username=htmlspecialchars($username);
	$password=md5($password);

	$query=$db->query("SELECT * from commuter where C_username='$username' and 
													C_password='$password'");

	$result=$query->fetch_array();
	$count=count($result);

	$query2 = $db->query("SELECT * from bus where B_username='$username' and B_password = '$password'");

	$result2 = $query2->fetch_array();
	$count2 = count($result2);
	if($count>0){
		session_regenerate_id();
		$_SESSION['C_ID']=$result['C_ID'];
		$_SESSION['username']=$result['C_username'];
		$_SESSION['fname']=$result['C_firstname'];
		$_SESSION['lname']=$result['C_lastname'];
		$_SESSION['password']=$result['C_password'];
		$_SESSION['cpnum']=$result['C_cpnumber'];
		echo "success";
		session_write_close();
	}else if($count2){
		session_regenerate_id();
		$_SESSION['B_ID'] = $result2['B_ID'];
		$_SESSION['cpnumber']=$result['B_cpnumber'];
		echo "success_kon";
		session_write_close();
	}else{
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: index.php");
				exit();
			}
	}

?>