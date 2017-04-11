<?php  
    session_start();
    if(isset($_SESSION['username']))
    {
            echo "用户名".$_SESSION['username'];
    }
    else
    {
        echo "未登录状态";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
    <script src="../js/jquery-3.1.1.min.js"></script>
</head>
<body>
    <h1>创建相册</h1>
    <div id="album-input">
        <input type="text" id="albumname" name="albumname" placeholder="请输入相册名" />
        <input type="text" id="albumdis" name="albumdis" placeholder="相册简介" />
        <input type="submit" value="创建相册" id="addalbum-btn"/>
    </div>
    <script>
    $(document).ready(function(){
        $('#addalbum-btn').click(function(){
            var cont = $('#album-input input').serialize();
            alert(cont);
            $.ajax({
                url:"addalbum-act.php",
                type:'post',
                dataType:'json',
                data:cont,
                success:function(data){

                }
            })
        })
    })
    </script>
</body>
</html>