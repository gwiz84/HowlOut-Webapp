function runAjax(apiLink, token) {
    return $.ajax({
        type: "POST",
        url: "_apiRequest.php",
        async: true,
        data: {'apiLink' : apiLink, 'token' : token}
    });
}

function runAjaxJSON(apiLink, apiData, token) {
    return $.ajax({
        type: "POST",
        url: "_apiRequestJSON.php",
        async: true,
        data: {'apiLink' : apiLink, 'apiData' : apiData, 'token' : token}
    });
}

function runAjaxDeleteEvent(apiLink, token) {
    return $.ajax({
        type: "POST",
        url: "_apiRequestDelete.php",
        async: true,
        data: {'apiLink' : apiLink, 'token' : token}
    });
}

function runAjaxPut(apiLink, apiData, token) {
    return $.ajax({
        type: "POST",
        url: "_apiRequestPut.php",
        async: true,
        data: {'apiLink' : apiLink, 'apiData' : apiData, 'token' : token}
    });
}