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
                <div class="col-lg-12">
                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title view-courses-title">
                                <h3>المصروفات </h3>

                            </div>
                        </header>
                        <div class="card-body">

                            <!-- view section 1 -->
                            <div id="section-1">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- select date -->
                                        <form id="expenses_form">
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
                                                           value=' + اضافه فاتوره ' id='addBillButton' name="addBillButton"/>
                                                </div>
                                            </div>
                                          <br>
                                        <!-- end -->
                                        <!-- add row pill -->
                                        <div class="billField">
                                            <div class="form-row ">

                                                <div class="col-lg-4 col-sm-6 form-group ">
                                                    <label> تحت بند  </label>
                                                    <input type="text" placeholder="اختار" name="account" class="form-control expenses_field required_field"  id="account-1" autocomplete="off" list="account_list"  >
                                                    <datalist id="account_list">
                                                        @foreach($accounts as $account)
                                                            <option data-account-id="{{ $account['id'] }}" value="{{ $account['name'] }}"></option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                                <div class="col-lg-2 col-sm-4 form-group ">
                                                    <label> المطلوب سداده </label><input type="text" autocomplete="off" name="deserved_amount" class="form-control required_field"  id="deserved-amount-1"   >
                                                </div>
                                                <div class="col-lg-2 col-sm-4 form-group ">
                                                    <label> المدفوع  </label><input type="text" autocomplete="off" name="paid-1" class=" form-control payOutlay required_field"  id="paid-1"   >
                                                </div>
                                                <div class="col-lg-2 col-sm-4 form-group ">
                                                    <label>الباقي  </label><input type="text" autocomplete="off" name="rest" class="form-control required_field"  id="rest-1"   >
                                                </div>

                                            </div>
                                        </div>
                                        <!-- end -->

                                            <!-- sum -->

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
                            <br>

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
<!-- scroll top sad -->
@include('scroll_top')
<!-- script-->
@include('script')
<!-- script style-->
<script type='text/javascript' src="{{asset('js/financialManagement.js')}}"></script>
<script type='text/javascript' src="{{asset('js/ajaxHelper.js')}}"></script>
<script type='text/javascript' src="{{asset('js/notify.min.js')}}"></script>
<script type='text/javascript' src="{{asset('js/notification.js')}}"></script>
<script>




        function checkIfAllInputsFilled() {
            var empty = $(".required_field").filter(function () {
                // console.log($('#paid-1').val().length === 0);
                return $(this).val().length === 0;
            });

            console.log(empty.length === 0);
            return empty.length === 0;
        }

        $('#amount').on('click', function (e) {
            let deserved_amount = $('#deserved_amount').val();
            let paid = $(this).val();
           $("#noPay").val(deserved_amount - paid);
        });


        $('#expenses_form').submit(function (e) {
            e.preventDefault();
            $(this).find(':submit').prop('disabled', true);
            if(checkIfAllInputsFilled()) {
                console.log(createExpensesTransactionMetaDataJSON());
                makeAjaxCall('/transactions', 'POST', {
                    transactions: createExpensesTransactionMetaDataJSON(),
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
                    $('#expenses_form').find(':submit').prop('disabled', false);
                    $('#expenses_form').trigger('reset');
                }, function (xhr, status, error) {
                    if (xhr.status == 400) {
                        $.notify('something went wrong!Please try again', {
                            position: "bottom left",
                            style: 'successful-process',
                            className: 'notDone',
                        });
                    }
                    $('#expenses_form').find(':submit').prop('disabled', false);


                });
            }else{
                alert('Please fill all fields');
            }


        });


        function createExpensesTransactionMetaDataJSON() {
            let transactions = [];
            $('input[id^=account-]').each(function () {
                let i = $(this).attr('id').split('-')[1];

                let transaction = {};
                let meta_data = {};
                meta_data["payer_id"] = "{{ Session('center_id') }}";
                meta_data['payer_type'] = "App\\Center";
                meta_data["payFor_id"] = null;
                meta_data['payFor_type'] = null;


                transaction['account_id'] = $('#account_list [value="' + $("#account-"+i).val() + '"]').attr("data-account-id");
                transaction['rest'] = $('#rest-'+i).val();
                transaction['meta_data'] = meta_data;
                transaction['amount'] = $("#paid-"+i).val();
                transaction['deserved_amount'] = $("#deserved-amount-"+i).val();

                transactions.push(transaction)
            });


            return transactions;
        }
        //



</script>
</body>
</html>
