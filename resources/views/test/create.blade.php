<!DOCTYPE html>
<html lang="en">

<head>
    @include('library')
    <title>add a test</title>
</head>

<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <!-- Main Content -->
        <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <div class="card mb-4">
                            <div class="card-header text-primary">
                                اضافه الامتحان

                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('tests.store') }}" id="testsCreate">
                                    @csrf
                                    <input name="next" value="tests" hidden>
                                    <div class="form-row">

                                        <div class="col-sm-4 form-group">

                                            <label for="validationCustom01">اسم الامتحان</label>
                                            <span class="required">*</span>

                                            <input type="text" class="form-control" id="validationCustom01" placeholder="اسم الامتحان " value="{{ old('name') }}"  name="name">
                                            <span id="test_name_error"></span>
                                            <div>{{ $errors->first('name') }}</div>

                                        </div>

                                        <div class="col-sm-4 form-group">

                                            <label for="validationCustom02">كود الامتحان</label>
                                            <span class="required">*</span>

                                            <input type="text" class="form-control" id="validationCustom02" placeholder="كود الامتحان" value="{{ old('code') }}"  name="code">
                                            <span id="test_code_error"></span>
                                            <div>{{ $errors->first('code') }}</div>

                                        </div>

                                        <div class="col-sm-4 form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="retake" id="customCheck1" {{old('retake') == 'on' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="customCheck1">قابل للاعادة</label>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="col-sm-4  form-group">

                                            <label for="validationCustom02">مصاريف الامتحان/فردى</label>
                                            <span class="required">*</span>
                                            <input type="number" class="form-control" id="validationCustom02" placeholder="" value="{{ old('cost') }}" name="cost">
                                            <div>{{ $errors->first('cost') }}</div>

                                        </div>

                                        <div class="col-sm-4  form-group">
                                            <label for="validationCustom03">مصاريف الامتحان/كورس</label>
                                            <span class="required">*</span>
                                            <input type="number" class="form-control" id="validationCustom03" placeholder="" value="{{ old('cost_course') }}" name="cost_course">
                                            <div>{{ $errors->first('cost_course') }}</div>

                                        </div>

                                        <div class="col-sm-4  form-group">
                                            <label for="validationCustom04">نتيجه الامتحان</label>
                                            <span class="required">*</span>
                                            <input type="number" class="form-control" id="validationCustom04" placeholder="" value="{{ old('result') }}" name="result">
                                            <div>{{ $errors->first('result') }}</div>

                                        </div>



                                    </div>


                                    <div class=" form-row">
                                        <label>تفاصيل الامتحان</label>
                                        <span class="required">*</span>
                                        <textarea placeholder="" rows="3" class="form-control" name="description">{{ old('description') }}</textarea>
                                        <div>{{ $errors->first('description') }}</div>
                                    </div>



                                    <div class="form-row save">

                                        <div class="col-sm-6 mx-auto" style="width: 200px;">
                                            <br>
                                            <button class="btn btn-primary" type="submit" id="save"><i class="glyphicon glyphicon-ok-sign"></i> اضافه</button>
                                            <button class="btn btn-primary" type="submit" id="save_create"><i class="glyphicon glyphicon-ok-sign"></i>حفظ و انشاء جديد</button>
                                            <button class="btn  btn-danger" type="reset"><i class="glyphicon glyphicon-repeat"></i> الغاء</button>
                                        </div>

                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>


                    <!-- /.container-fluid -->
                </div>
            </div>
            <!-- End of Main Content -->
        </div>
            <!-- Footer -->
        @include('footer')
            <!-- End of Footer -->

        <!-- End of Content Wrapper -->

    </div>
</div>
    <!-- End of Page Wrapper -->
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
<!-- scroll top -->
@include('scroll_top')
        <!-- script-->
    @include('script')
    <!-- client side validation plugin -->
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>

        <!-- client side validation page -->
        <script type='text/javascript' src="/js/tests_create_validation.js"></script>


        <script>
            $('#save_create').on('click', function (e) {
                $('input[name=next]').val('create');
            })
        </script>
</body>

</html>
