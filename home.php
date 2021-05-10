<?php
//虚拟实验室主页面
//home page of virtual lab 
    require_once('output_functions.php');
    require_once('bm_functions.php');
    do_html_header_login("home");
    session_start();
    check_valid_login();
?>

  <whitebg>
    <article class="footer_column">
      <h3>PLC EXPERIMENT</h3>
      <img src="https://img.freepik.com/free-photo/plc-programable-logic-controller_29285-485.jpg?size=626&ext=jpg" alt="" height="200" class="cards"/>
      <p>A programmable logic controller (PLC) or programmable controller is an industrial digital computer which has been ruggedized and adapted for the control of manufacturing processes, such as assembly lines, or robotic devices, or any activity that requires high reliability, ease of programming and process fault diagnosis.</p>
    </article>
    <article class="footer_column">
      <h3>DC MOTOR EXPERIMENT</h3>
      <img src="https://simple-circuit.com/wp-content/uploads/2019/07/arduino-dc-motor-controlled-rectifier-thyristor.png" alt="" height="200" class="cards"/>
      <p>A DC motor controller is any device that can manipulate the position, speed, or torque of a DC-powered motor. There are controllers for brushed DC motors, brushless DC motors, as well as universal motors, and they all allow operators to set desired motor behavior even though their mechanisms for doing so differ.</p>
    </article>
  </whitebg>
<?php 
    do_html_footer();
?>