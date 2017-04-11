<?php
    // var_dump($_POST);
    header("Content-type:text/html;charset=utf-8");
    $username = $_POST['rusername'];
    $password = $_POST['rpassword'];
    $repassword = $_POST['rrepassword'];
    $json_arr = array('username'=>$username,'password'=>$password,'repassword'=>$repassword);
    $json_obj = json_encode($json_arr);
    // echo $json_obj;
    

    if($password==$repassword){
        
        $conn = mysqli_connect('localhost','root','','bishe');
        $sql_select="SELECT username FROM user WHERE username='$username'";
       
        $ret = mysqli_query($conn,$sql_select);
        $row = mysqli_fetch_array($ret);
        
        
        if($username == $row['username']){
            
            echo json_encode("用户名存在");
        }else{
            $albumdir=time();
            $sql_insert="INSERT INTO user(username,password) VALUES('$username','$password')";
            $sql_insert_defaultalbum="INSERT INTO album(username,albumname,albumdir,date) values('$username','默认相册','$albumdir',now())";
            mysqli_query($conn,$sql_insert);
            mysqli_query($conn,$sql_insert_defaultalbum);
            echo json_encode("注册成功");
            mkdir("album/"."$username",0777);
            mkdir("album/"."$username"."/"."$albumdir",0777);
            

        }
        mysqli_close($conn);
        
    }   else{
        echo json_encode("错误");
       
    }

?>