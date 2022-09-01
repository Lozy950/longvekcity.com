<?php

function getVisIpAddr() {
      
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}
$current_url = $_SERVER['REQUEST_URI'];    

if ($current_url == "/dk/frt/call_data.php" or $current_url == "/dk/frt/call_data"){
    header("Refresh:0; url=../404.php");
}else{
    require_once('d/d_fake.php');
    require_once('route_frt.php');  
if($request_frt == "save_reg"){
    $fnameErr = $lnameErr = $emailErr = $agexErr = $dc_nameErr = $fb_nameErr = $steam_hexErr = $charxErr = $char_hisErr = $abtErr = $qOneErr = $qTwoErr = $qThreeErr = $qFourErr =  $qFiveErr ='';
    $email = $fname= $lname = $dc_name = $fb_name = $steam_hex = $charx = $char_his = $abt = $qOne = $qTwo = $qThree = $qFour = $qFive = '';
    $qanswer = array("vdm","ផ្ទុះខួរ","server","លើកដៃឡើងនឹងធ្វើតាមតម្រូវការខ្ញុំខ្លាចគេបាញ់ស្លាប់","មិនបាន");
    $pQuest = array();
    $data_1 =    $_POST['arrText'];
    if(isset($_POST['arrTextarea'])){
    $data_2 =    $_POST['arrTextarea'];}
    $abt =       $data_2[0];
    $fname =     $data_1[0];
    $lname =     $data_1[1];
    $agex =      $data_1[2];
    $dc_name =   $data_1[3];
    $email =     $data_1[4];
    $fb_name =   $data_1[5];
    $steam_hex = $data_1[6];
    $charx =     $data_1[7];
    $char_his =  $data_1[8];
    $qOne =      $data_1[9];
    $qTwo =      $data_1[10];
    $qThree =    $data_1[11];
    $qFour =     $data_1[12];
    $qFive =     $data_1[13];
    $dataArr = array();
    if ($fname == '') {
        $fnameErr = "មិនទាន់បានបំពេញ First Name";
        $dataArr[0] = 0;
      } else {
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
            $fnameErr = "បំពេញ First Name មិនត្រឹមត្រូវ";
            $dataArr[0] = 0;
        }else{
            $dataArr[0] = 1;
        }
    }
    if ($lname == '') {
        $lnameErr = "មិនទាន់បានបំពេញ Last Name";
        $dataArr[1] = 0;
      } else {
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
            $lnameErr = "បំពេញ Last Name មិនត្រឹមត្រូវ";
            $dataArr[1] = 0;
        }
        else{
            $dataArr[1] = 1;
        }
      }
    if ($agex == ''){
        $agexErr = "មិនទាន់បានបំពេញ Age";
        $dataArr[2] = 0;
    }else{
        $dataArr[2] = 1;
    }
    if ($dc_name == ''){
        $dc_nameErr = "មិនទាន់បានបំពេញ Discord";
        $dataArr[3] = 0;
    }else{
        $dataArr[3] = 1;
    }
    if ($email=='') {
        $emailErr = "មិនទាន់បានបំពេញ Email";
        $dataArr[4] = 0;
      } else {
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "បំពេញ Email មិនត្រឹមត្រូវ";
            $dataArr[4] = 0;
        }
        else{
            $dataArr[4] = 1;
        }
    }
    if ($fb_name == ''){
        $fb_nameErr = "មិនទាន់បានបំពេញ Facebook";
        $dataArr[5] = 0;
    }else{
        $dataArr[5] = 1;
    }  
    if ($steam_hex == ''){
        $steam_hexErr = "មិនទាន់បានបំពេញ Steam Hex";
        $dataArr[6] = 0;
    }else{
        $dataArr[6] = 1;
    }   
    if ($charx == ''){
        $charxErr = "មិនទាន់បានបំពេញ Character";
        $dataArr[7] = 0;
    }else{
        $dataArr[7] = 1;
    }  
    if ($char_his == ''){
        
        $char_hisErr = "មិនទាន់បានបំពេញ Explain more about your charater history";
        $dataArr[8] = 0;

    }else{
        $char_hisCount = strlen($char_his);
        if ($char_hisCount < 20){
            $char_hisErr = "បំពេញមិនទាន់គ្រប់ ២០ពាក្យ Explain more about your charater history";
            $dataArr[8] = 0;
        }
        elseif($char_hisCount > 50){
            $char_hisErr = "បំពេញលើស ៥០ពាក្យ Explain more about your charater history";
            $dataArr[8] = 0;
        }else{
        $dataArr[8] = 1;}
    }   
    if ($abt == ''){
        $abtErr = "មិនទាន់បានបំពេញ Tell us more about **RolePlay**";
        $dataArr[9] = 0;
    }else{
        $abtCount = strlen($abt);
        if ($abtCount < 100){
            $abtErr = "បំពេញមិនទាន់គ្រប់ ១០០ពាក្យ Tell us more about **RolePlay**";
            $dataArr[9] = 0;
        }else{
            if ($abtCount > 200){
                $abtErr = "បំពេញលើស ២០០ពាក្យ Tell us more about **RolePlay**";
            }else{
        $dataArr[9] = 1;}}
    }  
    if ($qOne == ''){
        $qOneErr = "មិនទាន់បានឆ្លើយសំនួរ (តើការបើកឡានសម្លាប់គេដោយចេទនាខុសច្បាប់អីគេ?)";
        $dataArr[10] = 0;
    }else{
        $dataArr[10] = 1;
    }  
    if ($qTwo == ''){
        $qTwoErr = "មិនទាន់បានឆ្លើយសំនួរ (តើនៅពេលដែលCRASH GAMEអ្នកគួរប្រើពាក្យអ្វីក្នុងក្រុង?)";
        $dataArr[11] = 0;
    }else{
        $dataArr[11] = 1;
    }  
    if ($qThree == ''){
        $qThreeErr = "មិនទាន់បានឆ្លើយសំនួរ (ការលេងធ្វើផ្ទុះខួរ (Disconnect) គឺជាការខុសច្បាប់ក្រុងឬខុសច្បាប់ Server?)";
        $dataArr[12] = 0;
    }else{
        $dataArr[12] = 1;
    } 
    if ($qFour == ''){
        $qFourErr = "មិនទាន់បានឆ្លើយសំនួរ (ប្រសិនបើអ្នកត្រូវបានគេមួយក្រុម ៤នាក់ ភ្ជុងយកធ្វើជាចំណាប់ខ្មាំង អ្នកត្រូវធ្វើយ៉ាងណា?)";
        $dataArr[13] = 0;
    }else{
        $dataArr[13] = 1;
    }   
    if ($qFive == ''){
        $qFiveErr = "មិនទាន់បានឆ្លើយសំនួរ (តើអ្នកអាចលោតចូលក្នុងទឹកខណះពេលដែលអ្នកប្លន់ទេ?)";
        $dataArr[14] = 0;
    }else{
        $dataArr[14] = 1;
    }   
    if ($qanswer[0] == strtolower($qOne)){
        $pQuest[0] = 1;
    }else{
        $pQuest[0] = 0;
    }
    $lowerqTwo = strtolower($qTwo);
    $lqTwo = str_replace(" ","",$lowerqTwo);
    if ($qanswer[1] == $lqTwo){
        $pQuest[1] = 1;
    }else{
        $pQuest[1] = 0;
    }
    $lowerqThree = strtolower($qThree);
    $lqThree = str_replace(" ","",$lowerqThree);
    if ($qanswer[2] == $lqThree){
        $pQuest[2] = 1.5;
    }else{
        $pQuest[2] = 0;
    }
    $lowerqFour = strtolower($qFour);
    $lqFour = str_replace(" ","",$lowerqFour);
    if ($qanswer[3] == $lqFour){
        $pQuest[3] = 1.5;
    }else{
        $pQuest[3] = 0;
    }
    $lowerqFive = strtolower($qFive);
    $lqFive = str_replace(" ","",$lowerqFive);
    if ($qanswer[4] == $lqFive){
        $pQuest[4] = 1;
    }else{
        $pQuest[4] = 0;
    }
    if ($emailErr !=''){
        echo("-".$emailErr);}
    if ($fnameErr !=''){
        echo(" <br> -".$fnameErr);}
    if ($lnameErr !=''){
        echo(" <br> -".$lnameErr);}
    if ($agexErr !=''){
        echo(" <br> -".$agexErr);}
    if ($dc_nameErr !=''){
        echo(" <br> -".$dc_nameErr);}
    if ($fb_nameErr !=''){
        echo(" <br> -".$fb_nameErr);}
    if ($steam_hexErr !=''){
        echo(" <br> -".$steam_hexErr);}   
    if ($charxErr !=''){
        echo(" <br> -".$charxErr);}       
    if ($char_hisErr !=''){
        echo(" <br> -".$char_hisErr);}             
    if ($abtErr !=''){
        echo(" <br> -".$abtErr);}    
    if ($qOneErr !=''){
        echo(" <br> -".$qOneErr);}     
    if ($qTwoErr !=''){
        echo(" <br> -".$qTwoErr);}   
    if ($qThreeErr !=''){
        echo(" <br> -".$qThreeErr);}       
    if ($qFourErr !=''){
        echo(" <br> -".$qFourErr);}   
    if ($qFourErr !=''){
        echo(" <br> -".$qFourErr);}                                    
    echo "<br/>";
    $vis_ip = getVisIPAddr();
    $sum_dataArr = array_sum($dataArr);
    $sum_pQuest = array_sum($pQuest);
    $data= new db();
    $data_sql = array("fname","lname","","","email","","hex");
    $data_e = array();
    $ip_out = '';
    if ($sum_dataArr == 15){
       foreach ($data_1 as $index =>$val) {
        
        if($index == 0 OR $index == 1 OR $index == 4 OR $index == 6){
            $get_data_sql = $data_sql[$index];
            $get_data = $data->getOne("SELECT * FROM reg WHERE  $data_sql[$index] = '$val'"); 
            if ($get_data!=''){
            $data_e [] = $get_data[$get_data_sql];}else{
                $data_e [] = '';
            }
        }
        
       }
       $reg_in = $data->execute("INSERT INTO reg VALUES (null,'$fname','$lname','$agex','$dc_name','$email','$fb_name','$steam_hex','$charx','$char_his','$abt','$sum_pQuest','$vis_ip')");
       if ($reg_in == 1){
            echo "Success";
       }else{
            $x_data = $data->getOne("SELECT * FROM reg WHERE  ip = '$vis_ip'"); 
            if($x_data != ''){
            $ip_out = $x_data['ip'];}
            if ($vis_ip ==$ip_out ){
                echo "ធ្លាប់ចុះឈ្មោះរួចរាល់ម្តងហើយ<br/>";
            }else{
                if (strtolower($data_e[0]) == strtolower($fname)){
                    echo "First Name ជាន់គ្នាម្តងហើយ<br/>";
                }
                if (strtolower($data_e[1]) == strtolower($lname)){
                    echo "Last Name ជាន់គ្នាម្តងហើយ<br/>";
                }
                if (strtolower($data_e[2]) == strtolower($email)){
                    echo "Email មួយនេះបានចុះឈ្មោះម្តងហើយ<br/>";
                }
                if (strtolower($data_e[2]) == strtolower($email)){
                    echo "Steam Hex ជាន់គ្នាម្តងហើយ<br/>";
                }
            }
       }
    }
}
}
