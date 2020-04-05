<!DOCTYPE html>
<html lang="en">

<head>
    @include('library')
    <!-- Bootstrap CSS & js -->
        <link rel="stylesheet" href="/css/employee.css">
    <title>edit admin</title>
</head>
<body id="page-top">
<!-- Page Wrapper -->

<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
    <!-- Begin Page Content -->
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-header text-primary ">
                                تعديل بيانات الموظفين
                            </div>
                            <div class="card-body">
                                <form action="" method="" id="employeeEdit">

                                    <div class="form-row form-group">
                                        <label>الاسم باللغه العربيه </label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" name="nameAr" placeholder="الاسم " value="">
                                    </div>

                                    <div class="form-row form-group">
                                        <label>الاسم باللغه الانجليزيه </label>
                                        <input type="text" class="form-control" name="nameEn" placeholder="الاسم " value="">
                                    </div>
                                    <div class=" form-row form-group">
                                        <div class="col-6 ">
                                            <label>رقم التليفون </label>
                                            <span class="required">*</span>
                                            <input type="text" name="phoneNumber" placeholder="ادخل رقم التليفون المحمول  "
                                                   class="form-control" value="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>تليفون اخر </label>
                                            <input type="text" name="phoneNumberSec" placeholder="ادخل رقم التليفون" value=""
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class=" form-row form-group">
                                        <div class="col-sm-6 ">
                                            <label>الرقم القومى </label>
                                            <input type="text" name="idNumber" value=""
                                                   placeholder="ادخل الرقم القومى " class="form-control mb-1  ">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>رقم جواز السفر</label>
                                            <input name="passportNum" type="text" placeholder="ادخل رقم جواز السفر" value=""
                                                   class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-row form-group">

                                        <div class="col  ">
                                            <label>البلد </label>
                                            <input name="state" type="text" placeholder="البلد" value="" class="form-control">
                                        </div>

                                        <div class="col  ">
                                            <label >المدينه </label>
                                            <input name="city" type="text" placeholder="المدينه" value="" class="form-control">
                                        </div>
                                    </div>

                                    <div class=" form-row form-group">
                                        <label>العنوان</label>
                                        <span class="required">*</span>
                                        <textarea name="address" placeholder="ادخل العنوان " rows="3"
                                                  class="form-control"></textarea>
                                    </div>

                                    <!-- payment model -->
                                    <div class="form-row  " id="model_form" >
                                        <div class="col form-group">
                                            <label>نظام المحاسبه</label>
                                            <span class="required">*</span>
                                            <select class="form-control" id="payment_models" name="payment_model" required>
                                                <option value="">اختار</option>
                                                    <option>ساعه</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class="col-sm-6">
                                            <label>
                                                <input type="radio" class="option-input radio"
                                                       name="example" checked/>
                                                يعمل
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>
                                                <input type="radio" class="option-input radio"
                                                       name="example"/>
                                                لا يعمل
                                            </label>
                                        </div>
                                    </div>
                                    <br>
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

        <!-- End of Main Content -->

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
<script type='text/javascript' src="/js/employee_edit_validation.js"></script>

</body>

</html>