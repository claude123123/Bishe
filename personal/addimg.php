<?php  
    session_start();
    if(isset($_SESSION['username']))
    {
            
    }
    else
    {
        echo "未登录";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/addimg.css" />
    <script src="../js/jquery-3.1.1.min.js"></script>
    
</head>
<body>
    <div class="topbar">
            <p><a href="photo.php"><span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></a></span>  返回</p>

    </div>
    <h2>选择照片</h2>
    <form action="addimg-act.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file" />
        <input type="text" name="photodis" id="photodis" placeholder="请输入照片描述" />
        <label for="">是否共享到主页:<br />
        <span>是：</span><input type="radio" name="share" value="y" class="share" />
        <br />
        <span>否：</span><input type="radio" name="share" value="n" class="share" /></label>
        <select name="dealbum" id="dealbum">
            <?php 
                $username=$_SESSION['username'];
                $conn = mysqli_connect('localhost','root','','bishe');
                $sql="SELECT * FROM album where username='$username'";
                
                $result = mysqli_query($conn,$sql);
                
                while ( $row=mysqli_fetch_array($result) ) {
                   
                   echo "<option value='".$row['albumname']."' >".$row['albumname']."</option>";
                 }


             ?>
        </select>
        
        <input type="submit" class="upload-btn" name="submit" value="确定" />
    </form>
</body>
</html>