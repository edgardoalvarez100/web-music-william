$(function(){

    //open menu function
    $('.open_menu').click(function(){
        if ($(".menu_mobile").hasClass('cler')) {
            $(".menu_mobile").addClass('slide-in-blurred-top')
        }else if ($(".menu_mobile").hasClass('slide-out-blurred-top')) {
            $(".menu_mobile").removeClass('slide-out-blurred-top').addClass('slide-in-blurred-top')
        }else{
            $(".menu_mobile").addClass('slide-out-blurred-top').removeClass('slide-in-blurred-top')
        }
        $(".menu_mobile").removeClass('cler')
        return false;
    })

    //Child
    $(document).on('click', 'ul.parent>li>a', function(event) {
        if ($(this).hasClass('active')) {
            $('ul.parent>li>a').removeClass('active')
            $('ul.parent>li ul').slideUp(300)
            return false;
        }
        $('ul.parent>li>a').removeClass('active')
        $('ul.parent>li ul').slideUp(300)
        $(this).addClass('active')
        $(this).closest("li").children("ul").slideDown(300)
        return false;

    });
})