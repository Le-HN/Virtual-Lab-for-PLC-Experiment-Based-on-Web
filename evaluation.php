<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/forAutoRef.css">
<?php
//自动刷新实验结果并体现在网页上
//update experiment result and show it on webpage
    require_once('bm_functions.php');
    $exp_result=plc_exp_res();
    echo '<div class="autref">'.$exp_result.'</div>';
    auto_ref();
?>