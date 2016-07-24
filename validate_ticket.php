<?php
	session_start();
	require ('src/GlobeApi.php');
    require ('common/database.php');
    $db = new database();
    $globe = new GlobeApi();

	$query = $db->query("UPDATE transaction set T_status = 'on_trip', T_b_id = '".$_SESSION['B_ID']."' where T_ID = '".$_POST['t_id']."'");

	$query = $db->query("SELECT * from transaction where T_ID = '".$_POST['t_id']."'");
	$res = $query->fetch_array();
	$commuter = $res['T_c_ID'];
	$fare = $res['T_price'];

	$query = $db->query("SELECT * from commuter where C_ID='".$commuter."'");
	$res = $query->fetch_array();
	$access_token = $res['C_access_token'];
	$subscriber_number = $res['C_cpnumber'];

    $auth = $globe->auth(
        '7da4SnjeEgCMLTKa4BieqkCGedqdSzGA',
        '2f597d332b56ac069203cb6078fa8f90c21160d9c6318d535d47dd5f45997575'
    );

    $query = $db->query("SELECT * from shortcode");
    $shortcode = $query->fetch_array();
    $short = $shortcode['shortcode'] + 1;
    $query = $db->query("UPDATE shortcode set shortcode='$short'");

    $sms = $globe->sms(4194);
    $response = $sms->sendMessage($access_token, $subscriber_number, 'rakers api');
    $charge = $globe->payment(
        $access_token,
        $subscriber_number
    );
    $response = $charge->charge(
        intval($fare),
        ''.$short
    );
    print_r($response);
    if(isset($response['error'])){
        echo "fail";
    }

?>