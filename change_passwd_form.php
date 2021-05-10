<?php
//修改密码界面
//changing password page
     require_once('bm_functions.php');
     do_html_header('Change password');
     session_start();
     check_valid_login();
 ?>

 
<form action="change_passwd.php" method="post">
   <div>
   		<p class=logintitle>Change Password</p>
   </div>
   <table class="loginpanel">
   <tr>
   		<td class="logintd1">Old password:</td>
   		<td class="logintd2"><input type="password" name="old_passwd" size="16" maxlength="16"/></td>
   </tr>
   <tr>
   		<td class="logintd1">New password:</td>
         <td class="logintd2"><input type="password" name="new_passwd" size="16" maxlength="16"/></td>
   </tr>
   <tr>
   		<td class="logintd1">Confirm new password:</td>
       	<td class="logintd2"><input type="password" name="new_passwd2" size="16" maxlength="16"/></td>
   </tr>
   </table>
   <div class="subbut_re">
   		<input type="submit" value="Change the password" class="cpassbut"/>
   </div>
</form>


<?php
do_html_footer();
?>
