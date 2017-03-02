// EVENT RELATED FUNCTIONS


// Takes an event object and returns the div containing the event data, ready to be displayed
function makeEventElement(event) {
    var eventDiv = '<div class="event-box">'+
    ' <div class="innertop" data-eventid="'+event.EventId+'" style="background-image:url(\''+event.ImageSource+'\');background-size:100%;">'+
    '  <span style="font-size:28px;color:white;" class="textstroke">'+event.Title+'</span> '+
    ' </div>'+

    '<div class="innerbottom">'+
    '  <i class="fa fa-paw btnTrackEvent eventpaw" style="float:right;font-size:42px;cursor:pointer;"></i>'+
    '  <i class="fa fa-clock-o icon_time" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;<span class="eventTime">'+event.StartDate+'</span><br>'+
    ' <i class="fa fa-map-marker icon_loc icon_loc" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;&nbsp;<span class="eventLocation">'+event.AddressName+'</span><br>'+
    ' <i class="fa fa-user icon_peep" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;<span class="eventSignedUp">'+event.NumberOfAttendees+' / '+event.MaxSize+'</span>'+
    ' </div>'+
    ' </div>';
    return eventDiv;
}