<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1K_eofIoEsifoJiburj4V2pdEB-3-Lj4&amp;callback=initialize" type="text/javascript"></script>

<?php
    require ('/src/GlobeApi.php');
    require('common/database.php');
    $globe = new GlobeApi();

    $db = new database();

    $auth = $globe->auth(
        '7da4SnjeEgCMLTKa4BieqkCGedqdSzGA ',
        '2f597d332b56ac069203cb6078fa8f90c21160d9c6318d535d47dd5f45997575'
    );

    session_start();
    $db = new database();
    $cpnumber = $_GET['cp_numbers'];
    $cid = $_SESSION['C_ID'];

    echo '<a id="back" value="Back" class="waves-effect waves-light btn" href="ticket.php" >Back</a>';

    $temp_array = explode(",", $cpnumber);

    //getting the center of the map
    $query_center=$db->query("SELECT C_cpnumber, C_access_token from commuter where C_ID = $cid");

    $at = $query_center->fetch_array();
    $access_token_center = $at['C_access_token'];

    $cp = $query_center->fetch_array();
    $cpnumber_center = $at['C_cpnumber'];

    $locate = $globe->location(
    $access_token_center,
    $cpnumber_center
    );

    $location = $locate->get_location(
        "80"
    );

    echo "access token =";
    print_r($location);

    if($location['error'] == "Invalid access_token"){
      echo "Invalid Access Token. Please subscribe again to avail our services";
    }

    $center_latitude = $location['terminalLocationList']['terminalLocation']['currentLocation']['latitude'];
    $center_longitude =$location['terminalLocationList']['terminalLocation']['currentLocation']['longitude'];  

    //getting bus locations
    $query=$db->query("SELECT B_cpnumber, B_access_token from bus where B_cpnumber IN ($cpnumber)");

    $token_array = array();
    $cp_array = $temp_array;

    while($row=$query->fetch_array()){
      $token_array[] = $row;
    }

    $nearest_lat = 0;
    $nearest_long = 0;

    $nearest_dist_lat = 180;
    $nearest_dist_long = 180;

    //  sorting algorithm of the nearest bus with respect to the coordinates of the commuter
    foreach ($token_array as $key) {
      $locate = $globe->location(
      $key['B_access_token'],
      $key['B_cpnumber']
      );

      $location = $locate->get_location(
          "80"
      );

      $lat = $location['terminalLocationList']['terminalLocation']['currentLocation']['latitude'];
      $long =$location['terminalLocationList']['terminalLocation']['currentLocation']['longitude'];

      if(abs($lat-$center_latitude) < $nearest_dist_lat){
        $nearest_lat = $lat;
        $nearest_dist_lat = abs($lat-$center_latitude);
        }

      if(abs($long-$center_longitude) < $nearest_dist_long){
        $nearest_long = $long;
        $nearest_dist_long = abs($long-$center_longitude);
        }  

      unset($location);
    }
    //  sorting algorithm of the nearest bus with respect to the coordinates of the commuter
?>

<script>
function initialize() {

  var mapProp = {
    //marking the current location of the commuter
    center:new google.maps.LatLng(<?php echo $center_latitude; ?>, <?php echo $center_longitude; ?>),
    zoom:50,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

  // marking the nearest bus
  var marker = new google.maps.Marker({
        position: {lat: <?php echo $nearest_lat; ?>, lng: <?php echo $nearest_long;?>},
        map: map
      });
  
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
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
<div id="googleMap" style="width:90%;height:90%;"></div>
</body>
</html>
