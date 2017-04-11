<?php 
    session_start();
    $albumname=$_POST['albumname'];
    $albumdis =$_POST['albumdis'];
    $albumdir=time();
    $username=$_SESSION['username'];

    if(!empty($albumname)){
        if(!is_dir("../album/"."$username")){
            mkdir("../album/"."$username",0777);
        }
        if(!is_dir("../album/"."$username"."/"."$albumdir")){
            mkdir("../album/"."$username"."/"."$albumdir",0777);
        }
        $conn = mysqli_connect('localhost','root','','bishe');
        $sql_select="select albumname,username from album where albumname='$albumname' ";
        $ret = mysqli_query($conn,$sql_select);
        $row=mysqli_fetch_array($ret);
        if($albumname==$row['albumname']||$username==$row['username']){
            echo json_encode('相册名重复');
        }else{
            $sql_insert="insert into album(albumname,albumdis,albumdir,username,date) values('$albumname','$albumdis','$albumdir','$username',now())";
            mysqli_query($conn,$sql_insert);
            echo json_encode('创建相册成功');
        }
        mysqli_close($conn);
    }else{
        echo "创建失败";
    }


 ?>