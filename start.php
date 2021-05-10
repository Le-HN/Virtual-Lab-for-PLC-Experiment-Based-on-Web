<?php
//start按钮按下后执行指令并返回控制面板界面
//go back to plc.php after the start button pressed
    require_once('bm_functions.php');
    start_com();//向数据库中写入值的函数
    echo "<script type='text/javascript'>history.go(-1)</script>"//返回start_button.php界面
?>