
$(".menuSettings").hide();

var menuSettingsOpen = false;
$(".btnMenuSettings").click(function() {
    if (menuSettingsOpen) {
        $(".menuSettings").slideUp(150);
        menuSettingsOpen = false;
    } else {
        $(".menuSettings").slideDown(150);
        menuSettingsOpen = true;
    }

});

