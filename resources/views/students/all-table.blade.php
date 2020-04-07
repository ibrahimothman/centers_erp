<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS & js -->
    @include('library')
<!-- Custom styles for this template-->
    <link href="{{url('employee')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Custom styles for this page -->
    <link href="{{url('vendor/datatables/datatables.min.css')}}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>students</title>
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
                                <div class="col-md-6">
                                    بيانات الطلاب
                                </div>
                                <div class="col-md-6 grid-view ">

                                    <button type="button" class="btn ">
                                        <a href="#">
                                            <i class="fas fa-th-list"></i>  </a>
                                    </button>
                                        <button type="button" class="btn ">
                                            <a href="{{ route('students.index') }}">
                                                <i class="fas fa-th"></i>
                                            </a>
                                        </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive row x_content">
                                <table id="datatable-buttons" class="table table-striped table-bordered display  hover">
                                    <div class="buttons"></div>
                                    <div class="form-group">
                                        <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
                                    </div
                                    >
                                    <thead class="table-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم باللغه العربيه</th>
                                        <th>الاسم باللغه الانجليزيه</th>
                                        <th>البريد الالكترونى </th>
                                        <th>تاريخ الاضافه</th>
                                        <th>التليفون</th>
                                        <th>الرقم القومى  </th>
                                        <th>التفاصيل </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{$student->id}}</td>
                                            <td>{{$student->nameAr}}</td>
                                            <td>{{$student->nameEn}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->created_at}}</td>
                                            <td>{{$student->phoneNumber}}</td>
                                            <td>{{$student->idNumber}}</td>
                                            <td>
                                                <a href="/students/{{$student->id}}/edit"
                                                   class=" btn btn-outline-primary  py-1 px-1 ">
                                                    <i class="fas fa-edit  "></i> </a>
                                                <a href="/students/{{$student->id}}" class="btn btn-outline-success  py-1 px-1 "><i
                                                            class="fas fa-eye "></i></a>
                                                <button type="submit" class="btn btn-outline-danger py-1 px-1 ">
                                                    <i class="fas fa-trash-alt "></i>
                                                </button>
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

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
            <!-- End of Content Wrapper -->
        </div>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
@include('scroll_top')
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

<!-- script-->

@include('script')
    <!-- Page level plugins -->
    <script src="{{url('vendor/datatables/datatables.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{url('vendor/datatables/datatables.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>

        $('#search').keyup(function(e){
            if(e.keyCode == 13) {
                var query = $(this).val();
                seacrh(query);
            }
        });

        function seacrh(query = '') {
            $.ajax({
                url: "/search_student_by_name",
                type: 'GET',
                data: {query: query},
                dataType : 'json',
                success: function (response) {
                    var lines = "";
                    $.each(response,function (index,value) {
                        lines += "<tr>";
                        lines += "<td>"+value.id+"</td>"
                        lines += "<td>"+this.nameAr+"</td>";
                        lines += "<td>"+this.nameEn+"</td>";
                        lines += "<td>"+this.email+"</td>";
                        lines += "<td>"+this.created_at+"</td>";
                        lines += "<td>"+this.phoneNumber+"</td>";
                        lines += "<td>"+this.idNumber+"</td>";
                        lines += "<td>";
                        lines += "<a href=Student/"+this.id+">";
                        lines += "<i class='fas fa-info-circle' fa-info-circle></i></a>";
                        lines += "</a>";
                        lines += "<a href=Student/"+this.id+"/edit>";
                        lines += "<i class='fas fa-user-edit' fa-info-circle></i></a>";
                        lines += "</a>";
                        lines += "</td>";
                        lines += "</tr>";
                    });
                     $('tbody').html(lines);

                }
            })
        }

    </script>
</body>

</html>
