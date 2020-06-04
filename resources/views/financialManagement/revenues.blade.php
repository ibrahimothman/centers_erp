<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
    <!-- style  date picker-->
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>
    <!-- style page -->
    <link href="/css/financialManagement_style.css" rel="stylesheet"/>
    <title>income</title>

</head>
<body id="page-top">

<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title view-courses-title">
                                <h3>الايرادات </h3>
                            </div>
                        </header>
                        <div class="card-body">
                            <!-- view section 1 -->
                            <div id="section-1">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- select date -->
                                        <form id="revenue-form">
                                            @csrf
                                            <div class="row title form-group">
                                                <!-- date -->
                                                <div class=" col-sm-3 title pb-3">
                                                    <h5 class="text-primary  pt-1 pr-3 pl-0">التاريخ: </h5>
                                                        <input id="date" readonly value="{{date('Y-m-d')}}" name="date" class="form-control  required_field"  placeholder="التاريخ "    type="text" >
                                                </div>
                                                <div class="  col-sm-3 title pb-3">
                                                    <h5 class="text-primary  pt-1 pr-3 pl-0">الوقت: </h5>
                                                    <input id="time" readonly value="{{date('H:i:s')}}" name="time" class="form-control  required_field"  placeholder="الوقت "    type="text" >
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
                                                           value=' + اضافه طالب ' id='addButtonIncome' name="addIncome"/>
                                                </div>
                                            </div>
                                            <BR>
                                            <!-- end -->
                                            <!-- add row pill -->
                                            <div class="fieldIncome">
                                                <div class="form-row ">
                                                    <input id="student-id-1" hidden>
                                                    <div class="col-lg-2 col-sm-2 form-group ">
                                                        <label>امتحان/دبلومه</label>
                                                        <span class="required">*</span>
                                                        <select class="form-control " placeholder="اختار" id="test-diploma-option-1"
                                                                name="test_diploma_option" required>

                                                            <option data-route="/get_student_tests" value="App\Test">امتحان</option>
                                                            <option data-route="/get_student_diplomas" value="App\Diploma">دبلومه</option>

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
                                                        <input placeholder="اختار" type="text" id="search-input-1" class="form-control student-selector required_field" name="student" list="studentList-1" autocomplete="off"   />
                                                        <div class="list-gpfrm-list" id="studentList-1"></div>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 form-group ">
                                                        <label>الامتحان /الدبلومه</label>
                                                        <span class="required">*</span>
                                                        <select class="form-control" id="test-diploma-values-1">
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-1 col-sm-1 form-group ">
                                                        <label> التكلفه </label><input type="text" name="cost" class="form-control  "  id="cost-1"  readonly >
                                                    </div>
                                                    <div class="col-lg-1 col-sm-1 form-group ">
                                                        <label> المدفوع  </label><input type="text" name="pay" class=" form-control  payIncome required_field"  id="paid-1"   >
                                                    </div>
                                                    <div class="col-lg-1 col-sm-1 form-group ">
                                                        <label>الباقي  </label><input type="text" name="noPayIncome" class="form-control "  id="rest-1"  readonly >
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- end -->
                                           <!-- sum -->

                                            <!-- save -->
                                            <div class="form-row save">
                                                <div class="col-sm-6 mx-auto" style="width: 200px;">
                                                    <button class="btn btn-primary action-buttons" type="button" id="submit"> حفظ و انشاء جدبد
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
                            <br>

                        </div>
                    </div>
                    <br>
                    <!--  end revenues view -->
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
<!-- date picker script -->
<script src="{{url('js/jquery.datetimepicker.js')}}"></script>
<!-- script style-->
<script type='text/javascript' src="/js/financialManagement.js"></script>
<script type='text/javascript' src="{{asset('js/ajaxHelper.js')}}"></script>
<script type='text/javascript' src="{{asset('js/studentHelper.js')}}"></script>
<script type='text/javascript' src="{{asset('js/revenueHelper.js')}}"></script>
<script type='text/javascript' src="{{asset('js/notify.min.js')}}"></script>
<script type='text/javascript' src="{{asset('js/notification.js')}}"></script>

<script>

    $(".datetimepicker").datetimepicker({
        timepicker:false,
        format:'Y-m-d'
    });


        // submit form
        $("#submit").on('click', function (e) {
            e.preventDefault();
            if(checkIfAllInputsFilled()) {
                console.log(createTransactionMetaDataJSON());
                // $(this).prop('disabled', true);
                makeAjaxCall('/transactions', 'POST', {
                    transactions: createTransactionMetaDataJSON(),
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
                    $('#submit').prop('disabled',false);
                    $('#submit').parents('form').trigger('reset');
                }, function (xhr, status, error) {
                    if (xhr.status == 400) {
                        $.notify("something went wrong. Please try again", {
                            position: "bottom left",
                            style: 'successful-process',
                            className: 'notDone',
                        });

                    }
                    $('#submit').prop('disabled',false);


                    });

            }else{
                alert('fill in all fields');
            }
        });



    function createTransactionMetaDataJSON() {
        let transactions = [];
        $('input[id^=student-id-]').each(function () {
            var i = $(this).attr('id').split('-')[2];
            let transaction = {};
            let meta_data = {};
            var test_diploma_option = $('#test-diploma-option-'+i).children("option:selected");
            var test_diploma_value = $('#test-diploma-values-'+i).children("option:selected");
            meta_data.payer_id = $('#student-id-'+i).val();
            meta_data.payer_type = "App\\Student";
            meta_data.payFor_id = test_diploma_value.val();
            meta_data.payFor_type =test_diploma_option.val();

            transaction.account_id = 3;
            transaction.rest = $("#rest-"+i).val();
            transaction.meta_data = meta_data;
            transaction.amount =  $("#paid-"+i).val();
            transaction.deserved_amount =  $("#cost-"+i).val();


            transactions.push(transaction);
        });



        return transactions;

    }
        function checkIfAllInputsFilled() {
            var empty = $(".required_field").filter(function () {
                return $(this).val().length === 0;
            });

            return empty.length === 0 ;
        }
    //

</script>
</body>
</html>
