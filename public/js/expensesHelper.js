
// row_number -> number of row
var row_number = 0;
var test_diploma_option = "tests";
var student_id;
var person_data = new Map();

// when change between instructor and employee option -> clear search input
$(document).on('change', 'select[id^=instructor-employee-option-]',  function () {
    var row = $(this).attr('id').split('-')[3];
    $('#search-input-'+row).val("");
    $('#payment-model-'+row).val('');
    $('#salary-'+row).val('');
    $('#total-'+row).val('');
    $('#paid-'+row).val('');
    $('#rest-'+row).val('');

});



// search for  while entering letters into search input
$(document).on('keyup', 'input[id^=search-input-]', function () {

    let  row = $(this).attr('id').split('-')[2];
    $('#payment-model-'+row).val('');
    $('#salary-'+row).val('');
    $('#total-'+row).val('');
    $('#paid-'+row).val('');
    $('#rest-'+row).val('');
    // person_data.clear();
    let query=$(this).val().trim();


    if (query !== "") {

        let search_by = $('#search-option-'+row).children("option:selected").val();
        let search_for = $('#instructor-employee-option-'+row).children("option:selected").attr('data-route');
        let data = "search_by=" + search_by + "&value=" + query;
        let suggestion_list = $('#instructor-employee-list-' + row + '');



        searchForPersons(search_for,data, function (persons) {
            suggestion_list.show();
            suggestion_list.html("");
            var output = '<ul class="dropdown-menu" style="display:block; position:relative">';

            $.each(persons, function (i, person) {
                output += "<li data-id='"+person.id+"' data-model='"+person.payment_model.model+"' data-salary='"+person.payment_model.salary+"' data-total='"+person.total+"' id='item-"+ row +"' ><a href='#'>" + person.nameAr + "</a></li>"
                // person_data.set('person-'+person.id+'', person);
            });
            output += '</ul>';
            suggestion_list.fadeIn();
            suggestion_list.html(output);

        });

    }else{
        $('#instructor-employee-list-' + row + '').html("");
    }
});



$(document).on('click', 'li', function(e){
    var row = $(this).attr('id').split('-')[1];

    $('#paid-'+row).val('');

    $('#search-input-'+row).val($(this).text());
    $('#instructor-employee-list-'+row).fadeOut();


    let salary = $(this).attr('data-salary');
    let model = $(this).attr('data-model');
    let total = $(this).attr('data-total');
    let id = $(this).attr('data-id');

    $('#instructor-employee-id-'+row).val(id);



    //
    //
    $('#payment-model-'+row).val(model);
    $('#salary-'+row).val(salary);
    $('#total-'+row).val(total);
    $('#rest-'+row).val(total - $('#paid').val());


});

// when test_diploma_values_row_number changes


$(document).on('keyup', 'input[id^=paid-]',  function (e) {
    let row = $(this).attr('id').split('-')[1];
    var paid = $(this).val();
    var total = $('#total-'+row).val();
    $('#rest-'+row).val(total - paid);
});



function createTransactionMetaDataJSON() {
    let transactions = [];
    $('input[id^=instructor-employee-id-]').each(function () {
       let i = $(this).attr('id').split('-')[3];
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
    });



    return transaction;

}
