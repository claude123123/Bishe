
$(document).ready(function(){
        $('#delete-act').click(function(){
            if( $('#delete-act').text()=="照片管理"){
                if($('.ul-images li a').css('display')=='none'){
                    $('.ul-images li img').css("height","120px");
                    $('.ul-images li a').css('display','block');
                }
                else{
                $('.ul-images li img').css("height","150px");
                $('.ul-images li a').css('display','none');
                }
            }
             else{
                if($('.album-cover a').css('display')=='none'){
                    $('.album-cover a').css('display','block');
                }
                else{
                $('.album-cover a').css('display','none');
                }
            }
        })
        $('.ul-images li a').click(function(){
            var photodir = $(this).attr('id');
           
            $.ajax({
                url:"../personal/deleteimg-act.php",
                type:'post',
                datatype:'json',
                data:{"data":photodir},
                success:function(data){
                    alert('删除成功');
                    window.location.reload();
                }
            })
        })
        $('.album-cover a').click(function(){
            var albumdir = $(this).attr('id');
            $.ajax({
                url:"../personal/deletealbum-act.php",
                type:'post',
                datatype:'json',
                data:{"data":albumdir},
                success:function(data){
                    alert('删除成功');
                    window.location.reload();
                }
            })
        })
})