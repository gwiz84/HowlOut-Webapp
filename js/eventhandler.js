// EVENT RELATED FUNCTIONS



// Takes an event object and returns the div containing the event data, ready to be displayed
function makeEventElement(event) {
    if (event.Description.length>330) {
        var beforeShort = event.Description;
        var shortDesc = "";
        for (var i=0; i<332; i++) {
            if (i<330) {
                shortDesc += beforeShort.charAt(i);
            }
            else {
                shortDesc += ".";
            }
        }
    }
    var startDate = getDateFromISOString(new Date(Date.parse(event.StartDate)));


    var eventDiv = '<div class="event-box">'+
        '<div class="innertop" style="background-image:url(\''+event.ImageSource+'\');background-size:100%;" data-eventid="'+event.EventId+'">'+
        '<span style="font-size:28px;color:white;" class="textstroke">'+event.Title+'</span>'+
    '</div>'+
    '<div class="innerbottom" >'+
      '  <div class="col-xs-12 col-sm-6" style="overflow: hidden;text-overflow: ellipsis;">'+
        '<span style="">'+shortDesc+'</span>'+
    '</div>'+
    '<div class="col-xs-12 col-sm-6" >'+
        '<i class="fa fa-clock-o icon_time" aria-hidden="true"></i>&nbsp;&nbsp;<span class="eventTime">'+startDate+'</span><br>'+
    '<i class="fa fa-map-marker icon_loc icon_loc" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;&nbsp;<span class="eventLocation">'+event.AddressName+'</span><br>'+
    '<i class="fa fa-user icon_peep" aria-hidden="true"></i>&nbsp;&nbsp;<span class="eventSignedUp">20 / '+event.MaxSize+'</span>'+
        '<br><br><br><br>'+
        '<div style="float:right;">'+
        '<button type="button" class="btn-sm btn-success"><i class="fa fa-share-alt-square" style="font-size:18px;"></i></button>&nbsp;'+
        '<button type="button" class="btn-sm btn-warning"><i class="fa fa-paw" style="font-size:18px;"></i></button>&nbsp;'+
        '<button type="button" class="btn-sm btn-primary"><span style="font-size:14px;">View</span></button>'+
        '</div>'+
        '</div>'+
        '</div>'+
        '</div>';
    return eventDiv;
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




