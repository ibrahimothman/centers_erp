<!DOCTYPE html>
<html lang="ar">
<head>

    <!-- Bootstrap CSS & js -->
    @include('library')
    <link rel="stylesheet" href="/css/instructor_style.css">
    <title>setting instructor</title>
</head>
<body class="bg-light">
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
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-sm text-center ">
                                            <h5> email@email.com</h5>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row form-group">
                                        <div class=" col-sm-6  ">
                                            <label>الاسم باللغه العربيه</label>
                                            <input type="text" name="" value=" ندي " class='form-control'>
                                        </div>
                                        <hr>


                                        <div class=" col-sm-6 ">
                                            <label>الاسم باللغه الانجليزيه</label>

                                            <input type="text" name="" value="nada " class='form-control'>
                                        </div>

                                        <hr>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class="col-sm-6 ">
                                            <label>المؤهل الدراسى </label>
                                            <select name="degree" class="form-control">
                                                <option>طالب</option>
                                                <option>خريج</option>
                                            </select>
                                        </div>

                                        <hr>


                                        <div class="col-sm-6 ">
                                            <label>الكليه </label>
                                            <select name="faculty" class="form-control">
                                                <option>هندسه</option>
                                                <option>تجاره</option>
                                            </select>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class=" col-sm-6  ">
                                            <label>رقم التليفون</label>
                                            <input type="text" name="" value="  " class='form-control'>
                                        </div>
                                        <hr>


                                        <div class=" col-sm-6 ">
                                            <label>تليفون اخر</label>

                                            <input type="text" name="" value=" " class='form-control'>
                                        </div>

                                        <hr>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class=" col-sm-6  ">
                                            <label>البلد</label>
                                            <input type="text" name="" value="  " class='form-control'>
                                        </div>
                                        <hr>


                                        <div class=" col-sm-6 ">
                                            <label>المدينه</label>

                                            <input type="text" name="" value=" " class='form-control'>
                                        </div>

                                        <hr>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class=" col-sm-12  ">
                                            <label>العنوان</label>
                                            <textarea name="address" placeholder="ادخل العنوان " rows="2"
                                                      class="form-control" value=" "></textarea>
                                        </div>



                                    </div>
                                    <div class="form-row form-group">
                                        <div class=" col-sm-12  ">
                                            <label>نبذه عن</label>
                                            <textarea name="about" placeholder="نبذه عن " rows="3"
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
<!-- script-->

@include('script')
</body>
</html>





