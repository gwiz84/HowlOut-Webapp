var apiSite = "http://api.howlout.dk";

// Used on: aboutme.php, 
function runAjax(apiLink, token) {
    return $.ajax({
        type: "POST",
        url: "_apiRequest.php",
        async: true,
        data: {'apiLink' : apiSite + apiLink, 'token' : token}
    });
}

// Used on:
function runAjaxJSON(apiLink, apiData, token) {
    return $.ajax({
        type: "POST",
        url: "_apiRequestJSON.php",
        async: true,
        data: {'apiLink' : apiSite + apiLink, 'apiData' : apiData, 'token' : token}
    });
}

// Used on: eventmanager.php to delete events
function runAjaxDeleteEvent(apiLink, token) {
    return $.ajax({
        type: "POST",
        url: "_apiRequestDelete.php",
        async: true,
        data: {'apiLink' : apiSite + apiLink, 'token' : token}
    });
}

// Used on:
function runAjaxPut(apiLink, apiData, token) {
    return $.ajax({
        type: "POST",
        url: "_apiRequestPut.php",
        async: true,
        data: {'apiLink' : apiSite + apiLink, 'apiData' : apiData, 'token' : token}
    });
}

// Used on:
function runAjaxRequestProfile(apiLink, token, facebookName) {
    return $.ajax({
        type: "POST",
        url: "_apiRequestProfile.php",
        async: true,
        data: {'apiLink' : apiSite + apiLink, 'token' : token, 'name' : facebookName}
    });
}