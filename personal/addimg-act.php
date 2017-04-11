<?php  
    session_start();
    if(isset($_SESSION['username']))
    {
            echo "用户名".$_SESSION['username'];
    }
    else
    {
        echo "未登录";
    }
    $username=$_SESSION['username'];

    $photoname = $_FILES['file']['name'];
    $photodis = $_POST['photodis'];
    $dealbum = $_POST['dealbum'];
   

    $conn=mysqli_connect('localhost','root','','bishe');
    $sql_select_album="select albumname,albumdir from album where albumname = '$dealbum'";
    $ret_album = mysqli_query($conn,$sql_select_album);
    $row_album = mysqli_fetch_array($ret_album);


    $albumname=$row_album['albumname'];
    // $albumdir='123';
    $albumdir = $row_album['albumdir'];
    $photodir = "../album/".$username."/".$albumdir."/".$_FILES["file"]["name"];


?>

<?php 
    if($_FILES["file"]["error"]>0){
        echo "错误：".$_FILES["file"]["error"]."<br>";
    }
    else{

    }
 ?>

<?php 
    $allowedExts = array("gif","jpeg","jpg","png");
    $temp = explode(".",$_FILES["file"]["name"]);
    echo $_FILES["file"]["size"];
    $extension = end($temp);
    
    if(in_array($extension, $allowedExts)){
        if($_FILES["file"]["error"]>0){
            echo "错误：".$_FILES["file"]["error"]."<br>";
        }
        else{
            echo "上传文件名：".$_FILES["file"]["name"]."<br>";
            echo "文件类型:".$_FILES["file"]["type"]."<br>";
            echo "文件临时存储的位置:".$_FILES["file"]["tmp_name"]."<br>";
        }
        if(file_exists("../album/".$username."/".$albumdir."/".$_FILES["file"]["name"])){
            echo $_FILES["file"]["name"]."文件已存在";
        }else{
            
            $sql_insert="insert into photo(albumname,username,photoname,photodis,photodir,photodate) values('$albumname','$username','$photoname','$photodis','$photodir',now())";
            mysqli_query($conn,$sql_insert);
            move_uploaded_file($_FILES["file"]["tmp_name"],"../album/".$username."/".$albumdir."/".iconv("UTF-8","gbk",$_FILES["file"]["name"]));
            echo "上传成功";
            echo "文件名：".$_FILES['file']['name'];
        }
        

    }
    else{
        echo "非法的文件格式";
    }


?>

<?php 
    $dir="../album/"."$username"."/"."$albumdir"."/";
    echo "显示目录下所有文件";
    if(is_dir($dir)){
        if($dh=opendir($dir)){
            while(($file=readdir($dh))!=false){
                $filepath=$dir.$file;
                echo "<img src='".$filepath."'/>";
            }
        }
    }

 ?>