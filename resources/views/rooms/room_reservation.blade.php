<!DOCTYPE html>
<html lang="ar">
<head>
    @include('library')
    <!-- Bootstrap CSS & js -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/room_style.css">
    <title> room reservation</title>
    <style>
        .weekDays-selector input {
            display: none!important;
        }

        .weekDays-selector input[type=checkbox] + label {
            display: inline-block;
            border-radius: 6px;
            background: #dddddd;
            height: 40px;
            width: 30px;
            margin-right: 3px;
            line-height: 40px;
            text-align: center;
            cursor: pointer;
        }

        .weekDays-selector input[type=checkbox]:checked + label {
            background: #2AD705;
            color: #ffffff;
        }
        .error {
            color: #b60000;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
        }
    </style>
</head>
<body class="bg-light">

<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid   text-right ">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header text-primary form-title">
                            حجز موعد جديد
                        </div>
                        <div class="card-body">
                            <form action="" method="" id="roomReservation">
                                <h5 class="text-primary  text-center">غرفه رقم 1</h5>
                                <br>
                                <div class="form-row form-group">
                                    <div class="col-sm-6 ">
                                        <label>اسم الكورس </label>
                                        <input type="text" name="courseName" class='form-control'
                                               placeholder='ادخل اسم اكورس'>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <label>اسم المدرب</label>
                                        <input type="text" name="tName" class='form-control'
                                               placeholder='ادخل اسم المدرب'>
                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col-sm-6 form-group">
                                        <label>من يوم</label>
                                        <input type="date" class='form-control' name="sDay">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label> الي يوم</label>
                                        <input type="date" class='form-control' name="eDay">
                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col-sm-6 form-group">
                                        <label> بداية المحاضرة</label>
                                        <select class="form-control" id="" name="sDate" required>
                                            <option value="">اختار</option>
                                            <option value="7">07:00</option>
                                            <option value="8">08:00</option>
                                            <option value="9">09:00</option>
                                            <option value="10">10:00</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label> نهاية المحاضرة</label>
                                        <select class="form-control" name="eDate" required>
                                            <option value="">اختار</option>
                                            <option value="9">09:00</option>
                                            <option value="10">10:00</option>
                                            <option value="11">11:00</option>
                                            <option value="12">12:00</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <h6 class="checkError ">ايام حجز الكورس</h6>
                                </div>
                                <div class="card ">
                                    <div class="card-body">
                                        <div   class="row ">
                                            <label class="checkbox-inline mx-3"><input type="checkbox" name="check">السبت</label>
                                            <label class="checkbox-inline mx-3"><input type="checkbox" name="check">الاحد</label>
                                            <label class="checkbox-inline mx-3"><input type="checkbox" name="check">الاثنين</label>
                                            <label class="checkbox-inline mx-3"><input type="checkbox" name="check">الثلاثاء</label>
                                            <label class="checkbox-inline mx-3"><input type="checkbox" name="check">الاربعاء</label>
                                            <label class="checkbox-inline mx-3"><input type="checkbox" name="check">الخميس</label>
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

        @include('footer')
    </div>
</div>
<!-- script-->
@include('script')
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="/js/room_reservation_validation.js"></script>
</body>
</html>

