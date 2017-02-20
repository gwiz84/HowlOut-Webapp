var lastScrollTop = 0;
$(window).scroll(function() {
    var st = window.pageYOffset || document.documentElement.scrollTop;
    var sp = $(this).scrollTop();
    console.log("st: " + st + ", sp: " + sp + ", ls: " + lastScrollTop);
    if(st > 200)
    {
        if (st > lastScrollTop) {
            // console.log("st: " + st);
            $('.left-menu-container').css("top","10px");
            $('.left-menu-container').css("position","fixed");
            $(".main-content-container").css("left", "195px");
        } else {
            // console.log("else " + lastScrollTop);
            if (st < 200) {
                $('.left-menu-container').css("top","200px");
            }
            $('.left-menu-container').css("position","static");
            $(".main-content-container").css("left", "0px");
        }

    // } else {
    //     console.log("else");
    //     if (sp < 200) {
    //             $('.left-menu-container').css("top","200px");
    //         }
    //     $('.left-menu-container').css("position","static");
    }
    lastScrollTop = st;
});