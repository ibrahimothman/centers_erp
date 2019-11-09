<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>test-det-view</title>

<!-- Custom fonts for this template-->
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
<script
 src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"
 integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k"
 crossorigin="anonymous"></script>

 <!-- Custom styles for this page -->
 <link href="{{url('vendor/datatables/datatables.min.css')}}" rel="stylesheet">

 <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

</head>
@inject('Utility', 'App\Utility')

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15"> </div>
    <div class="sidebar-brand-text mx-3">اداره النظام</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item "> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-users-cog"></i>
            <span>الطلاب</span> </a>
        <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/Student/create">تسجيل  الطلاب</a>
                <a class="collapse-item " href="/Student">عرض/تعديل  بيانات الطلاب</a> </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item active"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>الامتحانات</span> </a>
        <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item active" href="test-det-view-one.html">  عن لامتحانات</a>
                <a class="collapse-item  " href="/test/create">اضافه بيانات الامتحانات</a>
                <a class="collapse-item " href="/test"> عرض/تعديل بيانات الامتحانات </a>
                <a class="collapse-item " href="/test_group/create"> تسجيل الامتحانات </a>
                <a class="collapse-item " href="/test_group"> عرض مواعيد الامتحانات </a>
                <a class="collapse-item " href="/test_enrollment/create">تسجيل الطلاب على الامتحان </a>
                <a class="collapse-item " href="/test_enrollment">عرض الطلاب المسجلين  </a>
                <a class="collapse-item  " href="/test_take/create">تسجيل حضور الامتحان  </a>
                <a class="collapse-item  " href="/test_result/create">تسجيل نتيجه الامتحانات  </a>
                <a class="collapse-item  " href="/test_result">نتيجه الامتحانات  </a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities"> <i class="fas fa-fw fa-wrench"></i> <span>الدورات</span> </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded"> <a class="collapse-item" href="utilities-color.html">تسجيل الدورات</a> </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->

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

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none"> <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-search fa-fw"></i> </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder=" البحث عن" aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button"> <i class="fas fa-search fa-sm"></i> </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow"> <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span> <img class="img-profile rounded-circle" src="/img/user.png"> </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown"> <a class="dropdown-item" href="#"> <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> الملف الشخصى </a> <a class="dropdown-item" href="#"> <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> الاعدادات </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> الخروج </a> </div>
            </li>
        </ul>
    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->

    <!-- Page Heading -->

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-primary">
                    <div class="row  ">
                        <div class="col-md-6">  تفاصيل الامتحان  </div>
                    </div>
                </div>
                <div class="card-body">

                        <form >

                  <div class="form-row">

                    <div class=" clearfix col-md-8 mb-4">

                            <input type="text" name="test1"  class="form-control " placeholder=" اختار الامتحان "  list="tests"/>
                            <datalist id="tests">
                                <select name="test1">
                                    <option value="ICDL">
                                    <option value="English ">
                                     <option value="toefl ">

                                </select>
                            </datalist>
                        </div>
                    </form>

                    </div>

                         <!-- det-block -->

                    <div class="form-row cont-det">
                        <div class="col-md-12">
                            <div class="card card  card-sh  border-primary p-3 test-view ">
                                <div class="card-header bg-transparent border-primary text-success font-weight-bold  clearfix">
                                    <span  class=" float-left">{{$test->name}}</span> </div>
                                <div class="card-body ">
                                    <p class="card-title text-primary "> عن الامتحان : </p>
                                    <span class="card-text text-justify">
                                    {{$test->description}}
                                    </span>
                                    <div class="dropdown-divider"></div>
                                    <div class="card-text clearfix "> <span class="w-50 p-3  text-primary" > تكلفه الامتحان :</span>
                                        <div class="d-inline p-2 ">
                                            <span class="text-warning " >فردى : </span>
                                            <span class=" text-secondary " >{{$test->cost_ind}} جنيه </span> </div>
                                        <div class="d-inline p-2 ">
                                            <span class="text-warning  " >كورس : </span>
                                            <span class=" text-secondary " >{{$test->cost_course}} جنيه </span> </div>
                                        <div class="d-inline p-5  ">
                                            <span class="btn-success rep " >{{$test->retake?"قابل للاعادة":"غير قابل للاعادة"}}

                                            </span> </div>
                                        <footer class="blockquote-footer float-right">
                                            تاريخ الاضافه <span>{{$test->created_at}}</span>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                         <!-- det-block-end -->

                                                  <!-- time-block-->

                         <div class="row cont-det">
                                <div class="col-md-12">
                                    <div class="card card  card-sh  border-primary p-3 test-view ">
                                        <div class="card-header bg-transparent border-primary text-success font-weight-bold  clearfix">
                                            <span class="float-right"> <a href="/test-groups/create?test={{$test->id}}" class="btn btn-outline-success ">
                                                <i class="fas fa-plus"></i> <SPAN> اضافه ميعاد</SPAN> </a>
                                                </span>
                                                 <span  class=" float-left"> مواعيد الامتحان</span> </div>
                                        <div class="card-body ">
                                                <table class="table table-striped w-100">

                                                        <!--Table head-->
                                                        <thead>
                                                            <tr class="w-100">
                                                                <th class="w-20">تاريخ الامتحان </th>
                                                                <th class="w-10">ميعاد</th>
                                                                <th class="w-10">عدد المقاعد</th>
                                                                <th class="w-10">عدد المقاعد المتاحه</th>

                                                            </tr>
                                                        </thead>
                                                        <!--Table head-->

                                                        <!--Table body-->
                                                        <tbody>
                                                        @foreach($testGroups as $testGroup)
                                                            @php($available_seats =$testGroup->available_chairs - $testGroup->enrollmentsCount)
                                                            <tr  class={{$available_seats==0
                                                                ||$Utility->datePassed($Utility->getDate($testGroup->group_date),$Utility->getTime($testGroup->group_date))
                                                                ?"table-danger":""}}>
                                                                <td>{{$Utility->getDate($testGroup->group_date)}} </td>
                                                                <td>{{$Utility->getTime($testGroup->group_date)}}</td>
                                                                <td>{{$testGroup->available_chairs}}</td>
                                                                <td>{{$available_seats}}</td>
                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                        <!--Table body-->
                                                    </table>
                                                    <!--Table-->


                                            </div>

                                    </div>
                                </div>
                            </div>



                          <!-- stu-block -->


                            <div class="row cont-det">
                                <div class="col-md-12">
                                    <div class="card card  card-sh  border-primary p-3 test-view ">
                                        <div class="card-header bg-transparent border-primary text-success font-weight-bold  clearfix">
                                            <span class="float-right"> <a href="test-stu-add.html" class="btn btn-outline-success ">
                                                <i class="fas fa-plus"></i> <SPAN> اضافه طالب</SPAN> </a>
                                                </span>
                                                 <span  class=" float-left">الطلاب المسجلين</span> </div>
                                        <div class="card-body ">

                                                <table   id="datatable-buttons" class="table table-striped table-bordered display  hover">

                                                        <!--Table head-->
                                                        <thead>
                                                            <tr class="w-100">
                                                                <th class="w-10">#  </th>
                                                                <th class="w-10">امتحان</th>
                                                                <th class="w-30">ميعاد الامتحان</th>
                                                                <th class="w-30">رقم الطالب</th>
                                                                <th class="w-30">اسم الطالب</th>

                                                            </tr>
                                                        </thead>
                                                        <!--Table head-->

                                                        <!--Table body-->
                                                        <tbody>

{{--                                                        @foreach($enrollments as $enrollment)--}}
                                                            <tr >

{{--                                                                <td>{{$enrollment->id}} </td>--}}
{{--                                                                <td>{{$enrollment->name}}</td>--}}
{{--                                                                <td>--}}
{{--                                                                    {{$Utility->getDate($enrollment->group_date)}}--}}
{{--                                                                    &nbsp;--}}
{{--                                                                    {{$Utility->getTime($enrollment->group_date)}}--}}
{{--                                                                </td>--}}
{{--                                                                <td>{{$enrollment->id}}</td>--}}
{{--                                                                <td> {{$enrollment->nameAr}}د</td>--}}
{{--                                                            </tr>--}}
{{--                                                        @endforeach--}}

                                                        </tbody>
                                                        <!--Table body-->
                                                    </table>
                                                    <!--Table-->

                                        </div>
                                    </div>

                                </div>
                            </div>


                          <!-- stu-block-end -->





                        </div>



                    </div>
                </div>
            </div>

            <!-- /.container-fluid -->

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
<script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{url('js/sb-admin-2.min.js')}}"></script>
<!-- Page level plugins -->
<script src="{{url('vendor/datatables/datatables.min.js')}}"></script>
<!-- Page level custom scripts -->
<script src="{{url('js/demo/datatables-demo.js')}}"></script>
<script>

$('#datatable-responsive').DataTable( {
  responsive: true
} );


  $(document).ready(function() {
  $('#datatable-buttons').DataTable( {
      dom: 'Bfrtip',
      buttons: [
          'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5'
      ]
  } );




} );
  </script>

</body>
</body>
</html>
