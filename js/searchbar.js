$(".searchContent").hide();

$(".inputSearchBar").keyup(function() {
    var searchTerms = $(".inputSearchBar").val();
    var today = new Date();
    var isoString = today.toISOString();
    if (searchTerms.length>0) {
        var apiLink = "https://api.howlout.net/event/search?userLat=55.62843&userLong=12.578776&currentTime="+isoString+"&searchWord="+searchTerms;
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
                var jsonObject = JSON.parse(data);
                $(".searchContent").empty();
                $.each(jsonObject, function(i,ele) {
                    $(".searchContent").append(''+
                        '<div style="width: 100%;height:50px;padding:10px;cursor:pointer;" data-eventid="'+ele.EventId+'" class="resultLink">'+
                            '<img src="'+ele.SmallImageSource+'" style="width:40px;">'+
                        '<span style="font-size:18px;">'+ele.Title+'</span>'+
                        ''+
                        ''+
                        '</div>'
                    );
                });

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

// Function which closes the search result div when u click outside of it
$(document).mouseup(function (e)
{
    var container = $(".searchContent");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
    }
});

// Click function for search results
$(document.body).on('click', '.resultLink' ,function(){
   var eventId = $(this).data("eventid");
   window.location = "viewevent.php?id="+eventId;
});

$(".inputSearchBar").mousedown(function() {
    $(".searchContent").show(150);
});