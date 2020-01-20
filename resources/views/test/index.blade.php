<!DOCTYPE html>
<html lang="en">
<head>
    @include('library')
    <title>test-det-view</title>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
        @include('sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')

            <!-- Begin Page Content -->
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
                @include('footer')
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
    @include('script')
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
