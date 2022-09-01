<?php
$current_url = $_SERVER['REQUEST_URI'];   
if ($current_url == "/dk/config.php" or $current_url == "/dk/config"){
    header("Refresh:0; url=404.php");
}else{
require_once('d/d_fake.php');
$bdd = new db();
$link_get = $bdd->getOne("SELECT * FROM links WHERE id = '1'"); 
$url=$link_get['siteurl'];
$site_url = $url;}
