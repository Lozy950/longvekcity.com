<?php
if ($current_url == "/dk/frt/config_frt.php" or $current_url == "/dk/frt/config_frt"){
    header("Refresh:0; url=../404.php");
}else{
    require_once('d/d_fake.php');
    require_once('route_frt.php'); 
require_once('d/d_fake.php');
$bdd = new db();
$link_get = $bdd->getOne("SELECT * FROM links WHERE id = '1'"); 
$url=$link_get['siteurl'];
$site_url = $url;
}
