// hide the result div initially
$(".searchContent").hide();

var searchTerms = "";
var timeoutID = null;


// key up function for the search bar in the top
$(".inputSearchBar").keyup(function (e) {
    clearTimeout(timeoutID);
    timeoutID = setTimeout(function() {
        searchEvent();
    }, 600);
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

        // ajax call to search for events
        $.ajax({
            type: 'post',
            url: '_apiRequest.php',
            async: false,
            data: {'apiLink': apiLink, 'token': token},
            success: function (data) {
                $(".searchContent").empty();
                try {
                    var jsonObject = JSON.parse(data);
                    $(".searchContent").append('<div style="width: 100%;height:50px;padding:10px;" class="eventHeader"><h5><i class="material-icons icon_purple" style="font-size:28px;vertical-align:middle;">event_note</i>&nbsp;&nbsp;Event results</h5></div>');
                    $.each(jsonObject, function (i, ele) {
                        $(".searchContent").append(''+
                            '<div style="width: 100%;height:50px;padding:10px;cursor:pointer;" data-eventid="' + ele.EventId + '" class="resultLink resultLinkHover">' +
                            '<img src="' + ele.SmallImageSource + '" style="max-height:40px;">' +
                            '<span style="font-size:18px;margin-left: 10px;">' + ele.Title + '</span>' +
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

        // ajax call to search for groups
        var apiLink2 = "https://api.howlout.net/group/groupsFromName/"+searchTerms;
        $.ajax({
            type: 'post',
            url: '_apiRequest.php',
            async: false,
            data: {'apiLink': apiLink2, 'token': token},
            success: function (data) {
                try {
                    var jsonObject = JSON.parse(data);
                    $(".searchContent").append('<div style="width: 100%;height:50px;padding:10px;" class="groupHeader"><h5><i class="material-icons icon_peep" aria-hidden="true" style="font-size:26px;vertical-align:middle;">group</i>&nbsp;&nbsp;Group results</h5></div>');
                    $.each(jsonObject, function (i, ele) {
                        $(".searchContent").append('<div style="width: 100%;height:50px;padding:10px;cursor:pointer;" data-groupid="' + ele.GroupId + '" class="resultLinkGroup resultLinkHover">' +
                            '<img src="' + ele.ImageSource + '" style="max-height:40px;">' +
                            '<span style="font-size:18px;margin-left: 10px;">' + ele.Name + '</span>' +
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

        if ($(".resultLink").length <1) {
            $(".eventHeader").remove();
        }
        if ($(".resultLinkGroup").length <1) {
            $(".groupHeader").remove();
        }

    } else {
        $(".searchContent").slideUp(150);
    }
}

// Function which closes the search result div when u click outside of it
$(document).mouseup(function (e) {
    var container = $(".searchContent");
    var searchBar = $(".inputSearchBar");
    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0 ) // ... nor a descendant of the container
    {
        if (!container.is(searchBar)) {
            container.hide();
        }
    }
});

// Click function for event search results
$(document.body).on('click', '.resultLink', function () {
    var eventId = $(this).data("eventid");
    window.location = "viewevent.php?id=" + eventId;
});

// Click function for group search results
$(document.body).on('click', '.resultLinkGroup', function () {
    var groupId = $(this).data("groupid");
    window.location = "viewgroup.php?id=" + groupId;
});

// function
$(".inputSearchBar").mouseup(function () {
    if (searchTerms.length>0) {
        $(".searchContent").slideDown(150);
    }

});