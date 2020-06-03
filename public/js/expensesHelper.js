
// row_number -> number of row
var row_number = 0;
var test_diploma_option = "tests";
var student_id;
var person_data = new Map();

// when change between instructor and employee option -> clear search input
$('select[id^=instructor-employee-option-]').on('change', function () {
    var i = $(this).attr('id').split('-')[3];
    $('#search-input-'+i).val("");

});



// search for  while entering letters into search input
$('input[id^=search-input-]').on('keyup', function () {

    row_number = $(this).attr('id').split('-')[2];
    person_data.clear();
    let query=$(this).val().trim();


    if (query !== "") {

        let search_by = $('#search-option-'+row_number).children("option:selected").val();
        let search_for = $('#instructor-employee-option-'+row_number).children("option:selected").attr('data-route');
        let data = "search_by=" + search_by + "&value=" + query;
        let suggestion_list = $('#instructor-employee-list-' + row_number + '');



        searchForPersons(search_for,data, function (persons) {
            suggestion_list.show();
            suggestion_list.html("");
            var output = '<ul class="dropdown-menu" style="display:block; position:relative">';

            $.each(persons, function (i, person) {
                output += "<li id='item-"+ person.id +"' value=" + person.id + "><a href='#'>" + person.nameAr + "</a></li>"
                person_data.set('person-'+person.id+'', person);
            });
            output += '</ul>';
            suggestion_list.fadeIn();
            suggestion_list.html(output);

        });

    }else{
        $('#instructor-employee-list-' + row_number + '').html("");
    }
});



$(document).on('click', 'li', function(e){
    // student_id = $(this).val();
    $('#paid').val('');
    var item_id = $(this).attr('id').split('-')[1];
    var person = person_data.get('person-'+item_id+'');

    $('#search-input-1').val($(this).text()).attr('person_id', person.id);
    $('#instructor-employee-list-1').fadeOut();
    console.log('id: '+$('#search-input-1').attr('person_id'));


    var salary = person.payment_model['salary'];
    var last_rest = parseInt(person.last_rest);
    var total = salary + last_rest;


    $('#payment_model').val(person.payment_model['model']);
    $('#salary').val(salary);
    $('#total').val(total);
    $('#rest').val(total - $('#paid').val());


});

// when test_diploma_values_row_number changes


$('input[id^=paid]').on('keyup', function (e) {
    var paid = $(this).val();
    var total = $('#total').val();
    $('#rest').val(total - paid);
});



function createTransactionMetaDataJSON() {
    let transaction = {};
    let meta_data = {};
    var instructor_employee_option = $('#instructor-employee-option-1').children("option:selected");
    var test_diploma_value = $('#test-diploma-values-1').children("option:selected");
    meta_data.payer_id = "{{ Session('center_id') }}";
    meta_data.payer_type = "App\\Center";
    meta_data.payFor_id = test_diploma_value.val();
    meta_data.payFor_type =instructor_employee_option.val();

    transaction.account_id = 3;
    transaction.rest = $("#rest-1").val();
    transaction.meta_data = meta_data;
    transaction.amount =  $("#paid-1").val();
    transaction.deserved_amount =  $("#cost-1").val();



    return transaction;

}
