<?php
 require_once('bm_functions.php');
 session_start();
 do_html_header('Registration');
//新用户注册页面
//registration page for new user 
?>
<form method="post" action="register_new.php">
	<div class="logintitle">
		<p>Registration</p>
	</div>
    <table class="loginpanel">
        <tr>
            <td class="logintd1"><b> Username： </b></td>
            <td class="logintd1"><input type="text" name="username" size="30" maxlength="30"/></td>
            <td class="logintd2">(Consists of numbers, letters, and underscores, 6 to 16 characters)</td></tr>
        <tr>
            <td class="logintd1"><b> Password： </b></td>
            <td class="logintd1"><input type="password" name="passwd" size="30" maxlength="30"/></td>
            <td class="logintd2">(Consists of numbers, letters, and underscores, 6 to 16 characters)</td></tr>
        <tr>
            <td class="logintd1"><b> Confirm Password： </b></td>
            <td class="logintd1"><input type="password" name="passwd2" size="30" maxlength="30"/></td>
            <td class="logintd2">(Consists of numbers, letters, and underscores, 6 to 16 characters)</td></tr>
        <tr>
            <td class="logintd1"><b> Email Address： </b></td>
            <td class="logintd1"><input type="text" name="email" size="30" maxlength="100"/></td>
            <td class="logintd2">(Email address will be checked)</td></tr>
    </table>
    <div class="subbut_re">
    	<input type="submit" value="Submit" class="subbut">
    </div>
</form>
<?php
do_html_footer();
?>
