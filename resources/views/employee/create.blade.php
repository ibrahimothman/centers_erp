<!DOCTYPE html>
<html lang="en">

<head>
    @include('library')
    <title>add a new admin</title>
</head>
<body id="page-top">
<!-- Page Wrapper -->

<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <!-- Begin Page Content -->
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-header text-primary ">
                                    تسجيل بيانات الموظفين
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('employees.store') }}" method="post" id="employeeCreate">
                                        @csrf
                                        <div class="form-row">
                                            <label>الاسم باللغه العربيه </label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" name="nameAr" placeholder="الاسم " value="{{ old('nameAr') }}">
                                            <div>{{ $errors->first('nameAr') }}</div>
                                        </div>

                                        <div class="form-row">
                                            <label>الاسم باللغه الانجليزيه </label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" name="nameEn" placeholder="الاسم " value="{{ old('nameEn') }}">
                                            <div>{{ $errors->first('nameEn') }}</div>
                                        </div>


                                        <div class=" form-row ">
                                            <div class="col-6 ">
                                                <label>رقم التليفون </label>
                                                <span class="required">*</span>
                                                <input type="text" name="phoneNumber" placeholder="ادخل رقم التليفون المحمول  "
                                                       class="form-control" value="{{ old('phoneNumber') }}">
                                                <div>{{ $errors->first('phoneNumber') }}</div>
                                            </div>


                                            <div class="col-sm-6">
                                                <label>تليفون اخر </label>
                                                <input type="text" name="phoneNumberSec" placeholder="ادخل رقم التليفون" value="{{ old('phoneNumberSec') }}"
                                                       class="form-control">
                                            </div>
                                            <div>{{ $errors->first('phoneNumberSec') }}</div>


                                        </div>
                                        <div class="form-row">
                                            <div class="col ">
                                                <label>الوظيفه </label>
                                                <span class="required">*</span>
                                                <select name="job" class="form-control">
                                                    <option value="" selected>اختار وظيفة</option>
                                                    @foreach($jobs as $job)
                                                        <option value="{{ $job->id }}">{{ $job->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class=" form-row form-group">
                                            <div class="col-sm-6 ">
                                                <label>الرقم القومى </label>
                                                <input type="text" name="idNumber" value="{{ old('idNumber') }}"
                                                       placeholder="ادخل الرقم القومى " class="form-control mb-1  ">
                                                <div>{{ $errors->first('idNumber') }}</div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>رقم جواز السفر</label>
                                                <input name="passportNum" type="text" placeholder="ادخل رقم جواز السفر" value="{{ old('passportNum') }}"
                                                       class="form-control ">

                                                <div>{{ $errors->first('passportNum') }}</div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="form-row">

                                            <div class="col  ">
                                                <label>البلد </label>
                                                <input name="state" type="text" placeholder="البلد" value="{{ old('state') }}" class="form-control">
                                                <div>{{ $errors->first('state') }}</div>
                                                <div></div>

                                            </div>

                                            <div class="col  ">
                                                <label >المدينه </label>
                                                <input name="city" type="text" placeholder="المدينه" value="{{ old('city') }}" class="form-control">
                                                <div>{{ $errors->first('city') }}</div>

                                            </div>
                                        </div>

                                        <div class=" form-row">
                                            <label>العنوان</label>
                                            <span class="required">*</span>
                                            <textarea name="address" placeholder="ادخل العنوان " rows="3"
                                                      class="form-control">{{ old('address') }}</textarea>
                                            <div>{{ $errors->first('address') }}</div>
                                        </div>

                                        <!-- payment model -->
                                        <div class="form-row  " id="model_form" >
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
                                        <div class="form-row save">
                                            <div class="col-sm-6 mx-auto text-center">
                                                <button class="btn btn-primary" type="submit" id="submit">حفظ</button>
                                                <button class="btn  btn-danger" type="reset"> الغاء</button>
                                            </div>
                                        </div>
                                        <br>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- End of Main Content -->

            @include('footer')
    </div>
</div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">هل تريد الخروج بالفعل</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">اضغط على الخروج اذا كنت ترغب قى  الخروج</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
                    <a class="btn btn-primary" href="login.html">الخروج</a>
                </div>
            </div>
        </div>
    </div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="/js/employee_create_validation.js"></script>

</body>

</html>

<script>
    $("#payment_models").on('change', function() {
        $('.meta_data').remove();
        var selected_model = $.parseJSON($(this).find(':selected').attr("data-extra"));
        $.each(selected_model.meta_data, function (key, value) {
            $('#model_form').after("<div class='row form-group meta_data'>" +
                "<div class='col-sm-12'>" +
                "<label>"+ key +"</label>" +
                "<span class='required'>*</span>" +
                "<input class='form-control payType' type='text' name='payment_model_meta_data["+ key +"]' id='"+ key +"'>" +
                "</div>" +
                "</div>");
        })

    });

</script>
