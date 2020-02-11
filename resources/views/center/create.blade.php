<!DOCTYPE html>
<html lang="en">

<head>
    @include('library')
    <title>setup your center</title>
    <style>
        body{
           text-align: right;
        }

    </style>
</head>

<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
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

                </ul>
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
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-header text-primary">
                                تسجيل بيانات المركز            </div>
                            <div class="card-body">
                                <form action="{{ route('centers.store') }}" method="post" enctype="multipart/form-data" id="centerCreate" >

                                    @csrf

                                    <div class="form-row">

                                        <div class="col-sm-12 form-group">

                                            <label for="validationCustom01">اسم المركز</label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" name="name" id="validationCustom01" placeholder="الاسم باللغه العربيه "  value="{{ old('name') }}" >
                                            <div>{{ $errors->first('name') }}</div>
                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="col-sm-12">
                                            <label for="validationCustom03">اسم مدير المركز</label>
                                            <span class="required">*</span>
                                            <input type="text" name= "manager_name" class="form-control" id="validationCustom03" placeholder="الاسم باللغه العربيه" value="{{ old('manager_name') }}" >
                                            <div>{{ $errors->first('manager_name') }}</div>
                                        </div>


                                    </div>

                                    <div class="form-row save">
                                        <div class="col-sm-3  form-group">
                                        </div>
                                        <div class="col-sm-6  form-group">
                                            <br>
                                            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> حفظ</button>
                                            <button class="btn  btn-danger" type="reset"><i class="glyphicon glyphicon-repeat"></i> الغاء</button>
                                        </div>
                                        <div class="col-sm-3  form-group">
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

            <!-- Footer -->
        @include('footer')
            <!-- End of Footer -->

        </div>
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
    <script src="{{url('employee')}}"></script>
    <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <!-- script-->

@include('script')
<!-- client side validation plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
    <!-- client side validation page -->
    <script type='text/javascript' src="/js/centers_create-validation.js"></script>


    <script>
        $(document).ready(function() {
            $(":input").inputmask();

            $("#phone").inputmask({"mask": "(999) 99999999"});
            $(#phone).unmask();
        });
    </script>
</body>
</html>
