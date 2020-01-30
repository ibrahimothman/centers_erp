<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Bootstrap CSS & js -->
@include('library')
<!-- style-->
    <title>Enrolling students in diploma</title>
</head>
<body>
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title view-courses-title">
                                <h3>تسجيل الطلاب بالدبلومة </h3>
                            </div>
                        </header>
                        <div class="card-body">
                            <form action="">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for="student-id">اسم الطالب</label>
                                        <input type="text"  placeholder="اسم الطالب" class="form-control" id="student-id" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for="course-id">الدبلومة</label>
                                        <select class="form-control" id="course_id" required>
                                            <option value="">اختار</option>
                                            <option value="">full stack diploma</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label >مواعيد الدبلومه</label>
                                        <select  class="form-control "  id="time" name="time" required>
                                            <option value="">اختار</option>
                                            <option value="">  السبت والثلاثاء الساعه  <span>2 : 6</span> </option>
                                            <option value=""> الاحد والاربعاء الساعه  <span>4 : 8</span> </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row save">
                                    <div class="col-sm-6 mx-auto" style="width: 200px;">
                                        <hr/>
                                        <button class="btn btn-primary action-buttons" type="submit" id="submit"> إضافة
                                            <i class="fas fa-plus"></i></button>
                                        <button class="btn  btn-danger action-buttons" type="reset"> إلغاء <i
                                                    class="fas fa-times"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        @include('footer')
    </div>
</div>
<!-- script-->
@include('script')
</body>
</html>

