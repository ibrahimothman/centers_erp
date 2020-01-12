<!DOCTYPE html>
<html lang="ar">
<head>
    <!-- Bootstrap CSS & js -->
    @include('library')
    <link rel="stylesheet" href="/css/room_style.css">
    <title> room create</title>

</head>
<body class="bg-light">
<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
<section>
    <div class="container-fluid   text-right ">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header text-primary form-title">
                        اضافه غرفه جديده
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-row form-group">
                                <div class="col-3 ">اسم الغرفه</div>
                                <div class="col-9 ">
                                    <input type="text" name="" class='form-control'
                                           placeholder='ادخل اسم الغرفه'>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row form-group">
                                <div class="col-3 ">الموقع</div>
                                <div class="col-9 ">
                                    <input type="text" name="" class='form-control'
                                           placeholder='ادخل الموقع'>
                                </div>
                            </div>
                            <h6>تفاصيل مساحه الغرفه</h6>
                            <div class="card ">
                                <div class="card-body">
                                    <div class="form-row form-group">
                                        <div class="col-3 ">مساحه الغرفه</div>
                                        <div class="col-9 ">
                                            <select>
                                                <option value="volvo">12متر مربع</option>
                                                <option value="saab">30 متر مربع</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class="col-3 ">عدد الكراسي</div>
                                        <div class="col-9 ">
                                            <input type="text" name="" class='form-control'
                                                   placeholder='ادخل عدد الكراسي'>
                                        </div>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class="col-3 ">عدد الكمبيوتر</div>
                                        <div class="col-9 ">
                                            <input type="text" name="" class='form-control'
                                                   placeholder='ادخل عدد الكمبيوتر'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h6>اضافات</h6>
                            <div class="card ">
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-md-3">
                                            <input name="check" type="checkbox">
                                            <label>كاميرات مراقبه</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input name="check" type="checkbox">
                                            <label>تكيف</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input name="check" type="checkbox">
                                            <label>دتاشو</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="checkbox" onClick="selectall(this)">
                                            <label>تحديد الكل</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-row save">
                                <div class="col-sm-6 mx-auto text-center">
                                    <button class="btn btn-primary" type="submit" id="submit">حفظ</button>
                                    <button class="btn  btn-danger" type="reset"> الغاء</button>
                                </div>
                            </div>
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
