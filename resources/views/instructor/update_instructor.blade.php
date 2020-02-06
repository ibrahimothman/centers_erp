<!DOCTYPE html>
<html lang="ar">
<head>
    @include('library')
    <!-- Bootstrap CSS & js -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/instructor_style.css">

    <title> update register instructor</title>
    <style>
        .error {
            color: #b60000;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
        }
        /* img error */
        .photo{
            display: none;
            color: #b60000;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            text-align: center;
        }
    </style>
</head>
<body class="bg-light">


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
                        <div class="card mb-4">
                            <div class="card-header text-primary">
                                تعديل بيانات المدرب
                            </div>
                            <div class="card-body">
                                <form id="editInstructor">

                                <form action="{{route('instructors.update', $instructor->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="form-row form-group">
                                        <div class="col-sm-12 ">
                                            <label>الاسم باللغه العربيه</label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" name="nameAr"
                                                   placeholder="بالاسم باللغه العربيه " value="">
                                            <input type="text" class="form-control" name="nameAr"
                                                   placeholder="بالاسم باللغه العربيه " value="{{ $instructor->nameAr }}">
                                        </div>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label>الاسم باللغه الانجليزيه</label>
                                            <input type="text" name="nameEn" class="form-control"
                                                   placeholder="الاسم باللغه الانجليزيه" value="">
                                            <input type="text" name="nameEn" class="form-control"
                                                   placeholder="الاسم باللغه الانجليزيه" value="{{ $instructor->nameEn }}">
                                        </div>
                                    </div>


                                    <div class=" form-row form-group">
                                        <div class="col">
                                            <label>البريد الالكترونى </label>
                                            <span class="required">*</span>
                                            <input type="text" name="email" placeholder="ادخل البريد الالكترونى "
                                                   class="form-control" value="{{ $instructor->email }}">
                                        </div>
                                    </div>


                                    <div class=" form-row form-group">
                                        <div class="col-sm-6  ">
                                            <label>رقم التليفون المحمول</label>
                                            <input type="text" name="phoneNumber"
                                                   placeholder="ادخل رقم التليفون المحمول" class="form-control mb-1 " value="{{ $instructor->phoneNumber }}">
                                        </div>

                                        <div class="col-sm-6">
                                            <label>تليفون اخر </label>
                                            <input type="text" name="phoneNumberSec" placeholder="ادخل رقم التليفون" value="{{ $instructor->phoneNumberSec }}"
                                                   class="form-control">
                                        </div>

                                    </div>

                                    <div class=" form-row form-group">
                                        <div class="col-sm-6 ">
                                            <label>الرقم القومى </label>
                                            <input type="text" name="idNumber" value="{{ $instructor->idNumber }}"
                                                   placeholder="ادخل الرقم القومى " class="form-control mb-1  ">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>رقم جواز السفر</label>
                                            <input name="passportNum" type="text" placeholder="ادخل رقم جواز السفر" value="{{ $instructor->passportNum }}"
                                                   class="form-control ">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row form-group">
                                        <div class="col-sm-6  ">
                                            <label>البلد </label>
                                            <input name="state" type="text" placeholder="البلد" value="{{ $instructor->address->state }}"
                                                   class="form-control mb-1">
                                        </div>

                                        <div class="col-sm-6  ">
                                            <label>المدينه </label>
                                            <input name="city" type="text" placeholder="المدينه" value="{{ $instructor->address->city }}" class="form-control">

                                        </div>
                                    </div>

                                    <div class=" form-row  form-group">
                                        <label>العنوان</label>
                                        <span class="required">*</span>

                                        <textarea name="address" placeholder="ادخل العنوان " rows="3"
                                                  class="form-control"></textarea>
                                    </div>

                                    <div class="form-row form-group ">
                                        <div class="col-sm-6 ">
                                            <label>المؤهل الدراسى </label>
                                            <select name="degree" class="form-control  mb-1">
                                                <option value="">اختار</option>
                                                <option value="طالب">طالب</option>
                                                <option value="خريج">خريج</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 ">
                                            <label>الكليه </label>
                                            <select name="faculty" class="form-control">
                                                <option value="">اختار</option>
                                                <option value="هندسه">هندسه</option>
                                                <option value="تجاره">تجاره</option>
                                            </select>
                                        </div>
                                                  class="form-control">{{ $instructor->address->address }}</textarea>
                                    </div>

                                    <div class=" form-row  form-group">
                                        <label>نبذه عن</label>
                                        <span class="required">*</span>

                                        <textarea name="bio" placeholder="نبذه عن " rows="3"
                                                  class="form-control" style="  overflow-scrolling:auto; "></textarea>
                                        <textarea name="bio" placeholder="نبذه عن " rows="3"
                                                  class="form-control" style="  overflow-scrolling:auto; ">{{ $instructor->bio }}</textarea>
                                    </div>


                                    <div class="form-row image-upload">
                                        <div class="col-sm-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" accept="image/*" name="idImage"
                                                       id="customFile1" src="{{ $instructor->getImage("idImage") }}" onchange="readURL(this, 1);" required>
                                                <input type="file" class="custom-file-input" accept="image/*" name="image"
                                                       id="customFile2" src="{{ $instructor->getImage("image") }}" onchange="readURL(this, 2);" required>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center  ">
                                        <div class="course-image-input">
                                            <img id="imageUploaded1" src="{{ $instructor->getImage("idImage") }}"
                                                 alt="your image"/>
                                            <p>صورة البطاقه</p>
                                            <div id="photo1" class="photo" >هذه الخانه مطلوبه</div>
                                        </div>
                                        <div class="course-image-input">
                                            <img id="imageUploaded2" src="{{ $instructor->getImage("image") }}"
                                                 alt="your image"/>
                                            <p >الصوره الشخصيه</p>
                                            <div id="photo2" class="photo" >هذه الخانه مطلوبه</div>
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
        @include('footer')
    </div>
</div>
<!-- script-->


@include('script')
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="/js/instructor_update_validation.js"></script>



<script>
    $('#imageUploaded1, #imageUploaded2, #imageUploaded3, #imageUploaded4').click(function () {
        let photoNum = this.id[this.id.length - 1];
        $(`#customFile${photoNum}`).trigger('click');
    });


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
</script>


</body>
</html>
