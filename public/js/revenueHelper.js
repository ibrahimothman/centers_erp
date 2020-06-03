
// row_number -> number of row
var row_number = 0;
var test_diploma_option = "tests";
var student_id;

// when change between test and diploma option -> clear search_for_student input
$('select[id^=test-diploma-option-]').on('change', function () {
    var i = $(this).attr('id').split('-')[3];
    $('#search-input-'+i).val("");

});



// search for student while entering letters into search input
$('input[id^=search-input-]').on('keyup', function () {

    row_number = $(this).attr('id').split('-')[2];
    // clear test-diploma-values-row_number's option when search_input changes
    $('#test-diploma-values-'+row_number).empty();
    var query=$(this).val().trim();

    if (query !== "") {

        var search_by = $('#search-option-'+row_number).children("option:selected").val();
        var data = "search_by=" + search_by + "&value=" + query;
        var suggestion_list = $('#studentList-' + row_number + '');

        searchForPersons('/search_for_students',data, function (students) {
            suggestion_list.show();
            suggestion_list.html("");
            var output = '<ul class="dropdown-menu" style="display:block; position:relative">';

            $.each(students, function (i, student) {
                console.log(i + " --> " + student.nameAr);
                output += " <li id='item-"+ row_number +"' value=" + student.id + "><a href='#'>" + student.nameAr + "</a></li>"

            });
            output += '</ul>';
            suggestion_list.fadeIn();
            suggestion_list.html(output);

        });

    }else{
        $('#studentList-' + row_number + '').html("");
    }
});



$(document).on('click', 'li', function(e){
    $('#test-diploma-values-'+row_number).empty();
    student_id = $(this).val();
    var item_id = $(this).attr('id').split('-')[1];
    console.log('item_id: '+item_id);
    $('#search-input-'+item_id).val($(this).text());
    $('#studentList-' + item_id+ '').fadeOut();
    var test_diploma_option = $('#test-diploma-option-'+row_number).children("option:selected");

    // search for student's tests or diplomas based on test_diploma_option
    makeAjaxCall(test_diploma_option.attr('data-route'), 'GET', {student_id: student_id}, function (responses) {
        // responses are either tests or diplomas
        // 1- clear options of test-diploma-value-row_number
        var test_diploma_values = $('#test-diploma-values-'+row_number);
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

$('select[id^=test-diploma-values-]').on('change', function () {
    var i = $(this).attr('id').split('-')[3];
    // var cost_label = $('#cost-'+i).val('');
    var cost = $(this).find("option:selected").data('cost');
    $('#cost-'+i).val(cost);

});

$('input[id^=paid-]').on('keyup', function (e) {
    var i = $(this).attr('id').split('-')[1];
    var paid = $(this).val();
    var cost = $('#cost-'+i).val();
    $('#rest-'+i).val(cost - paid);
});




