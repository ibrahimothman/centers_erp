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
                                        <div class="field">
                                            <div class="form-row ">

                                                <div class="col-lg-3 col-sm-6 form-group ">
                                                    <label> تحت بند  </label>
                                                    <input type="text" placeholder="اختار" name="account" class="form-control expenses_field expenses_required"  id="account" autocomplete="off" list="account_list"  >
                                                    <datalist id="account_list">
                                                        @foreach($accounts as $account)
                                                            <option data-account-id="{{ $account['id'] }}" value="{{ $account['name'] }}"></option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                                <div class="col-lg-3 col-sm-4 form-group ">
                                                    <label> المطلوب سداده </label><input type="text" autocomplete="off" name="deserved_amount" class="form-control expenses_required"  id="deserved_amount"   >
                                                </div>
                                                <div class="col-lg-3 col-sm-4 form-group ">
                                                    <label> المدفوع  </label><input type="text" autocomplete="off" name="amount" class=" form-control payOutlay expenses_required"  id="amount"   >
                                                </div>
                                                <div class="col-lg-3 col-sm-4 form-group ">
                                                    <label>الباقي  </label><input type="text" autocomplete="off" name="noPay" class="form-control "  id="noPay"   >
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
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
<!-- script style-->
<script type='text/javascript' src="/js/financialManagement.js"></script>
<script type='text/javascript' src="/js/ajaxHelper.js"></script>
<script type='text/javascript' src="/js/notify.min.js"></script>
<script type='text/javascript' src="/js/notification.js"></script>
<script>



        function checkIfAllInputsFilled() {
            var empty = $(".required_field").filter(function () {
                return $(this).val().length === 0;
            });

            return empty.length === 0;
        }


        $('#expenses_form').submit(function (e) {
            e.preventDefault();
            makeAjaxCall('/transactions', 'POST', {
                transaction: createExpensesTransactionMetaDataJSON(),
                _token: "{{csrf_token()}}"
            }, function (data) {
                $.notify(data.message, {
                    position: "bottom left",
                    style: 'successful-process',
                    className: 'done',
                });
                setTimeout(function () {
                    window.location.reload();
                }, 5000)
            }, function (xhr, status, error) {
                if (xhr.status == 403) {
                    $.notify(error, {
                        position: "bottom left",
                        style: 'successful-process',
                        className: 'notDone',
                    });
                }


            });


        });

        function createExpensesTransactionMetaDataJSON() {
                let transaction = {};
                let meta_data = {};
                meta_data["payer_id"] = "{{ Session('center_id') }}";
                meta_data['payer_type'] = "App\\Center";
                meta_data["payFor_id"] = null;
                meta_data['payFor_type'] = null;


                transaction['account_id'] = $('#account_list [value="' + $("#account").val() + '"]').attr("data-account-id");
                transaction['rest'] = $('#noPay').val();
                transaction['date'] = $("#dateOutlay").val();
                transaction['meta_data'] = meta_data;
                transaction['amount'] =  $("#amount").val();
                transaction['deserved_amount'] =  $("#deserved_amount").val();


            return transaction;
        }



</script>
</body>
</html>
