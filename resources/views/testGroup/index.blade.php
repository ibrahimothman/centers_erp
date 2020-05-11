<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS & js -->
    @include('library')
    <title>test-time-view</title>
</head>
@inject('Utility', 'App\Utility')

<body id="page-top">
<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
    <!-- Main Content -->
    <div id="content">
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
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/test-groups?order_by=created_at&sort=desc">الاحدث اضافه</a>
                                    <a class="dropdown-item" href="/test-groups?order_by=updated_at&sort=desc">الاحدث التعديل</a> </div>
                            </div>
                            </span>


                            <span class="float-left w-50">

                                    <div class="form-row col-md-12 ">
                                            <select name="id"  id="testselector"   class="form-control ">
                                                    <option value="-1"> اخنار</option>
                                                    <option value="0"> الكل</option>
                                                @foreach($allTests as $test)
                                                    <option value="{{$test->id}}"> {{$test->name}} </option>
                                                @endforeach
                                                </select>
                                    </div>

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
                                        @can('create', App\Test::class)
                                            <span  class=" float-right">
                                                <a href="test-groups/create?id={{$test->id}}" class="btn btn-success    btn-sm ">
                                                    <i class="fas fa-plus"></i>
                                                    <SPAN> اضافه ميعاد</SPAN>
                                                </a>
                                            </span>
                                         @endcan
                                    </div>
                                    <div class="card-body ">
                                        <div class="col-md-12 table-responsive">
                                            <table class="table table-striped w-100">

                                                <!--Table head-->
                                                <thead>
                                                    <tr class="w-100">
                                                        <th class="w-20">تاريخ الامتحان </th>
                                                        <th class="w-10">البدايه</th>
                                                        <th class="w-10">النهايه</th>
                                                        <th class="w-10">عدد المقاعد</th>
                                                        <th class="w-10">عدد المقاعد المتاحه</th>
                                                        <th class="w-10">الحاله</th>
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
                                                    $testGroup->available_seats==0 || $testGroup->opened==0
                                                    ||$Utility->datePassed($Utility->getDate($testGroup->times[0]->day),$testGroup->times[0]->end)?"table-danger":""}}>


                                                        <td> {{$Utility->getDate($testGroup->times[0]->day)}} </td>
                                                        <td>{{ $testGroup->times[0]->begin }}</td>
                                                        <td>{{ $testGroup->times[0]->end }}</td>
                                                        <td>{{$testGroup->available_chairs}}</td>
                                                        <td>{{$testGroup->available_seats}}</td>
                                                        <td>{{$testGroup->opened == 1? 'مقتوحه': 'مغلقه'}}</td>
                                                        <td >
                                                            @php($dis="")
                                                            @if($testGroup->available_seats==0 || $testGroup->opened==0
                                                    ||$Utility->datePassed($Utility->getDate($testGroup->times[0]->day),$testGroup->times[0]->end)==true)
                                                                @php($dis="disabled")
                                                                @endif
                                                            @can('create', App\Test::class)
                                                                <a href="test-enrollments/create?group_id={{ $testGroup->id }}"  class="btn btn-outline-warning {{$dis}} btn-sm">
                                                                    <i class="fas fa-plus"></i>
                                                                    <SPAN>تسجيل الطلاب</SPAN> </a>
                                                            @endcan
                                                            @can('view', App\Test::class)
                                                                <a  href="test-enrollments?id={{$testGroup->id}}"  class="btn btn-outline-success   btn-sm ">
                                                                    <SPAN> الطلاب المسجلين</SPAN>
                                                                </a></td>
                                                            @endcan
                                                        <td>
                                                            <form method="post" action="{{route('test-groups.destroy',$testGroup->id)}}">
                                                                @csrf
                                                                @method('delete')
                                                                @can('update', App\Test::class)
                                                                    <a href="/test-groups/{{$testGroup->id}}/edit" class=" btn btn-outline-primary btn-sm ">
                                                                        <i class="fas fa-edit"></i> </a> </span> </span>
                                                                @endcan
                                                                @can('delete', App\Test::class)
                                                                      <button type="submit" name="delete" class="btn btn-outline-danger   btn-sm ">
                                                                         <i class="fas fa-trash-alt"></i> </button>
                                                                @endcan
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
    </div>
            <!-- End of Main Content -->

            <!-- Footer -->
    @include('footer')
            <!-- End of Footer -->
</div>

        <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
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
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
<script>
    $('#testselector').change(function(){
        var id = $(this).val();
        if(id != 0){
            window.location = '/test-groups?id='+id;
        }
        else if(id == 0){
            window.location = '/test-groups';
        }
    });


</script>

</body>
</html>
