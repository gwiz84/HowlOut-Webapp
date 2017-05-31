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

    if (searchTerms.length > 0) {
        var today = new Date();
        var isoString = today.toISOString();
        var apiLink = "/event/search?userLat=0&userLong=0&currentTime=" + isoString + "&searchWord=" + searchTerms;
        var token = $(".token").data("token");

        // ajax call to search for events
        runAjax(apiLink, token).done(function(data) {
            $(".searchContent").empty();
            //console.log(data);
            try {
                var jsonObject = JSON.parse(data);
                $(".searchContent").append('<div style="width: 100%;height:50px;padding:5px 10px 10px 10px;" class="eventHeader"><h5 style="font-weight:bold;"><i class="material-icons icon_purple" style="font-size:28px;vertical-align:middle;">event_note</i>&nbsp;&nbsp;Events</h5></div>');
                $.each(jsonObject, function (i, ele) {
                    $(".searchContent").append(''+
                        '<div style="width: 100%;height:50px;padding:10px;cursor:pointer;" data-eventid="' + ele.Id + '" class="resultLink resultLinkHover">' +
                        '<img src="' + ele.SmallImageSource + '" style="width:50px;height:35px;background-size:50px;">' +
                        '<span style="font-size:18px;margin-left: 10px;">' + ele.Title + '</span>' +
                        '</div>'
                    );
                });
                $(".searchContent").append('<hr class="groupHeader eventHeader">');
                $(".searchContent").slideDown(150);
            } catch (e) {
                $(".searchContent").slideUp(150);
            }
        });


        // ajax call to search for groups
        var apiLink2 = "/group/groupsFromName/"+searchTerms;
        runAjax(apiLink2, token).done(function(data) {
            try {
                var jsonObject = JSON.parse(data);
                $(".searchContent").append('<div style="width: 100%;height:50px;padding:5px 10px 10px 10px;" class="groupHeader"><h5 style="font-weight:bold;"><i class="material-icons icon_peep" aria-hidden="true" style="font-size:26px;vertical-align:middle;">group</i>&nbsp;&nbsp;Groups</h5></div>');
                $.each(jsonObject, function (i, ele) {
                    $(".searchContent").append('<div style="width: 100%;height:50px;padding:10px;cursor:pointer;" data-groupid="' + ele.Id + '" class="resultLinkGroup resultLinkHover">' +
                        '<img src="' + ele.SmallImageSource + '" style="width:50px;height:40px;background-size:50px">' +
                        '<span style="font-size:18px;margin-left: 10px;">' + ele.Name + '</span>' +
                        '</div>'
                    );
                });
                $(".searchContent").slideDown(150);
            } catch (e) {
                $(".searchContent").slideUp(150);
            }
        });
        console.log($(".resultLink").length);
        console.log($(".resultLinkGroup").length);
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
            $(".inputSearchBar").val("");
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