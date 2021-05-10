<?php
//当用户忘记密码时重置密码发送给用户并用邮件进行通知
//when user forget the password, reset the password and send it by email
  require_once("bm_functions.php");
  do_html_header("Reset password");

  $username = $_POST['username'];

  try {
      if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{6,16}+$/u",$username)){
          throw new Exception('<p class="logintitle">The username contains illegal characters or the length is wrong, please re-enter!</p>');
      }
      $password = reset_password($username);
      notify_password($username, $password);
      echo '<p class="logintitle">The system has sent a randomly generated password to your email address when you registered!</p>';
  }
  catch (Exception $e) {
    echo '<p class="logintitle">An error occurred while changing your password, please try again!</p>';
    echo $e->getMessage();
  }
  do_html_url('login.php', 'Re-login');
  do_html_footer();
?>
