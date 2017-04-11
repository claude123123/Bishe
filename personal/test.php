


<?php 
    $conn = mysqli_connect('localhost','root','','bishe');
    $sql="SELECT photodir FROM photo";
    
    $result = mysqli_query($conn,$sql);
    
    while ( $row=mysqli_fetch_array($result) ) {
       
      echo "<img src='".$row['photodir']."'/>";
     }


 ?>