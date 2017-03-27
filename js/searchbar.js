$(".searchContent").hide();

$(".inputSearchBar").keyup(function() {
    var searchTerms = $(".inputSearchBar").val();
    var today = new Date();
    var isoString = today.toISOString();
    if (searchTerms.length>0) {
        var apiLink = "https://api.howlout.net/event/search?userLat=0&userLong=0&currentTime="+isoString+"&searchWord="+searchTerms;
        var apiData = JSON.stringify({
            userLat : 0,
            userLong : 0,
            currentTime : isoString,
            searchWord : searchTerms
        });
        var token = $(".token").data("token");
        $.ajax({
            type: 'post',
            url: '_apiRequest.php',
            async: false,
            data: {'apiLink' : apiLink, 'apiData' : apiData, 'token' : token},
            success: function (data) {
                // alert(data);
                $(".searchContent").append(data);
                $(".searchContent").show(150);
            },
            error: function () {
                alert("An unknown error has occurred. Sorry");
            }
        });
    } else {
        $(".searchContent").hide(150);
    }
});

// Function which closes the search bar when u click outside of it
$(document).mouseup(function (e)
{
    var container = $(".searchContent");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
    }
});
