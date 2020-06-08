
/* financial show */
$(document).ready(function(){
    // show content all scroll spy sda
    $("#allShow").click(function(){
        $("#section-1").css("display","block");
        $("#section-2").css("display","block");
        $("#section-3").css("display","block");
        $("#section-4").css("display","block");
        $("#section-5").css("display","block");
        $("#section-6").css("display","block");
    });
    // show content outlay
    $("#outlayShow").click(function(){
        $("#section-1").css("display","none");
        $("#section-2").css("display","none");
        $("#section-3").css("display","none");
        $("#section-4").css("display","block");
        $("#section-5").css("display","none");
        $("#section-6").css("display","none");
    });
    // show content payroll
    $("#payrollShow").click(function(){
        $("#section-1").css("display","none");
        $("#section-2").css("display","none");
        $("#section-3").css("display","none");
        $("#section-4").css("display","none");
        $("#section-5").css("display","block");
        $("#section-6").css("display","block");

    });

    $("#refundShow").click(function(){
        console.log('refund btn');
        $("#section-1").css("display","none");
        $("#section-2").css("display","none");
        $("#section-3").css("display","block");
        $("#section-4").css("display","none");
        $("#section-5").css("display","none");
        $("#section-6").css("display","none");

    });
    // show content  revenues
    $("#revenuesShow").click(function(){
        $("#section-1").css("display","none");
        $("#section-2").css("display","block");
        $("#section-3").css("display","none");
        $("#section-4").css("display","none");
        $("#section-5").css("display","none");
        $("#section-6").css("display","none");
    });
    // show content  profit
    $("#profitShowBtn").click(function(){
        $("#section-1").css("display","block");
        $("#section-2").css("display","none");
        $("#section-3").css("display","none");
        $("#section-4").css("display","none");
        $("#section-5").css("display","none");
        $("#section-6").css("display","none");
    });

    // end
    // select year btn
    for (i = new Date().getFullYear(); i > 1900; i--)
    {
        $('#yearpicker').append($('<option />').val(i).html(i));
    }
    // date picker modal
    $(function () {
        $('#datetimepickerModal1').datetimepicker({
            timepicker:false,
            format:'Y-m-d'
        });
    });
    $(function () {
        $('#datetimepickerModal2').datetimepicker({
            timepicker:false,
            format:'Y-m-d'
        });
    });
    // print
    $('#print-button').on('click', function() {
        window.print();
        return false; // why false?
    });
    //show details of profit
    $("#showBtn").click( function () {

        $("#showDetails").toggle( 1000);

    });
    /* end */
    /* outlay page */
    // show content all scroll spy
    $("#all").click(function(){
        $("#section-1").css("display","block");
        $("#section-2").css("display","block");
    });
    // show content outlay
    $("#outlay").click(function(){
        $("#section-1").css("display","block");
        $("#section-2").css("display","none");
    });
    // show content payroll
    $("#payroll").click(function(){
        $("#section-1").css("display","none");
        $("#section-2").css("display","block");

    });
    // outlay add
    // add btn
    $('input#addBillButton').on('click', function() {
        var id = ($('.billField .form-row').length + 1).toString();
        $('.billField').append(' <div class="form-row ">'+
            '<div class="col-lg-4 col-sm-4 form-group "><label> تحت بند  </label><input type="text" placeholder="اختار" name="account-'+id+'" class="form-control expenses_field required_field "  id="account-'+id+'" list="account_list"  >' +
            '<datalist id="account_list"></datalist> '+
            '</div>' +
            ' <div class="col-lg-2 col-sm-4 form-group "><label> المطلوب سداده </label><input type="text" name="deserved-amount-'+id+'" class="form-control required_field"  id="deserved-amount-'+id+'"   ></div>' +
            '<div class="col-lg-2 col-sm-4 form-group "><label> المدفوع  </label><input type="text" name="paid-'+id+'" class="form-control payOutlay required_field"  id="paid-'+id+'"   ></div>' +
            '<div class="col-lg-2 col-sm-4 form-group "><label>الباقي  </label><input type="text" name="rest-'+id+'" class="form-control required_field "  id="rest-'+id+'"   ></div>' +
            '<div class="col-lg-1 col-sm-1 form-group "> <button id="delete_row" class="btn delete_row" style=" border: none; color: red; padding: 12px 16px;font-size: 16px; margin-top: 20px"><i class="fa fa-close"></i></button> </div>'+
            '</div></div>');
    });
    // sum
    $(document).on("keyup", ".payOutlay", function() {
        var sumOutlay = 0;
        $(".payOutlay").each(function(){
            sumOutlay += +$(this).val();
        });
        // $("#sumOutlay").val(sumOutlay);
        var id = $(this).attr('id').split('-')[1];
        console.log('id: '+id);
        var rest_of_cost = $('#deserved-amount-'+id).val() - $('#paid-'+id).val();
        $('#rest-'+id).val(rest_of_cost);

    });



    // Payroll
    // add btn payroll
    $('input#addSalaryButton').on('click', function() {
        var id = ($('.fieldPayroll .form-row').length + 1).toString();
        $('.fieldPayroll').append('<div class="form-row " id="data-'+id+'"><input hidden id="instructor-employee-id-'+id+'">' +
            '<div class="col-lg-2 col-sm-4 form-group "><label> مدرب/موظف </label><span class="required">*</span><select class="form-control " placeholder="اختار" id="instructor-employee-option-'+id+'" name="instructor-employee-option-'+id+'" required><option data-account="4"  data-route="/search_for_instructors"   value="App\Instructor">المدربين</option><option data-account="5" data-route="/search_for_employees"   value="App\Employee">الموظفين</option></select></div>'+
            '<div class="col-lg-2 col-sm-2 form-group "><label> الاسم/رقم قومي/موبايل  </label><span class="required">*</span><select class="form-control " placeholder="اختار" id="search-option-'+id+'" name="search_option" required><option value="nameAr">الاسم</option> <option value="idNumber">رقم القومي</option><option value="phoneNumber">الموبايل</option></select></div>' +
            '<div class="col-lg-2 col-sm-4 form-group "><label>ادخل </label><input placeholder="اختار" type="text" id="search-input-'+id+'" class="form-control student-selector required_field" name="instructor-employee" list="instructor-employee-list-'+id+'" autocomplete="off"   /><div class="list-gpfrm-list" id="instructor-employee-list-'+id+'"></div></div>' +
            '<div class="col-lg-1 col-sm-4 form-group meta_data"><label>النظام</label><input type="text"  name="payment_mdoel" class=" form-control"  id="payment-model-'+id+'" readonly/></div>' +
            '<div class="col-lg-1 col-sm-4 form-group meta_data"><label>المرتب</label><input type="number"  name="salary" class=" form-control"  id="salary-'+id+'" readonly/></div>' +
            '<div class="col-lg-1 col-sm-4 form-group meta_data"><label>المستحق</label><input type="number"  name="total" class="form-control"  id="total-'+id+'" readonly/></div>' +
            '<div class="col-lg-1 col-sm-4 form-group meta_data "><label>المدفوع</label><input type="number"  name="paid" class=" form-control"  id="paid-'+id+'" /></div>' +
            '<div class="col-lg-1 col-sm-4 form-group meta_data"><label>الباقي</label><input type="number"  name="rest" class=" form-control"  id="rest-'+id+'" readonly/></div>' +
            '<div class="col-lg-1 col-sm-1 form-group "> <button id="delete_row" class="btn delete_row" style=" border: none; color: red; padding: 12px 16px;font-size: 16px; margin-top: 20px"><i class="fa fa-close"></i></button> </div>'+

            '</div>');
    })

    // sum
    $(document).on("keyup", ".payPayroll", function() {
        var sumPayroll = 0;
        $(".payPayroll").each(function(){
            sumPayroll += +$(this).val();
        });
        $("#sumPayroll").val(sumPayroll);
    });
    /* end */

/* revenues page */
// add btn revenues
    $('#addButtonIncome').on('click', function() {
        var id = ($('.fieldIncome .form-row').length + 1).toString();
        $('.fieldIncome').append('<div class="form-row ">'+
            '<input id="student-id-'+id+'" hidden>'+
            '<div class="col-lg-2 col-sm-2 form-group "><label>امتحان/دبلومه</label><span class="required">*</span><select class="form-control " placeholder="اختار" id="test-diploma-option-'+id+'" name="test_diploma_option" required><option data-route="/get_student_tests" value="App\Test">امتحان</option><option data-route="/get_student_diplomas" value="App\Diploma">دبلومه</option></select></div>' +
            '<div class="col-lg-2 col-sm-2 form-group "><label> الاسم/رقم قومي/موبايل  </label><span class="required">*</span><select class="form-control " placeholder="اختار" id="search-option-'+id+'" name="search_option" required><option value="nameAr">الاسم</option><option value="idNumber">رقم القومي</option><option value="phoneNumber">الموبايل</option></select></div>'+
            '<div class="col-lg-2 col-sm-4 form-group "><label>ادخل </label><input placeholder="اختار" type="text" id="search-input-'+id+'" class="form-control student-selector required_field" name="student" list="studentList-'+id+'" autocomplete="off"   /><div class="list-gpfrm-list" id="studentList-'+id+'"></div></div>'+
            '<div class="col-lg-2 col-sm-4 form-group "><label>الامتحان /الدبلومه</label><span class="required">*</span><select class="form-control" id="test-diploma-values-'+id+'"></select></div>'+
            '<div class="col-lg-1 col-sm-1 form-group "><label> التكلفه </label><input type="text" name="cost" class="form-control  "  id="cost-'+id+'"  readonly ></div>'+
            '<div class="col-lg-1 col-sm-1 form-group "><label> المدفوع  </label><input type="text" name="pay" class=" form-control  payIncome required_field"  id="paid-'+id+'"   ></div>' +
            '<div class="col-lg-1 col-sm-1 form-group "><label>الباقي  </label><input type="text" name="noPayIncome" class="form-control "  id="rest-'+id+'"  readonly ></div>' +
            '<div class="col-lg-1 col-sm-1 form-group "> <button id="delete_row" class="btn delete_row" style=" border: none; color: red; padding: 12px 16px;font-size: 16px; margin-top: 20px"><i class="fa fa-close"></i></button> </div>'+
            '</div>');


    });

    $(document).on('click', '#delete_row', function (e) {
        e.preventDefault();
        $(this).closest('.form-row').remove();
    })

    $(document).on('input', "[id^=student]",  function () {
        // clear all previous data
        var id = $(this).attr("id")[7];
        // console.log('student changed');
        document.getElementById("diplomaList").innerHTML = "";
        $("#diploma"+id).val(null);
        $('#cost'+id).val(null);
        $('#payIncome'+id).val(null);
        $('#noPayIncome'+id).val(null);
    });

    $(document).on('input', "[id^=diploma]",  function () {
        // clear all previous data
        var id = $(this).attr('id')[7];
        $('#cost'+id).val(null);
        $('#payIncome'+id).val(null);
        $('#noPayIncome'+id).val(null);
    });


    // sum
    $(document).on("keyup", ".payIncome", function() {
        var sumIncome = 0;
        $(".payIncome").each(function(){
            sumIncome += +$(this).val();
        });
        $("#sumIncome").val(sumIncome);
    });
    // date picker
    $(function () {
        $("#datetimepickerRevenues").datetimepicker({
            timepicker:false,
            format:'Y-m-d'
        });
    });
    /* end */

    /* profit page */
    // show content all scroll spy
    // show content month
    $("#month").click(function(){
        $("#sectionMonth").css("display","block");
        $("#sectionYear").css("display","none");
    });
    // show content year
    $("#year").click(function(){
        $("#sectionMonth").css("display","none");
        $("#sectionYear").css("display","block");

    });


/* profit page */
    // sum
    $(document).on("keyup", "#tax", function () {
        var sumIncome = 0;
        var taxValue = 0;
        $("#tax").each(function () {
            sumIncome = $("#revenues").val() - $("#expenses").val();
            taxValue = sumIncome * $("#tax").val() / 100;
        });
        $("#profit").val(sumIncome);
        $("#netProfit").val(sumIncome - taxValue);
    });
});
/* end */
/* dept */
//nav
// show content all scroll spy
$("#all").click(function(){
    $("#section-1").css("display","block");
    $("#section-2").css("display","block");
});
// show content student dept
$("#deptStudent").click(function(){
    $("#section-1").css("display","block");
    $("#section-2").css("display","none");
});
// show content  dept
$("#dept").click(function(){
    $("#section-1").css("display","none");
    $("#section-2").css("display","block");
});
// date picker student dept
$(function () {
    $("#datetimepickerstudentdept").datetimepicker({
        timepicker:false,
        format:'Y-m-d'
    });
});
// date picker dept
$(function () {
    $("#datetimepickerdept").datetimepicker({
        timepicker:false,
        format:'Y-m-d'
    });
});
