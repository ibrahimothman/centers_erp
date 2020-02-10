<!DOCTYPE html>
<html lang="en">
<head>
    @include('library')
    <title>test-det-edit</title>
    <style>
        .error {
            color: #dc3545;
            font-size: 1rem;
            line-height: 1;
        }
        input.error , textarea.error {
            border: 1px solid #dc3545;
        }
    </style>

</head>

<body id="page-top">

<!-- Page Wrapper -->

<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-header text-primary"> تعديل الامتحان </div>
                            <div class="card-body">
                                <form  method="post" action="/tests/{{$test->id}}" id="testEdit">
                                    @csrf
                                    @method('patch')
                                    <div class="form-row">
                                        <div class="col-sm-8 form-group">
                                            <label for="validationCustom01">اسم الامتحان</label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" id="validationCustom01" placeholder="اسم الامتحان " value="{{$test->name}}" name="name">
                                            {{ $errors->first('name') }}
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"  id="customCheck1" name="retake" @if($test->retake == 1) checked @endif   >
                                                <label class="custom-control-label" for="customCheck1">قابل للاعادة</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-6  form-group">
                                            <label for="validationCustom02">
                                            مصاريف الامتحان/فردى
                                            </label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" id="validationCustom02" placeholder="" value="{{$test->cost_ind}}" name="cost_ind" >
                                            <div>{{ $errors->first('cost_ind') }}</div>
                                        </div>
                                        <div class="col-sm-6  form-group">
                                            <label for="validationCustom03">
                                            مصاريف الامتحان/كورس
                                            </label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" id="validationCustom03" placeholder="" value="{{$test->cost_course}}" name="cost_course" >
                                            {{ $errors->first('cost_course') }}
                                        </div>
                                    </div>
                                    <div class=" form-row">
                                        <label>تفاصيل الامتحان</label>
                                        <span class="required">*</span>
                                        <textarea placeholder="  " rows="3"  class="form-control" name="description">{{$test->description}}</textarea>
                                        {{ $errors->first('description') }}
                                    </div>
                                    <div class="form-row save"> </div>
                                    <div class="col-sm-6 mx-auto" style="width: 200px;"> <br>
                                        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> تعديل</button>
                                        <button class="btn  btn-danger" type="reset"><i class="glyphicon glyphicon-repeat"></i> الغاء</button>
                                    </div>


                            </form>

                        </div>
                    </div>
                </div>

                <!-- /.container-fluid -->
            </div>

@include('footer')
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
</div>

<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top"> <i class="fas fa-angle-up"></i> </a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">هل تريد الخروج بالفعل</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">اضغط على الخروج اذا كنت ترغب قى  الخروج</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
                <a class="btn btn-primary" href="login.html">الخروج</a> </div>
        </div>
    </div>
</div>
<!-- script-->
@include('script')
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>

<!-- client side validation page -->
<script type='text/javascript' src="/js/test_edit_validation.js"></script>

</body>
</html>
