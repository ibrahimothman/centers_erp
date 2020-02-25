<!DOCTYPE html>
<html lang="ar">
<head>

    <!-- Bootstrap CSS & js -->
    @include('library')
<!-- Bootstrap CSS & js -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/instructor_style.css">
    <title>setting instructor</title>
</head>
<body class="bg-light" id="page-top">
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')

    <!-- Begin Page Content -->
        <section>
            <div class="container-fluid   text-right">

                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-header text-primary">
                                تعديل البايانات الشخصيه
                            </div>
                            <div class="card-body">
                                <form action=""  id="settingInstructor">
                                    <div class="row">
                                        <div class="col-sm text-center ">
                                            <h5> email@email.com</h5>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row form-group">
                                        <div class=" col-sm-6  ">
                                            <label>الاسم باللغه العربيه</label>
                                            <span class="required">*</span>
                                            <input type="text" name="name"  class='form-control'>
                                        </div>
                                        <hr>


                                        <div class=" col-sm-6 ">
                                            <label>الاسم باللغه الانجليزيه</label>
                                            <span class="required">*</span>
                                            <input type="text" name="nameEn"  class='form-control'>
                                        </div>

                                        <hr>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class="col-sm-6 ">
                                            <label>المؤهل الدراسى </label>
                                            <select name="degree" class="form-control">
                                                <option value="">اختار</option>
                                                <option value="طالب">طالب</option>
                                                <option value="خريج">خريج</option>
                                            </select>
                                        </div>

                                        <hr>


                                        <div class="col-sm-6 ">
                                            <label>الكليه </label>
                                            <select name="faculty" class="form-control">
                                                <option value="">اختار</option>
                                                <option value="هندسه">هندسه</option>
                                                <option value="تجاره">تجاره</option>
                                            </select>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class=" col-sm-6  ">
                                            <label>رقم التليفون</label>
                                            <span class="required">*</span>
                                            <input type="text" name="phoneNumber"  class='form-control'>
                                        </div>
                                        <hr>


                                        <div class=" col-sm-6 ">
                                            <label>تليفون اخر</label>

                                            <input type="text" name="phoneNumberSec"class='form-control'>
                                        </div>

                                        <hr>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class=" col-sm-6  ">
                                            <label>البلد</label>
                                            <input type="text" name="state" class='form-control'>
                                        </div>
                                        <hr>


                                        <div class=" col-sm-6 ">
                                            <label>المدينه</label>

                                            <input type="text" name="city"  class='form-control'>
                                        </div>

                                        <hr>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class=" col-sm-12  ">
                                            <label>العنوان</label>
                                            <span class="required">*</span>
                                            <textarea name="address" placeholder="ادخل العنوان " rows="2"
                                                      class="form-control" ></textarea>
                                        </div>



                                    </div>
                                    <div class="form-row form-group">
                                        <div class=" col-sm-12  ">
                                            <label>نبذه عن</label>
                                            <span class="required">*</span>
                                            <textarea name="bio" placeholder="نبذه عن " rows="3"
                                                      class="form-control"
                                                      style="  overflow-scrolling:auto; "></textarea>
                                        </div>
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
<script type='text/javascript' src="/js/instructor_setting_validation.js"></script>


</body>
</html>





