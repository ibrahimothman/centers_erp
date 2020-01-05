<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>student-profile</title>

    <!-- Custom fonts for this template-->
    <link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{url('css/sb-admin-rtl.css')}}" rel="stylesheet">
    <link href="{{url('employee')}}" rel="stylesheet">
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
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="البحث عن " aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder=" البحث عن" aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>


                    <!-- Nav Item - User Information -->
                    <!-- Right Side Of Navbar -->
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user orange"></i>
                                <span>{{$student->nameAr}}
                            </span>
                                <span>-
                              </span>
                                <span>{{$student->id}}</span>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-3">


                                        <div class="text-center">
                                            <img src="{{ $student->profileImage() }}" class="avatar img-circle img-thumbnail" alt="avatar">

                                        </div></hr><br>
                                        <p>تاريخ الاضافه : {{$student->created_at}}</p>


                                        <a href="{{ route('students.edit', ['student' => $student]) }}" class="btn btn-primary btn-xs"><i class="fas fa-edit"></i> تعديل الملف الشخصى  </a>

                                        <br>
                                        <div class="card  border-info mb-3 user-course">
                                            <div class="card-header">courses <i class="fa fa-link fa-1x"></i></div>
                                            <div class="card-body">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <span>Web Applications</span>
                                                        <div class="progress progress_sm">
                                                            <div class="progress-bar bg-danger" role="progressbar" data-transitiongoal="50" aria-valuenow="49" style="width: 50%;"></div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span>Web Applications</span>
                                                        <div class="progress progress_sm">
                                                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70" aria-valuenow="69" style="width: 70%;"></div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span>html</span>
                                                        <div class="progress progress_sm">
                                                            <div class="progress-bar bg-warning" role="progressbar" data-transitiongoal="70" aria-valuenow="69" style="width: 70%;"></div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span>Web Applications</span>
                                                        <div class="progress progress_sm">
                                                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70" aria-valuenow="69" style="width: 70%;"></div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a href="#" class="btn btn-primary btn-xs"> المزيد  </a>

                                                    </li>
                                                </ul>

                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-sm-9">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">البيانات</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">الكورسات</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">الامتحانات</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <br>




                                                <div class="col-md-12">
                                                    <!--Table-->
                                                    <table class="table table-striped table-responsive mb-0"  id="printTable">

                                                        <!--Table head-->
                                                        <thead>
                                                        <tr>



                                                            <div class="print-btn">
                                                                <button class="btn btn-primary hidden-print" onclick="printData();">
                                                                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>

                                                            </div>




                                                        </tr>
                                                        </thead>
                                                        <!--Table head-->

                                                        <!--Table body-->
                                                        <tbody>
                                                        <tr class="table-danger profile" >

                                                            <td>الاسم </td>
                                                            <td>ا{{$student->nameAr}}</td>
                                                            <td>{{$student->nameEn}}


                                                        </tr>
                                                        <tr >

                                                            <td>التليفون</td>
                                                            <td>{{$student->phoneNumber}}</td>
                                                            <td>{{$student->phoneNumberSec}}</td>

                                                        </tr>
                                                        <tr>

                                                            <td>البريد الالكترونى </td>
                                                            <td colspan="2">{{$student->email}}</td>



                                                        </tr>
                                                        <tr>

                                                            <td>العنوان</td>
                                                            <td colspan="2">
                                                                <span>{{$student->address->state}} - </span>
                                                                <span>ا{{$student->address->city}} - </span>
                                                                <span>{{$student->address->address}}</span>
                                                        </tr>

                                                        <tr>

                                                            <td> المؤهل الدراسى </td>
                                                            <td colspan="2">
                                                                <span>{{$student->degree}}</span>
                                                                <span>ا{{$student->faculty}}</span>



                                                        </tr>
                                                        <tr>

                                                            <td>رقم جواز السفر  </td>
                                                            <td colspan="2">{{$student->passportNumber}}</td>



                                                        </tr>
                                                        <tr>


                                                            <td>الرقم القومى   </td>
                                                            <td colspan="2">{{$student->idNumber}}</td>


                                                        </tr>
                                                        <tr>

                                                            <td>skill card</td>
                                                            <td colspan="2">{{$student->skillCardNumber}}</td>



                                                        </tr>
                                                        </tbody>
                                                        <!--Table body-->
                                                    </table>
                                                    <!--Table-->
                                                </div>    </div>


                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="align-middle mb-0 table  table-striped table-hover">
                                                            <thead>
                                                            <tr>

                                                                <th class="text-center">الكورس</th>
                                                                <th class="text-center">الحاله</th>
                                                                <th class="text-center">القاعه</th>
                                                                <th class="text-center">المجموعه</th>
                                                                <th class="text-center">التفاصيل </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <td class="text-center">photoshop</td>
                                                                <td class="text-center">
                                                                    <div class="badge badge-warning">Pending</div>
                                                                </td>
                                                                <td class="text-center">12</td>
                                                                <td class="text-center">المجموعه1</td>

                                                                <td class="text-center">
                                                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td class="text-center">php</td>
                                                                <td class="text-center">
                                                                    <div class="badge badge-success">Completed</div>
                                                                </td>
                                                                <td class="text-center">12</td>
                                                                <td class="text-center">المجموعه1</td>

                                                                <td class="text-center">
                                                                    <button type="button" id="PopoverCustomT-2" class="btn btn-primary btn-sm">Details</button>
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td class="text-center">css</td>
                                                                <td class="text-center">
                                                                    <div class="badge badge-danger">In Progress</div>
                                                                </td>
                                                                <td class="text-center">12</td>
                                                                <td class="text-center">المجموعه1</td>

                                                                <td class="text-center">
                                                                    <button type="button" id="PopoverCustomT-3" class="btn btn-primary btn-sm">Details</button>
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                                <td class="text-center">html</td>
                                                                <td class="text-center">
                                                                    <div class="badge badge-info">On Hold</div>
                                                                </td>
                                                                <td class="text-center">12</td>
                                                                <td class="text-center">المجموعه1</td>

                                                                <td class="text-center">
                                                                    <button type="button" id="PopoverCustomT-4" class="btn btn-primary btn-sm">Details</button>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>


                                                    </div>
                                                </div></div>
                                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                                        </div>


                                    </div><!--/col-9-->
                                </div>
                            </div>
                        </div>




                    </div>


                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->


                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy;وحدة التعليم الالكترونى - جامعه المنصورة </span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

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

            <!-- Bootstrap core JavaScript-->
            <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
            <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

            <!-- Core plugin JavaScript-->
            <script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

            <!-- Custom scripts for all pages-->
            <script src="{{url('js/sb-admin-2.min.js')}}"></script>
            <script>
                $(document).ready(function() {


                    var readURL = function(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('.avatar').attr('src', e.target.result);
                            }

                            reader.readAsDataURL(input.files[0]);
                        }
                    }


                    $(".file-upload").on('change', function(){
                        readURL(this);
                    });
                });
            </script>

            <script>
                function printData()
                {
                    var divToPrint=document.getElementById("printTable");
                    newWin= window.open("");
                    newWin.document.write(divToPrint.outerHTML);
                    newWin.print();
                    newWin.close();
                }
            </script>


</body>

</html>
