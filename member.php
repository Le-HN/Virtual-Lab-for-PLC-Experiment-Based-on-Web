<?php
//检查用户名、密码等是否符合规范且正确
//check if the username and password is valid and correct

//包含并运行功能性函数库bm_functions.php，由于bm_functions.php中已包含网页显示函数库output_functions.php所以此文档中不用重新包含
require_once('bm_functions.php');
//启动新会话
session_start();
//预定义的 $_POST 变量用于收集来自 method="post" 的表单中的值
$username = $_POST['username'];
$passwd = $_POST['passwd'];

if ($username && $passwd) {
  try  {
      //检查用户名格式是否正确
      if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{6,16}+$/u",$username)){
          throw new Exception('The username contains illegal characters or the length is wrong, please re-enter!');
      }
      //检查密码格式是否正确
      if(!preg_match("/^[A-Za-z0-9_]{6,16}+$/u",$passwd)){
          throw new Exception('The password contains illegal characters or the length is wrong, please re-enter!');
      }
      //验证用户信息，函数在bm_functions.php中
      login($username, $passwd);
      //将用户信息存入会话
      $_SESSION['valid_user'] = $username;
  }
  catch(Exception $e)  {
    //登录不成功
    do_html_header('Problem:');
    ?>
    <p style="
         text-align: center;
         font-size: 30px;
         font-weight: bold;
    	 color: #00008B;
    	 margin-top: 50px;
    	 margin-bottom: 50px;
    ">  
    <?php echo $e->getMessage();?>
    </p>
    <?php   
    do_html_url('login.php', 'Please login again!');
    do_html_footer();
    exit;
  }
}
//登陆成功后输出网页头部
do_html_header('Center');
//验证会话注册信息，若一切正常则会输出用户中心界面
check_valid_user();
?>
