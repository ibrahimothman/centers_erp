<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Bootstrap CSS & js -->
    @include('library')
    <link href="{{url('employee')}}" rel="stylesheet">
    <script wesrc="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>students</title>


</head>

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
                                <div class="col-md-6">
                                    بيانات الطلاب
                                </div>
                                <div class="col-md-6 grid-view ">
                                    <button type="button" class="btn ">
                                        <a href="{{ route('students.table') }}">
                                            <i class="fas fa-th-list"></i>  </a>
                                    </button>
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
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">الكل</a>
                                                <a class="dropdown-item" href="#">الاسماء</a>
                                                <a class="dropdown-item" href="#">الرقم القومى</a>
                                                <a class="dropdown-item" href="#">الكورس</a>
                                                <a class="dropdown-item" href="#">المجموعه</a>
                                            </div>
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
        @include('footer')
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
<!-- script-->

@include('script')
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
                        lines += "<div class='card-header bg-transparent border-primary'>"+response[m].nameAr+"</div>";
                        lines += "<div class='card-body'";
                        lines += "<p class='card-text'>";
                        lines +=  "<img src="+"'/uploads/profiles/"+response[m].image+"' alt='' class='rounded-circle img-profile-contact float-right img-responsive'>";
                        lines+= "<ul class='list-unstyled contact-det'>";
                        lines+=  "<li><i class='fas fa-envelope btn-circle'></i>البريد الالكترونى<br>"+response[m].email+"</li>";
                        lines+=  "<li><i class='fa fa-phone btn-circle'></i>التليفون:<span>"+response[m].phoneNumber+"</span></li>";
                        lines += "<li class='gray'> تاريخ الاضافه  :"+response[m].created_at+"</li></ul></p></div>";
                        lines+="<form class='card-footer border-primary'>";
                        lines += "<button type='button' onclick='deleteStudent("+response[m].id+")' class='btn btn-success btn-xs'><i class='fas fa-trash-alt'></i> </button>";
                        lines += " <a href='students/"+response[m].id+ "' class='btn btn-primary btn-xs'><i class='fa fa-user'></i>الملف الشخصي</a></div>";
                        lines += "</form>";

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
        loc = $('<a>', { href: window.location })[0];
        var data = "name="+query;
        console.log(query);
        $.ajax({
            url:"/search_student_by_name",
            type:'GET',
            data:data,

            success:function (response) {
                view(response);
            }
        });
    }
</script>

</body>

</html>
