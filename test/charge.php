<?php
    session_start();
    require ('../src/GlobeApi.php');
    require ('common/database.php');
    $db = new database();
    $globe = new GlobeApi();
    $auth = $globe->auth(
        '7da4SnjeEgCMLTKa4BieqkCGedqdSzGA ',
        '2f597d332b56ac069203cb6078fa8f90c21160d9c6318d535d47dd5f45997575'
    );

    
    $sms = $globe->sms(3295);
    $response = $sms->sendMessage('1yvSUNEQyyhuZVLRk1Ipmm_VcHfGHLNBG7JoTeYHGAg', '9268498947', 'rakers api');

    $charge = $globe->payment(
        '1yvSUNEQyyhuZVLRk1Ipmm_VcHfGHLNBG7JoTeYHGAg',
        '9268498947'
    );

    $response = $charge->charge(
        0,
        '32951000013'
    );

    if(isset($response['error'])){
        echo "fail";
    }
?>