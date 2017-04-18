// EVENT RELATED FUNCTIONS


// Takes an event object and returns the div containing the event data, ready to be displayed
function makeEventElement(event) {
    var shortDesc = "";
    if (event.Description.length > 330) {
        var beforeShort = event.Description;
        for (var i = 0; i < 332; i++) {
            if (i < 330) {
                shortDesc += beforeShort.charAt(i);
            }
            else {
                shortDesc += ".";
            }
        }
    } else {
        shortDesc = event.Description;
    }

    var startDate = getDateFromISOString(new Date(Date.parse(event.StartDate)));

    var eventDiv = '<div class="event-box" data-eventid="'+event.EventId+'">'+
        '<div class="innertop" style="background-image:url(\''+event.ImageSource+'\');background-size:100%;">'+
        '<span style="font-size:28px;color:white;" class="textstroke">'+event.Title+'</span>'+
    '</div>'+
    '<div class="innerbottom" >'+
      '  <div class="col-xs-12 col-sm-6" style="overflow: hidden;text-overflow: ellipsis;">'+
        '<span style="">'+shortDesc+'</span>'+
    '</div>'+
    '<div class="col-xs-12 col-sm-6" >'+
        '<i class="fa fa-clock-o icon_time" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;<span class="eventTime">'+startDate+'</span><br>'+
    '<i class="fa fa-map-marker icon_loc icon_loc" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;&nbsp;<span class="eventLocation">'+event.AddressName+'</span><br>'+
    '<i class="fa fa-user icon_peep" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;<span class="eventSignedUp">'+event.NumberOfAttendees+' / '+event.MaxSize+'</span>'+
        '<br><br><br><br>'+
        '<div style="float:right;">'+
        '<button type="button" class="howlout-button btn-shareevent"><i class="fa fa-share-alt-square" style="font-size:20px;"></i></button>&nbsp;'+
        '<button type="button" class="howlout-button btn-followevent"><i class="fa fa-paw" style="font-size:20px;"></i></button>&nbsp;'+
        '<button type="button" class="howlout-button btn-viewevent" ><span style="font-size:20px;"><i class="fa fa-eye" aria-hidden="true"></i></span></button>'+
        '</div>'+
        '</div>'+
        '</div>'+
        '</div>';
    return eventDiv;
}

// Takes an event object and returns the div containing the event data, ready to be displayed
function makeEditEventElement(event) {
    var shortDesc = "";
    if (event.Description.length > 330) {
        var beforeShort = event.Description;
        for (var i = 0; i < 332; i++) {
            if (i < 330) {
                shortDesc += beforeShort.charAt(i);
            }
            else {
                shortDesc += ".";
            }
        }
    } else {
        shortDesc = event.Description;
    }

    var startDate = getDateFromISOString(new Date(Date.parse(event.StartDate)));

    var editEventDiv =
        '<div class="event-box">'+
            '<div class="innertop" style="background-image:url(\''+event.ImageSource+'\');background-size:100%;">'+
                '<span style="font-size:28px;color:white;" class="textstroke">'+event.Title+'</span>'+
            '</div>'+
            '<div class="innerbottom">'+
                '<div class="col-xs-12 col-sm-6" style="overflow: hidden;text-overflow: ellipsis;">'+
                    '<span style="">'+shortDesc+'</span>'+
                '</div>'+
                '<div class="col-xs-12 col-sm-6">'+
                    '<i class="fa fa-clock-o icon_time" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;<span class="eventTime">'+startDate+'</span><br>'+
                    '<i class="fa fa-map-marker icon_loc icon_loc" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;&nbsp;<span class="eventLocation">'+event.AddressName+'</span><br>'+
                    '<i class="fa fa-user icon_peep" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;<span class="eventSignedUp">'+event.NumberOfAttendees+' / '+event.MaxSize+'</span>'+
                    '<br><br><br><br>'+
                    '<div style="float:right;" data-eventid="'+event.EventId+'" data-eventtitle="'+event.Title+'">'+
                        '<button type="button" class="howlout-button btn-editevent"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Edit</button>&nbsp;'+
                        '<button type="button" class="howlout-button btn-duplicateevent"><i class="fa fa-files-o" aria-hidden="true"></i>&nbsp;&nbsp;Duplicate</button>&nbsp;'+
                        '<button type="button" class="howlout-button btn-deleteevent"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;&nbsp;Delete</span></button>&nbsp;'+
                        '<button type="button" class="howlout-button btn-viewevent"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View</span></button>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>';
    return editEventDiv;
}

function getDateFromISOString(dateString) {
    var months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var dDay = dateString.getDate();
    var dMonth = dateString.getMonth();
    var dYear = dateString.getYear() + 1900;
    var dHours = dateString.getHours();
    var dMinutes = dateString.getMinutes();
    dHours = (dHours <= 9 ? ('0' + dHours) : dHours);
    dMinutes = (dMinutes <= 9 ? ('0' + dMinutes) : dMinutes);
    dMonth = months[dMonth];

    return dMonth + " " + dDay + " " + dYear + " " + dHours + ":" + dMinutes;
}