$(".menu_bars").addClass('loaded')
$(".menu_bars").click(function(){
    $(this).toggleClass('opened')
    return false;
})
//Child
// $(document).on('click', 'ul.parent>li>a', function(event) {
//     $('ul.parent>li>a span').html('+')
//     if ($(this).hasClass('active')) {
//         $('ul.parent>li>a').removeClass('active')
//         $('ul.parent>li ul').slideUp(300)
//         return false;
//     }
//     $(this).find('span').html('-')
//     $('ul.parent>li>a').removeClass('active')
//     $('ul.parent>li ul').slideUp(300)
//     $(this).addClass('active')
//     $(this).closest("li").children("ul").slideDown(300)
//     return false;

// });

$(".menu_bars").click(function(){
    $(".navigation").addClass('opened')
})
$(".close_nav, .closnav").click(function(){
    $(".navigation").removeClass('opened')
})