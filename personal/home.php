<?php  
    session_start();
    if(isset($_SESSION['username']))
    {
            // echo "用户名".$_SESSION['username'];
    }
    else
    {
        // echo "未登录";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/viewer.min.css" />
        <link rel="stylesheet" href="../css/home.css" />
        <script src="../js/jquery-3.1.1.min.js"></script>
        <script src="../js/jquery.touchSwipe.min.js"></script>
        <script src="../js/viewer-jquery.min.js"></script>
        <script src="../js/photo-html.js"></script>
    </head>
    <body>
        <div class="img-wall">
            <ul class="img-container">
                <!-- <li>
                    <img src="../photo/_DSC3887-2.jpg"  alt="" />
                    <h2>照片描述或感触</h2>
                    <p>作者名</p>
                </li>
                <li>
                    <img src="../photo/_DSC3842-1.jpg"  alt="" />
                    <h2>照片描述或感触</h2>
                    <p>作者名</p>
                </li>
                <li>
                    <img src="../photo/_DSC3921-1.jpg"  alt="" />
                    <h2>照片描述或感触</h2>
                    <p>作者名</p>
                </li> -->
                <?php 
                    $username=$_SESSION['username'];
                    $conn = mysqli_connect('localhost','root','','bishe');
                    $sql="SELECT photodir,username,photodis FROM photo WHERE share='y' ORDER BY photoid desc";  
                    $result = mysqli_query($conn,$sql);
                    // 循环遍历输出所有照片
                    while ( $row=mysqli_fetch_array($result) ) {
                        echo "<li><img src='".$row['photodir']."'/><h2>".$row['photodis']."</h2><p>".$row['username']."</p></li>";
                     }
                 ?>
            </ul>
            
        </div>
        <nav class="footer-nav">
            <div>
                <a href="../personal/home.php"><span class="glyphicon glyphicon-home"></span></a>
                <a href="addimg.php"><span class="glyphicon glyphicon-camera"></span></a>
                <a href="../personal/photo.php"><span class="glyphicon glyphicon-user"></span></a>
            </div>
        </nav>
    </body>
</html>