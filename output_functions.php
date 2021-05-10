<?php
//输出头部标题的函数(未登录)
//output header(before login)
function do_html_header($title) {
?>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NUS Virtual Lab</title>
<link href="css/singlePageTemplate.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>

<body>
<div class="container"> 
  <!-- Navigation -->
  <header>
    <h1 class="title">Virtual Lab</h1>
  <!--
	<div class="logo">
		<img src="http://nus.edu.sg/images/default-source/base/logo.png" alt="Icon of NUS"  width="110">
	</div>
  -->
  </header>
  <section class="newnav">
	  <nav>
		<ul>
		</ul>
	  </nav>
  </section>
  <?php
}

//输出头部标题的函数(已登录)
//output header(after login)
function do_html_header_login($title) {
?>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NUS Virtual Lab</title>
<link href="css/singlePageTemplate.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>

<body>
<!-- Main Container -->
<div class="container"> 
  <!-- Navigation -->
  <header>
    <h1 class="title">Virtual Lab</h1>
  <!--
	<div class="logo">
		<img src="http://nus.edu.sg/images/default-source/base/logo.png" alt="Icon of NUS"  width="110">
	</div>
  -->
  </header>
  <section class="newnav">
	  <nav>
		<ul>
		  <li><a href="home.php">HOME</a></li>
		  <li class="dropdown">
			<a href="#" class="dropbtn">EXPERIMENT</a>
			<div class="dropdown-content">
			  <a href="plc.php">PLC</a>
			  <a href="motor.html">DC MOTOR</a>
			</div>
		  </li>
		  <li><a href="help.php">HELP</a></li>
		  <li><a href="logout.php">LOGOUT</a></li>	
		</ul>
	  </nav>
  </section>
    <?php
}

//输出页脚的函数
//output footer
function do_html_footer() {
?>
  <section class="footer_banner" id="contact">
    <p class="hero_header">FOR THE LATEST NEWS</p>
	<div class="button" onclick="location.href='http://nus.edu.sg/'">contact us</div>
  </section>
  <!-- Copyrights Section -->
  <div class="copyright">&copy;2020 - <strong>Li Hainuo</strong></div>
</div>
  </body>
  </html>
<?php
}

//跳转页面的函数
//jump to next URL
function do_html_URL($url, $name) {
?>
    <br>
    <div class="logintd1">
    <a href="<?php echo $url;?>"><?php echo $name;?></a>
    </div>
    <br>
<?php
}
?>
