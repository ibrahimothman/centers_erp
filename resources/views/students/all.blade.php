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
                                        <a href="{{ route('students.table') }}">
                                            <i class="fas fa-th-list"></i>  </a>
                                        <button type="button" class="btn ">
                                            <a href="#">

                                                <i class="fas fa-th"></i>
                                            </a>
                                        </button>
                                </div>


                            </div>





                        </div>

                        <div class="card-body">

                            <div class="row cont-header">

                                <div class="col-md-6">


                                </div>
                                <div class="col-md-6">

                                    <div class="btn-group print-btn ">

                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            الترتيب حسب
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">الاحدث اضافه</a>
                                            <a class="dropdown-item" href="#">الاحدث التعديل</a>
                                            <a class="dropdown-item" href="#">الحروف الابجديه</a>
                                        </div>
                                    </div>

                                    <div class="btn-group ">
                                        <div class="btn-group search-panel ">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span id="search_concept">البحث فى </span> <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="">الكل</a></li>
                                                <li><a href="">الاسماء</a></li>
                                                <li><a href="">الرقم القومى</a></li>
                                                <li><a href="">الكورس</a></li>
                                                <li><a href="">المجموعه</a></li>

                                            </ul>
                                        </div>
                                        <input type="hidden" name="search_param" value="all" id="search_param">
                                        <input type="text" class="form-control " id="search" placeholder="ابحث">
                                        <div class="btn-group">
                                            <button class="btn btn-success" id="search" ><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            {{--                            @foreach($students as $students)--}}
                            <div class="row cont-det" id="ddd">

                                <div class="col-md-12" id="sss">

                                    @php($size = count($students))
                                    @php($m = 0)
                                    @for($y = 0; $size > 0; $y++)
                                        <div class="card-deck">
                                            @for($z = 0; $z < 3 && $z < $size; $z++,$m++)

                                                <div class="card card-sh  border-primary mb-3" style="max-width: 18rem;">

                                                    <div class="card-header bg-transparent border-primary">{{$students[$m]->nameAr}}</div>
                                                    <div class="card-body ">
                                                        <p class="card-text">
                                                            <img src="{{$students[$m]->profileImage()  }}" alt="" class="rounded-circle img-profile-contact float-right img-responsive">
                                                        <ul class="list-unstyled contact-det">
                                                            <li><i class="fas fa-envelope btn-circle"></i> البريد الالكترونى
                                                                <br>{{$students[$m]->email}}
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-phone btn-circle"></i> التليفون:
                                                                <span> {{$students[$m]->phoneNumber}}  </span>
                                                            </li>
                                                            <li class="gray">
                                                                تاريخ الاضافه  : {{$students[$m]->created_at}}

                                                            </li>

                                                        </ul>
                                                        </p>
                                                    </div>
                                                    <form class="card-footer border-primary " method="post" action="{{route('students.destroy',['student' => $students[$m]])}}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-success btn-xs"> <i class="fas fa-trash-alt"></i> </button>
                                                        <a href="/students/{{$students[$m]->id}}" class="btn btn-primary btn-xs"><i class="fa fa-user"> </i> الملف الشخصى </a>
                                                    </form>


                                                </div>
                                            @endfor
                                            @php($size -= 3)
                                        </div>
                                    @endfor
                                </div>
                            </div>



{{--                            {{$students->links()}}--}}

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
<script src="src={{url('vendor/jquery/jquery.min.js')}}"></script>
<script src=src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src=src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="src={{url('js/sb-admin-2.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<!-- Custom scripts for search-->

<script>

    $(document).ready(function(){
        // $('.search-panel .dropdown-menu').find('a').click(function(e) {
        //     e.preventDefault();
        //     var param = $(this).attr("href").replace("#","");
        //     var concept = $(this).text();
        //     $('.search-panel span#search_concept').text(concept);
        //     $('.btn-group #search_param').val(param);
        // });

        // searchForStudents();

        $('#search').keyup(function (e) {
            if(e.keyCode == 13) {
                var query = $(this).val();
                searchForStudents(query);
            }

        });



    });


</script>
<script type="text/javascript">

    $.ajaxSetup({
       headers:{
           'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
       }
    });
    function view(response) {
                var size = response.length;
                console.log(size);
                var m = 0;
                var y;
                var lines = "";
                // lines += "<div class='row cont-det'>";
                // lines += "<div class='col-md-12'>";
                for(y = 0; size > 0; y++){
                    lines += "<div class='card-deck'>";
                    var z;
                    for(z = 0; z <3 && z < size; z++,m++){
                        lines += "<div class='card card-sh border-primary mb-3' style='max-width:18rem'>";
                        lines += "<div class=card-header bg-transparent border-primary>"+response[m].nameAr+"</div>";
                        lines += "<div class='card-body'";
                        lines += "<p class='card-text'>";
                        if(response[m].picture == null){
                            lines +=  "<img src='/img/user.png' alt='' class='rounded-circle img-profile-contact float-right img-responsive'>";

                        }else{
                            lines +=  "<img src='"+response[m].picture+"' alt='' class='rounded-circle img-profile-contact float-right img-responsive'>";
                        }

                        lines+= "<ul class='list-unstyled contact-det'>";
                        lines+=  "<li><i class='fas fa-envelope btn-circle'></i> البريد الالكترونى <br>"+response[m].email+"</li>";
                        lines+=  "<li> <i class='fa fa-phone btn-circle'></i> التليفون: <span>"+response[m].phoneNumber+"</span> </li>";
                        lines += "<li class='gray'> تاريخ الاضافه  : "+response[m].created_at+"</li> </ul> </p> </div>";
                        lines+="<div class='card-footer border-primary'>";
                        lines += "<button type='button' onclick='deleteStudent("+response[m].id+")' class='btn btn-success btn-xs'><i class='fas fa-trash-alt'></i> </button>";
                        lines += "<a href='students/"+response[m].id+ "'class='btn btn-primary btn-xs'><i class='fa fa-user'> </i> الملف الشخصى </a></div>";
                        lines += "</div>";

                    }
                    size -= 3;
                    lines += "</div>";
                }
                $('#sss').html(lines);
    }

    function deleteStudent(id) {
        $.ajax({
            url:'/students/'+id,
            type: 'DELETE',
            dataType: 'json',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function (response) {
                viewAllStudents();
            }

        })
    }
    function viewAllStudents() {
        $.ajax({
            url:'students/all',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                view(response);
            }

        })
    }

    function searchForStudents(query = '') {
        console.log(query);
        $.ajax({
            url:"/search_student_by_name",
            type:'GET',
            data:{query:query},

            success:function (response) {
                view(response);
            }
        });
    }
</script>

</body>

</html>
