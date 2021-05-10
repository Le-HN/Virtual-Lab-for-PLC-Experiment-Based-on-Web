<?php
//上传学生写好的程序组织单元
//upload the POU files written by students
// 允许上传的文件后缀
$allowedExts = array("export",'xml');
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);     // 获取文件后缀名
if  (($_FILES["file"]["size"] < 7340032)   // 小于 7M
    && in_array($extension, $allowedExts))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo '<script language="JavaScript">;alert("Error!");location.href="plc.php";</script>;';
        
    }
    else
    {
        // 判断当前目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        if (file_exists("upload/" . $_FILES["file"]["name"]))
        {
            echo '<script language="JavaScript">;alert("File existed!");location.href="plc.php";</script>;';
        }
        else
        {
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo '<script language="JavaScript">;alert("Uploaded successfully!");location.href="plc.php";</script>;';
        }
    }
}
else
{
     echo '<script language="JavaScript">;alert("Illegal file format!");location.href="plc.php";</script>;'; 
}
?>
