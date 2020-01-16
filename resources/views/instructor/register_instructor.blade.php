<!DOCTYPE html>
<html lang="ar">
<head>
<<<<<<< HEAD
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1 , shrink-to-fit=no"/>
    <!-- Bootstrap CSS & js -->
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <title>register instructor</title>
    <style>
        body {
            direction: rtl;
            margin-top: 50px;
            font-family: 'GESSTwoLight-Light' !important;
        }


        .image-upload {
            height: 200px;
            width: 100%;
            position: relative;
            display: none !important;
        }

        .image-upload input, .image-upload label {
            display: none;
        }
=======

    @include('library')
    <link rel="stylesheet" href="/css/instructor_style.css">
>>>>>>> 0813976f6b54054fa0a46c96c5c771f579c4fe6c

        .image-upload + div {
            text-align: center;
        }

        .course-image-input {
            width: calc(33% - 10px);
            margin-left: 5px;
            margin-right: 5px;
        }

        .image-upload + div img {
            width: 100%;
            height: 100px;
            cursor: pointer;
            top: 13px;
            border: 1px solid #ced4da;
            padding: 9px;
            border-radius: 3px;
            align-self: center;
        }

    </style>
</head>
<body class="bg-light">


<!-- Begin Page Content -->
<section>

    <div class="container-fluid   text-right">

        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header text-primary">
                        تسجيل بيانات المدرب
                    </div>
                    <div class="card-body">
                        <form action="{{url('/instructor')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row form-group">
                                <div class="col-sm-12 ">
                                    <label>الاسم باللغه العربيه</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" name="nameAr"
                                           placeholder="بالاسم باللغه العربيه " value="">
                                </div>
                            </div>
                            <div class="form-row form-group">
                                <div class="col">
                                    <label>الاسم باللغه الانجليزيه</label>
                                    <input type="text" name="nameEn" class="form-control"
                                           placeholder="الاسم باللغه الانجليزيه" value="">
                                </div>
                            </div>


                            <div class=" form-row form-group">
                                <div class="col">
                                    <label>البريد الالكترونى </label>
                                    <span class="required">*</span>
                                    <input type="text" name="email" placeholder="ادخل البريد الالكترونى "
                                           class="form-control" value="">
                                </div>
                            </div>


                            <div class=" form-row form-group">
                                <div class="col-sm-6  ">
                                    <label>رقم التليفون المحمول</label>
                                    <input type="text" name="phoneNumber"
                                           placeholder="ادخل رقم التليفون المحمول" class="form-control mb-1 " value="">
                                </div>

                                <div class="col-sm-6">
                                    <label>تليفون اخر </label>
                                    <input type="text" name="phoneNumberSec" placeholder="ادخل رقم التليفون" value=""
                                           class="form-control">
                                </div>

                            </div>

                            <div class=" form-row form-group">
                                <div class="col-sm-6 ">
                                    <label>الرقم القومى </label>
                                    <input type="text" name="idNumber" value=""
                                           placeholder="ادخل الرقم القومى " class="form-control mb-1  ">
                                </div>
                                <div class="col-sm-6">
                                    <label>رقم جواز السفر</label>
                                    <input name="passportNum" type="text" placeholder="ادخل رقم جواز السفر" value=""
                                           class="form-control ">
                                </div>
                            </div>
                            <br>






                            <div class="form-row form-group">
                                <div class="col-sm-6  ">
                                    <label>البلد </label>
                                    <input name="state" type="text" placeholder="البلد" value=""
                                           class="form-control mb-1">
                                </div>

                                <div class="col-sm-6  ">
                                    <label>المدينه </label>
                                    <input name="city" type="text" placeholder="المدينه" value="" class="form-control">

                                </div>
                            </div>

                            <div class=" form-row  form-group">
                                <label>العنوان</label>
                                <span class="required">*</span>

                                <textarea name="address" placeholder="ادخل العنوان " rows="3"
                                          class="form-control"></textarea>
                            </div>

                            <div class=" form-row  form-group">
                                <label>نبذه عن</label>
                                <span class="required">*</span>

                                <textarea name="bio" placeholder="نبذه عن " rows="3"
                                          class="form-control" style="  overflow-scrolling:auto; "></textarea>
                            </div>



                            <div class="form-row image-upload">
                                <div class="col-sm-8">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" accept="image/*" name="image1"
                                               id="customFile1" src="" onchange="readURL(this, 1);" required>
                                        <input type="file" class="custom-file-input" accept="image/*" name="image2"
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
<!-- script-->
<<<<<<< HEAD
<script type="text/javascipt" src="/js/jQuery.js"></script>
<script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
<script src="{{url('js/jquery-3.3.1.min.js')}}"></script>
<script src="/../../../js/popper.min.js"></script>
<script src="/../../../js/bootstrap.min.js"></script>
<script src="/../../..js/jquery-3.3.1.min.js"></script>
<script src="/../../..js/popper.min.js"></script>
<script src="/../../..js/bootstrap.min.js"></script>
=======


@include('script')
>>>>>>> 0813976f6b54054fa0a46c96c5c771f579c4fe6c
<!-- photo js-->


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


</script>


</body>
</html>
