<?php
//帮助页面
//help page
    require_once('output_functions.php');
    require_once('bm_functions.php');
    do_html_header_login("help");
    session_start();
    check_valid_login();
?>
  <whitebg>
    <article class="help">
      <h3>EXPERIMENT PROCEDURE</h3>
		<hr>
      <ol>
		  <li>Register a account.</li>
		  <li>Choose the experiment you want to do in the EXPERIMENT menu.</li>
		  <li>In PLC experiment, you can upload your own code and see if it is correct.</li>
		  <li>The PLC just can be used by one student at one time.</li>
		  <li>If problems occurred, teachers should be informed immediately.</li>
	  </ol>
    </article>
    
  </whitebg>
<?php 
    do_html_footer();
?>