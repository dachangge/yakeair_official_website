$(function () {


    $(".logo").click(function () {
        console.log("logo click");
    })
    $(".pc-head .container .pv-nav > li").hover(function () {
        if($(this).hasClass("on")){
            return ;
        }else {
            $(this).children(".navdown").stop().slideDown(500).addClass("index-up");
        }
    },function () {
        if($(this).hasClass("on")){
            return ;
        }else  {
            $(this).children(".navdown").stop().slideUp(500);
        }
    });
    $('.d-openmenu').click(function () {
        if($(this).hasClass("act")){
            $(this).removeClass("act");
        }else{
            $(this).addClass('act');
        }
    })
})
