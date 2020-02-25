<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Bootstrap CSS & js -->
@include('library')
    <title>Enrolling students in diploma</title>
</head>
<body id="page-top">
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
                            <form  id="form" >
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for="student-id">اسم الطالب</label>
                                        <span class="required">*</span>
                                        <input type="text"  placeholder="اسم الطالب" name="name" class="form-control" id="student" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for="course-id">الدبلومة</label>
                                        <span class="required">*</span>
                                        <select class="form-control" id="course_id" required name="selectDiploma">
                                            <option value="">اختار</option>
                                            <option value=" full stack">full stack diploma</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label >مواعيد الدبلومه</label>
                                        <select  class="form-control "  id="time" name="time">
                                            <option value="">اختار</option>
                                            <option value="السبت">  السبت والثلاثاء الساعه  <span>2 : 6</span> </option>
                                            <option value="الاحد"> الاحد والاربعاء الساعه  <span>4 : 8</span> </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row save">
                                    <div class="col-sm-6 mx-auto" style="width: 200px;">
                                        <button class="btn btn-primary " type="submit" id="submit"> إضافة
                                            </button>
                                        <button class="btn  btn-danger " type="reset"> إلغاء
                                                   </button>
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
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="/js/diploma_student_register_validation.js "></script>

</body>
</html>

