
/* financial show */
$(document).ready(function(){
    // show content all scroll spy
    $("#allShow").click(function(){
        $("#section-1").css("display","block");
        $("#section-2").css("display","block");
        $("#section-3").css("display","block");
        $("#section-4").css("display","block");
        $("#section-5").css("display","block");
    });
    // show content outlay
    $("#outlayShow").click(function(){
        $("#section-1").css("display","none");
        $("#section-2").css("display","none");
        $("#section-3").css("display","block");
        $("#section-4").css("display","none");
        $("#section-5").css("display","none");
    });
    // show content payroll
    $("#payrollShow").click(function(){
        $("#section-1").css("display","none");
        $("#section-2").css("display","none");
        $("#section-3").css("display","none");
        $("#section-4").css("display","block");
        $("#section-5").css("display","none");
    });
    // show content  revenues
    $("#revenuesShow").click(function(){
        $("#section-1").css("display","none");
        $("#section-2").css("display","block");
        $("#section-3").css("display","none");
        $("#section-4").css("display","none");
        $("#section-5").css("display","none");
    });
    // show content  profit
    $("#profitShowBtn").click(function(){
        $("#section-1").css("display","block");
        $("#section-2").css("display","none");
        $("#section-3").css("display","none");
        $("#section-4").css("display","none");
        $("#section-5").css("display","none");
    });
    // show content  profit
    $("#details").click(function(){
        $("#section-1").css("display","none");
        $("#section-2").css("display","none");
        $("#section-3").css("display","none");
        $("#section-4").css("display","none");
        $("#section-5").css("display","block");
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
    $('input#addButton').on('click', function() {
        var id = ($('.field .form-row').length + 1).toString();
        $('.field').append(' <div class="form-row "> <div class="col-lg-3 col-sm-4 form-group" "><label for="validationCustom01"> التاريخ</label><div class="input-group-append">  <input type="date" id="dateOutlay'+id+'" name="dateOutlay'+id+'" class="form-control dateOutlay"></div></div>' +
            '<div class="col-lg-3 col-sm-4 form-group "><label> الفاتوره  </label><input type="text" name="bill'+id+'" class="form-control "  id="bill'+id+'"   ></div>' +
            ' <div class="col-lg-3 col-sm-4 form-group "><label> المطلوب سداده </label><input type="text" name="money'+id+'" class="form-control "  id="money'+id+'"   ></div>' +
            '<div class="col-lg-2 col-sm-4 form-group "><label> المدفوع  </label><input type="text" name="payOutlay'+id+'" class="form-control payOutlay "  id="payOutlay'+id+'"   ></div>' +
            '<div class="col-lg-1 col-sm-4 form-group "><label>الباقي  </label><input type="text" name="noPay'+id+'" class="form-control "  id="noPay'+id+'"   ></div>' +
            '</div></div>');
    });
    // sum
    $(document).on("keyup", ".payOutlay", function() {
        var sumOutlay = 0;
        $(".payOutlay").each(function(){
            sumOutlay += +$(this).val();
        });
        $("#sumOutlay").val(sumOutlay);
    });
    // Payroll
    // add btn payroll
    $('input#addButtonPayroll').on('click', function() {
        var id = ($('.fieldPayroll .form-row').length + 1).toString();
        $('.fieldPayroll').append(' <div class="form-row "> <div class="col-lg-3 col-sm-4 form-group" "><label for="validationCustom01"> التاريخ</label><div class="input-group-append">  <input type="date" id="datePayroll'+id+'" name="datePayroll'+id+'" class="form-control datePayroll"></div></div>' +
            '<div class="col-lg-2 col-sm-4 form-group "><label> الاسم  </label><input placeholder="اختار" type="text"  class="form-control" list="nameSelect"  name="nameInstructor'+id+'" id="nameInstructor'+id+'" /> <datalist id="nameSelect"> <option>احمد</option> <option>محمود</option></datalist></div>' +
            '<div class="col-lg-2 col-sm-4 form-group "><label>  تصنيف </label><select  name="type'+id+'" class="form-control "  id="type'+id+'"   ><option value="">اختار</option><option value="">كورس</option><option value="">الساعه</option><option value="">الشهر</option></select></div>' +
            ' <div class="col-lg-2 col-sm-4 form-group "><label> المرتب </label><input type="text" name="payroll'+id+'" class="form-control "  id="payroll'+id+'"   ></div>' +
            '<div class="col-lg-2 col-sm-4 form-group "><label> المدفوع </label><input type="text" name="payPayroll'+id+'" class="form-control  payPayroll"  id="payPayroll'+id+'"   ></div>' +
            ' <div class="col-lg-1 col-sm-4 form-group "><label>  الباقي </label><input type="text" name="noPayPayroll'+id+'" class="form-control "  id="noPayPayroll'+id+'"   ></div>' +
            '</div></div>');
    });

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
    $('input#addButtonIncome').on('click', function() {
        var id = ($('.fieldIncome .form-row').length + 1).toString();
        $('.fieldIncome').append(' <div class="form-row "> ' +
            '<div class="col-lg-3 col-sm-4 form-group "><label> الاسم  </label><input placeholder="اختار" type="text"  class="form-control" list="nameSelect"  name="nameStudent'+id+'" id="name'+id+'" /> <datalist id="nameSelect"> <option>احمد</option> <option>محمود</option></datalist></div>' +
            ' <div class="col-lg-3 col-sm-4 form-group "><label>الكورس/الدبلومه </label><input placeholder="اختار" type="text" id="course'+id+'" class="form-control" name="course'+id+'" list="courseSelect"/><datalist id="courseSelect"><<option value="t"> full stack(جنيه600)</option></datalist></div>' +
            '<div class="col-lg-2 col-sm-4 form-group "><label>  التكلفه </label><input type="text" name="cost'+id+'" class="form-control "  id="cost'+id+'"   ></div>' +
            '<div class="col-lg-2 col-sm-4 form-group "><label> المدفوع </label><input type="text" name="payIncome'+id+'" class="form-control payIncome "  id="payIncome'+id+'"   ></div>' +
            ' <div class="col-lg-2 col-sm-4 form-group "><label>  الباقي </label><input type="text" name="noPayIncome'+id+'" class="form-control "  id="noPayIncome'+id+'"   ></div>' +
            '</div></div>');


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

    /*end */
    /* edit revenues */
    // date picker
    $(function () {
        $("#datetimepickerRevenuesEdit").datetimepicker({
            timepicker:false,
            format:'Y-m-d'
        });
    });
    /* edit outlay */
    // date picker
    $(function () {
        $("#datetimepickerOutlayEdit").datetimepicker({
            timepicker:false,
            format:'Y-m-d'
        });
    });
    /* edit payroll */
    // date picker
    $(function () {
        $("#datetimepickerPayrollEdit").datetimepicker({
            timepicker:false,
            format:'Y-m-d'
        });
    });
/* profit page */
    // sum
    $(document).on("keyup", "#tax", function () {
        var sumIncome = 0;
        var taxValue = 0;
        $("#tax").each(function () {
            sumIncome = $("#revenues").val() - $("#pay").val();
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