<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1 , shrink-to-fit=no"/>
    <!-- Bootstrap CSS & js -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css"/>

    <title>register instructor</title>
    <style>
        body {
            direction: rtl;
            margin-top: 50px;
            font-family:Aharoni;
        }

        .file-input {
            display: inline-block;
            text-align: left;
            background: #fff;
            position: relative;
            border-radius: 3px;
            direction: ltr;
            border: 1px solid #ced4da;
            height: calc(2.25rem + 2px);
            width: 100%;
        }

        .file-input > [type='file'] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            z-index: 10;
            cursor: pointer;
        }

        .file-input > .button {
            display: inline-block;
            cursor: pointer;
            background: #eee;
            padding: 6px 16px;
            border-radius: 2px;

        }

        .file-input:hover > .button {
            background: dodgerblue;
            color: white;
        }

        .file-input > .label {
            color: #495057;
            opacity: .8;
            float: right;
            padding-right: 10px;
            padding-top: 5px

        }
    </style>
</head>
<body class="bg-light">

{{$errors}}
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

                                <label>البريد الالكترونى </label>
                                <span class="required">*</span>
                                <input type="text" name="email" placeholder="ادخل البريد الالكترونى "
                                       class="form-control" value="">
                            </div>


                            <div class=" form-row form-group">
                                <div class="col-sm-6 ">
                                    <label>رقم التليفون المحمول</label>
                                    <input type="text" name="phoneNumber"
                                           placeholder="ادخل رقم التليفون المحمول" class="form-control" value="">
                                </div>
                                <div class="col-sm-6 ">
                                    <label>تليفون اخر </label>
                                    <input type="text" name="phoneNumberSec" placeholder="ادخل رقم التليفون" value=""
                                           class="form-control">
                                </div>

                            </div>

                            <div class=" form-row">
                                <div class="col-sm-6">
                                    <label>الرقم القومى </label>
                                    <input type="text" name="idNumber" value=""
                                           placeholder="ادخل الرقم القومى " class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label>رقم جواز السفر</label>
                                    <input name="passportNum" type="text" placeholder="ادخل رقم جواز السفر" value=""
                                           class="form-control">
                                </div>
                            </div>
                            <br>

                            <div class=" form-row  form-group">
                                <div class="col-6">
                                    <div class='file-input'>
                                        <input name="image"  type='file'>
                                        <span class='button'>Browse</span>
                                        <span class='label'>الصوره الشخصيه</span>
                                    </div>
                                </div>

                                <div class="col-6 ">
                                    <div class='file-input'>
                                        <input name="idImage" type='file'>
                                        <span class='button'>Browse</span>
                                        <span class='label'>صوره البطاقه</span>
                                    </div>

                                </div>

                            </div>
                            <div class="form-row form-group">
                                <div class="col-sm-6  ">
                                    <label>البلد </label>
                                    <input name="state" type="text" placeholder="البلد" value="" class="form-control">
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
<script type="text/javascipt" src="/js/jQuery.js"></script>
<script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
<script src="{{url('js/jquery-3.3.1.min.js')}}"></script>
<script src="/../../../js/popper.min.js"></script>
<script src="/../../../js/bootstrap.min.js"></script>


</body>
</html>
