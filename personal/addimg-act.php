<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/addimg.css" />

</head>
<body>
    <?php  
        session_start();
        if(isset($_SESSION['username']))
        {
        }
        else
        {
            
        }
        $username=$_SESSION['username'];
        $photoname = $_FILES['file']['name'];
        $photodis = $_POST['photodis'];
        $dealbum = $_POST['dealbum'];
        $wshare = $_POST['share'];
        
        $conn=mysqli_connect('localhost','root','','bishe');
        $sql_select_album="select albumname,albumdir from album where albumname = '$dealbum' and username='$username'";
        $ret_album = mysqli_query($conn,$sql_select_album);
        $row_album = mysqli_fetch_array($ret_album);


        $albumname=$row_album['albumname'];
        // $albumdir='123';
        $albumdir = $row_album['albumdir'];
        $photodir = "../album/".$username."/".$albumdir."/".$_FILES["file"]["name"];




        $allowedExts = array("gif","jpeg","jpg","png");
        $temp = explode(".",$_FILES["file"]["name"]);
        // echo $_FILES["file"]["size"];
        $extension = end($temp);
        
        if(in_array($extension, $allowedExts)){
            if($_FILES["file"]["error"]>0){
                if($_FILES["file"]["error"]==4){
                    echo "<h2 class='red'>未选取图片</h2>";
                }
                else{
                    echo "<h2 class='red'>错误：".$_FILES["file"]["error"]."</h2>";
                }
            }
            if(file_exists("../album/".$username."/".$albumdir."/".$_FILES["file"]["name"])){
                echo "<h2 class='red'>照片已存在</h2>";
                
            }else{
                $sql_insert="insert into photo(albumname,username,photoname,photodis,photodir,photodate,share) values('$albumname','$username','$photoname','$photodis','$photodir',now(),'$wshare')";
                mysqli_query($conn,$sql_insert);
                move_uploaded_file($_FILES["file"]["tmp_name"],"../album/".$username."/".$albumdir."/".iconv("UTF-8","gbk",$_FILES["file"]["name"]));
                echo "<h2 class='green'>上传成功</h2>";
                // echo "文件名：".$_FILES['file']['name'];
            }
            

        }
        else{
            echo "<h2 class='red'>非法的文件格式</h2>";
        }
        echo "<br/><a href='photo.php'  id='goback'>返回</a>";
?>
</body>
</html>


<!-- 
<?php 
   $dir="../album/"."$username"."/"."$albumdir"."/";
     echo "显示目录下所有文件";
     if(is_dir($dir)){
         if($dh=opendir($dir)){
             while(($file=readdir($dh))!=false){
                 $filepath=$dir.$file;
                 echo "<img src='".$filepath."'/>";
            }         }
    }

?> -->