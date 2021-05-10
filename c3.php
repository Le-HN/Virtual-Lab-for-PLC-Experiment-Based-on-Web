<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/forAutoRef.css">
<?php
//自动刷新c3气缸的状态并体现在网页上
//update the state of cylinder 3 and show it on webpage
    require_once('bm_functions.php');
    $state=plc_sta('c3');
    if ($state == 0){
        $staout="Pull back";
    }
    elseif($state == 1){
        $staout="Push out";
            }
            elseif($state == 2){
                $staout="Running";
            }
    echo '<div class="autref">'.$staout.'</div>';
    auto_ref();
?>