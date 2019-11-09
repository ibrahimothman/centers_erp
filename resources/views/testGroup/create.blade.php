<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>test-time-add</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Custom fonts for this template-->
    <link href="{{url('vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{url('css/sb-admin-rtl.css')}}" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
        integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If"
        crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"
            integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k"
            crossorigin="anonymous"></script>
    <!-- Custom styles for calender-->

    <script src="{{url('js/jquery.min.js')}}"></script>



</head>

<body id="page-top">
<link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>
<script src="{{url('js/jquery.datetimepicker.js')}}"></script>
<!-- Page Wrapper -->
<div id="wrapper">

    @include('sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"> <i class="fa fa-bars"></i> </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="البحث عن " aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button"> <i class="fas fa-search fa-sm"></i> </button>
                        </div>
                    </div>
                </form>

            @include('tobbar')


        <!-- Begin Page Content -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header text-primary"> تسجيل الامتحان </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('test-groups.store') }}" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <label for="validationCustom01"> اسم الامتحان </label>
                                            <input type="text" name="testName" value="{{$testName}}"  class="form-control" placeholder="اختار الامتحان"
                                                   id="validationCustom01" list="test" autocomplete="off"/>
                                            <datalist id="test">
                                                <select name="testt" onchange="onOptionSelected()">
                                                    @foreach($tests as $test)
                                                        <option  value={{$test->name}}>{{$test->name}}</option>
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
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto"> <span>Copyright &copy;وحدة التعليم الالكترونى - جامعه المنصورة </span> </div>
                    </div>
                </footer>
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
        <!-- Bootstrap core JavaScript-->
        <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{url('js/sb-admin-2.min.js')}}"></script>
        <!-- Custom scripts for add-time-->

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
