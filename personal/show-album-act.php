<?php
    session_start();
    if(isset($_SESSION['username']))
    {
            
    }
    else
    {
        echo "未登录";
    }
    $username=$_SESSION['username'];
    $albumname=$_POST['data'];
    $conn = mysqli_connect('localhost','root','','bishe');
    $sql_select="SELECT photodir FROM photo WHERE albumname='$albumname' and username='$username'";
    $result =mysqli_query($conn,$sql_select);
    while($row=mysqli_fetch_array($result)){
        echo ("<div><li><img src='".$row['photodir']."'/></li></div>");
    }
    