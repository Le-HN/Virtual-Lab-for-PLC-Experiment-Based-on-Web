
<?php
    require_once('bm_functions.php');
    do_html_header('');
 //登录界面
 //login page
?>

<form method="post" action="member.php">
	<div>
		<p class="logintitle">Login</p>
	</div>
    <table class="loginpanel">
        <tr>
            <td class="logintd1"><b>Username:</b></td>
            <td class="logintd1"><input type="text" name="username" size="30" maxlength="16"/></td>
            <td class="logintd2">(Can be composed of Chinese characters, numbers, letters, and underscores, 6-16 characters)</td>
        </tr>
        <tr>
            <td class="logintd1"><b>Password:</b></td>
            <td class="logintd1"><input type="password" name="passwd" size="30" maxlength="16"/></td>
            <td class="logintd2">(Can be composed of numbers, letters, and underscores, 6-16 characters)</td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="submit" class="subbut"/>
            </td>
            <td class="logintd2"><a href="forgot_form.php">Forget the password?</a></td>
        </tr>
        <tr>
        	<td class="logintd1"></td>
        	<td class="logintd1"></td>
            <td class="logintd2"><a href="register_form.php">Haven't had an account?</a></td>
        </tr>
    </table>
</form>

<?php
do_html_footer();
?>
