<?php
$current_url = $_SERVER['REQUEST_URI'];    

if ($current_url == "/dk/frt/main.php" or $current_url == "/dk/frt/main"){
    header("Refresh:0; url=../404.php");
}else{
require_once('d/d_fake.php');
class home{

    public static function head_home_x(){
        echo "<title>Home | LongVek City RolePlay</title>
        <link rel='icon' href='img/logo.png' type='image/png' sizes='512x512'>
        <link rel='stylesheet' href='css/style.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>";
    }
    public static function js_bottom_x(){
        echo "<script src='js/main.js'></script>";
    }
    public static function wrap_x(){
        echo "<div class='wrap'>";
    }
    public static function wrap_e_x(){
        echo "</div>";
    }
    public static function wrap_m_x(){
        echo "<div class='wrap_mid'>";
    }
    public static function wrap_m_e_x(){
        echo "</div>";
    }
    public static function header_x(){
        echo "<div class='header'><img src='img/city.png'></div>";
    }
    public static function menu_x(){
        echo "<div class='menu_main'>
            <div class='menu_left'>
                <ul>
                <li><a href='home'>Home</a></li>
                <li><a href='donate.php'>Donate</a></li>
                <li><a href='forums'>Forums</a></li>
                </ul>
            </div>
            <div class='menu_right'>
            <ul>
            <li><a href='register'>Register</a></li>
            </ul>
            </div>
        </div>";
    }
    public static function content_x(){
        echo "<div class='content'>
            <div class='content_header'>
                <h1>THE PREMIUM FIVEM ROLEPLAY EXPERIENCE<h1>
            </div>
            <div class='content_text'>
            <h3>OUR MISSION</h3>
            <p>LongVek City RolePlay aims to change the way we look at GTA 5 Roleplay. We are for the players, for the experience and for the community. We strive ourselves in delivering the most unique, thrilling and captivating roleplay experience there is to offer in the GTA 5 FiveM Community.</p>
            <img src='img/backfoot.png'>
            </div>
        </div>";
    }
    public static function news_x(){
        echo "<div class='update_x'>
        <h2>Our Staff</h2><div class='update_list_main'>";
            echo "
                <div class='update_list'>
                <img src='img/developerPhana.jpg'>
                <h3>SarPhan Phana - Senior Developer</h3>
                </div>
            ";
            echo "
            <div class='update_list'>
            <img src='img/developerKimi.jpg'>
            <h3>Kimi Visal - Developer</h3>
            </div>
        ";
        echo "
        <div class='update_list'>
        <img src='img/madong.jpg'>
        <h3>Sakny - Designer</h3>
        </div>
    ";
    
        echo "<p>LongVekRolePlay is a server focused on Serious RP and balanced game play. We are headed by two full-time, full-stack developers focused on maintaining a balanced atmosphere between legal and illegal activities, with fair game mechanics and optimized scripts and resources. We are always actively recruiting new players and dedicated Police/EMS.
        </p>
        </div></div>";
    }
    public static function forums_x(){
        echo "<div class='wrap_forums'>";
    }
    public static function forums_e_x(){
        echo "</div>";
    }
    public static function menu_forums_x($data){
        $data_post ='';
        $data_posx= '';
        $bdd = new db();
        $get_data = $bdd->getOne("SELECT * FROM menu_forums WHERE Link='$data'"); 
        if ($get_data != null){
        $data_name = $get_data['Name'];
        $data_link = $get_data['Link'];
        $data_post = $get_data['Position'];
        $data_p = $get_data['Parent'];
        
        $arr = json_decode($data_p);
        if ($arr != null) {
            $arr_p = $arr->p;
            $arr_s = $arr->s;
        }
        }else{
            $get_datax = $bdd->getOne("SELECT * FROM post_forums WHERE link='$data'"); 
            if ($get_datax != null){
                $data_posx = $get_datax['Position'];
                $data_cate = $get_datax['cate'];
                $data_name = $get_datax['title'];
                $data_link = $get_datax['link'];
                $arr = json_decode($data_cate);
                if ($arr != null) {
                    $arr_px = $arr->p;
                    $arr_sx = $arr->s;
                }
            }
        }
        echo "<div class='menu_forums'>
        <a href='forums'>Home ></a>";
        if ($data_post == 'p'){
            if ($data_link != 'forums'){
                echo "
                <a href='$data'>$data_name ></a>
                <h3>$data_name</h3>";
            }
            if($data_link == 'forums'){
                echo "
                <h3>$data_name</h3>";
            }
        }
        if ($data_post == 's'){
            if ($data_link != 'forums'){
                $p_data = $bdd->getOne("SELECT * FROM menu_forums WHERE Link='$arr_p'"); 
                $p_name = $p_data['Name'];
                $p_link = $p_data['Link'];
                echo "
                <a href='$p_link'>$p_name ></a>
                <a href='$data'>$data_name ></a>
                <h3>$data_name</h3>";
            }
        }
        if ($data_posx == 'l'){
            if ($data_link != 'forums'){
                $p_data = $bdd->getOne("SELECT * FROM menu_forums WHERE Link='$arr_px'"); 
                $s_data = $bdd->getOne("SELECT * FROM menu_forums WHERE Link='$arr_sx'"); 
                $p_name = $p_data['Name'];
                $p_link = $p_data['Link'];
                $s_name = $s_data['Name'];
                $s_link = $s_data['Link'];
                echo "
                <a href='$p_link'>$p_name ></a>
                <a href='$s_link'>$s_name ></a>
                <h3>$data_name</h3>";
            }
        }
        echo"</div>";
    }
    public static function notice_x(){
        echo "<div class='wrap_notice'>
                <p>Welcome Guest, to LongVek Website.</p>
                <p>
                GTA Standard Whitelisting is currently: <b>Close</b> <br/>
                <br/>
                Please pay attention to the forums and instructions given, And read all the server rules that the admin team assign. Thanks you
                <br/>The rules can be found here: https://LongVekrp.net/gta-public-server-rules
                </p>
        </div>";
    }
    public static function forums_cont_x(){
        echo "<div class='forums_cont'>";
    }
    public static function forums_post_x(){
        echo "<div class='forums_m_left'>
                <div class='forums_m_left_title'><h3><a href='public_forums'>Public Forums</a></h3></div>
                <div class='forums_m_left_list'><h3><a href='general'>General</a></h3></div>
        </div>";
    }
    public static function forums_main_x(){
        echo "<div class='forums_main'>
                <div class='forums_main_list'><h3><a href='general'>General</a></h3></div>
        </div>";
    }
    public static function forums_post_sub_x(){
        echo "<div class='form_m_sub'>
        <div class='forums_m_sub_title'></div>";
        $bdd = new db();
        $get_data = $bdd->getAll("SELECT * FROM post_forums"); 
        foreach($get_data as $out_data){
            $titlex = $out_data['title'];
            $linkx = $out_data['link'];
            echo "<div class='forums_m_sub_list'><a href='$linkx'>$titlex</a></div>";
        }
        echo "</div>";
    }
    public static function forums_widget_x(){
        echo "<div class='forums_m_right'>";
        echo "<div class='forums_widget'>
        <h3> Server Information</h3>
        <p>Live! :</p><a href='fivem://connect/https://34.143.210.199:45675'>Connect</a></div>";
        echo "<div class='forums_widget'>
        <h3>Forum statistics</h3>
        <p>Threads: 188
        <p>Members: 177 </p></div>";
        echo "<div class='forums_widget'>
        <h3>Server Discord</h3>
        <p>Discord Connection :</p><a href='https://discord.gg/TU8jyHfw'>Join</a></div>";
        echo "</div>";
    }
    
    public static function forums_cont_e_x(){
        echo "</div>";
    }
    public static function forums_post_cont_x($data){
        $bdd = new db();
        $get_data = $bdd->getOne("SELECT * FROM post_forums WHERE link = '$data'"); 
        $userx = $get_data['user'];
        $contx = $get_data['content'];
        $get_user = $bdd->getOne("SELECT * FROM user WHERE name = '$userx'"); 
        $imgx = $get_user['img'];
        $namex = $get_user['name'];
        $role = $get_user['role'];
        $posx = $get_user['position'];
        echo"<div class='forums_post_cont'>
        <div class='forums_post_cont_user'>
            <img src='$imgx' />
            <h3>$namex</h3>
            <p>$posx</p>
            <p>$role</p>
        </div>
        <div class='forums_post_cont_text'>$contx</div>
        </div>";
    }
    public static function reg_x(){
        echo "<div class='wrap_reg'>";
    }
    public static function reg_e_x(){
        echo "</div>";
    }
    public static function reg_f_x(){
        echo "<div class='reg_first'>
        <div class='row' style='width:50%'>    
            <div class='col_2' style='padding-right:2%'>
                <input type='text'>
                <p >First Name</p>
            </div>
            <div class='col_2'>    
                <input type='text'>
                <p>Last Name</p>
            </div>    
        </div>
        <div class='row' style='width:50%'>    
            <div class='col'>
                    <input type='text'>
                    <p>AGE</p>
            </div>
            <div class='col'>
                    <input type='text'>
                    <p>Discord Name</p>
            </div>
            <div class='col'>
                    <input type='email' required>
                    <p>Email</p>
            </div>
            <div class='col'>
                    <input type='text'>
                    <p>Facebook Links</p>
            </div>
            <div class='col'>
                    <input type='text'>
                    <p >Steam Hex</p>
            </div>  
            <div class='col'> 
                <button id='btn_f_next'>Next</button>  
            </div>   
            </div>
        </div>";
        echo "<div class='reg_second'>
                <div class='row' style='width:50%'>
                    <div class='col'>    
                            <input type='text'>
                            <p >Character</p>
                    </div>
                    <div class='col'> 
                            <input type='text'>
                            <p>Explain more about your charater history?</p>
                    </div>
                    <div class='col'> 
                            <p id='char_count' style='float:left'>200</p><p>ពាក្យ</p>
                            <textarea rows='8' cols='50' onkeyup='countChar(this)'></textarea>
                            <p style='margin-top:1%'>Tell us more about **RolePlay**?</p>
                            
                    </div>
                    <div class='col'>    
                            <h3>QUESTION</h3></br>
                            <p >១.តើការបើកឡានសម្លាប់គេដោយចេទនាខុសច្បាប់អីគេ?</p>
                            <input type='text'>
                            <p>.RDM</p>
                            <p>.VDM</p>
                            <p>.VVM</p>
                    </div>
                    <div class='col'>
                        <button id='btn_s_prev'>Prev</button>     
                        <button id='btn_s_next'>Next</button>     
                    </div>   
                </div>    
        </div>";    
        echo "<div class='reg_third'>
                <div class='row'>
                    <div class='col_2'>     
                            <p>២.តើនៅពេលដែលCRASH GAMEអ្នកគួរប្រើពាក្យអ្វីក្នុងក្រុង?<p>
                            <input type='text'>     
                            <p>+ដាក់ខ្សែ</p>
                            <p>+ដាក់ហ្គេម</p>
                            <p>+ផ្ទុះខួរ</p>
                            <p>+ដាច់ WiFi</p>
                            <p>+More</p>       
                    </div>
                    <div class='col_2'>   
                            <p>៣.ការលេងធ្វើផ្ទុះខួរ (Disconnect) គឺជាការខុសច្បាប់ក្រុងឬខុសច្បាប់ Server?</p>
                            <input type='text'>
                            <p>+Server</p>
                            <p>+ក្រុង</p>
                            <p>+ច្បាប់ Admin </p>  
                    </div>        
                </div>
                <div class='row'>
                    <div class='col'>
                            <p>៤.ប្រសិនបើអ្នកត្រូវបានគេមួយក្រុម ៤នាក់ ភ្ជុងយកធ្វើជាចំណាប់ខ្មាំង អ្នកត្រូវធ្វើយ៉ាងណា?</p>
                            <input type='text'>     
                            <p>+ដកកាំភ្លើងបាញ់វិញ ខ្ញុំមានកាំភ្លើងក្នុងដៃអាចបាញ ១ ទល់ ៣ បាន</p>
                            <p>+មិនខ្វល់។ ខ្ញុំកំពុងធ្វើការ ទៅចាប់អ្នកផ្សេងទៅ</p>
                            <p>+លើកដៃឡើងនឹងធ្វើតាមតម្រូវការ ខ្ញុំខ្លាចគេបាញ់ស្លាប់</p>
                            <p>+ដាច់ WiFi</p>
                    </div>
                    <div class='col'>
                            <p>៥.តើអ្នកអាចលោតចូលក្នុងទឹកខណះពេលដែលអ្នកប្លន់ទេ?</p></br>
                            <input type='text'>     
                            <p>+បាន</p>
                            <p>+មិនបាន</p>
                    </div>
                    <div class='col'>
                            <button id='btn_t_prev'>Prev</button> 
                            <a href='save_reg' onclick='return doalert(this);' id='submit_a'>Submit</a>
                    </div>   
                    <div class='col'>
                        <div class='txt_err'></div>
                    </div>
                </div>
            </div>";
    }
    public static function donate_x(){
        $a = "Do you enjoy playing on our Roleplay Server? Consider a donation to support server and development costs and receive some perks for doing so! Any and all donations are always appreciated but never necessary.";
        echo "<div class='wrap_donate'>
            <h1>Package VIP</h1>
            <div class='d_col'>
                <div class='col_d'>
                    <img src='img/oknha.jpg'/>
                    <h3>Oknha Vehicle</h3>
                    <p>$a<p/>
                </div>
            </div>
            <div class='d_col'>
                <div class='col_d'>
                    <img src='img/support.jpg'/>
                    <h3>Server Supporter</h3>
                    <p>$a<p/>
                </div>
            </div>
            <div class='d_col'>
                <div class='col_d'>
                    <img src='img/donate.jpg'/>
                    <h3>Donator</h3>
                    <p>$a<p/>
                </div>
            </div>
        </div>";
    }
    public static function footer_x(){
        echo "
        <script src='js/main.js'></script>
        <div class='footer_x'>Forum software by SarPhan Phana © 2010-2020</div>";
    }
}
}
