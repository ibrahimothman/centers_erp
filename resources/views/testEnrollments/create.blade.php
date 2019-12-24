<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>test-stu-add</title>

<!-- Custom fonts for this template-->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
<link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
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

<body id="page-top">a
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
<!-- End of Topbar -->



<!-- Begin Page Content -->

<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header text-primary"> تسجيل الطلاب </div>
<div class="card-body">
<form class="needs-validation" method="post" action="{{url("test_enrollment")}}" novalidate autocomplete="off">


        @csrf
        <div class="form-row">

                <div class="col-md-6 form-group">
                    <label for="validationCustom01"> اسم الامتحان </label>

                        <select class="form-control "  placeholder="اختار الامتحان" id="testselector" name="test" required>
                          <option value="0">اختار الامتحان</option>
                                @foreach($tests as $test)
                                    <option value={{$test->id}}>{{$test->name}}</option>
                                @endforeach
                        </select>
                    <span id="testselector_error"></span>

                </div>
                <div class="col-md-6 form-group">
                        <label >مواعيد الامتحان</label>

                        <select  class="form-control "  placeholder="اختار ميعاد الامتحان" id="time" name="time" required>
                                <option value="0">اختر مبعادا</option>
                      </select>
                    <span id="dateselector_error"></span>



            </div>
        </div>



<div class="form-row">
        <!--stu-name-->

    <div class="col-md-6 form-group">
        <label >اسم الطالب</label>
        <select  class="form-control "  placeholder="اختار طالب" id="stud" name="std" required>
            <option value='0'>اختر طالب</option>
            @foreach($students as $student)
                <option value={{ $student->id }}>{{ $student->nameAr}}</option>
            @endforeach
        </select>
        <span id="stuselector_error"></span>



    </div>
</div>

        <!--test-name-->



        <!--test-time-->


<div class="form-row save">
        <div class="col-sm-6  ml-auto form-group">
            <button class="btn btn-primary" type="button">اضافه</button>
            <button class="btn  btn-danger" type="reset"> الغاء</button>
        </div>
    </div>
</div>



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

<!-- Custom scripts for alwl pages-->
<script src="{{url('employee')}}"></script>

    <script>

        $(document).on('click', 'form button[type=button]', function(e) {
            // check if all fields if filled
            var test_id = $('#testselector').val();
            var group_id = $('#time').val();
            var stu_name = $('#stud').val();
            console.log(stu_name);

            if(test_id !== 0 && group_id !==0 && stu_name !== 0) {
                // remove errors
                $('#testselector_error').html("<lable class = 'text-success'></lable>");
                $('#testselector_error').removeClass('has-error');
                $('#dateselector_error').html("<lable class = 'text-success'></lable>");
                $('#dateselector_error').removeClass('has-error');
                $('#stuselector_error').html("<lable class = 'text-success'></lable>");
                $('#stuselector_error').removeClass('has-error');


                $.ajax({
                   url : '{{ route('test-enrollments.store') }}',
                    method : 'post',
                    data : {stu_name : stu_name, test_id : test_id,group_id : group_id, _token: "{{csrf_token()}}"},
                    success : function (res) {
                        alert(res);
                    }
                });


            }
                if(test_id == 0) {
                    $('#testselector_error').html("<lable class = 'text-danger'>choose a test</lable>");
                    $('#testselector_error').addClass('has-error');
                }
                if(group_id == 0) {
                    $('#dateselector_error').html("<lable class = 'text-danger'>choose a date</lable>");
                    $('#dateselector_error').addClass('has-error');
                }
                if(stu_name == 0) {
                    $('#stuselector_error').html("<lable class = 'text-danger'>choose a students</lable>");
                    $('#stuselector_error').addClass('has-error');
                }



        });

        $('#testselector').change(function () {
            $('#testselector_error').html("<lable class = 'text-success'></lable>");
            $('#testselector_error').removeClass('has-error');
        });

        $('#time').change(function () {
            $('#dateselector_error').html("<lable class = 'text-success'></lable>");
            $('#dateselector_error').removeClass('has-error');
        });

        $('#stud').change(function () {
            $('#stuselector_error').html("<lable class = 'text-success'></lable>");
            $('#stuselector_error').removeClass('has-error');
        });

        $(document).ready(function(){
            $('#testselector').change(function() {
                var test = $(this).val();
                $('#time').empty();
                $('#time').append('<option value="0">اختر ميعادا</option>');
                if ($(this).val() !== "") {
                $.ajax({
                    url: "/get_test_groups",
                    method: "GET",
                    data: {test: test, _token: "{{ csrf_token() }}"},
                    dataType: "json",
                    success: function (data) {
                        // console.log(data);
                        $.each(data, function (i, v) {
                            // console.log(group.id)
                            $('#time').append('<option value="' + v.id + '">' + v.group_date + '</option>');
                        });

                    },
                    error: function (res) {
                        alert(res.data);
                    }

                });
            }

            });
        });
    </script>




</body>
</html>
