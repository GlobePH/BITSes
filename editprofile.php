<html>
	<head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

<body>
    <?php

    session_start();
	require 'common/side_nav.php';
	require 'common/database.php';

	$db = new database();

	new side_nav();

	$query = $db->query("SELECT * FROM commuter where C_ID='".$_SESSION['C_ID']."'");
	$results = $query->fetch_array();
	?>

	<a href="#" data-activates="slide-out" class="button-collapse"><i class="large material-icons">toc</i></a>

<div class="row">
	<div class="col s10 push-s1 #f3e5f5 purple lighten-5">
		<form>

			<div class="row">

			</div>
			<div class="row">

			</div>
			<div class="row">

			</div>
			<div class="row">

			</div>
			<div class="row">
				<div class="input-field col s4 push-s2">
					<input id="firstname" type="text" class="validate" value="<?php echo $results['C_firstname']; ?>">
					<label for="firstname">First Name</label>
				</div>

				<div class="input-field col s4 push-s2">
					<input id="lastname" type="text" class="validate" value="<?php echo $results['C_lastname']; ?>">
					<label for="lastname">LastName</label>
				</div>
			</div>

			<div class="row">
				<div class="input-field col s5 push-s2">
					<input id="username" type="text" class="validate" value="<?php echo $results['C_username']; ?>">
					<label for="username">Username</label>
				</div>
			</div>

			<div class="row">
				<div class="input-field col s5 push-s2">
					<input id="username" type="password" class="validate" value="<?php echo $results['C_password']; ?>">
					<label for="password">Password</label>
				</div>
			</div>

			<div class="row">
				<div class="input-field col s3 push-s2">
					<input id="email" type="email" class="validate" value="<?php echo $results['C_cpnumber'] ?>">
					<label for="email">Mobile</label>
				</div>
			</div>

			<div class="row">

			</div>

			<div class="row">

			</div>

			<div class="row">

			</div>

			<div class="row">
				<div class="center">
		  			<a class="btn" onclick="Materialize.toast('Profile Saved!', 4000)">Save</a>
		  		</div>
			</div>

	</div>
</div>
</body>
</html>