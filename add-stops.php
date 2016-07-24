<?php
	require ('db.php');
	$query = $db->query("SELECT * FROM stops join location where L_ID = S_Pickup_ID");
	$pickup = array();
	while($row = $query->fetch_array()){
		$pickup[] = $row;
	}

	$query = $db->query("SELECT * FROM stops join location where L_ID = S_Dest_ID");
	$dest = array();
	while($row = $query->fetch_array()){
		$dest[] = $row;
	}

	$query = $db->query("SELECT * FROM route");
	$routes = array();
	while($row = $query->fetch_array()){
		$routes[] = $row;
	}
?>
<link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/modal.js"></script> 

<div class="container col 12 #f3e5f5 purple lighten-5">
	<div class="row"></div>
	<div class="row"></div>
	<div class="row"></div>

	<div class="center row">
		<h5 class="collection-header italic">Welcome to E-Fare</h5>
	</div>


	<div class="row">
		<h6 class="collection-header papercraft center"><em>Book your first trip now:</em></h6>

	<form id="addStops">
		<div class="row">
			<div class="input-field col s4 push-s4">
				<select name="route">
				<?php foreach($routes as $route): ?>
					<?php echo "<option value='".$route['R_b_ID']."'>".$route['R_name']."</option>"; ?>

				<?php endforeach; ?>

				</select>		
			</div>
		</div>

		<div class="row">
			<div class="input-field col s4 push-s4">
				<select name="source">
				<?php foreach($pickup as $stop): ?>
					<option value='<?php echo $stop['S_Pickup_ID']; ?>'><?php echo $stop['L_name']; ?></option>
				<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s4 push-s4">
				<select name="dest">
				<?php foreach($dest as $stop): ?>
					<option value='<?php echo $stop['S_Dest_ID']; ?>'><?php echo $stop['L_name']; ?></option>
				<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s4 push-s4">
				<input type="text" name="fare" />
			</div>
		</div>

	<div class="row">
		<div class="center">
			<h6 class="collection-header"><b>Total Fare: P</b></h6>
		</div>
	</div>

	<div class="row">
		<div class="center">
  			<input type="submit" class="waves-effect waves-light btn" />
  		</div>
	</div>
	</form>

	<div class="row"></div>

	<div class="row"></div>

	<div class="row"></div>

	<div id="modal1" class="modal #f3e5f5 purple lighten-5">
		<div class="modal-content"><h6>Ticket saved in <i>Tickets</i>!</h6></div>
		<div class="center">
	  		<a class="waves-effect waves-light btn" href="ticket.html">View Now!</a>
	  	</div>
	</div>
	
</div>

</body>
</html>