
<?php
    $dir=$_POST['data'];
    unlink($dir);
    $conn = mysqli_connect('localhost','root','','bishe');
    $sql_delet="DELETE from photo where photodir='$dir'";
    $res=mysqli_query($conn,$sql_delet);
    
?>