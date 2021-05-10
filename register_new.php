<?php
  //导入自定义的函数库
  require_once('bm_functions.php');
  $email=$_POST['email'];
  $username=$_POST['username'];
  $passwd=$_POST['passwd'];
  $passwd2=$_POST['passwd2'];
  // 开启会话
  session_start();
//检查注册信息并提示用户是否注册成功
//check registration infor and show user the result
  try   {
      // 调用函数检查表单是否填写
      if (!filled_out($_POST)) {
      throw new Exception('Your form is not completed, please continue to fill it out!');
      }
      //过滤用户名
      if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{6,16}+$/u",$username)){
          throw new Exception('The username contains illegal characters or the length is wrong, please re-enter!');
      }
      // 过滤密码
      if ($passwd !== $passwd2) {
          throw new Exception('The two passwords entered are inconsistent, please re-enter!');
      }
      if(!preg_match("/^[A-Za-z0-9_]{6,16}+$/u",$passwd)){
          throw new Exception('The password contains illegal characters or the length is wrong, please re-enter!');
      }
      if(!preg_match("/^[A-Za-z0-9_]{6,16}+$/u",$passwd2)){
          throw new Exception('The password contains illegal characters or the length is wrong, please re-enter');
      }
      // 过滤邮件地址
      if (!valid_email($email)) {
      throw new Exception('This is not a valid email address, please fill in again!');
      }
      // 调用bm_functions.php中的自定义函数向数据库插入注册信息
      register($username, $email, $passwd);
      // 保存用户会话信息
      $_SESSION['valid_user'] = $username;

      do_html_header('Registration successful');?>
      <p style="
         text-align: center;
         font-size: 30px;
         font-weight: bold;
    	 color: #00008B;
    	 margin-top: 50px;
    	 margin-bottom: 50px;
      ">
      <?php echo 'Registered successfully';?>
      </p>
      <?php 
      do_html_url('login.php', 'Re-login');
      do_html_footer();

  }
  //如果注册不成功
  catch (Exception $e) {
     do_html_header('Problem:');
     ?> 
     <p style="
         text-align: center;
         font-size: 30px;
         font-weight: bold;
    	 color: #00008B;
    	 margin-top: 50px;
    	 margin-bottom: 50px;
	 "><?php echo $e->getMessage();?></p>
     <?php
     do_html_URL("register_form.php", "Please refill out the form!");
     do_html_footer();
     exit;
  }
?>
