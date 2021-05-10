<?php
//注销登录并通知用户界面
//sign out page  
  require_once('bm_functions.php');
  session_start();
  $old_user = $_SESSION['valid_user'];

  //注销会话
  unset($_SESSION['valid_user']);
  $result_dest = session_destroy();


  do_html_header('Logging Out');

  if (!empty($old_user)) {
    if ($result_dest)  { ?>
      <p style="
      text-align: center;
      font-size: 30px;
      font-weight: bold;
      color: #00008B;
      margin-top: 50px;
      margin-bottom: 50px;
      ">
      <?php echo 'You signed out!';?>
      </p>
      <?php 
      do_html_url('login.php', 'Login');
    } else { ?>
      <p style="
      text-align: center;
      font-size: 30px;
      font-weight: bold;
      color: #00008B;
      margin-top: 50px;
      margin-bottom: 50px;
      ">
      <?php echo 'Sign out error!';?>
      </p>
      <?php 
    }
  } else { ?>
    <p style="
      text-align: center;
      font-size: 30px;
      font-weight: bold;
      color: #00008B;
      margin-top: 50px;
      margin-bottom: 50px;
      ">
      <?php echo "You haven't login, cannot sign out! <br />";?>
      </p>
      <?php
    do_html_url('login.php', 'Login');
}

do_html_footer();

?>
