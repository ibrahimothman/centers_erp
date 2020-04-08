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

                                                    <option value=""> choose</option>
                                                    <option value="0"> الكل</option>
                                                @foreach($allDiplomas as $diploma)
                                                    <option value="{{$diploma->id}}"> {{$diploma->name}} </option>
                                                @endforeach
                                                </select>
                                    </div>
                            </form>
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
                                            <span class=" float-right">
                                            <a href="{{ route('diploma-groups.create') }}"
                                               class="btn btn-success btn-sm ">
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





