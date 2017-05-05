

// $(document).ready(function(){
//     $("header").swipe({
//         swipeLeft:function(event,direction,duration,fingerCount,fingerData){
//             alert('滑动');
//         },
//         threshold:0
//     });
// });


$(document).ready(function(){

    // 照片相册界面切换
    $(".album").hide();
    $('.nnav-album').click(function(event) {
        $(".photo-img").hide();
        $(".album").show();
         $('#delete-act').html("相册管理");
    });
    $('.nnav-photo').click(function(event) {
        $(".photo-img").show();
        $(".album").hide();
        $('#delete-act').html("照片管理");
    });
    $('.ul-images').viewer();
    $('.img-container').viewer();
   
    // // 上下滚动底部菜单隐藏
    // $(".photo-img").swipe({
    //     swipeUp:function(event,direction,duration,fingerCount,fingerData){
    //         $(".footer-nav").hide(); 
    //     },
    //     threshold:0
    // });

})