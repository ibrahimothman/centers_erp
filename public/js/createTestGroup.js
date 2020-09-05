
//sc
$('input#addButton').on('click', function() {
    var id = ($('.field .form-row').length + 1).toString();
    $('.field').append(
        '<div class="form-row "> ' +
        '<div class="col-sm-6 col-md-2 form-group">' +
        '<label for="validationCustom01">   تاريخ الامتحان</label>' +
        '<div class="input-group-append"> ' +
        '<input autocomplete="off"  id="date-'+id+'" name="groups['+ id +'][date][day]" class="form-control datetimepicker required"  placeholder="تاريخ الامتحان"    type="text" >' +
        '<span class="fas fa-calendar-alt input-group-text start_date_calendar" aria-hidden="true "></span>' +
        ' </div></div>' +
        '<div class="col-sm-6 col-md-2 form-group ">' +
        '<label for="groups['+ id +'][begin]">  البدايه  </label>' +
        '<select name="groups['+ id +'][date][begin]" class="form-control times required"  id="begin-'+id+'"    ></select>' +
        '</div>' +
        '<div class="col-sm-6 col-md-2 form-group ">' +
        '<label for="groups['+ id +'][end]">  النهايه  </label>' +
        '<select name="groups['+ id +'][date][end]" class="form-control times required"  id="end-'+id+'"    ></select>' +
        '</div>' +
        '<div class="col-sm-6 col-md-2 form-group ">' +
        '<label for="groups['+ id +'][room]">  الغرفه  </label>' +
        '<select name="groups['+ id +'][room]" class="form-control  required"  id="room-'+id+'"    ></select>' +
        '</div>' +
        '<div class="col-sm-6 col-md-1 form-group ">' +
        '<label for="validationCustom01">  عدد المقاعد  </label>' +
        '<input type="number" name="groups['+ id +'][available_chairs]" class="form-control char required"  id="seat-'+id+'"    >' +
        '</div>' +
        '<div class="col-lg-1 col-sm-1 form-group "> <button id="delete_row" class="btn delete_row" style=" border: none; color: red; padding: 12px 16px;font-size: 16px; margin-top: 20px"><i class="fa fa-close"></i></button> </div>'+
        '</div></div>');
    $(".datetimepicker").datetimepicker({
        timepicker:false,
        format:'Y-m-d'
    });
});

$(document).on('click', '#delete_row', function () {
    $(this).closest('.form-row').remove();
})


var hours = [];
$.ajax({
    url: '/api/get_hours',
    type: 'get',
    success: function (data) {
        hours = data;
    }
});

function fillTimes(prefix, id) {
    var time = $('#'+prefix+id);
    time.append($('<option>').val(0).text('اختر ميعادا'));
    for(var i = 7; i <= 24 ; i++){
        time.append($('<option>').val(i).text(hours[i]));
    }
}

$(document).on('change', '[id^=date-]', function () {
    console.log('asda');
    var id = $(this).attr('id').split('-')[1];
    $('#begin-'+id).empty();
    $('#end-'+id).empty();
    $('#room-'+id).empty();
    if($(this).val() !== ''){
        fillTimes('begin-', id);
    }
})
$(document).on('change', '[id^=begin-]', function (e) {
    var id = $(this).attr('id').split('-')[1];
    $('#end-'+id).empty();
    $('#room-'+id).empty();
    if($(this).val() !== 0){
        fillTimes('end-', id);
    }
});



$(document).on('change', '[id^=end-]', function (e) {
    var id = $(this).attr('id').split('-')[1];
    $('#room-'+id).empty();
    var day = $('#date-'+id).val();
    var begin = $('#begin-'+id).val();
    var end  = $(this).val();

    if(day !== '' && begin !== null && end !== null){
        getAvailableRooms({
            day: day,
            begin: begin,
            end: end
        }, id);
    }
});

function getAvailableRooms(data, id) {

    $.ajax({
        url: '/available_rooms',
        type: 'get',
        data: data,
        success: function (rooms) {
            rooms.forEach(function (room) {
                $('#room-'+id).append($('<option>').text(room.name).val(room.id));
            })

        }
    })
}





