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


            $('#reg-btn').click(function() {
                var cont = $('#reg-table input').serialize();
                $.ajax({
                    url:"register-act.php",
                    type:'post',
                    dataType:'json',
                    data:cont,
                    success:function(data){
                        $('#tishi').html(data);
                    }

                })
                
                
            });



        });