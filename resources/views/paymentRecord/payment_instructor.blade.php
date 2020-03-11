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
                            <form id="addPayment">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>اسم المدرس</label>
                                        <span class="required">*</span>
                                        <select class="form-control" id="instructor" name="name" required>
                                            <option value="">اختار</option>
                                            <option value="احمد">احمد</option>
                                            <option value="محمد">محمد</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>نظام المحاسبه</label>
                                        <span class="required">*</span>
                                        <select class="form-control" id="selectType" name="type" >
                                            <option value="">اختار</option>
                                            <option value="month">الشهر</option>
                                            <option value="hour">الساعه</option>
                                            <option value="course">الكورس</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group hide ">
                                    <div class='col-sm-6'>
                                        <label>المرتب</label>
                                        <span class="required">*</span>
                                             <input class="form-control payType" type="text" name="money">
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
        var select = $('#selectType'),
            pay =  $('.hide');
        select.on('change', function() {
            var selected=$(this).find(':selected').val();
            pay.show();
            if (selected =="hour"){
                $(".payType").attr("placeholder"," ادخل سعر الساعه");
           }else if(selected =="month"){
                $(".payType").attr("placeholder","ادخل مرتب الشهر");
            }else if(selected =="course"){
                $(".payType").attr("placeholder","ادخل ثمن الكورس");
            }else if(selected ==""){
                pay.hide();
            }
        });
    });
    //end
</script>
</body>
</html>
