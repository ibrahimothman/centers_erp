function fillInstructors(selected_diploma) {
    var instructors = [];
    selected_diploma.courses.forEach(function (course) {
        course.instructors.forEach(function (instructor) {
            if(! instructors.includes(instructor.id)) {
                instructors.push(instructor.id);
                var option = new Option(instructor.nameAr, instructor.id);
                $('#instructor-options').append(option);
            }
        });
    });
}

function fillTimes(results, num, prefix) {
        $('#diploma-day-'+prefix+'-'+num).append('<option value="0">اختر ميعاد</option>');
        $.each(results, function (i, v) {
            $('#diploma-day-'+prefix+'-'+num).append('<option value="' + i + '">' + v + '</option>');
        });
}

function makeCall(url, method, data, callback, prefix, num) {

    // console.log(url);
    $.ajax({
        url : url,
        type : method,
        data : data,
        success : function (results) {
            callback(results, num, prefix);
        }
    });
}
function makeCall(url, method, data, callback, prefix, num) {

    // console.log(url);
    $.ajax({
        url : url,
        type : method,
        data : data,
        success : function (results) {
            callback(results, num, prefix);
        }
    });
}

$('#selected_diploma').on('change', function () {
    $('#instructor-options').empty();
    var selected_diploma = JSON.parse($(this).find('option:selected').attr('data-extra'));
    fillInstructors(selected_diploma);
});


var current_val = "";
$(document).on('change', '[id^=diploma-day-]', function () {
   var num = $(this).attr('id').split('-')[2];
   if(current_val !== $(this).val()) {
       current_val = $(this).val();
       $('#diploma-day-begin-' + num).empty();
       $('#diploma-day-end-' + num).empty();
       $('#diploma-room-' + num).empty();
       var data = {
           instructor_id: $('#instructor-options').val(),
           day: $(this).val()
       };
       makeCall('/available_begins_for_the_instructor', 'GET', data, fillTimes, 'begin', num);
   }
});


$(document).on('change', '[id^=diploma-day-begin-]', function () {
    var num = $(this).attr('id').split('-')[3];
    $('#diploma-day-end-'+num).empty();
    $('#diploma-room-'+num).empty();
    // console.log($('#instructor-options').val());
    var data = {
        instructor_id: $('#instructor-options').val(),
        day : $('#diploma-day-'+num).val(),
        begin : $(this).val()
    };
    makeCall('/available_ends_for_the_instructor', 'GET', data, fillTimes, 'end',num);
});


function fillRooms(results, num, prefix) {
    $('#diploma-'+prefix+'-'+num).append('<option value="0">اختر الغرفه</option>');
    $.each(results, function (i, room) {
        $('#diploma-'+prefix+'-'+num).append('<option value="' + room.id + '">' +room.name + '</option>');
    });
}

$(document).on('change', '[id^=diploma-day-end-]', function () {
    var num = $(this).attr('id').split('-')[3];
    $('#diploma-room-'+num).empty();
    var data = {
        day: $('#diploma-day-'+num).val(),
        begin: $('#diploma-day-begin-'+num).val(),
        end: $('#diploma-day-end-'+num).val()
    };
    makeCall('/available_rooms', 'GET', data, fillRooms,'room', num);
});

function time(day, begin, end) {
    this.day = day;
    this.begin = begin;
    this.end = end;
}
