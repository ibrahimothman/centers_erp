<!DOCTYPE html>
<html lang="ar">
<head>

    @include('library')
    <!-- Bootstrap CSS & js -->
        <link rel="stylesheet" href="{{url("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{url("css/instructor_style.css")}}">

    <title>register instructor</title>
</head>
<body class="bg-light" id="page-top">


<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <section>

            <div class="container-fluid   text-right">

        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header text-primary">
                        تسجيل بيانات المدرب
                    </div>
                            <div class="card-body">
                                <form action="{{route('instructors.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input name="next" value="save" hidden>
                                    <div class="form-row form-group">
                                        <div class="col-sm-12 ">
                                            <label>الاسم باللغه العربيه</label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" name="nameAr"

                                                   placeholder="بالاسم باللغه العربيه " value="{{old('nameAr')}}">
                                             <div>{{ $errors->first('nameAr') }}</div>
                                        </div>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label>الاسم باللغه الانجليزيه</label>
                                            <input type="text" name="nameEn" class="form-control"
                                                   placeholder="الاسم باللغه الانجليزيه" value="{{old('nameEn')}}">
                                            <div>{{ $errors->first('nameEn') }}</div>
                                        </div>
                                    </div>



                                    <div class=" form-row form-group">
                                        <div class="col">
                                            <label>البريد الالكترونى </label>
                                            <span class="required">*</span>
                                            <input type="text" name="email" placeholder="ادخل البريد الالكترونى "
                                                   class="form-control" value="{{old('email')}}">
                                            <div>{{ $errors->first('email') }}</div>
                                        </div>
                                    </div>



                            <div class=" form-row form-group">
                                <div class="col-sm-6  ">
                                    <label>رقم التليفون المحمول</label>
                                    <span class="required">*</span>
                                    <input type="text" name="phoneNumber"
                                           placeholder="ادخل رقم التليفون المحمول" class="form-control mb-1 " value="{{old('phoneNumber')}}">
                                    <div>{{ $errors->first('phoneNumber') }}</div>
                                </div>

                                        <div class="col-sm-6">
                                            <label>تليفون اخر </label>
                                            <input type="text" name="phoneNumberSec" placeholder="ادخل رقم التليفون" value="{{old('phoneNumberSec')}}"
                                                   class="form-control">
                                            <div>{{ $errors->first('phoneNumberSec') }}</div>
                                        </div>

                                    </div>

                            <div class=" form-row form-group">
                                <div class="col-sm-6 ">
                                    <label>الرقم القومى </label>
                                    <input type="text" name="idNumber" value="{{old('idNumber')}}"
                                           placeholder="ادخل الرقم القومى " class="form-control mb-1  ">
                                    <div>{{ $errors->first('idNumber') }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <label>رقم جواز السفر</label>
                                    <input name="passportNum" type="text" placeholder="ادخل رقم جواز السفر" value="{{old('passportNum')}}"
                                           class="form-control">
                                    <div>{{ $errors->first('passportNum') }}</div>
                                </div>
                            </div>
                            <br>
                                    <div id="app">
                                        <address_component :address="{{ $address }}"></address_component>
                                    </div>

                                    <div class=" form-row  form-group">
                                        <label>العنوان</label>
                                        <span class="required">*</span>

                                        <textarea name="address" placeholder="ادخل العنوان " rows="3"
                                                  class="form-control">{{old('address')}}</textarea>
                                        <div>{{ $errors->first('address') }}</div>
                                    </div>

                                    <div class=" form-row  form-group">
                                        <label>نبذه عن</label>
                                        <span class="required">*</span>

                                        <textarea name="bio" placeholder="نبذه عن " rows="3"
                                                  class="form-control" style="  overflow-scrolling:auto; ">{{old('bio')}}</textarea>
                                        <div>{{ $errors->first('bio') }}</div>
                                    </div>


                                    <!-- payment model -->
                                    <div class="form-row  " id="model_form" >
                                        <div class="col form-group">
                                            <label>نظام المحاسبه</label>
                                            <span class="required">*</span>
                                            <select class="form-control" id="payment_models" name="payment_model" required>
                                                <option value="0">اختار</option>
                                                @foreach($payment_models as $payment_model)
                                                    <option data-extra="{{ $payment_model->meta_data }}" {{ $payment_model == old('payment_model')? 'selected':''}} value="{{ $payment_model->id }}">{{ $payment_model->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


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
                                            <img id="imageUploaded1" src="http://simpleicon.com/wp-content/uploads/camera-2.svg"
                                                 alt="your image"/>
                                            <p>صورة البطاقه</p>
                                        </div>
                                        <div class="course-image-input">
                                            <img id="imageUploaded2" src="http://simpleicon.com/wp-content/uploads/camera-2.svg"
                                                 alt="your image"/>
                                            <p>الصوره الشخصيه</p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row save">
                                        <div class="col-sm-6 mx-auto text-center">
                                            <button class="btn btn-primary" type="submit" id="submit">حفظ</button>
                                            <button class="btn btn-primary" type="submit" id="submit_create">حفظ و انشاء جديد</button>
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
        @include('footer')
    </div>
</div>
<!-- scroll top -->
<script src="{{  asset('js/app.js') }}"></script>
@include('scroll_top')
<!-- script-->
@include('script')
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>

<!-- client side validation page -->
<script type='text/javascript' src="{{url("js/instructor_register_validation.js")}}"></script>



<script>
    $('#imageUploaded1, #imageUploaded2, #imageUploaded3, #imageUploaded4').click(function () {
        let photoNum = this.id[this.id.length - 1];
        $(`#customFile${photoNum}`).trigger('click');
    });
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


    $("#payment_models").on('change', function() {
        $('.meta_data').remove();
        var selected_model_meta_data = $.parseJSON($(this).find(':selected').attr("data-extra"));
        console.log(selected_model_meta_data);
        $.each(selected_model_meta_data, function (key, value) {
            console.log(key);
            $('#model_form').after("<div class='row form-group meta_data'>" +
                "<div class='col-sm-12'>" +
                "<label>"+ key +"</label>" +
                "<span class='required'>*</span>" +
                "<input class='form-control payType' type='text' name='payment_model_meta_data["+ key +"]' id='"+ key +"'>" +
                "</div>" +
                "</div>");
        })

    });

    $('#submit_create').on('click', function () {
        $('input[name=next]').val('create');
    })
</script>


</body>
</html>
