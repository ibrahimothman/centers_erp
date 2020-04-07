<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS & js -->
    @include('library')
    <title>register a student</title>
</head>
<body id="page-top">
<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
        <!-- Main Content -->
        <div id="content">
<!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-header text-primary">
                                تسجيل بيانات الطلاب
                            </div>
                            <div class="card-body">
                                <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data" id="studentCreate">

                                    @csrf
                                    <!-- photo -->
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
                                        <!-- end photo -->
                                        <div class="form-row">

                                        <div class="col-sm-12 form-group">

                                            <label for="validationCustom01">الاسم باللغه العربيه</label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" name="nameAr" id="validationCustom01" placeholder="الاسم باللغه العربيه "  value="{{ old('nameAr') }}" >
                                            <div>{{ $errors->first('nameAr') }}</div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 form-group">
                                            <label for="validationCustom03">الاسم باللغه الانجليزيه</label>
                                            <span class="required">*</span>
                                            <input type="text" name= "nameEn" class="form-control" id="validationCustom03" placeholder="الاسم باللغه الانجليزيه" value="{{ old('nameEn') }}" >
                                            <div>{{ $errors->first('nameEn') }}</div>
                                        </div>
                                    </div>
                                    <div class=" form-row ">
                                        <div class="col-sm-12 form-group">
                                        <label for="validationCustom05">البريد الالكترونى </label>
                                            <span class="required">*</span>
                                        <input type="text" name="email" id="validationCustom05" placeholder="ادخل البريد الالكترونى " class="form-control" value="{{ old('email') }}">
                                        <div>{{ $errors->first('email') }}</div>
                                    </div>

                                    </div>
                                    <div class=" form-row">
                                        <div class="col-sm-6 ">
                                            <label>رقم التليفون المحمول</label>
                                            <span class="required">*</span>
                                            <input type="text" name="phoneNumber"  data-inputmask="'mask' : '(999) 99999999'"  placeholder="ادخل رقم التليفون المحمول"  class="form-control" value="{{ old('phoneNumber') }}">
                                            <div>{{ $errors->first('phoneNumber') }}</div>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>تليفون اخر </label>
                                            <input type="text" name="phoneNumberSec" placeholder="ادخل رقم التليفون" value="{{ old('phoneNumberSec') }}"   class="form-control">
                                            <div>{{ $errors->first('phoneNumberSec') }}</div>
                                        </div>

                                    </div>

                                    <div class=" form-row">
                                        <div class="col-sm-6">
                                            <label for="validationCustom06">الرقم القومى </label>
                                            <input type="text" name="idNumber" id="validationCustom06" value="{{ old('idNumber') }}"  placeholder="ادخل الرقم القومى " class="form-control" >
                                            <div>{{ $errors->first('idNumber') }}</div>

                                        </div>
                                        <div class="col-sm-6">
                                            <label>رقم جواز السفر</label>
                                            <input name="passportNum" type="text" placeholder="ادخل رقم جواز السفر" value="{{ old('passportNum') }}" class="form-control" >
                                            <div>{{ $errors->first('passportNum') }}</div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-sm-12  ">

                                        </div>
                                        <div class="col-sm-6 form-group ">
                                            <label for="">البلد </label>
                                            <input name="state" type="text" placeholder="البلد" value="{{ old('state') }}" class="form-control">
                                            <div>{{ $errors->first('state') }}</div>

                                        </div>

                                        <div class="col-sm-6 form-group ">
                                            <label for="">المدينه </label>
                                            <input name="city" type="text" placeholder="المدينه" value="{{ old('city') }}" class="form-control">
                                            <div>{{ $errors->first('city') }}</div>
                                        </div>
                                    </div>

                                    <div class=" form-row form-group">
                                        <label>العنوان</label>
                                        <span class="required">*</span>

                                        <textarea name="address" placeholder="ادخل العنوان " rows="3" class="form-control">{{ old('address') }}</textarea>
                                        <div>{{ $errors->first('address') }}</div>
                                    </div>


                                    <div class="form-row form-group">
                                        <div class="col-sm-6  ">
                                            <label for="">المؤهل الدراسى </label>
                                            <select name="degree" class="form-control" id="exampleFormControlSelect1">
                                                <option value="">اختار</option>
                                                @foreach($student->degreeOptions() as $degree)
                                                    <option>{{ $degree }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-6  ">
                                            <label for="">الكليه </label>
                                            <select name="faculty" class="form-control" id="exampleFormControlSelect2">
                                                <option value="">اختار</option>
                                                @foreach($student->facultyOptions() as $faculty)
                                                    <option>{{ $faculty }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" form-row">
                                        <div class="col-sm-12 form-group ">
                                            <label>كارت المهاره</label>
                                            <input type="text" value="{{ old('skillCardNumber') }}" placeholder="ادخل الرقم" name="skillCardNumber" class="form-control" >
                                            <div>{{ $errors->first('skillCardNumber') }}</div>
                                        </div>

                                    </div>
                              <div class="form-row save">
                                        <div class="col-sm-3  form-group">
                                        </div>
                                        <div class="col-sm-6  form-group">
                                            <br>
                                            <button class="btn btn-primary" type="submit" id="submit"><i class="glyphicon glyphicon-ok-sign"></i> حفظ</button>
                                            <button class="btn  btn-danger" type="reset"><i class="glyphicon glyphicon-repeat"></i> الغاء</button>
                                        </div>
                                        <div class="col-sm-3  form-group">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
            </div>
            <!-- End of Main Content -->
        </div>
            <!-- Footer -->
        @include('footer')
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="/js/students_create_validation.js"></script>
<script>

        $(document).ready(function() {
            $(":input").inputmask();

            $("#phone").inputmask({"mask": "(999) 99999999"});
            $(#phone).unmask();
        });
    </script>

<!-- photo -->
        <script>


            $('#imageUploaded1, #imageUploaded2, #imageUploaded3, #imageUploaded4').click(function () {
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

</body>
</html>
