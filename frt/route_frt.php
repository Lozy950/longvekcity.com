<?php
    $current_url = $_SERVER['REQUEST_URI'];    
    if ($current_url == "/dk/frt/route_frt.php" or $current_url == "/dk/frt/route_frt"){
        header("Refresh:0; url=../404.php");
    }else{
    require_once('config_frt.php');
    $current_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $request_frt = str_replace($site_url, '', $current_url);
    $request_frt = str_replace('/', '', $request_frt);
    $request_frt = strtolower($request_frt);
    }

?>
