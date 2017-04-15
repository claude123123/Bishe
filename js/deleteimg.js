
$(document).ready(function(){
        $('#delete-act').click(function(){
            if( $('#delete-act').text()=="照片管理"){
                if($('.ul-images li a').css('display')=='none'){
                    $('.ul-images li img').css("height","80%");
                    $('.ul-images li a').css('display','block');
                }
                else{
                $('.ul-images li img').css("height","100%");
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
            alert(photodir);
            $.ajax({
                url:"../personal/deleteimg-act.php",
                type:'post',
                datatype:'json',
                data:{"data":photodir},
                success:function(data){
                    alert(data);
                }
            })
        })
        $('.album-cover a').click(function(){
            var albumdir = $(this).attr('id');
            alert(albumdir);
            $.ajax({
                url:"../personal/deletealbum-act.php",
                type:'post',
                datatype:'json',
                data:{"data":albumdir},
                success:function(data){
                    alert(data);
                }
            })
        })
})