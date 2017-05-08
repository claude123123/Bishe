<?php  
    session_start();
    if(isset($_SESSION['username']))
    {
          
    }
    else
    {
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/addalbum.css" />
    <script src="../js/jquery-3.1.1.min.js"></script>
</head>
<body>
    <div class="topbar">
            <p><a href="photo.php"><span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></a></span>  返回</p>

    </div>
    <h2 id="ctitle">创建相册</h2>
    <div id="album-input">
        <input type="text" id="albumname" name="albumname" placeholder="请输入相册名" />
        <input type="text" id="albumdis" name="albumdis" placeholder="相册简介" />
        <input type="submit" value="创建相册" id="addalbum-btn"/>
    </div>
    <div class="ctishi">
       <!--  <h3 id="ctishi"></h3>
        <a href="../personal/photo.php" class="goback">返回</a> -->
    </div>
    <script>
    $(document).ready(function(){
        $('#addalbum-btn').click(function(){
            var cont = $('#album-input input').serialize();
            
            $.ajax({
                url:"addalbum-act.php",
                type:'post',
                dataType:'json',
                data:cont,
                success:function(data){
                    $('#album-input').hide();
                    $('#ctitle').hide();
                    $('.topbar').hide();
                    $('.ctishi').html("<h3 id='ctishi'>"+data+"</h3><a href='../personal/photo.php' class='goback'>返回</a>");
                    
                }
            })
        })
    })
    </script>
</body>
</html>