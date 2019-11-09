<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>students</title>

    <!-- Custom fonts for this template-->
    <link href="{{url('/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom styles for this page -->
    <link href="{{url('vendor/datatables/datatables.min.css')}}" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

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

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header text-primary">

                            <div class="row  ">

                                <div class="col-md-6">
                                    بيانات الطلاب

                                </div>

                                <div class="col-md-6 grid-view ">

                                    <button type="button" class="btn ">
                                        <a href="#">
                                            <i class="fas fa-th-list"></i>  </a>
                                        <button type="button" class="btn ">
                                            <a href="{{ route('students.index') }}">

                                                <i class="fas fa-th"></i>
                                            </a>
                                        </button>
                                </div>


                            </div>





                        </div>
                        <div class="card-body">


                            <div class="table-responsive row x_content">
                                <table id="datatable-buttons" class="table table-striped table-bordered display  hover">
                                    <div class="buttons"></div>
                                    <div class="form-group">
                                        <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
                                    </div
                                    >
                                    <thead class="table-primary">
                                    <tr>
                                        <th>#</th>

                                        <th>الاسم باللغه العربيه</th>
                                        <th>الاسم باللغه الانجليزيه</th>
                                        <th>البريد الالكترونى </th>
                                        <th>تاريخ الاضافه</th>
                                        <th>التليفون</th>
                                        <th>الرقم القومى  </th>
                                        <th>التفاصيل </th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{$student->id}}</td>

                                            <td>{{$student->nameAr}}</td>
                                            <td>{{$student->nameEn}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->created_at}}</td>
                                            <td>{{$student->phoneNumber}}</td>
                                            <td>{{$student->idNumber}}</td>
                                            <td>
                                                <a href="/students/{{$student->id}}" class="view-item" > <i class="fas fa-info-circle"></i></a>
                                                <a href="/students/{{$student->id}}/edit" class="view-item" > <i class="fas fa-user-edit"></i></a></td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.container-fluid -->


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

            </div>
            <!-- End of Content Wrapper -->
        </div>

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

    <!-- Page level plugins -->
    <script src="{{url('vendor/datatables/datatables.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{url('vendor/datatables/datatables.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>

        $('#search').keyup(function(e){
            if(e.keyCode == 13) {
                var query = $(this).val();
                seacrh(query);
            }
        });

        function seacrh(query = '') {
            $.ajax({
                url: "api/search_student_by_name",
                type: 'GET',
                data: {query: query},
                dataType : 'json',
                success: function (response) {
                    var lines = "";
                    $.each(response,function (index,value) {
                        lines += "<tr>";
                        lines += "<td>"+value.id+"</td>"
                        lines += "<td>"+this.nameAr+"</td>";
                        lines += "<td>"+this.nameEn+"</td>";
                        lines += "<td>"+this.email+"</td>";
                        lines += "<td>"+this.created_at+"</td>";
                        lines += "<td>"+this.phoneNumber+"</td>";
                        lines += "<td>"+this.idNumber+"</td>";
                        lines += "<td>";
                        lines += "<a href=Student/"+this.id+">";
                        lines += "<i class='fas fa-info-circle' fa-info-circle></i></a>";
                        lines += "</a>";
                        lines += "<a href=Student/"+this.id+"/edit>";
                        lines += "<i class='fas fa-user-edit' fa-info-circle></i></a>";
                        lines += "</a>";
                        lines += "</td>";
                        lines += "</tr>";
                    });
                     $('tbody').html(lines);

                }
            })
        }

    </script>



</body>

</html>
