<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1 , shrink-to-fit=no"/>
    <!-- Bootstrap CSS & js -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/room_style.css">
    <title> room reservation</title>
</head>
<body class="bg-light">
<!-- Begin Page Content -->
<div class="container-fluid   text-right ">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header text-primary">
                    حجز موعد جديد
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <h5 class="text-primary  text-center">غرفه رقم 1</h5>
                        <br>
                        <div class="form-row form-group">
                            <div class="col-sm-6 ">
                                <label>اسم الكورس </label>
                                <input type="text" name="" class='form-control'
                                       placeholder='ادخل اسم اكورس'>
                            </div>
                            <div class="col-sm-6 ">
                                <label>اسم المدرب</label>
                                <input type="text" name="" class='form-control'
                                       placeholder='ادخل اسم المدرب'>
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-6 form-group">
                                <label>من يوم</label>
                                <input type="date" class='form-control'>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label> الي يوم</label>
                                <input type="date" class='form-control'>
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-sm-6 form-group">
                                <label> بداية المحاضرة</label>
                                <select class="form-control" id="" name="" required>
                                    <option value="7">07:00</option>
                                    <option value="8">08:00</option>
                                    <option value="9">09:00</option>
                                    <option value="10">10:00</option>
                                </select>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label> نهاية المحاضرة</label>
                                <select class="form-control" name="" required>
                                    <option value="9">09:00</option>
                                    <option value="10">10:00</option>
                                    <option value="11">11:00</option>
                                    <option value="12">12:00</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-row form-group">
                            <h6>ايام حجز الكورس</h6>
                        </div>
                        <div class="row mr-5">
                            <div class="col-md-2  ">
                                <input name="check" type="checkbox">
                                <label>السبت</label>
                            </div>
                            <div class="col-md-2  ">
                                <input name="check" type="checkbox">
                                <label>الاحد</label>
                            </div>
                            <div class="col-md-2  ">
                                <input name="check" type="checkbox">
                                <label>الاثنين</label>
                            </div>
                            <div class="col-md-2  ">
                                <input name="check" type="checkbox">
                                <label>الثلاثاء</label>
                            </div>
                            <div class="col-md-2 ">
                                <input name="check" type="checkbox">
                                <label>الاربعاء</label>
                            </div>
                            <div class="col-md-2  ">
                                <input name="check" type="checkbox">
                                <label>الخميس</label>
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
<!-- script-->
<script type="text/javascipt" src="/js/jQuery.js"></script>
<script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>