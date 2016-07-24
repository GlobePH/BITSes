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
	session_start();
	require 'common/side_nav.php';
	require 'common/database.php';

	new side_nav();
	?>

	<a href="#" data-activates="slide-out" class="button-collapse"><i class="large material-icons">toc</i></a>
<form id="ticket_submit">

<div class="container col 12 #bbdefb blue lighten-4">
	<div class="row">
	</div>
	<div class="row">
	</div>
	<div class="row">
	</div>

	<div class="center row">
		<h5 class="collection-header italic">Welcome to EFare</h5>
	</div>

	<div class="row">
		<h6 class="collection-header papercraft center"><em>Book your trip now:</em></h6>
		<div class="row">
			<!-- Dropdown Select Route -->
			<div class="input-field col s4 push-s4">
				<?php
				$db = new database();

				$query=$db->query("SELECT * from route");

				$result_array = array();

				while($row=$query->fetch_array()){
					$result_array[] = $row;
				}

				echo "<select id='route' name='route'>";
				foreach ($result_array as $key) {
					echo "<option value='".$key['R_ID']."'>".$key['R_name']."</option>";
				}
				echo "</select>";

				?>
			</div>
		</div>
	</div>
		<div class="row">
			<!-- Dropdown Select Pick Up -->
			<div class="input-field col s4 push-s4">
				<select name="pick_up" id="pick_up"></select>
			</div>
		</div>
		<div class="row">
			<!-- Dropdown Select Pick Up -->
			<div class="input-field col s4 push-s4">
				<select name="dest" id="dest"></select>
			</div>
		</div>

	<div class="row">
		<div class="center">
  			<input type="submit" id="submit_tix" class="waves-effect waves-light btn modal-trigger" />
  		</div>
	</div>


	<div class="row">
	</div>

	<div class="row">
	</div>

	<div class="row">
	</div>

	<div id="modal1" class="modal #bbdefb blue lighten-4">
		<div class="modal-content">
			<h6>Ticket saved in <i>Tickets</i>!</h6>
		</div>
		<div class="center">
	  		<a class="waves-effect waves-light btn" href="ticket.php">View Now!</a>
	  	</div>
	</div>
	

</div>
</form>


<?php

?>

</body>
</html>