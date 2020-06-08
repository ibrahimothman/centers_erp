<!DOCTYPE html>
<html lang="en">
<head>
    @include('library')
    <title>Diploma groups</title>
</head>
@inject('Utility', 'App\Utility')
<body id="page-top">
<!-- Page Wrapper -->

<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
    <!-- Page Heading -->
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-primary">
                        <div class="row  ">
                            <div class="col-md-6">عرض مواعيد الدبلومه</div>
                        </div>
                    </div>
<<<<<<< HEAD
                    <div class="card-body">
                        <div class=" clearfix">
                            <span class="float-right">
                            <div class="btn-group print-btn p-3 ">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"> الترتيب حسب </button>
                                <div class="dropdown-menu"> <a class="dropdown-item" href="#">الاحدث اضافه</a> <a
                                            class="dropdown-item" href="#">الاحدث التعديل</a> </div>
                            </div>
                            </span>
                            <span class="float-left w-50">
                            <form method="get" action="{{route('diploma-groups.index')}}">
                                    <div class="form-row col-md-12 ">
                                            <select name="id" id="testselector" onchange="this.form.submit()"
                                                    class="form-control ">
=======
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
                                <div class="col-md-6"> مواعيد الدبلومات </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class=" clearfix">


                            <span class="float-right">
                            <div class="btn-group print-btn p-3 ">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> الترتيب حسب </button>
                                <div class="dropdown-menu"> <a class="dropdown-item" href="diploma-groups?order_by=created_at&sort=desc">الاحدث اضافه</a> <a class="dropdown-item" href="#">الاحدث التعديل</a> </div>
                            </div>
                            </span>


                                <span class="float-left w-50">


                                    <div class="form-row col-md-12 ">
                                            <select name="diplomas-options"  id="diplomas-options"  onchange="this.form.submit()" class="form-control ">
>>>>>>> c41eee09e4a3e28fec761df558ef71049c27c599

                                                    <option value="0"> choose</option>
                                                    <option value="0"> الكل</option>
                                                @foreach($allDiplomas as $diploma)
                                                    <option value="{{$diploma->id}}"> {{$diploma->name}} </option>
                                                @endforeach
                                                </select>
                                    </div>

                       </span>

                        </div>

                    @php($i=0)
                    @foreach($diplomas as $diploma)
                        <!--det-->

                            <div class="row cont-det" id="test1">
                                <div class="col-md-12">
                                    <div class="card card  card-sh  border-primary p-3 test-view ">
                                        <div class="card-header bg-transparent border-primary text-success font-weight-bold  clearfix">
                                        <span class=" float-left">{{$diploma->name}}
                                            <a href="{{url('/diplomas/'.$diploma->id)}}">
                                                <i class="fas fa-info-circle"></i></a> </span>
<<<<<<< HEAD
                                            <span class=" float-right">
                                            <a href="{{ route('diploma-groups.create') }}"
                                               class="btn btn-success btn-sm ">
=======
                                                <span  class=" float-right">
                                            <a href="{{ route('diploma-groups.create', ['id' => $diploma->id]) }}" class="btn btn-success btn-sm ">
>>>>>>> c41eee09e4a3e28fec761df558ef71049c27c599
                                                <i class="fas fa-plus"></i>
                                                <SPAN> اضافه مجموعه</SPAN>
                                            </a>
                                        </span>
<<<<<<< HEAD
                                        </div>
                                        <div class="card-body ">
                                            <div class="col-md-12">
                                                <table class="table table-striped w-100">

                                                    <!--Table head-->
                                                    <thead>
                                                    <tr class="w-100">
                                                        <th class="w-20">تاريخ الكورس</th>
                                                        <th class="w-30"></th>
                                                        <th class="w-10"></th>
                                                    </tr>
                                                    </thead>
                                                    <!--Table head-->

                                                    <!--Table body-->
                                                    <tbody>
                                                    @if(isset($diploma->groups))
                                                        @foreach($diploma->groups as $group)
                                                            <td> {{$Utility->getDate($group->starts_at)}} </td>
                                                            <td>

                                                                <a href="diploma-enrollments/create?id={{ $diploma->id }}"
                                                                   class="btn btn-outline-warning  btn-sm">
                                                                    <i class="fas fa-plus"></i>
                                                                    <SPAN>تسجيل الطلاب</SPAN> </a>
                                                                <a href="diploma-enrollments"
                                                                   class="btn btn-outline-success   btn-sm ">
                                                                    <SPAN> الطلاب المسجلين</SPAN>
                                                                </a></td>
                                                            <td>
                                                                <form method="post"
                                                                      action="{{route('diploma-groups.destroy',$group->id)}}">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <a href="/course_groups/{{$group->id}}/edit"
                                                                       class=" btn btn-outline-primary btn-sm ">
                                                                        <i class="fas fa-edit"></i> </a> </span> </span>

                                                                    <button type="submit" name="delete"
                                                                            class="btn btn-outline-danger   btn-sm ">
                                                                        <i class="fas fa-trash-alt"></i></button>
                                                                </form>
                                                            </td>
                                                            </tr>

                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                    <!--Table body-->
                                                </table>
                                                <!--Table-->
=======
                                            </div>
                                            <div class="card-body ">
                                                <div class="col-md-12">
                                                    <table class="table table-striped w-100">

                                                        <!--Table head-->
                                                        <thead>
                                                        <tr class="w-100">
                                                            <th class="w-20">بدايه المجموعه</th>
                                                            <th class="w-10">عدد المقاعد</th>
                                                            <th class="w-10">عدد المقاعد الشاغره</th>
                                                            <th class="w-30"></th>
                                                            <th class="w-30"></th>
                                                        </tr>
                                                        </thead>
                                                        <!--Table head-->

                                                        <!--Table body-->
                                                        <tbody>
                                                        @if(isset($diploma->groups))
                                                            @foreach($diploma->groups as $group)
                                                                <tr id="diplomaGroupContainer-{{$group->id}}" class= {{
                                                                    $group->getAvailableSeats()==0?"table-danger":""}}>
                                                                <td> {{$Utility->getDate($group->starts_at)}} </td>
                                                                <td>{{ $group->available_chairs }}</td>
                                                                <td>{{ $group->getAvailableSeats() }}</td>
                                                                <td >
                                                                    @php($dis="")
                                                                    @if($group->getAvailableSeats()==0)
                                                                        @php($dis="disabled")
                                                                    @endif

                                                                    <a href="diploma-enrollments/create?group_id={{ $group->id }}"  class="btn btn-outline-warning {{ $dis }} btn-sm">
                                                                        <i class="fas fa-plus"></i>
                                                                        <SPAN>تسجيل الطلاب</SPAN> </a>
                                                                    <a  href="diploma-enrollments?id={{ $group->id }}"  class="btn btn-outline-success   btn-sm ">
                                                                        <SPAN> الطلاب المسجلين</SPAN>
                                                                    </a></td>
                                                                <td>
                                                                    <form>
                                                                        <a href="/diploma-groups/{{$group->id}}/edit" class=" btn btn-outline-primary btn-sm ">
                                                                            <i class="fas fa-edit"></i> </a> </span> </span>

                                                                        <button type="button" id="delete-diploma-group-{{$group->id}}" name="delete" class="btn btn-outline-danger   btn-sm ">
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
>>>>>>> c41eee09e4a3e28fec761df558ef71049c27c599

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @php($i++)
                    @endforeach
                    <!--det-start-->

                        <!--det-end-->


                        <!--pagination-->
                        <nav aria-label="Page navigation ">
                            <ul class="pagination justify-content-center">

                                {{--                                    {{$courses->links()}}--}}

                            </ul>
                        </nav>
                        <!-- end -->
                    </div>
                </div>
            </div>
        </div>

        <!-- /.container-fluid -->
        <!-- End of Main Content -->

        <!-- Footer -->
        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')

</body>
</html>



<<<<<<< HEAD

=======
    $('#diplomas-options').on('change', function (e) {
        var id = $(this).val();
        if(id !== '0') window.location = '/diploma-groups?id='+id;
        else window.location = '/diploma-groups'
    })

    $('button[id^=delete-diploma-group-]').on('click', function (e) {
        var id = $(this).attr('id').split('-')[3];
        deleteGroup(id);
    });

    function deleteGroup(id) {
        $.ajax({
            url: '/diploma-groups/'+id,
            type: 'DELETE',
            data: {_token: "{{csrf_token()}}"},
            success: function (data) {
                console.log(data.message);
                $('tr[id=diplomaGroupContainer-'+ id +']').remove();
            }
        })
    }
</script>
>>>>>>> c41eee09e4a3e28fec761df558ef71049c27c599

