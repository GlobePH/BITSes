<?php
	session_start();
	require ('common/database.php');

	$db = new database();
	$c_id = $_SESSION['C_ID'];
	$query = $db->query("SELECT * FROM transaction where T_c_ID = '$c_id' order by T_id desc limit 1");
	$last_transaction = $query->fetch_array();

	$pick = $db->query("SELECT L_name FROM location where L_ID = '".$last_transaction['T_pick_up']."'");
	$picks = $pick->fetch_array();

	$dest = $db->query("SELECT L_name FROM location where L_ID = '".$last_transaction['T_destination']."'");
	$dests = $dest->fetch_array();

	$route = $db->query("SELECT S_R_ID FROM stops where S_Pickup_ID = '".$last_transaction['T_pick_up']."' AND S_Dest_ID = '".$last_transaction['T_destination']."'");

	$routes = $route->fetch_array();
	$in_route = $routes['S_R_ID'];

	$bus_track = $db->query("SELECT R_b_ID FROM route where R_ID = $in_route");
	$bus_tracks = $bus_track->fetch_array();
	$in_cp_num = $bus_tracks['R_b_ID'];

	$number = $db->query("SELECT B_cpnumber FROM bus where B_ID = $in_cp_num");

	$cpnumber_array = array();

	while($row=$number->fetch_array()){
		$cpnumber_array[] = $row['B_cpnumber'];
	}
	$imp_cpnumber = implode(",", $cpnumber_array);
?>

<html>
	<head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

<body>
	<?php
	require 'common/side_nav.php';

	new side_nav();
	?>

	<a href="#" data-activates="slide-out" class="button-collapse"><i class="large material-icons">toc</i></a>

<div class="row">
	<div class="col s10 push-s1">
		<div class="center">
			<table class="striped">
				<thead>
					<tr>
					<th data-field="id"><h5 class="center status"><b>Ticket No.</b></h5></th>
					<th data-field="name"><h5 class="center bold status"><b id="t_id"><?php echo $last_transaction['T_ID'] ?></b></h5></th>
					</tr>
				</thead>

				<tbody>
					<tr>
					<td class="center"><h6><b>Status</b></h6></td>
					<td class="center used"><h6 id="status"><?php echo $last_transaction['T_status']; ?></h6></td>
					</tr>
					<tr>
					<td class="center"><h6><b>Date of Travel</b></h6></td>
					<td class="center"><h6 id="date"><?php echo $last_transaction['T_date']; ?></h6></td>
					</tr>
					<tr>
					<td class="center"><b>Time of Departure</b></td>
					<td class="center" id="departure">12:00 PM</td>
					</tr>
					<tr>
					<td class="center"><b>Time of Arrival</b></td>
					<td class="center" id="arrival">12:30 PM</td>
					</tr>
					<tr>
					<td class="center"><b>Pick up Location</b></td>
					<td class="center" id="pickup_loc"><?php echo $picks['L_name']; ?></td>
					</tr>
					<tr>
					<td class="center"><b>Destination</b></td>
					<td class="center" id="dest_loc"><?php echo $dests['L_name']; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
    </div>
</div>
<div class="row">
	<div class="center">
	<?php echo "<input type='text' name='cp_numbers' id='cp_numbers' value='$imp_cpnumber' hidden /> " ?>
	<a id="track" value="Track Vehicle" class="waves-effect waves-light btn" href="track_bus.php?cp_numbers=<?php echo $imp_cpnumber ?>" >Track Bus</a>
  	</div>
</div>

</body>
</html>