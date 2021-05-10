<?php
//忘记密码页面
//forget password page
    require_once('bm_functions.php');
    do_html_header('Reset password');
?>
<form action="forgot_passwd.php" method="post">
 <div class="logintitle">
 <p>Forget the password</p>
 </div>
<table>
	<tr>
    	<td class="logintd1" style="width:570px; text-align:right;">Please enter your username:</td>
        <td class="logintd1"><input type="text" name="username" size="30" maxlength="16"/></td>
        <td class="logintd2">(The account will be checked)</td>
    </tr>
</table>
 
 <div class=subbut_re>
  <input type="submit" value="Change the password" class="cpassbut"/>
 </div>
 <br/>
 </form>
 <?php 
    do_html_footer();
 ?>
