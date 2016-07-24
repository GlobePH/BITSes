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

	$db = new database();

	new side_nav();
	?>

	<a href="#" data-activates="slide-out" class="button-collapse"><i class="large material-icons">toc</i></a>

<div class="row">
	<div class="col s10 push-s1">
		<div class="center">
			<table class="striped">
				<p> Help </p>
			</table>
		</div>
    </div>
</div>

</body>
</html>