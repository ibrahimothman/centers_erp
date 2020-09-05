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
                                <form action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data" method="post" id="employeeCreate">
                                    @csrf
                                    @method('put')

                                    <div class="form-row image-upload">
                                        <div class="col-sm-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" accept="image/*" name="idImage"
                                                       id="customFile1" src="" onchange="readURL(this, 1);" required>
                                                <input type="file" class="custom-file-input" accept="image/*" name="image"
                                                       id="customFile2" src="" onchange="readURL(this, 2);" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center  ">
                                        <div class="course-image-input">
                                            <img id="imageUploaded1" src="{{ $employee->image }}"
                                                 />
                                            <p>صورة البطاقه</p>
                                            <!--      <div id="photo1" class="photo" >هذه الخانه مطلوبه</div> -->
                                        </div>
                                        <div class="course-image-input">
                                            <img id="imageUploaded2" src="{{ $employee->idImage }}"
                                                 alt="your image"/>
                                            <p>الصوره الشخصيه</p>
                                            <!--      <div id="photo2" class="photo" >هذه الخانه مطلوبه</div> -->

                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <label>الاسم باللغه العربيه </label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" name="nameAr" placeholder="الاسم " value="{{ $employee->nameAr ?? old('nameAr') }}">
                                        <div>{{ $errors->first('nameAr') }}</div>
                                    </div>

                                    <div class="form-row">
                                        <label>الاسم باللغه الانجليزيه </label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" name="nameEn" placeholder="الاسم " value="{{ $employee->nameEn ?? old('nameEn') }}">
                                        <div>{{ $errors->first('nameEn') }}</div>
                                    </div>

                                    <div class="form-row">
                                        <label>الايميل</label>
                                        <input type="text" class="form-control" name="email" placeholder="ادخل الايميل " value="{{ $employee->email ?? old('email') }}">
                                        <div>{{ $errors->first('email') }}</div>
                                    </div>


                                    <div class=" form-row ">
                                        <div class="col-6 ">
                                            <label>رقم التليفون </label>
                                            <span class="required">*</span>
                                            <input type="text" name="phoneNumber" placeholder="ادخل رقم التليفون المحمول  "
                                                   class="form-control" value="{{ $employee->phoneNumber ?? old('phoneNumber') }}">
                                            <div>{{ $errors->first('phoneNumber') }}</div>
                                        </div>


                                        <div class="col-sm-6">
                                            <label>تليفون اخر </label>
                                            <input type="text" name="phoneNumberSec" placeholder="ادخل رقم التليفون" value="{{ $employee->phoneNumberSec ?? old('phoneNumberSec') }}"
                                                   class="form-control">
                                        </div>
                                        <div>{{ $errors->first('phoneNumberSec') }}</div>


                                    </div>
                                    <div class="form-row">
                                        <div class="col ">
                                            <label>الوظيفه </label>
                                            <select name="job" class="form-control">
                                                <option value="0">اختار وظيفة</option>
                                                @foreach($jobs as $job)
                                                    <option value="{{ $job->id }}" {{ $employee->job_id == $job->id ? 'selected' : ''}}>{{ $job->name }}</option>
                                                @endforeach
                                            </select>
                                            <div>{{ $errors->first('job') }}</div>
                                        </div>
                                    </div>

                                    <div class=" form-row form-group">
                                        <div class="col-sm-6 ">
                                            <label>الرقم القومى </label>
                                            <input type="text" name="idNumber" value="{{ $employee->idNumber ?? old('idNumber') }}"
                                                   placeholder="ادخل الرقم القومى " class="form-control mb-1  ">
                                            <div>{{ $errors->first('idNumber') }}</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>رقم جواز السفر</label>
                                            <input name="passportNum" type="text" placeholder="ادخل رقم جواز السفر" value="{{ $employee->passportNum ?? old('passportNum') }}"
                                                   class="form-control ">

                                            <div>{{ $errors->first('passportNum') }}</div>
                                        </div>
                                    </div>
                                    <br>

                                    <div id="app">
                                        <address_component :address="{{ $employee->address }}" state="{{ old('state') }}" city="{{ old('city') }}"></address_component>
                                    </div>

                                    <div class=" form-row">
                                        <label>العنوان</label>
                                        <span class="required">*</span>
                                        <textarea name="address" placeholder="ادخل العنوان " rows="3"
                                                  class="form-control">{{ $employee->address->address ?? old('address') }}</textarea>
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
                                                    <option data-extra="{{ $employee->payment_model['model'] == $payment_model->name? $employee->payment_model_meta_data :  $payment_model->meta_data }}" value="{{ $payment_model->id }}" {{ $employee->payment_model['model'] == $payment_model->name ? 'selected' : ''}}>{{ $payment_model->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- user invitation checkbox-->
                                    <div class="form-row">
                                        <div class="col-sm-6 form-group">
                                            @if($employee->user)
                                                <div>
                                                    <label  >هذا الموظف تم دعوته من قبل</label>
                                                </div>
                                            @else
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input part-of-diploma" name="send_invitation" id="send_invitation">
                                                    <label class="custom-control-label" for="send_invitation">دعوة هذا الموظف ليكون مستخدم</label>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <br>
                                    <div class="form-row save">
                                        <div class="col-sm-6 mx-auto text-center">
                                            <button class="btn btn-primary" type="submit" id="submit">تعديل</button>
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
<script src="{{ asset('js/app.js')  }}"></script>
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


    $(document).ready(function () {
        var selected_model_meta_data = $.parseJSON($("#payment_models").find(':selected').attr("data-extra"));
        console.log(selected_model_meta_data);
        drawPaymentModelOptions(selected_model_meta_data);
    });

    $("#payment_models").on('change', function() {
        // console.log('change');
        $('.meta_data').remove();
        var selected_model_meta_data = $.parseJSON($(this).find(':selected').attr("data-extra"));
        drawPaymentModelOptions(selected_model_meta_data);


    });

    function drawPaymentModelOptions(payment_model_meta_data) {
        $.each(payment_model_meta_data, function (key, value) {
            $('#model_form').after("<div class='row form-group meta_data'>" +
                "<div class='col-sm-12'>" +
                "<label>"+ key +"</label>" +
                "<span class='required'>*</span>" +
                "<input class='form-control payType' type='text' value='"+ value +"' name='payment_model_meta_data["+ key +"]' id='"+ key +"'>" +
                "</div>" +
                "</div>");
        })
    }


    $('#imageUploaded1, #imageUploaded2').click(function () {
        let photoNum = this.id[this.id.length - 1];
        $(`#customFile${photoNum}`).trigger('click');
    })


    //code for the image uploaded to be shown
    function readURL(input, num) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                if (num > 3) {
                    $(`#imageUploaded${num}`)
                        .attr('src', 'https://icon-library.net/images/done-icon/done-icon-5.jpg')

                } else {
                    $(`#imageUploaded${num}`)
                        .attr('src', e.target.result)
                }
            };

            reader.readAsDataURL(input.files[0]);
        }
    }



</script>
