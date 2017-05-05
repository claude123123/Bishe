<?php
    // 接收参数
    header("Content-type:text/html;charset=utf-8");
    $username = $_POST['rusername'];
    $password = $_POST['rpassword'];
    $repassword = $_POST['rrepassword'];
    $json_arr = array('username'=>$username,'password'=>$password,'repassword'=>$repassword);
    $json_obj = json_encode($json_arr);
    
    
    // 判断密码是否统一
    if($password==$repassword){
        
        $conn = mysqli_connect('localhost','root','','bishe');
        $sql_select="SELECT username FROM user WHERE username='$username'";
        $ret = mysqli_query($conn,$sql_select);
        $row = mysqli_fetch_array($ret);
        
        // 判断数据库中是否存在相同用户名
        if($username == $row['username']){
            
            echo json_encode("用户名存在");
        }else{
            // 默认相册文件夹路径
            $albumdir=time();
            // 插入数据创建用户
            $sql_insert="INSERT INTO user(username,password) VALUES('$username','$password')";
            // 创建默认相册
            $sql_insert_defaultalbum="INSERT INTO album(username,albumname,albumdir,date) values('$username','默认相册','$albumdir',now())";
            mysqli_query($conn,$sql_insert);
            mysqli_query($conn,$sql_insert_defaultalbum);
            echo json_encode("注册成功");
            // 创建用户文件夹
            mkdir("album/"."$username",0777);
            // 创建用户默认相册文件夹
            mkdir("album/"."$username"."/"."$albumdir",0777);
        }
        mysqli_close($conn);
        
    }   else{
        echo json_encode("错误");
       
    }

?>