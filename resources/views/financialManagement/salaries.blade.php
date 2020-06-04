<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
    <!-- style -->
    <link href="/css/financialManagement_style.css" rel="stylesheet"/>
    <title>expenses</title>
</head>
<body id="page-top">

<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div id="asd" class="col-lg-12">

                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title view-courses-title">
                                <h3>المرتبات </h3>

                            </div>
                        </header>
                        <div class="card-body">

                            <!--  view section 2 -->
                            <div id="section-2">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- select date -->
                                        <form id="salaries_form">
                                            <div class="row title form-group">
                                                <!-- date -->
                                                <div class=" col-sm-3 title pb-3">
                                                    <h5 class="text-primary  pt-1 pr-3 pl-0">التاريخ: </h5>
                                                    <input id="date" readonly value="{{date('Y-m-d')}}" name="date" class="form-control  "  placeholder="التاريخ "    type="text" >
                                                </div>
                                                <div class="  col-sm-3 title pb-3">
                                                    <h5 class="text-primary  pt-1 pr-3 pl-0">الوقت: </h5>
                                                    <input id="time" readonly value="{{date('H:i:s')}}" name="time" class="form-control  "  placeholder="الوقت "    type="text" >
                                                </div>


                                                <!-- print bil -->
                                                <div class="col-sm-4 form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="print_bill" id="print_bill">
                                                        <label class="custom-control-label" for="print_bill">طباعة فاتوره</label>
                                                    </div>


                                                </div>

                                                <!-- add pill -->
                                                <div  class="form-group   mr-3  ">
                                                    <input type='button' class="btn btn-success  "
                                                           value=' + اضافه مرتب ' id='addSalaryButton' name="addSalaryButton"/>
                                                </div>
                                            </div>
                                        <br>
                                            <!-- end -->

                                            <div class="fieldPayroll">
                                                <div class="form-row " id="data-1">
                                                    <input hidden id="instructor-employee-id-1">
                                                    <input hidden id="instructor-employee-model-1">
                                                    <input hidden id="instructor-employee-salary-1">
                                                    <input hidden id="instructor-employee-last-rest-1">


                                                    <div class="col-lg-2 col-sm-4 form-group ">
                                                        <label> مدرب/موظف </label>
                                                        <span class="required">*</span>
                                                        <select class="form-control " placeholder="اختار" id="instructor-employee-option-1"
                                                                name="instructor-employee-option-1" required>
                                                            <option data-account="4"  data-route="/search_for_instructors"   value="App\Instructor">المدربين</option>
                                                            <option data-account="5" data-route="/search_for_employees"   value="App\Employee">الموظفين</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-2 col-sm-2 form-group ">
                                                        <label> الاسم/رقم قومي/موبايل  </label>
                                                        <span class="required">*</span>
                                                        <select class="form-control " placeholder="اختار" id="search-option-1"
                                                                name="search_option" required>

                                                            <option value="nameAr">الاسم</option>
                                                            <option value="idNumber">رقم القومي</option>
                                                            <option value="phoneNumber">الموبايل</option>

                                                        </select>
                                                    </div>

                                                    <div class="col-lg-2 col-sm-4 form-group ">
                                                        <label>ادخل </label>
                                                        <input placeholder="اختار" type="text" id="search-input-1" class="form-control student-selector required_field" name="instructor-employee" list="instructor-employee-list-1" autocomplete="off"   />
                                                        <div class="list-gpfrm-list" id="instructor-employee-list-1"></div>
                                                    </div>

                                                    <div class='col-lg-1 col-sm-4 form-group meta_data'>
                                                        <label>النظام</label>
                                                        <input type='text'  name='payment-mdoel' class=' form-control'  id='payment-model-1' readonly/>
                                                    </div>
                                                    <div class='col-lg-1 col-sm-4 form-group meta_data'>
                                                        <label>المرتب</label>
                                                        <input type='number'  name='salary' class=' form-control'  id='salary-1' readonly/>
                                                    </div>
                                                    <div class='col-lg-1 col-sm-4 form-group meta_data'>
                                                        <label>المستحق</label>
                                                        <input type='number'  name='total' class=' form-control'  id='total-1' readonly/>
                                                    </div>
                                                    <div class='col-lg-1 col-sm-4 form-group meta_data '>
                                                        <label>المدفوع</label>
                                                        <input type='number'  name='paid' class=' form-control'  id='paid-1' />
                                                    </div>
                                                    <div class='col-lg-1 col-sm-4 form-group meta_data'>
                                                        <label>الباقي</label>
                                                        <input type='number'  name='rest' class=' form-control'  id='rest-1' readonly/>
                                                    </div>


                                                </div>
                                            </div>
                                            <!-- end -->

                                            <!-- save -->
                                            <div class="form-row save">
                                                <div class="col-sm-6 mx-auto" style="width: 200px;">
                                                    <button class="btn btn-primary action-buttons" type="submit"
                                                            id="submit"> حفظ و انشاء جدبد
                                                    </button>
                                                    <button class="btn  btn-danger action-buttons" type="reset"> إلغاء
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- end form -->
                                    </div>
                                </div>
                            </div>
                            <!-- end section 2 -->
                        </div>
                    </div>
                    <br>
                    <!--  end outlay view -->
                </div>
            </div>
        </div>
        <!-- footer -->
        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
<!-- script style-->
<script type='text/javascript' src="/js/financialManagement.js"></script>
<script type='text/javascript' src="/js/ajaxHelper.js"></script>
<script type='text/javascript' src="/js/studentHelper.js"></script>
<script type='text/javascript' src="/js/expensesHelper.js"></script>
<script type='text/javascript' src="/js/notify.min.js"></script>
<script type='text/javascript' src="/js/notification.js"></script>
<script>



        // submit form
        $("#salaries_form").submit(function (e) {
            e.preventDefault();
            if(checkIfAllInputsFilled()){
                $(this).find(':submit').prop('disabled', true);
                makeAjaxCall('/transactions', 'POST', {
                    transactions: createSalaryTransactionMetaDataJSON(),
                    _token: "{{csrf_token()}}"
                }, function (data) {
                    $.notify(data.message, {
                        position: "bottom left",
                        style: 'successful-process',
                        className: 'done',
                    });

                    $('button[id=delete_row]').each(function (i, v) {
                        $(this).closest('.form-row').remove();
                    });
                    $('#salaries_form').find(':submit').prop('disabled', false);
                    $('#salaries_form').trigger('reset');
                }, function (xhr, status, error) {
                    if (xhr.status == 400) {
                        $.notify("something went wrong. Please try again", {
                            position: "bottom left ",
                            style: 'successful-process',
                            className: 'notDone',
                        });

                    }

                    $('#salaries_form').find(':submit').prop('disabled', false);


                });

            }else{
            alert('fill in all fields');
        }
    });

        function createSalaryTransactionMetaDataJSON() {
            let transactions = [];
            $('input[id^=instructor-employee-id-]').each(function () {
                let i = $(this).attr('id').split('-')[3];
                let transaction = {};
                let meta_data = {};
                var instructor_employee_option = $('#instructor-employee-option-'+i).children("option:selected");

                meta_data.payer_id = "{{ Session('center_id') }}";
                meta_data.payer_type = "App\\Center";
                meta_data.payFor_id = $('#instructor-employee-id-'+i).val();
                meta_data.payFor_type = instructor_employee_option.val();

                transaction.account_id = instructor_employee_option.attr('data-account');
                transaction.rest = $("#rest-"+i).val();
                transaction.meta_data = meta_data;
                transaction.amount = $("#paid-"+i).val();
                transaction.deserved_amount = $("#total-"+i).val();

                transactions.push(transaction);
            });


            return transactions;
        }


        function checkIfAllInputsFilled() {
            var empty = $(".required_field").filter(function () {
                return $(this).val().length === 0;
            });

            return empty.length === 0;
        }





</script>
</body>
</html>
