<?php
    $current_url = $_SERVER['REQUEST_URI'];   
    if ($current_url == "/dk/route.php" or $current_url == "/dk/route"){
        header("Refresh:0; url=404.php");
    }else{
    require_once('config.php');
    $current_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $request = str_replace($site_url, '', $current_url);
    $request = str_replace('/', '', $request);
    $request = strtolower($request);
    }
?>
