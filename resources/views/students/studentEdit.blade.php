<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>edit student</title>

    <!-- Custom fonts for this template-->
    <link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
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
                                <span>
                                    </span>
                                <span>-{{$student->id}}</span>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">


                                        <div class="text-center">
                                            <img src="{{ $student->profileImage() }}"  class="avatar img-circle img-thumbnail" alt="">
                                        </div></hr><br>

                                    </div>





                                    <div class="col-sm-9">
                                <form action="{{ route('students.update',['student' => $student]) }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>

                                    @method('patch')
                                    @csrf

                                    <div class="form-row">

                                        <div class="col-sm-12 form-group">

                                            <label for="validationCustom01">الاسم باللغه العربيه</label>
                                            <input type="text" class="form-control" name="nameAr" id="validationCustom01" placeholder="بالاسم باللغه العربيه "  value="{{ old('nameAr') ?? $student->nameAr}}" >
                                            <div>{{ $errors->first('nameAr') }}</div>
                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="col-sm-12">
                                            <label for="validationCustom03">الاسم باللغه الانجليزيه</label>
                                            <input type="text" name= "nameEn" class="form-control" id="validationCustom03" placeholder="الاسم باللغه الانجليزيه" value="{{ old('nameEn') ?? $student->nameEn}}" required>
                                            <div>{{ $errors->first('nameEn') }}</div>
                                        </div>


                                    </div>


                                    <div class=" form-row">
                                        <label for="validationCustom05">البريد الالكترونى </label>
                                        <input type="text" name="email" id="validationCustom05" placeholder="ادخل البريد الالكترونى " class="form-control" value="{{ old('email') ?? $student->email}}">
                                        <div>{{ $errors->first('email') }}</div>
                                    </div>


                                    <div class=" form-row">
                                        <div class="col-sm-6 ">
                                            <label>رقم التليفون المحمول</label>
                                            <input type="text" name="phoneNumber"  placeholder="ادخل رقم التليفون المحمول"  class="form-control" value="{{ old('phoneNumber') ?? $student->phoneNumber }}">
                                            <div>{{ $errors->first('phoneNumber') }}</div>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>تليفون اخر </label>
                                            <input type="text" name="phoneNumberSec" placeholder="ادخل رقم التليفون" value="{{ old('phoneNumberSec') ?? $student->phoneNumberSec }}"   class="form-control">
                                            <div>{{ $errors->first('phoneNumberSec') }}</div>
                                        </div>

                                    </div>

                                    <div class=" form-row">
                                        <div class="col-sm-6">
                                            <label for="validationCustom06">الرقم القومى </label>
                                            <input type="text" name="idNumber" id="validationCustom06" value="{{ old('idNumber') ?? $student->idNumber}}"  placeholder="ادخل الرقم القومى " class="form-control" >
                                            <div>{{ $errors->first('idNumber') }}</div>

                                        </div>
                                        <div class="col-sm-6">
                                            <label>رقم جواز السفر</label>
                                            <input name="passportNum" type="text" placeholder="ادخل رقم جواز السفر" value="{{ old('passportNum') ?? $student->passportNum }}" class="form-control" >
                                            <div>{{ $errors->first('passportNum') }}</div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class=" form-row ">
                                        <div class="col-sm-6" >

                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="customFile" src="{{ old('image') }}" >
                                                <label class="custom-file-label" for="customFile">صوره الشخصيه</label>
                                                <div>{{ $errors->first('image') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 ">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="idImage" src="{{ old('idImage') ?? $student->idImage}}" id="customFile">
                                                <label class="custom-file-label" for="customFile">صوره  البطاقه </label>
                                                <div>{{ $errors->first('idImage') }}</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12  ">

                                        </div>
                                        <div class="col-sm-6 form-group ">
                                            <label for="">البلد </label>
                                            <input name="state" type="text" placeholder="البلد" value="{{ old('state') ?? $student->state}}" class="form-control">
                                            <div>{{ $errors->first('state') }}</div>

                                        </div>

                                        <div class="col-sm-6 form-group ">
                                            <label for="">المدينه </label>
                                            <input name="city" type="text" placeholder="المدينه" value="{{ old('city') ?? $student->city }}" class="form-control">
                                            <div>{{ $errors->first('city') }}</div>
                                        </div>
                                    </div>

                                    <div class=" form-row">
                                        <label>العنوان</label>
                                        <textarea name="address"  placeholder=""  rows="3" class="form-control">{{ old('address') ?? $student->address }}</textarea>
                                        <div>{{ $errors->first('address') }}</div>
                                    </div>


                                    <div class="form-row">
                                        <div class="col-sm-12  ">

                                        </div>
                                        <div class="col-sm-6 form-group ">
                                            <label for="">المؤهل الدراسى </label>
                                            <select name="degree" class="form-control" id="exampleFormControlSelect1">
                                                @foreach($student->degreeOptions() as $degree)
                                                    <option {{ $student->degree == $degree ? 'selected' : '' }}>{{ $degree }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-6 form-group ">
                                            <label for="">الكليه </label>

                                            <select name="faculty" class="form-control" id="exampleFormControlSelect1">
                                                @foreach($student->facultyOptions() as $faculty)
                                                    <option {{ $student->faculty == $faculty ? 'selected' : '' }}>{{ $faculty }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" form-row">
                                        <div class="col-sm-6 form-group ">
                                            <label>skill card</label>
                                            <input type="text" value="{{ old('skillCardNumber') ?? $student->skillCardNumber}}" placeholder="Enter skill card Id Here.." name="skillCardNumber" class="form-control" >
                                            <div>{{ $errors->first('skillCardNumber') }}</div>
                                        </div>

                                    </div>



                                    <div class="form-row save">
                                        <div class="col-sm-3  form-group">
                                        </div>
                                        <div class="col-sm-6  form-group">
                                            <br>
                                            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> تعديل</button>
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
    <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>


    <script>
        $(document).ready(function() {
            $(":input").inputmask();

            $("#phone").inputmask({"mask": "(999) 99999999"});
            $(#phone).unmask();
        });
    </script>
</body>
</html>
