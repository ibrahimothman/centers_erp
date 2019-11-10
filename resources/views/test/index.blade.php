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
    <link href="/../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/../../../css/sb-admin-rtl.css" rel="stylesheet">
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
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"> <i class="fa fa-bars"></i> </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="البحث عن " id="search" aria-label="Search" aria-describedby="basic-addon2">
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
                    <li class="nav-item dropdown no-arrow"> <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span> <img class="img-profile rounded-circle" src="img/user.png"> </a>
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
                                <div class="col-md-6"> الامتحانات </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class=" clearfix"> <span class="float-right">
                        <div class="btn-group print-btn p-3 ">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> الترتيب حسب </button>
                            <div class="dropdown-menu"> <a class="dropdown-item" href="#">الاحدث اضافه</a> <a class="dropdown-item" href="#">الاحدث التعديل</a> </div>
                        </div>
                        <div class="btn-group p-3 ">
                            <div class="btn-group search-panel ">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span id="search_concept">البحث فى </span> <span class="caret"></span> </button>
                                <ul class="dropdown-menu">
                                    <li><a href="">الكل</a></li>
                                    <li><a href="">الاسماء</a></li>
                                </ul>
                            </div>
                            <input type="hidden" name="search_param" value="all" id="search_param">
                            <input type="text" class="form-control " name="x" placeholder="ابحث">
                            <div class="btn-group">
                                <button class="btn btn-success"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </span> </div>
                            <div class="row cont-det">
                                <div class="col-md-12">
                                    @foreach($tests as $test)
                                    <div class="card card  card-sh  border-primary p-3 test-view ">
                                        <div class="card-header bg-transparent border-primary text-success font-weight-bold  clearfix">
                                            <span class="float-right">

                                                <form class="card-footer border-primary " method="post" action="/tests/{{$test->id}}">
                                                    @csrf
                                                    @method('delete')
                                                        <a href="{{ route('test-groups.create') }}" class="btn btn-outline-success "><i class="fas fa-plus"></i> <SPAN>تسجيل الامتحان</SPAN> </a>
                                                        <a href="tests/{{$test->id}}/edit" class=" btn btn-outline-primary "><i class="fas fa-edit"></i> </a>
                                                        <button type="submit" class="btn btn-outline-danger"> <i class="fas fa-trash-alt"></i> </button>
                                                    </form>

                                            </span> <span  class=" float-left">{{$test->name}}</span> </div>
                                        <div class="card-body ">
                                            <p class="card-title text-primary "> عن الامتحان : </p>
                                            <span class="card-text text-justify">{{$test->description}}</span>
                                            <div class="dropdown-divider"></div>
                                            <div class="card-text clearfix "> <span class="w-50 p-3  text-primary" > تكلفه الامتحان :</span>
                                                <div class="d-inline p-2 "> <span class="text-warning " >فردى : </span> <span class=" text-secondary " > جنيه{{$test->cost_ind}}</span> </div>
                                                <div class="d-inline p-2 "> <span class="text-warning  " >كورس : </span> <span class=" text-secondary " > جنيه{{$test->cost_course}}</span> </div>
                                                @if($test->retake == 1)
                                                    <div class="d-inline p-5  "> <span class="btn-success rep " >قابل للاعاده</span> </div>
                                                @else
                                                    <div class="d-inline p-5  "> <span class="btn-warning rep " >غير قابل للاعاده</span> </div>
                                                @endif
                                                <footer class="blockquote-footer float-right">
                                                    تاريخ الاضافه <span>{{$test->created_at}}<span>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

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
        <script src="/../../../vendor/jquery/jquery.min.js"></script>
        <script src="/../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="/../../../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="/../../../js/sb-admin-2.min.js"></script>

        <script>
            // $('#search').keyup(function (e) {
            //     if(e.keyCode == 13) {
            //         var query = $(this).val();
            //         searchForStudents(query);
            //     }
            //
            // });
            //
            // function searchForStudents(query = '') {
            //     $.ajax({
            //         url:"api/search_test_by_name",
            //         type:'GET',
            //         data:{query:query},
            //         dataType : 'json',
            //         success:function (response) {
            //             view(response);
            //         }
            //     })
            // }
        </script>
</body>
</html>
