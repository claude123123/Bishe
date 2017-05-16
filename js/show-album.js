/* 
* @Author: anchen
* @Date:   2017-05-10 08:44:05
* @Last Modified by:   anchen
* @Last Modified time: 2017-05-16 19:29:51
*/

$(document).ready(function(){
    $('.album-cover div img').click(function(){
        var albumname=$(this).attr('id');
        
        $.ajax({
            url:"../personal/show-album-act.php",
            type:'post',
            datatype:'json',
            data:{"data":albumname},
            success:function(data){
                $('.album').hide();
                $('header').hide();
                $('.nnav').hide();
                $('.show-album').show();
                
                $('.show-album ul').html("<h1>"+albumname+"</h1>"+data);
            }
        })
    })
});