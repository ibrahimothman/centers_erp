<!DOCTYPE html>
<html lang="ar">
<head>
    <!-- Bootstrap CSS & js -->
    @include('library')
    <link rel="stylesheet" href="/css/instructor_style.css">
    <title>change password instructor</title>
    <style>
        .error {
            color: #b60000;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
        }
    </style>
</head>
<body class="bg-light">

<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
<!-- Begin Page Content -->
<section>
    <div class="container-fluid   text-right ">

        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header text-primary">
                        تغير كلمه السر
                    </div>
                    <div class="card-body">
                        <form action="" method="" id="passwordForm">
                            <div class="row">
                                <div class="col-sm text-center ">
                                    <h5> email@email.com</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row form-group">
                                <div class="col-4 ">كلمه السر القديمه</div>

                                <div class="col-8 ">
                                    <input type="text" name="password" class='form-control'
                                           placeholder='ادخل كلمه السر القديمه'>
                                </div>
                            </div>
                            <hr>


                            <div class="form-row form-group">
                                <div class="col-4 ">كلمه السر الجديده</div>

                                <div class="col-8 ">
                                    <input  id="newPassword" type="text" name="newPassword" class='form-control'
                                           placeholder='ادخل كلمه السر الجديده'>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row form-group">
                                <div class="col-4 ">تاكيد كلمه السر</div>

                                <div class="col-8 ">
                                    <input type="text" name="confirm" class='form-control' placeholder="تاكيد كلمه السر">
                                </div>
                            </div>
                            <hr>


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
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="/js/instructor_change_password_validation.js"></script>


</body>
</html>





