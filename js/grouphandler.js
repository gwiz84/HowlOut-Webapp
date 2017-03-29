/**
 * Created by Giuseppe on 29-03-2017.
 */
function makeGroupElement(ele) {
    var groupDiv = '' +
        '<div class=" col-md-2 groupLink" style="text-align:center;" data-groupid="'+ele.GroupId+'">'+
        '<img src="'+ele.SmallImageSource+'" class="member-circle"><br>'+
        '<p class="">'+ele.Name+'</p>'+
        '</div>';
    return groupDiv;
}