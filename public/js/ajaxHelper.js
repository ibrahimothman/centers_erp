function makeAjaxCall(route, verb, data, onSuccess, onFailure) {
    $.ajax({
        url: route,
        type: verb,
        data: data,
        success: function (response) {
            onSuccess(response);
        },
        error: function (xhr, status, error) {
            onFailure(xhr, status, error);
        }
    })
}
