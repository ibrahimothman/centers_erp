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
                                            <div class="row">

                                                <div class="col-lg-2 col-sm-6  form-group">
                                                    <label for="validationCustom01"> التاريخ</label>
                                                    <input value="{{date('Y-m-d')}}" readonly type="date" id="date" name="dateOutlay" class="form-control dateOutlay">
                                                </div>
                                                <div class="col-lg-2 col-sm-6  form-group">
                                                    <label for="time"> الوقت</label>
                                                    <input value="{{date('H:i:s')}}" readonly type="text" id="time" name="time" class="form-control dateOutlay">
                                                </div>
                                            </div>
                                        <br>
                                            <!-- end -->
                                            <!-- add row pill -->
                                            <div class="fieldPayroll">
                                                <div class="form-row " id="data-1">
                                                    <input hidden id="instructor-employee-id-1">


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
                                                        <input type='text'  name='payment_mdoel' class=' form-control'  id='payment_model' readonly/>
                                                    </div>
                                                    <div class='col-lg-1 col-sm-4 form-group meta_data'>
                                                        <label>المرتب</label>
                                                        <input type='number'  name='salary' class=' form-control'  id='salary' readonly/>
                                                    </div>
                                                    <div class='col-lg-1 col-sm-4 form-group meta_data'>
                                                        <label>المستحق</label>
                                                        <input type='number'  name='total' class=' form-control'  id='total' readonly/>
                                                    </div>
                                                    <div class='col-lg-1 col-sm-4 form-group meta_data '>
                                                        <label>المدفوع</label>
                                                        <input type='number'  name='paid' class=' form-control'  id='paid' />
                                                    </div>
                                                    <div class='col-lg-1 col-sm-4 form-group meta_data'>
                                                        <label>الباقي</label>
                                                        <input type='number'  name='rest' class=' form-control'  id='rest' readonly/>
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
                    transaction: createSalaryTransactionMetaDataJSON(),
                    _token: "{{csrf_token()}}"
                }, function (data) {
                    $.notify(data.message, {
                        position: "bottom left",
                        style: 'successful-process',
                        className: 'done',
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
            let transaction = {};
            let meta_data = {};
            var instructor_employee_option = $('#instructor-employee-option-1').children("option:selected");

            meta_data.payer_id = "{{ Session('center_id') }}";
            meta_data.payer_type = "App\\Center";
            meta_data.payFor_id = $('#search-input-1').attr('person_id');
            meta_data.payFor_type =instructor_employee_option.val();

            transaction.account_id = $('#instructor-employee-option-1').children("option:selected").attr('data-account');
            transaction.rest = $("#rest").val();
            transaction.meta_data = meta_data;
            transaction.amount =  $("#paid").val();
            transaction.deserved_amount =  $("#total").val();


            return transaction;
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
