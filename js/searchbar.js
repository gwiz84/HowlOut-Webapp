// hide the result div initially
$(".searchContent").hide();

var searchTerms = "";
var timeoutID = null;


// key up function for the search bar in the top
$(".inputSearchBar").keyup(function (e) {
    clearTimeout(timeoutID);
    timeoutID = setTimeout(function() {
        searchEvent();
    }, 700);
});

// function which searches through events in the api based on search terms.
function searchEvent() {

    searchTerms = $(".inputSearchBar").val();
    console.log("Search: "+searchTerms);
    if (searchTerms.length > 0) {
        var today = new Date();
        var isoString = today.toISOString();
        var apiLink = "https://api.howlout.net/event/search?userLat=55.62843&userLong=12.578776&currentTime=" + isoString + "&searchWord=" + searchTerms;
        var token = $(".token").data("token");

        $.ajax({
            type: 'post',
            url: '_apiRequest.php',
            async: false,
            data: {'apiLink': apiLink, 'token': token},
            success: function (data) {
                $(".searchContent").empty();
                try {
                    var jsonObject = JSON.parse(data);
                    $.each(jsonObject, function (i, ele) {
                        $(".searchContent").append('' +
                            '<div style="width: 100%;height:50px;padding:10px;cursor:pointer;" data-eventid="' + ele.EventId + '" class="resultLink">' +
                            '<img src="' + ele.SmallImageSource + '" style="width:40px;">' +
                            '<span style="font-size:18px;">' + ele.Title + '</span>' +
                            '</div>'
                        );
                    });
                    $(".searchContent").slideDown(150);
                } catch (e) {
                    $(".searchContent").slideUp(150);
                }
            },
            error: function () {
                alert("An unknown error has occurred. Sorry");
            }
        });

    } else {
        $(".searchContent").slideUp(150);
    }
}

// Function which closes the search result div when u click outside of it
$(document).mouseup(function (e) {
    var container = $(".searchContent");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
    }
});

// Click function for search results
$(document.body).on('click', '.resultLink', function () {
    var eventId = $(this).data("eventid");
    window.location = "viewevent.php?id=" + eventId;
});

$(".inputSearchBar").mousedown(function () {
    if (searchTerms.length>0) {
        $(".searchContent").slideDown(150);
    }
});