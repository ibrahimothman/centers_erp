<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>test-time-view</title>

    <!-- Custom fonts for this template-->
    <link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{url('css/sb-admin-rtl.css')}}" rel="stylesheet">
{{--    <link href="{{url('employee')}}" rel="stylesheet">--}}
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
</head>
@inject('Utility', 'App\Utility')

<body id="page-top">

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

                <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <img class="img-profile rounded-circle" src="{{url('img/user.png')}}">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                الملف الشخصى
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                الاعدادات
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                خروج
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                @endguest
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
                            <div class="col-md-6"> الامتحانات </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class=" clearfix">


                            <span class="float-right">
                            <div class="btn-group print-btn p-3 ">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> الترتيب حسب </button>
                                <div class="dropdown-menu"> <a class="dropdown-item" href="#">الاحدث اضافه</a> <a class="dropdown-item" href="#">الاحدث التعديل</a> </div>
                            </div>
                            </span>


                            <span class="float-left w-50">

                            <form method="get" action="{{url('/test-groups')}}">
                                    <div class="form-row col-md-12 ">
                                            <select name="test"  id="testselector"  onchange="this.form.submit()" class="form-control ">
                                                    <option value=""> choose</option>
                                                    <option value=""> الكل</option>
                                                @foreach($allTests as $test)
                                                    <option value="{{$test->id}}"> {{$test->name}} </option>
                                                @endforeach
                                                </select>
                                    </div>
                            </form>
                       </span>

                        </div>

                    @php($i=0)
                    @foreach($tests as $test)
                  <!--det-->


                      <div class="row cont-det"   id="test1">
                            <div class="col-md-12">
                                <div class="card card  card-sh  border-primary p-3 test-view ">
                                    <div class="card-header bg-transparent border-primary text-success font-weight-bold  clearfix">
                                        <span  class=" float-left">{{$test->name}}
                                            <a href="{{url('/tests/'.$test->id)}}" >
                                                <i class="fas fa-info-circle"></i></a> </span>
                                        <span  class=" float-right">
                                            <a href="test-groups/create?test={{$test->name}}" class="btn btn-success    btn-sm ">
                                                <i class="fas fa-plus"></i>
                                                <SPAN> اضافه ميعاد</SPAN>
                                            </a>
                                        </span>
                                    </div>
                                    <div class="card-body ">
                                        <div class="col-md-12">
                                            <table class="table table-striped w-100">

                                                <!--Table head-->
                                                <thead>
                                                    <tr class="w-100">
                                                        <th class="w-20">تاريخ الامتحان </th>
                                                        <th class="w-10">ميعاد</th>
                                                        <th class="w-10">عدد المقاعد</th>
                                                        <th class="w-10">عدد المقاعد المتاحه</th>
                                                        <th class="w-30"></th>
                                                        <th class="w-10"></th>
                                                    </tr>
                                                </thead>
                                                <!--Table head-->

                                                <!--Table body-->
                                                <tbody>
                                                @if(isset($test->groups))
                                                @foreach($test->groups as $testGroup)
                                                    <tr class= {{
                                                    $testGroup->available_seats==0
                                                    ||$Utility->datePassed($Utility->getDate($testGroup->group_date),$Utility->getTime($testGroup->group_date))==true
                                                    ?"table-danger":""}}>


                                                        <td> {{$Utility->getDate($testGroup->group_date)}} </td>
                                                        <td>{{ $Utility->getTime($testGroup->group_date) }}</td>
                                                        <td>{{$testGroup->available_chairs}}</td>
                                                        <td>{{$testGroup->available_seats}}</td>
                                                        <td >
                                                            @php($dis="")
                                                            @if($testGroup->available_seats==0
                                                    ||$Utility->datePassed($Utility->getDate($testGroup->group_date),$Utility->getTime($testGroup->group_date))==true)
                                                                @php($dis="disabled")
                                                                @endif
                                                            <a href="test-enrollments/create?id={{ $test->id }}"  class="btn btn-outline-warning {{$dis}} btn-sm">
                                                                <i class="fas fa-plus"></i>
                                                                <SPAN>تسجيل الطلاب</SPAN> </a>
                                                            <a  href="test-enrollments"  class="btn btn-outline-success   btn-sm ">
                                                                <SPAN> الطلاب المسجلين</SPAN>
                                                            </a></td>
                                                        <td>
                                                            <form method="post" action="{{route('test-groups.destroy',$testGroup->id)}}">
                                                                @csrf
                                                                @method('delete')
                                                            <a href="/test-groups/{{$testGroup->id}}/edit" class=" btn btn-outline-primary btn-sm ">
                                                                <i class="fas fa-edit"></i> </a> </span> </span>

                                                            <button type="submit" name="delete" class="btn btn-outline-danger   btn-sm ">
                                                                <i class="fas fa-trash-alt"></i> </button>
                                                            </form>
                                                        </td>
                                                    </tr>

                                                    @endforeach
                                                    @endif
                                                </tbody>
                                                <!--Table body-->
                                            </table>
                                            <!--Table-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php($i++)
                  @endforeach
                <!--det-start-->

 <!--det-end-->

                      <!--det-start-->

<!--det-end-->


                            <nav aria-label="Page navigation ">
                                <ul class="pagination justify-content-center">
                                    {{$tests->links()}}
                                </ul>
                            </nav>
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
</div>

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

<script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{url('js/sb-admin-2.min.js')}}'"></script>




<script>
// $(function() {
//     $('#testselector').change(function(){
//
//         if($(this).val()=="test")
//    {
//        $('.cont-det').show();
//    }
//     else
//     {
//       $('.cont-det').hide();
//       $('#' + $(this).val()).show();
//     }
//     });
//   });

</script>

</body>
</html>
