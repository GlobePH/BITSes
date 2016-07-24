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
					<th data-field="name"><h5 class="center bold status"><b>T10293E</b></h5></th>
					</tr>
				</thead>

				<tbody>
					<tr>
					<td class="center"><h6><b>Status</b></h6></td>
					<td class="center used"><h6>Unused</h6></td>
					</tr>
					<tr>
					<td class="center"><h6><b>Date of Travel</b></h6></td>
					<td class="center"><h6>12/20/1994</h6></td>
					</tr>
					<tr>
					<td class="center"><b>Time of Departure</b></td>
					<td class="center">12:00 PM</td>
					</tr>
					<tr>
					<td class="center"><b>Time of Arrival</b></td>
					<td class="center">12:30 PM</td>
					</tr>
					<tr>
					<td class="center"><b>Pick up Location</b></td>
					<td class="center">Ireland</td>
					</tr>
					<tr>
					<td class="center"><b>Destination</b></td>
					<td class="center">Philippines</td>
					</tr>
				</tbody>
			</table>
		</div>
    </div>
</div>

</body>
</html>