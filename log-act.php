<?php
    $username = $_POST['lusername'];
    $password = $_POST['lpassword'];
    

    if(!empty($username)&&!empty($password)){
        $conn = mysqli_connect('localhost','root','','bishe');
        $sql_select="select * from user where username='$username' and password='$password'";
        $ret = mysqli_query($conn,$sql_select);
        $row = mysqli_fetch_array($ret);
        if($username==$row['username']&&$password==$row['password']){
            session_start();
            $_SESSION['username']=$username;

            echo 1;
            
        }else{
            echo 0;
        }
    }

    
    
    