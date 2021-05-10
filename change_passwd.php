<?php
//检查修改的密码是否合法
//check if the changed password is valid
  require_once('bm_functions.php');
  do_html_header('Change password');
  session_start();
  check_valid_login();

  $old_passwd = $_POST['old_passwd'];
  $new_passwd = $_POST['new_passwd'];
  $new_passwd2 = $_POST['new_passwd2'];

  try {
      if (!filled_out($_POST)) {
      throw new Exception("You haven't completed it, please continue to fill it out!");
      }
      if(!preg_match("/^[A-Za-z0-9_]{6,16}+$/u",$old_passwd)){
          throw new Exception('The old password contains illegal characters or the length is wrong, please re-enter!');
      }
      if ($new_passwd !== $new_passwd2) {
          throw new Exception('The two passwords entered are inconsistent, please re-enter！');
      }
      if(!preg_match("/^[A-Za-z0-9_]{6,16}+$/u",$new_passwd)){
          throw new Exception('The password contains illegal characters or the length is wrong, please re-enter!');
      }
      if(!preg_match("/^[A-Za-z0-9_]{6,16}+$/u",$new_passwd2)){
          throw new Exception('The password contains illegal characters or the length is wrong, please re-enter!');
      }
      // attempt update
      change_password($_SESSION['valid_user'], $old_passwd, $new_passwd);?>
      <p style="
         text-align: center;
         font-size: 30px;
         font-weight: bold;
    	 color: #00008B;
    	 margin-top: 50px;
    	 margin-bottom: 50px;
       ">  
       <?php echo 'Password changed successfully!';?>
       </p>
  <?php 
  }
  catch (Exception $e) {?>
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
  }
  do_html_URL("login.php", "Login again!");
  do_html_footer();
?>
