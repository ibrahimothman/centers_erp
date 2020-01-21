<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS & js -->
    @include('library')
    <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    -->
    <link href="{{url('employee')}}" rel="stylesheet">
    <title>test-time-add</title>

</head>

<body id="page-top">
<link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>
<script src="{{url('js/jquery.datetimepicker.js')}}"></script>
<!-- Page Wrapper -->
<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
        <!-- Main Content -->
        <div id="content">
        <!-- Begin Page Content -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header text-primary"> تسجيل الامتحان </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('test-groups.store') }}" class="needs-validation"  id="testGroupCreate" novalidate>
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <label for="validationCustom01"> اسم الامتحان </label>
                                            <input type="text" name="testName" value="{{$testName}}"  class="form-control" placeholder="اختار الامتحان"
                                                   id="validationCustom01" list="test" autocomplete="off"/>
                                            <datalist id="test">
                                                <select name="testt" onchange="onOptionSelected()">
                                                    @foreach($tests as $test)
                                                        <option  >{{$test->name}}</option>
                                                    @endforeach
                                                </select>
                                            </datalist>
                                        </div>
                                        <div class="col-md-6 form-group clearfix "> <br>
                                            <input type='button' class="btn btn-outline-success float-right" value=' + اضافه ميعاد ' id='addButton'  name="add" />
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="form-row ">
                                            <div class="col-sm-6 form-group" id="form-group"> </div>
                                        </div>
                                    </div>
                                    <div class="form-row save">
                                        <div class="col-sm-6  ml-auto form-group">
                                            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> حفظ</button>
                                            <button class="btn  btn-danger" type="reset"><i class="glyphicon glyphicon-repeat"></i> الغاء</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- /.container-fluid -->
                    </div>
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
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
        <script>
            $('input#addButton').on('click', function() {
                var id = ($('.field .form-row').length + 1).toString();
                $('.field').append(' <div class="form-row "> <div class="col-sm-6 form-group" "><label for="validationCustom01">   تاريخ الامتحان</label><div class="input-group-append"> <input id="datetimepicker' +id+'" name="test_time'+id+'" class="form-control datetimepicker"  placeholder="تاريخ الامتحان"    type="text" ><span class="fas fa-calendar-alt input-group-text start_date_calendar" aria-hidden="true "></span> </div></div><div class="col-sm-3 form-group "><label for="validationCustom01">  عدد المقاعد  </label><input type="number" name="seat'+id+'" class="form-control"  id="seat'+id+'"   style="width: 100px" ></div></div></div>');
                $(".datetimepicker").datetimepicker();
            });
        </script>
        <script>
            function onOptionSelected() {
            }
        </script>



</body>
</html>
