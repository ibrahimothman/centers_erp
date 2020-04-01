<!DOCTYPE html>
<html lang="ar">
<head>
    <!-- Bootstrap CSS & js -->
@include('library')
<!-- Bootstrap CSS & js -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/instructor_style.css">
    <title> view employees </title>
</head>
<body class="bg-light" id="page-top">
<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')

    <!-- container -->
        <div class="container  ">
            <nav class="navbar navbar-expand-lg navbar-light ">

                <form class="form-inline my-2 my-lg-0" action="/employees" method="get">

                    <input name="name" id="search" type="search" placeholder="بحث">
                    <button class="btn btn-primary  mx-2 px-4 my-5 my-sm-0" id="search_for_instructor" type="submit">بحث</button>

                </form>

                <ul class="navbar-nav text-right">

                    <li class="nav-item ml-4">
                        <h5 hidden style="color: #007bff">تصنيف علي حسب</h5>

                    </li>

                    <li class=" nav-item  dropdown ml-4 ">
                        <button hidden data-toggle="dropdown" class="dropdown-toggle btn-primary py-1">
                            الاقسام <b class="caret"></b>
                        </button>
                        <ul class=" dropdown-menu text-right">
                            <li><label class="checkbox"><input type="checkbox">القسم الاول</label></li>
                            <li><label class="checkbox"><input type="checkbox"> القسم الثاني</label></li>


                        </ul>
                    </li>
                    <br>
                    <li class=" nav-item  dropdown ml-4 ">
                        <button hidden data-toggle="dropdown" class="dropdown-toggle btn-primary py-1">
                            المواعيد <b class="caret"></b>
                        </button>
                        <ul class=" dropdown-menu text-right">
                            <li><label class="checkbox"><input type="checkbox">من1:2</label></li>
                            <li><label class="checkbox"><input type="checkbox"> من3:4</label></li>


                        </ul>
                    </li>
                    <br>

                </ul>

            </nav>


        </div>

        <!-- end container -->
        <div class="container text-right px-5 py-5">

            <div class="row ">
                <div class="col">
                    <h2 class="text-primary ">الموظفين</h2>
                    <br>
                </div>
            </div>
            <!-- card -->

            @for($i=0;$i<count($employees);$i+=3)
                <div class="row ">
                    @for($j=$i;$j<$i+3;$j++)
                        @if($j==count($employees))
                            @break
                        @endif
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="image-flip">
                                <div class="mainflip">
                                    <div class="frontside">
                                        <div class="card motionCard">
                                            <div class="card-body text-center">
                                                <p><img class="img-fluid rounded-circle  " src="{{ is_null($employees[$j]->image)? App\helper\Constants::getInstructorPlaceholderImage() : $employees[$j]->image}}" width="100"
                                                        height="100" alt="card image"></p>
                                                <h4 class="card-title">{{$employees[$j]->nameAr}}</h4>
                                                <form class="card-footer border-primary " method="post" action="{{route('employees.destroy',['employee' => $employees[$j]])}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-success btn-xs"> <i class="fas fa-trash-alt"></i> </button>
                                                    <a href="/employees/{{$employees[$j]->id}}" class="btn btn-primary btn-xs"><i class="fa fa-user"> </i> الملف الشخصى </a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <br>
                        </div>
                    @endfor
                </div>
            @endfor
            {!! $employees->render() !!}
        </div>

        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
</body>
</html>


