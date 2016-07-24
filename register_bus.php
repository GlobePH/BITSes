<?php
    session_start();
    require ('src/GlobeApi.php');
    require ('db.php');

    $globe = new GlobeApi();
    $auth = $globe->auth(
        '7da4SnjeEgCMLTKa4BieqkCGedqdSzGA',
        '2f597d332b56ac069203cb6078fa8f90c21160d9c6318d535d47dd5f45997575'
    );

    $query = $db->query("INSERT INTO bus(B_password, B_username) values('".$_POST['password']."', '".$_POST['username']."')");
    $_SESSION['B_ID'] = $db->insert_id; 
    if(!isset($_SESSION['code'])) {
        $loginUrl = $auth->getLoginUrl();
        echo $loginUrl;
    }

   

?>