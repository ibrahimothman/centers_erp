<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- library  -->
@include('library')
    <title>payment instructor record</title>
    <style>
        .hide{
            display: none;
        }
    </style>
</head>
<body id="page-top">
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-8">
                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title view-courses-title">
                                <h3>تسجيل المرتبات</h3>
                            </div>
                        </header>
                        <div class="card-body">
                            <form id="addPayment" enctype="multipart/form-data" action="{{ route('payments.store') }}" method="post">
                                @csrf

                                <div class="form-row" id="payable">
                                    <div class="col form-group">
                                        <label>ااختار</label>
                                        <span class="required">*</span>
                                        <select class="form-control" id="payable_type" name="payable_type" required>
                                            <option value="0">اختار</option>
                                            <option data-extra="{{ $instructors }}" value="App\Instructor">مدرسين</option>
                                            <option data-extra="{{ $employees }}" value="App\Employee">موظفين</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>االاسم</label>
                                        <span class="required">*</span>
                                        <select class="form-control" id="payable_list" name="payable_id" required>
                                            <option value="0">اختار</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row" id="model_form">
                                    <div class="col form-group">
                                        <label>نظام المحاسبه</label>
                                        <span class="required">*</span>
                                        <select class="form-control" id="payment_models" name="payment_model" required>
                                            <option value="0">اختار</option>
                                            @foreach($payment_models as $payment_model)
                                                <option data-extra="{{ $payment_model }}" value="{{ $payment_model->id }}">{{ $payment_model->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <br>
                                <!-- save -->
                                <div class="form-row save">
                                    <div class="col-sm-6 mx-auto" style="width: 200px;">
                                        <button class="btn btn-primary action-buttons m-1" type="submit"
                                                id="submit"> إضافة
                                        </button>
                                        <button class="btn  btn-danger action-buttons " type="reset"> إلغاء
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end card -->
                    </div>
                </div>
            </div>
        </div>
        <!-- script -->
        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="/js/payment_instructor_validation.js"></script>
<script>
// add payment value
    $(function() {

        $("#payable").change(function () {
            $('#payable_list').empty();
            $('#payable_list').append("<option value='0'>اختار</option>");
            var selected_payable = $.parseJSON($(this).find(':selected').attr("data-extra"));
            $.each(selected_payable, function (i, payable) {
                $('#payable_list').append("<option value='"+ payable.id +"'>"+ payable.nameAr +"</option>");
            });
        });

        $("#payment_models").on('change', function() {
            $('.meta_data').remove();
            var selected_model = $.parseJSON($(this).find(':selected').attr("data-extra"));
            console.log(selected_model);
            $.each(selected_model.meta_data, function (key, value) {
                $('#model_form').after("<div class='row form-group meta_data'>" +
                    "<div class='col-sm-6'>" +
                    "<label>"+ key +"</label>" +
                    "<span class='required'>*</span>" +
                    "<input class='form-control payType' type='text' name='meta_data["+ key +"]' id='"+ key +"'>" +
                    "</div>" +
                    "</div>");
            })

        });
    });
    //end
</script>
</body>
</html>
