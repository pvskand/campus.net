<?php
    require_once('connect.php');

    $pageUrl = basename($_SERVER['PHP_SELF']);
    $pageName = explode(".",$pageUrl)[0];
    // var_dump(isset($_SESSION['user']));
    // echo $pageName."<br>";
    if ($pageName != 'login' && $pageName != 'signin') {
        // echo "asda";
        // print_r($_SESSION);
        if (isset($_SESSION['user']) == false) {
            echo 'as';
            header("LOCATION: ../Login/login.php");  
        }   
    }
    
    
    // if (!isset($_SESSION['user']) && ($pageName!= 'login' ||  $pageName!= 'signin') ) {
        // header("LOCATION: login.php");  
    // }
?>




