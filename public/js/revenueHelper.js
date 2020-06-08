


// when change between test and diploma option -> clear search_for_student input
$(document).on('change', 'select[id^=test-diploma-option-]',  function () {
    var i = $(this).attr('id').split('-')[3];
    $('#search-input-'+i).val("");

});



// search for student while entering letters into search input
$(document).on('keyup', 'input[id^=search-input-]', function () {

    var row = $(this).attr('id').split('-')[2];
    // clear test-diploma-values-row_number's option when search_input changes
    $('#test-diploma-values-'+row).empty();
    var query=$(this).val().trim();

    if (query !== "") {

        var search_by = $('#search-option-'+row).children("option:selected").val();
        var data = "search_by=" + search_by + "&value=" + query;
        var suggestion_list = $('#studentList-' + row + '');

        searchForPersons('/search_for_students',data, function (students) {
            suggestion_list.show();
            suggestion_list.html("");
            var output = '<ul class="dropdown-menu" style="display:block; position:relative">';

            $.each(students, function (i, student) {
                console.log(i + " --> " + student.nameAr);
                output += " <li id='item-"+ row +"' value=" + student.id + "><a href='#'>" + student.nameAr + "</a></li>"

            });
            output += '</ul>';
            suggestion_list.fadeIn();
            suggestion_list.html(output);

        });

    }else{
        $('#studentList-' + row + '').html("");
    }
});



$(document).on('click', 'li', function(e){

    // set student_id
    var row = $(this).attr('id').split('-')[1];
    var student_id_input = $('#student-id-'+row+'');
    student_id_input.val($(this).val());
    $('#test-diploma-values-'+row).empty();
    $('#search-input-'+row).val($(this).text());
    $('#studentList-' + row+ '').fadeOut();
    var test_diploma_option = $('#test-diploma-option-'+row).children("option:selected");

    // search for student's tests or diplomas based on test_diploma_option
    makeAjaxCall(test_diploma_option.attr('data-route'), 'GET', {student_id:  student_id_input.val()}, function (responses) {
        // responses are either tests or diplomas
        // 1- clear options of test-diploma-value-row_number
        var test_diploma_values = $('#test-diploma-values-'+row);
        test_diploma_values.empty();
        test_diploma_values.append($("<option>").val(0).text('اختر'));
        responses.forEach(function (response) {
            test_diploma_values.append($("<option>")
                .val(response.id)
                .text(response.name)
                .data('cost', response.cost)
            );
        })


    })

});

// when test_diploma_values_row_number changes

$(document).on('change', 'select[id^=test-diploma-values-]',  function () {
    var i = $(this).attr('id').split('-')[3];

    var cost = $(this).find("option:selected").data('cost');
    $('#cost-'+i).val(cost);
    $('#paid-'+i).val('');

});

$(document).on('keyup', 'input[id^=paid-]', function (e) {
    var i = $(this).attr('id').split('-')[1];
    var paid = $(this).val();
    var cost = $('#cost-'+i).val();
    $('#rest-'+i).val(cost - paid);
});





