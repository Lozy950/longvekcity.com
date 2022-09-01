<?php
    require_once('route.php');
    require_once('d/d_fake.php'); 
    $bdd= new db();
    function page404(){
        include ('404.php');
    }
    function home(){
        include ('frt/index.php');
    }
    function input_data(){
        include ('frt/call_data.php');
    }
    $linkx = "aklsdf00001134";
    $get_data = $bdd->getOne("SELECT * FROM post_forums WHERE link ='$request'");
    if ($get_data != ""){
    $linkx = $get_data['link'];}
    if($request == 'home' or $request == '' or $request == 'forums' or $request == 'general' or $request == $linkx or $request == 'register' or $request == 'donate.php' or $request == 'public_forums'){
        home();}
    elseif($request == 'save_reg' ){
        input_data();
    }
    else{
        page404();}    
           
 
?>

<script>
  // ideally this is on top of page; works on bottom as well

  if(/^\?fbclid=/.test(location.search))
     location.replace(location.href.replace(/\?fbclid.+/, ""));

 </script>