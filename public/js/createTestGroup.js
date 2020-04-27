
$('input#addButton').on('click', function() {
    var id = ($('.field .form-row').length).toString();
    $('.field').append(
        '<div class="form-row "> ' +
        '<div class="col-sm-6 col-md-2 form-group">' +
        '<label for="validationCustom01">   تاريخ الامتحان</label>' +
        '<div class="input-group-append"> ' +
        '<input value="2020-05-01" id="date-' +id+'" name="test_time['+ id +'][data]" class="form-control datetimepicker"  placeholder="تاريخ الامتحان"    type="text" >' +
        '<span class="fas fa-calendar-alt input-group-text start_date_calendar" aria-hidden="true "></span>' +
        ' </div></div>' +
        '<div class="col-sm-6 col-md-2 form-group ">' +
        '<label for="test_time['+ id +'][begin]">  البدايه  </label>' +
        '<select name="test_time['+ id +'][begin]" class="form-control begins"  id="begin-'+id+'"    ></select>' +
        '</div>' +
        '<div class="col-sm-6 col-md-2 form-group ">' +
        '<label for="test_time['+ id +'][end]">  النهايه  </label>' +
        '<select name="test_time['+ id +'][end]" class="form-control char"  id="end-'+id+'"    ></select>' +
        '</div>' +
        '<div class="col-sm-6 col-md-2 form-group ">' +
        '<label for="test_time['+ id +'][room]">  الغرفه  </label>' +
        '<select name="test_time['+ id +'][room]" class="form-control char"  id="room-'+id+'"    ></select>' +
        '</div>' +
        '<div class="col-sm-6 col-md-1 form-group ">' +
        '<label for="validationCustom01">  عدد المقاعد  </label>' +
        '<input type="number" name="test_time['+ id +'][seats]" class="form-control char"  id="seat-'+id+'"    >' +
        '</div>' +
        '</div></div>');
    $(".datetimepicker").datetimepicker({
        timepicker:false,
        format:'Y-m-d'
    });
});


$(document).on('change', '[id^=datetimepicker-]', function () {
    var id = $(this).attr('id').split('-')[1];
    $('#begin-' + id).empty();
    $('#end-' + id).empty();
    $('#room-' + id).empty();
    var data = {
        instructor_id: $('#instructor-options').val(),
        day: $(this).val()
    };
    makeCall('/available_begins_for_the_instructor', 'GET', data, fillTimes, 'begin', num);
});








