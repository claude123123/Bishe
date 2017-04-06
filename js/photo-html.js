

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
    $(".ablum").hide();
    $('.nnav-ablum').click(function(event) {
        $(".photo-img").hide();
        $(".ablum").show();
    });
    $('.nnav-photo').click(function(event) {
        $(".photo-img").show();
        $(".ablum").hide();
    });
    $('.ul-images').viewer();

    // // 上下滚动底部菜单隐藏
    // $(".photo-img").swipe({
    //     swipeUp:function(event,direction,duration,fingerCount,fingerData){
    //         $(".footer-nav").hide(); 
    //     },
    //     threshold:0
    // });

})