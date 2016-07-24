<?php
  session_start();
  require 'common/side_nav.php';
  require 'common/database.php';
  $db = new database();

  new side_nav();
    
  $query = $db->query("SELECT * FROM transaction where T_c_ID = '".$_SESSION['C_ID']."'");
  $results_array = array();
  while($row = $query->fetch_array()){
      $results_array[] = $row;
  }
?>
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
    <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
	  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/modal.js"></script>

  <a href="#" data-activates="slide-out" class="button-collapse"><i class="large material-icons">toc</i></a>

<div class="row">
	<div class="col s10 push-s1 ">
      <ul class="collection with-header #bbdefb blue lighten-455">

        <table class="bordered">
        <thead>
            <tr>
              <td>Ticket ID</td>
              <td>Fare</td>
              <td>Date</td>
              <td>Pickup</td>
              <td>Destination</td>
              <td>Status</td>
            </tr>
        </thead>
        <?php foreach($results_array as $r): ?>
          <tr>
            <td><?php echo $r['T_ID']; ?></td>
            <td><?php echo $r['T_price']; ?></td>
            <td><?php echo $r['T_date']; ?></td>
            <td><?php echo $r['T_pick_up']; ?></td>
            <td><?php echo $r['T_destination']; ?></td>
            <td><?php echo $r['T_status']; ?></td>
          </tr>
        <?php endforeach; ?>
        </table>


      </ul>
    </div>
</div>

</body>
</html>