<!DOCTYPE html>
<html lang="en">
<head>
    @include('library')
<title>test-det-view</title>
 <!-- Custom styles for this page -->
 <link href="{{url('vendor/datatables/datatables.min.css')}}" rel="stylesheet">

 <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

</head>
<body id="page-top">

<!-- Begin Page Content -->
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
                        <div class="col-md-6">  تفاصيل الامتحان  </div>
                    </div>
                </div>
                <div class="card-body">

                        <form >

                  <div class="form-row">

                    <div class=" clearfix col-md-8 mb-4">

                            <input type="text" name="test1"  class="form-control " placeholder=" اختار الامتحان "  list="tests"/>

                        </div>

                    </form>

                    </div>

                         <!-- det-block -->

                    <div class="form-row cont-det">
                        <div class="col-md-12">
                            <div class="card card  card-sh  border-primary p-3 test-view ">
                                <div class="card-header bg-transparent border-primary text-success font-weight-bold  clearfix">
                                    <span  class=" float-left">{{$test->name}}</span> </div>
                                <div class="card-body ">
                                    <p class="card-title text-primary "> عن الامتحان : </p>
                                    <span class="card-text text-justify">
                                    {{$test->description}}
                                    </span>
                                    <div class="dropdown-divider"></div>
                                    <div class="card-text clearfix "> <span class="w-50 p-3  text-primary" > تكلفه الامتحان :</span>
                                        <div class="d-inline p-2 ">
                                            <span class="text-warning " >فردى : </span>
                                            <span class=" text-secondary " >{{$test->cost}} جنيه </span> </div>
                                        <div class="d-inline p-2 ">
                                            <span class="text-warning  " >كورس : </span>
                                            <span class=" text-secondary " >{{$test->cost_course}} جنيه </span> </div>
                                        <div class="d-inline p-5  ">
                                            <span class="btn-success rep " >{{$test->retake?"قابل للاعادة":"غير قابل للاعادة"}}

                                            </span> </div>
                                        <footer class="blockquote-footer float-right">
                                            تاريخ الاضافه <span>{{$test->created_at}}</span>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                         <!-- det-block-end -->

                                                  <!-- time-block-->

                         <div class="row cont-det">
                                <div class="col-md-12">
                                    <div class="card card  card-sh  border-primary p-3 test-view ">
                                        <div class="card-header bg-transparent border-primary text-success font-weight-bold  clearfix">
                                            <span class="float-right"> <a href="/test-groups/create?id={{$test->id}}" class="btn btn-outline-success ">
                                                <i class="fas fa-plus"></i> <SPAN> اضافه ميعاد</SPAN> </a>
                                                </span>
                                                 <span  class=" float-left"> مواعيد الامتحان</span> </div>
                                        <div class="card-body ">
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

                                                            </tr>
                                                        </thead>
                                                        <!--Table head-->

                                                        <!--Table body-->
                                                        <tbody>
                                                        @foreach($test->groups as $testGroup)
                                                            <tr class= {{
                                                                $testGroup->available_seats==0 || $testGroup->opened==0
                                                                ||Utility::datePassed(Utility::getDate($testGroup->times[0]->day),$testGroup->times[0]->end)?"table-danger":""}}>
                                                                <td> {{Utility::getDate($testGroup->times[0]->day)}} </td>
                                                                <td>{{ $testGroup->times[0]->begin }}</td>
                                                                <td>{{ $testGroup->times[0]->end }}</td>
                                                                <td>{{$testGroup->available_chairs}}</td>
                                                                <td>{{$testGroup->available_seats}}</td>
                                                                <td>{{$testGroup->opened == 1? 'مقتوحه': 'مغلقه'}}</td>
                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                        <!--Table body-->
                                                    </table>
                                                    <!--Table-->


                                            </div>

                                    </div>
                                </div>
                            </div>



                          <!-- stu-block -->


                            <div class="row cont-det">
                                <div class="col-md-12">
                                    <div class="card card  card-sh  border-primary p-3 test-view ">
                                        <div class="card-header bg-transparent border-primary text-success font-weight-bold  clearfix">
                                            <span class="float-right"> <a href="test-stu-add.html" class="btn btn-outline-success ">
                                                <i class="fas fa-plus"></i> <SPAN> اضافه طالب</SPAN> </a>
                                                </span>
                                                 <span  class=" float-left">الطلاب المسجلين</span> </div>
                                        <div class="card-body ">

                                                <table   id="datatable-buttons" class="table table-striped table-bordered display  hover">

                                                        <!--Table head-->
                                                        <thead>
                                                            <tr class="w-100">
                                                                <th class="w-10">#  </th>
                                                                <th class="w-10">امتحان</th>
                                                                <th class="w-30">ميعاد الامتحان</th>
                                                                <th class="w-30">رقم الطالب</th>
                                                                <th class="w-30">اسم الطالب</th>

                                                            </tr>
                                                        </thead>
                                                        <!--Table head-->

                                                        <!--Table body-->
                                                        <tbody>

{{--                                                        @foreach($enrollments as $enrollment)--}}
                                                            <tr >

{{--                                                                <td>{{$enrollment->id}} </td>--}}
{{--                                                                <td>{{$enrollment->name}}</td>--}}
{{--                                                                <td>--}}
{{--                                                                    {{$Utility->getDate($enrollment->group_date)}}--}}
{{--                                                                    &nbsp;--}}
{{--                                                                    {{$Utility->getTime($enrollment->group_date)}}--}}
{{--                                                                </td>--}}
{{--                                                                <td>{{$enrollment->id}}</td>--}}
{{--                                                                <td> {{$enrollment->nameAr}}د</td>--}}
{{--                                                            </tr>--}}
{{--                                                        @endforeach--}}

                                                        </tbody>
                                                        <!--Table body-->
                                                    </table>
                                                    <!--Table-->

                                        </div>
                                    </div>

                                </div>
                            </div>


                          <!-- stu-block-end -->





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

            <!-- End of Footer -->

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
<!-- Custom scripts for all pages-->
<script src="{{url('employee')}}"></script>
<!-- Page level plugins -->
<script src="{{url('vendor/datatables/datatables.min.js')}}"></script>
<!-- Page level custom scripts -->
<script src="{{url('js/demo/datatables-demo.js')}}"></script>
<script>

$('#datatable-responsive').DataTable( {
  responsive: true
} );


  $(document).ready(function() {
  $('#datatable-buttons').DataTable( {
      dom: 'Bfrtip',
      buttons: [
          'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5'
      ]
  } );




} );
  </script>

</body>
</body>
</html>
