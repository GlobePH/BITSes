<?php
    session_start();
    require ('src/GlobeApi.php');
    require('db.php');
    $globe = new GlobeApi();
    $auth = $globe->auth(
        '7da4SnjeEgCMLTKa4BieqkCGedqdSzGA',
        '2f597d332b56ac069203cb6078fa8f90c21160d9c6318d535d47dd5f45997575'
    );
   unset($_SESSION['access_token']);

    if(!isset($_SESSION['access_token'])) {
        $response = $auth->getAccessToken($_GET['code']);
        $_SESSION['access_token'] = $response['access_token'];
        $_SESSION['subscriber_number'] = $response['subscriber_number'];
        if(isset($_SESSION['B_ID'])){
            $db->query("UPDATE bus set C_access_token='".$_SESSION['access_token']."', C_cpnumber='".$_SESSION['subscriber_number']."' where B_ID = '".$_SESSION['B_ID']."'");
           header('Location: welcomekonduktor.php');
        }
        if(isset($_SESSION['C_ID']) || isset($_SESSION['username'])){
            $db->query("UPDATE commuter set C_access_token='".$_SESSION['access_token']."', C_cpnumber='".$_SESSION['subscriber_number']."' where C_ID = '".$_SESSION['C_ID']."'");
            header('Location: welcome.php');
        }
        
    }

    // $sms = $globe->sms(5286);
    // $response = $sms->sendMessage($_SESSION['access_token'], $_SESSION['subscriber_number'], 'rakers api');

    // $charge = $globe->payment(
    //     $_SESSION['access_token'],
    //     $_SESSION['subscriber_number']
    // );

    // $response = $charge->charge(
    //     0,
    //     '52861000001'
    // );
?>
