$(document).ready(function(){
            $('#log-table').hide();
            $('#reg-nav-log').click(function(){
                $('#reg-table').hide();
                $('#log-table').show();
            });
            $('#reg-nav-reg').click(function(){
                $('#log-table').hide();
                $('#reg-table').show();
            });

            // 注册ajax
            var passlen=$('#rpassword').val().length;

            $('#reg-btn').click(function() {
                alert(passlen);
                var cont = $('#reg-table input').serialize();
                $.ajax({
                    url:"register-act.php",
                    type:'post',
                    dataType:'json',
                    data:cont,
                    success:function(data){
                        $('#rtishi').html(data);
                    }

                })
            })
            // 登录ajax
            $('#log-btn').click(function(){
                var cont = $('#log-table input').serialize();
                $.ajax({
                    url:"log-act.php",
                    type:'post',
                    datatype:'json',
                    data:cont,
                    success:function(data){
                        if(data==1){
                            $(location).attr('href', 'personal/photo.php');
                        }else{
                            var str='用户名或密码错误';
                            $('#ltishi').html(str);
                        }
                    }
                })
            })
        });