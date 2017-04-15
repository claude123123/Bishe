<?php  
    session_start();
    if(isset($_SESSION['username']))
    {
            
    }
    else
    {
        
    }
?>
<?php 
    $username=$_SESSION['username'];
    $dir=$_POST['data'];
    // $realdir = "../album/".$username."/".$dir."/";
    // rmdirs($realdir);
    // echo $realdir;
    // 
    
    $conn = mysqli_connect('localhost','root','','bishe');


    $sql_selectalbumname="SELECT albumname FROM album WHERE albumdir='$dir'";
    $res2 = mysqli_query($conn,$sql_selectalbumname);
    $row =mysqli_fetch_array($res2);
    $albumname=$row['albumname'];

    $sql_deleteimg="DELETE FROM photo WHERE albumname='$albumname'";
    $res1 = mysqli_query($conn,$sql_deleteimg);
    

    $sql_deletealbum="DELETE FROM album where albumdir = '$dir'";
    $res=mysqli_query($conn,$sql_deletealbum);

    
 ?>