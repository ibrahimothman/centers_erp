<!DOCTYPE html>
<html lang="en">

<head>
    @include('library')
    <!-- Bootstrap CSS & js -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>add a new admin</title>
    <style>
        body {
           text-align: right;
            font-family: 'GESSTwoLight-Light' !important;
        }
        .error {
            color: #b60000;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
        }
    </style>
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
                                <div class="card-header text-primary text-right">
                                    تسجيل بيانات الموظفين
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('employees.store') }}" method="post" id="employeeCreate">
                                        @csrf
                                        <div class="form-row">
                                            <label>الاسم </label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" name="name" placeholder="الاسم " value="{{ old('name') }}">
                                            <div>{{ $errors->first('name') }}</div>
                                        </div>
                                        <div class="form-row">
                                            <label>الايميل</label>
                                            <span class="required">*</span>
                                            <input type="text" name="email" class="form-control" placeholder="الايميل" value="{{ old('email') }}">
                                            <div>{{ $errors->first('email') }}</div>
                                        </div>

                                        <div class=" form-row ">
                                            <div class="col-6 text-right">
                                                <label>رقم التليفون </label>
                                                <input type="text" name="phoneNumber" placeholder="ادخل رقم التليفون المحمول  "
                                                       class="form-control" value="{{ old('phoneNumber') }}">
                                                <div>{{ $errors->first('phoneNumber') }}</div>
                                            </div>


                                            <div class="col-6 text-right">
                                                <label>الوظيفه </label>
                                                <select name="job" class="form-control">
                                                    <option value="">اختار وظيفة</option>
                                                    @foreach($jobs as $job)
                                                        <option value="{{ $job->id }}">{{ $job->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>


                                        <div class="form-row">

                                            <div class="col text-right ">
                                                <label>البلد </label>
                                                <input name="state" type="text" placeholder="البلد" value="{{ old('state') }}" class="form-control">
                                                <div>{{ $errors->first('state') }}</div>
                                                <div></div>

                                            </div>

                                            <div class="col  text-right">
                                                <label >المدينه </label>
                                                <input name="city" type="text" placeholder="المدينه" value="{{ old('city') }}" class="form-control">
                                                <div>{{ $errors->first('city') }}</div>

                                            </div>
                                        </div>

                                        <div class=" form-row">
                                            <label>العنوان</label>
                                            <textarea name="address" placeholder="ادخل العنوان " rows="3"
                                                      class="form-control">{{ old('address') }}</textarea>
                                            <div>{{ $errors->first('address') }}</div>
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

            <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">هل تريد الخروج بالفعل</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">اضغط على الخروج اذا كنت ترغب قى  الخروج</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
                    <a class="btn btn-primary" href="login.html">الخروج</a>
                </div>
            </div>
        </div>
    </div>

<!-- script-->
@include('script')
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="/js/employee_create_validation.js"></script>

</body>

</html>
