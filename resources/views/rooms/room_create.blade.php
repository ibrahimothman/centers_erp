<!DOCTYPE html>
<html lang="ar">
<head>
    <!-- Bootstrap CSS & js -->
    @include('library')
<!-- Bootstrap CSS & js -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/room_style.css">
    <title> room create</title>
    <style>
        .error {
            color: #dc3545;
            font-size: 1rem;
            line-height: 1;
        }
        input.error {
            border: 1px solid #dc3545;
        }
        div[name="add"]{
            display: inline-block;

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
            <div class="container-fluid   text-right ">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-header text-primary form-title">
                                اضافه غرفه جديده
                            </div>
                            <div class="card-body">
                                <form  action="" method="get" id="form">
                                    <div class="form-row form-group">
                                        <div class="col-3 ">
                                            اسم الغرفه
                                            <span class="required">*</span>
                                            </div>

                                        <div class="col-9 ">
                                            <input type="text" name="roomName" class='form-control'
                                                   placeholder='ادخل اسم الغرفه'>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row form-group">
                                        <div class="col-3 ">
                                            الموقع
                                        <span class="required">*</span>
                                        </div>
                                        <div class="col-9 ">
                                            <input type="text" name="location" class='form-control'
                                                   placeholder='ادخل الموقع'>
                                        </div>
                                    </div>
                                    <h6>تفاصيل مساحه الغرفه</h6>
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="form-row form-group">
                                                <div class="col-3 ">مساحه الغرفه</div>
                                                <div class="col-9 l ">
                                                    <select class="form-control" name="area">
                                                        <option value="">اختار</option>
                                                        <option value="12متر مربع">12متر مربع</option>
                                                        <option value="30متر مربع">30 متر مربع</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row form-group">
                                                <div class="col-3 ">عدد الكراسي</div>
                                                <div class="col-9 ">
                                                    <input type="text" name="char" class='form-control'
                                                           placeholder='ادخل عدد الكراسي'>
                                                </div>
                                            </div>
                                            <div class="form-row form-group">
                                                <div class="col-3 ">عدد الكمبيوتر</div>
                                                <div class="col-9 ">
                                                    <input type="text" name="pc" class='form-control'
                                                           placeholder='ادخل عدد الكمبيوتر'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h6> اضف امكانيات المعمل</h6>
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class=" row smiley-wrapper justify-content-center">
                                                <div class="smiley " id="addBtn">
                                                    <div name="add">
                                                        <button class="btn btn-primary" name="option"> <span >كاميرات مراقبه</span></button>
                                                    </div>
                                                    <div name="add">
                                                        <button class="btn btn-primary" name="option"> <span >تكيف</span></button>
                                                    </div>
                                                    <div name="add">
                                                        <button class="btn btn-primary" name="option"> <span >دتاشو</span></button>
                                                    </div>
                                                    <div name="add">
                                                        <button class="btn btn-primary" name="option"> <span >واي فاي</span></button>
                                                    </div>
                                            </div>
                                            </div>
                                            <Br>
                                        <div class=" row">
                                            <div class="col text-center">
                                                <fieldset  name="message"  style="min-height: 100px;" id="reply-messsage" class="markItUpEditor "></fieldset>

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
<!-- script room option field-->
<script type='text/javascript' src="/js/room_style.js"></script>
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="/js/room_create_validation.js"></script>

</body>
</html>
