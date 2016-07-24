<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1K_eofIoEsifoJiburj4V2pdEB-3-Lj4&amp;callback=initialize" type="text/javascript"></script>

<?php
    session_start();

    require ('../src/GlobeApi.php');
    require('db.php');
    $globe = new GlobeApi();
    $auth = $globe->auth(
        'R4doF5B4MkfjgiBbRzc4oyfEx4X5FkBR',
        '159569fe813e44d1a08e064eba0402ed2d285d614a5d45b34815ddb28af8fa90'
    );

     $locate = $globe->location(
        '1yvSUNEQyyhuZVLRk1Ipmm_VcHfGHLNBG7JoTeYHGAg',
        '9268498947'
    );

    $location = $locate->get_location(
        "80"
    );

    $latitude = $location['terminalLocationList']['terminalLocation']['currentLocation']['latitude'];
    $longitude =$location['terminalLocationList']['terminalLocation']['currentLocation']['longitude'];

    $map =  $location['terminalLocationList']['terminalLocation']['currentLocation']['map_url'];

    echo $map;
?>




<script>
function initialize() {

  var mapProp = {
    center:new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
    zoom:50,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

 var marker = new google.maps.Marker({
          position: {lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?>},
          map: map
        });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div id="googleMap" style="width:500px;height:380px;"></div>
