<?php
    require_once('output_functions.php');
    require_once('bm_functions.php');
    do_html_header_login("plc");
    session_start();
    check_valid_login();
//plc实验HMI
//the HMI of plc experiment
?>
<link rel="stylesheet" type="text/css" href="css/forAutoRef.css">

<style>
.panelborder {
    border-style: solid;
    border-color: #FF8C00;
    border-width: 5px;
    border-radius: 20px;
}
</style>

  <whitebg>
    <article class="help">
      <p style="
         text-align: center;
         font-size: 30px;
         font-weight: bold;
    	 color: #00008B;
    	 margin-top: 50px;
    	 margin-bottom: 50px;
        ">PLC MONITOR PANEL</p>
		<hr>

    <!-- 右上侧的气缸状态面板 -->
    <!-- cylinder state panel on top right corner -->
		<div style="width: 50%; text-align: center; padding-top: 20px; float: right; padding-bottom: 20px;">
			<p style="
               font-size: 20px;
               font-weight: bold;
               color: #00008B;
               margin-top: 20px;
               margin-bottom: 20px;
               ">Panel</p>
      <iframe src="plcpanel.php" width="600px" height="400px" frameborder="1" name="conpan" scrolling="no" seamless="seamless" class="panelborder">   
			</iframe>
    </div>

    <!-- 左上侧的实时视频面板 -->
    <!-- RT video on top left corner -->
    <div style="width: 50%; text-align: center; padding-top: 20px; float: left; padding-bottom: 20px;">
			<p style="
               font-size: 20px;
               font-weight: bold;
               color: #00008B;
               margin-top: 20px;
               margin-bottom: 20px;
               ">RT Video</p>
      <!--以下链接即为直播地址-->
      <iframe
        src="https://open.ys7.com/ezopen/h5/iframe_se?url=ezopen://open.ys7.com/F13823099/1.live&autoplay=0&audio=1&accessToken=at.a9c727wma5bdsel68b4ubijz6ahoddfg-54wbusv4jd-0eg8e4j-zznaynmzn&templete=2"
        width="600"
        height="400"
        id="ysopen"
        allowfullscreen
        class="panelborder"
      >
      </iframe>

    </div>
    
    <!-- 左下侧的文件上传面板 -->
    <!-- file upload panel on bottom left side -->
    <div style="width: 50%; text-align: center; margin-top: 20px; float: left;">
      <div class="panelborder" style="width: 600; height: 200; margin: 0px auto 0px auto;">
        <p style="
                    font-size: 20px;
                    font-weight: bold;
                    color: #00008B;
                    ">Code Upload</p>
        <form action="upload_file.php" method="post" enctype="multipart/form-data">
                  <div class="logintd1"><label for="file">Upload the code(Smaller than 7M) :</label></div>
                  <div style="align: center; padding-left: 60px;"><input type="file" name="file" id="file"></div>
            <div>
              <input class="subbut" type="submit" name="submit" value="submit">
            </div>
        </form>
      </div>
		</div>

    <!-- 右下侧的实验评估面板 -->
    <!-- evaluation panel on bottom right side -->
    <div style="width: 50%; text-align: center; margin-top: 20px; float: right;">
      <div class="panelborder" style="width: 600; height: 200; margin: 0px auto 0px auto;">
        <p style="
                    font-size: 20px;
                    font-weight: bold;
                    color: #00008B;
                    ">Experiment Evaluation</p>
        <div>
          <iframe src="start_button.php" width="80px" height="38px" frameborder="0" name="conpan" scrolling="no" seamless="seamless"  style="padding-top: 10px;">   
          </iframe>
        </div>
        <div class="autref">
          <span style="margin-left: 15px;">Result:</span>
          <iframe src="evaluation.php" width="120px" height="27px" frameborder="0" name="conpan" scrolling="no" seamless="seamless"  style="padding-top: 10px;">   
          </iframe>
        </div>
      </div>
		</div>

    </article>
    
  </whitebg>
<?php 
    do_html_footer();
?>