<html>
<head>
<?php   
    require_once('route_frt.php'); 
    include 'main.php';
    $bdd= new db();
    home::head_home_x();
?>
</head>
<body>
        <?php
        home::wrap_x();
        home::wrap_m_x();
        home::header_x();
        home::menu_x();
        $linkx = "aklsdf00001134";
        $get_data = $bdd->getOne("SELECT * FROM post_forums WHERE link ='$request_frt'");
        if ($get_data != ""){
        $linkx = $get_data['link'];}
        if ($request_frt == "home" or $request_frt == "") {
            home::content_x();
            home::news_x();

        }
        elseif($request_frt == "forums" or $request_frt == "general" or $request_frt == $linkx or $request_frt == "register" or $request_frt == "public_forums"){
            if($request_frt == "forums" or $request_frt == "general" or $request_frt == $linkx or $request_frt == "public_forums"){
            home::forums_x();
            home::notice_x();
            home::menu_forums_x($request_frt);
            home::forums_cont_x();
            if($request_frt == "forums"){
                home::forums_post_x();
                home::forums_widget_x();
            }elseif($request_frt == "public_forums")
            {
                home::forums_main_x();
            }elseif($request_frt == "general")
            {
                home::forums_post_sub_x();
            }elseif($request_frt == $linkx){
                home::forums_post_cont_x($request_frt);
            }
            
            home::forums_cont_e_x();
            }
            if($request_frt == "register"){
                home::reg_x();
                home::reg_f_x();
                home::reg_e_x();
            }
            home::forums_e_x();
        }elseif($request_frt =="donate.php"){
            home::donate_x();
        }
        home::footer_x();
        home::wrap_m_e_x();
        home::wrap_e_x();
        ?>
</body>
</html>