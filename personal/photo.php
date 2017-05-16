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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/photo.css" />
        <link rel="stylesheet" href="../css/viewer.min.css" />
        <link rel="stylesheet" href="../css/show-album.css" />

        <script src="../js/jquery-3.1.1.min.js"></script>
        <script src="../js/jquery.touchSwipe.min.js"></script>
        <script src="../js/photo-html.js"></script>
        <script src="../js/viewer-jquery.min.js"></script>
        
        
    </head>
    <body>
        <header>
            <div class="bground">
                <img src="../images/backgroundwall.png"  alt="" />
            </div>
            <div class="avatar">
                <img src="../images/avatar.png" alt="头像" class="img-circle" />
            </div>
            <div class="p-menu">
                <a href="../index.html" class="btn btn-lg"><span class='glyphicon glyphicon-remove-sign'></span></a>
                <a href="#2" class="btn btn-lg" id="delete-act">照片管理</a>
                <a href="#2" class="btn btn-lg"><span class="glyphicon glyphicon-info-sign"></span></a>
                
                
            </div>
            <div class="u-name">
            <?php echo "<p>".$_SESSION['username']."</p>"; ?>
            </div>
        </header>
        <section class='nnav'>
            <a href="#2" class="nnav-photo">照片</a>
            <a href="#2" class="nnav-album">相册</a>
        </section>
        <div class="photo-img">
            <ul class="ul-images">
                
                <!-- <div><li><img src="../photo/_DSC3887-2.jpg" alt="" /><a href="#2" id="$row['photodir']">X</a></li></div>

                <div><li><img src="../photo/_DSC3842-1.jpg" alt="" /><a href="#2">X</a></li></div>
                <div><li><img src="../photo/_DSC3921-1.jpg" alt="" /><a href="#2">X</a></li></div>
                <div><li><img src="../photo/_DSC3942-1.jpg" alt="" /><a href="#2">X</a></li></div>
                <div><li><img src="../photo/_DSC3930-1.jpg" alt="" /><a href="#2">X</a></li></div>
 -->
            <?php 
                $username=$_SESSION['username'];
                $conn = mysqli_connect('localhost','root','','bishe');
                $sql="SELECT photodir FROM photo WHERE username='$username'";
                
                $result = mysqli_query($conn,$sql);
                // 循环遍历输出用户所有照片
                while ( $row=mysqli_fetch_array($result) ) {

                    echo "<div><li><img src='".$row['photodir']."'/><a href='#2' id='".$row['photodir']."'>X</a></li></div>";
                 }
             ?>
            </ul>
            
        </div>
        <div class="album">
           <?php 
                $sql1="SELECT albumname,albumdir FROM album WHERE username='$username'";
                $result1=mysqli_query($conn,$sql1);
                // 循环遍历显示所有用户相册
                while($row1=mysqli_fetch_array($result1)){
                    $albumname=$row1['albumname'];
                    $sql2 = "SELECT photodir from photo where albumname='$albumname' and username='$username'";
                    $result2 = mysqli_query($conn,$sql2);
                    $row2=mysqli_fetch_array($result2);
                    echo "<div class='album-cover'> 
                            <div>
                                
                            <img src='".$row2['photodir']." ' id='".$row1['albumname']."'  />
                            </div>
                            <p>".$row1['albumname']."</p><a href='#2' id='".$row1['albumdir']."' class='deleteicon'>X</a></div>";
                }

            ?>


            <!-- <div class="album-cover">
                <img src="../photo/_DSC3922-1.jpg"  alt="" />
                <p>相册名字</p>
                <a href="#2">X</a>
            </div>
            <div class="album-cover">
                <img src="../photo/_DSC3922-1.jpg"  alt="" />
                <p>相册名字</p>
                <a href="#2">X</a>
            </div> -->
            <div class="add-album">
                <a href="addalbum.php"><span class="glyphicon glyphicon-plus"></span></a>
            </div>
            
        </div>
        <div class="show-album">
            <p><a href="photo.php"><span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></a></span>  返回</p>
            <ul class="show-album-ul">
                
            </ul>
        </div>
        <nav class="footer-nav">
            <div>
                <a href="home.php"><span class="glyphicon glyphicon-home"></span></a>
                <a href="addimg.php"><span class="glyphicon glyphicon-camera"></span></a>
                <a href="photo.php"><span class="glyphicon glyphicon-user"></span></a>
            </div>
        </nav>
        <script src="../js/deleteimg.js"></script>
        <script src="../js/show-album.js"></script>
    </body>
</html>