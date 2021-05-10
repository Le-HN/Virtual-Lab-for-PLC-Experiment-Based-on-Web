<?php 
    require_once('bm_functions.php');
//内嵌入plc.php的气缸状态面板
//cylinder state panel embedded in plc.php
?>
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/forPanel.css">

<body style="background-color: #DCDCDC;">
<h1 style="
    font-family: source-sans-pro;
    text-align: center;
    color: #00008B;">Situation of cylinders</h1>
<?php
    plc_cly();
?>

</body>