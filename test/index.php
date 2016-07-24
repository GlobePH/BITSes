<?php
    session_start();
    require ('../src/GlobeApi.php');
    $globe = new GlobeApi();
    $auth = $globe->auth(
        'R4doF5B4MkfjgiBbRzc4oyfEx4X5FkBR',
        '159569fe813e44d1a08e064eba0402ed2d285d614a5d45b34815ddb28af8fa90'
    );
    
    if(!isset($_SESSION['code'])) {
        $loginUrl = $auth->getLoginUrl();
        header('Location: '.$loginUrl); 
        exit;
    }
    
    if(!isset($_SESSION['access_token'])) {
        $response = $auth->getAccessToken($_SESSION['code']);
        $_SESSION['access_token'] = $response['access_token'];
        $_SESSION['subscriber_number'] = $response['subscriber_number'];
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
