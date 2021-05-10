<?php

  use PHPMailer\PHPMailer\PHPMailer;

  require_once('output_functions.php');
  require_once("mail/PHPmailer.php");
  require_once("mail/SMTP.php");

// 连接数据库函数
// connect to database
function db_connect() { 
    $servername = "localhost";
    $username = "root";
    $password = "virtuallab";
    $database = "virlab_db";
    $result = new mysqli($servername, $username, $password, $database);
    if ($result->connect_error) {
        throw new Exception('Cannot connect to the database!');
    } else {
        return $result;
    }
}

//检查表单是否填写
//check if the form is filled
function filled_out($form_vars) {
    foreach ($form_vars as $key => $value) {
        if ((!isset($key)) || ($value == '')) {
            return false;
        }
    }
    return true;
}

// 检查邮件地址是否有效函数
//check if the email address is valid
function valid_email($address) {
    if (preg_match('^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$^', $address)) {
        return true;
    } else {
        return false;
    }
}

//向数据库注册用户信息函数
//register user's information
function register($username, $email, $password) {
    $conn = db_connect();
    $result = $conn->query("select * from user where username='".$username."'");
    if (!$result) {
        throw new Exception('Unable to execute query, please try again!');
    }

    if ($result->num_rows>0) {
        throw new Exception('Username already exists, please fill in again!');
    }
    $result = $conn->query("insert into user values('".$username."', sha1('".$password."'), '".$email."')");
    if (!$result) {
        throw new Exception('An error occurred while saving to the database, please try again!');
    }
    return true;
}


//登录时验证用户信息函数
//verify user's infor when login
function login($username, $password) {
    $conn = db_connect();
    $result = $conn->query("select * from user where username='".$username."' and passwd = sha1('".$password."')");
    if (!$result) {
        throw new Exception('The account or password is wrong, please re-enter!');
    }
    if ($result->num_rows>0) {
        return true;
    } else {
        throw new Exception('The account or password is wrong, please re-enter!');
    }
}

//检查用户会话信息函数(主界面)
//check user's session(user center)
function check_valid_user() {
    if (isset($_SESSION['valid_user']))  { ?>
        <p style="
         text-align: center;
         font-size: 30px;
         font-weight: bold;
    	 color: #00008B;
    	 margin-top: 50px;
    	 margin-bottom: 50px;
        "><?php echo "Dear ".$_SESSION['valid_user'].", welcome back !";?></p>
        <?php 
        do_html_URL('home.php', 'Enter the Lab');
        do_html_URL('change_passwd_form.php', 'Reset the password');
        do_html_URL('logout.php', 'Sign Out');
        do_html_footer();
    } else {?>
        <p style="
         text-align: center;
         font-size: 30px;
         font-weight: bold;
    	 color: #00008B;
    	 margin-top: 50px;
    	 margin-bottom: 50px;
        "><?php echo "You are not logged in !";?></p>
        <?php
        do_html_URL('login.php', 'Re-login');
        do_html_footer();
        exit;
    }
}

//检查用户会话信息函数(登录之后)
//check user's session(after login)
function check_valid_login() {
    if (isset($_SESSION['valid_user']))  {
        
    } else {?>
        <p style="
         text-align: center;
         font-size: 30px;
         font-weight: bold;
    	 color: #00008B;
    	 margin-top: 50px;
    	 margin-bottom: 50px;
        "><?php echo "You are not logged in !";?></p>
        <?php
        do_html_URL('login.php', 'Re-login');
        do_html_footer();
        exit;
    }
}

//向数据库更新更改的密码的函数
//change the user's password in the database
function change_password($username, $old_password, $new_password) {
    login($username, $old_password);
    $conn = db_connect();
    $result = $conn->query("update user set passwd = sha1('".$new_password."')where username = '".$username."'");
    if (!$result) {
        throw new Exception('Password change error!');
    } else {
        return true;
    }
}

//生成随机密码的函数
//generate random password
function get_random_word($min_length, $max_length) {
// grab a random word from dictionary between the two lengths
// and return it

    // generate a random word
    $word = '';
    // remember to change this path to suit your system
    $dictionary = 'D:\\wamp64\\www\\words';  // the ispell dictionary
    $fp = @fopen($dictionary, 'r');
    if(!$fp) {
        return false;
    }
    $size = filesize($dictionary);

    // go to a random location in dictionary
    $rand_location = rand(0, $size);
    fseek($fp, $rand_location);

    // get the next whole word of the right length in the file
    while ((strlen($word) < $min_length) || (strlen($word)>$max_length) || (strstr($word, "'"))) {
        if (feof($fp)) {
            fseek($fp, 0);        // if at end, go to start
        }
        $word = fgets($fp, 80);  // skip first word as it could be partial
        $word = fgets($fp, 80);  // the potential password
    }
    $word = trim($word); // trim the trailing \n from fgets
    return $word;
}

//向数据库更新随机生成的密码的函数
//update the generated password in database
function reset_password($username) {
// set password for username to a random value
// return the new password or false on failure
    // get a random dictionary word b/w 6 and 13 chars in length
    $new_password = get_random_word(6, 13);

    if($new_password == false) {
        throw new Exception('Could not generate new password.');
    }

    // add a number  between 0 and 999 to it
    // to make it a slightly better password
    $rand_number = rand(0, 999);
    $new_password .= $rand_number;

    // set user's password to this in database or return false
    $conn = db_connect();
    $result = $conn->query("update user set passwd = sha1('".$new_password."')where username = '".$username."'");
    if (!$result) {
        throw new Exception('Could not change password.');  // not changed
    } else {
        return $new_password;  // changed successfully
    }
}


//通过电子邮件发送给用户新生成的密码
//send the user newly generated password
function notify_password($username, $password) {

    $conn = db_connect();//数据库连接函数
    $result = $conn->query("select email from user
                            where username='".$username."'");
    if (!$result) {
        throw new Exception('Could not find email address.');
    } else if ($result->num_rows == 0) {
        throw new Exception('Could not find email address.');
        // username not in db
    } else {
        $row = $result->fetch_object();
        $email = $row->email;
        $mesg = "Your virtual lab password has been changed to ".$password."\r\n";
        
        $mail = new PHPMailer();
        $mail->IsSMTP();//stmp 使用smtp鉴权方式发送邮件
        $mail->CharSet = 'UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码
        $mail->SMTPAuth = true; //开启认证
        $mail->SMTPSecure = 'ssl'; //设置使用ssl加密方式登录鉴权
         $mail->Port = 465;
        $mail->Host = "smtp.qq.com";  //链接qq域名邮箱的服务器地址  smtp.sina.com.cn    smtp.163.com   smtp.qiye.163.co
        $mail->Hostname = 'http://www.virlab.tech/';//设置发件人的主机域 可有可无 默认为localhost 内容任意，建议使用你的域名
        $mail->Username = "**********@qq.com";//邮箱账号
        $mail->Password = "***********";//STMP授权码  上面提到需要保存使用的
        $mail->From = "**********@qq.com";
        $mail->FromName = "Virtual Lab";
        $mail->AddAddress($email); //抄送
        $mail->Subject = "Password";   
        //添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
        $mail->Body = $mesg;
        $mail->WordWrap = 80; // 设置每行字符串的长度
        $mail->IsHTML(true);
        $ret = $mail->Send();
        if ($ret) {
            return true;
        } else {
            throw new Exception('Could not send email.');
        }
    }
}

//从数据库读取PLC传送的实时数据(气缸)
//read the real-time date from plc(cylinder)
function plc_cly()
{
    $conn = db_connect();
    $result = $conn->query("select cylinder from datafromplc");
    $conspace= '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    if (!$result) {
        throw new Exception('Could not get data!');
    }
    if ($result->num_rows > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {
            echo '<div class="situ">
                    <div style="width: 70%; float: left; margin-top: 5px; text-align: right;">
                        Cylinder: &nbsp&nbsp&nbsp' . $row['cylinder'], $conspace. ' State: 
                    </div>
                      
                    <iframe src="'.$row["cylinder"].'.php" width="90px" height="30px" frameborder="0" name="conpan" scrolling="no" seamless="seamless">   
			        </iframe>
                  </div>';
        }
    } else {
        throw new Exception('Could not print data!');
    }
}

//从数据库读取PLC传送的实时数据(气缸状态)
//read the real-time date from plc(state of cylinders)
function plc_sta($cylin)
{
    $conn = db_connect();
    $result = $conn->query("select state from datafromplc where cylinder='".$cylin."';");
    if (!$result) {
        throw new Exception('Could not get data!');
    }
    if ($result->num_rows > 0) {
        // 输出数据
        if($row = $result->fetch_assoc()){
            return $row['state'];
        }
    } else {
        throw new Exception('Could not print data!');
    }
}

//自动刷新(350ms)
//auto refresh pages(350ms)
function auto_ref()
{
    echo
    //<!--JS 页面自动刷新 --> 
    '<script type="text/javascript">
    function fresh_page()
    {
        window.location.reload();
    }
    setTimeout("fresh_page()",350);
    </script>';
}

//将数据库中的开始指令置1，保持5s后置0，使plc运行程序
//set start command in the database, maintain for 5s, then reset.
function start_com()
{
    $conn = db_connect();
    $result = $conn->query("update commandtoplc set Value=1 where Command='start';");
    sleep(5);
    $result = $conn->query("update commandtoplc set Value=0 where Command='start';");
}

//从数据库中读实验结果
//read the result of experiment in the database
function plc_exp_res()
{
    $conn = db_connect();
    $result = $conn->query("select result from exp_result where name='res';");
    if ($result->num_rows > 0) {
        // 输出数据
        if($row = $result->fetch_assoc()){
            return $row['result'];
        }
    } else {
        throw new Exception('Could not print data!');
    }
}
?>
