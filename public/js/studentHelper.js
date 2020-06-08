function searchForPersons(route, data, callback){
    makeAjaxCall(route, 'GET', data, function (students) {
        callback(students);
    });
}
