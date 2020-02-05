<!doctype html>
<!-- /course_enrollment/create-->
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            <!-- Bootstrap CSS & js -->
            @include('library')
        <!-- style-->
            <link href="/../../../css/enrolled-students-in-course.css" rel="stylesheet">
            <title>Enrolling students in courses</title>
            </head>

        <body>
            <div id="wrapper">
                @include('sidebar')
                <div id="content-wrapper" class="d-flex flex-column">
                    @include('operationBar')
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-10">
                                <div class="card mb-4 shadowed">
                                    <header>
                                        <div class="card-header text-primary form-title view-courses-title">
                                        <h3>تسجيل الطلاب بالدورة </h3>
                                        </div>
                                    </header>
                                    <div class="card-body">
                                        <form action="">
                                            <div class="form-row">
                                                <div class="col-sm-5 form-group">
                                                        <label for="course-id">الدورة</label>
                                                        <select class="form-control" id="course_id" required>
                                                            @foreach($courses as $course)
                                                            <option value="{{$course->id}}">{{$course->name}}</option>
                                                            @endforeach
                                                        </select>
                                                            <span id="course_error"></span>
                                                            <div></div>
                                                    </div>

                                                <div class="col-sm-5 form-group">
                                                    <label >مواعيد الكورس</label>

                                                    <select  class="form-control "  placeholder="اختار ميعاد الامتحان" id="time" name="time" required>
                                                    </select>
                                                    <span id="dateselector_error"></span>
                                                    <div></div>
                                                </div>
                                            </div>

                                            <div class="form-row">

                                                <div class="col-sm-5 form-group">
                                                        <label for="student-id"> الطالب</label>
                                                        <input type="text"  placeholder="اسم الطالب" class="form-control" id="student-id" required>
                                                        <div class="list-gpfrm-list" id="studentsList"></div>
                                                        <span id="stuselector_error"></span>
                                                            <div></div>
                                                    </div>
                                                    <div class="col-sm-2 form-group align-end">
                                                    <a href="#"><button id="enroll" type="button" class="btn btn-success">أضف</button></a>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>

                        </div>
                        <!-- /.container-fluid -->
                        </div>
                    </div>
                    @include('footer')
                </div>
            </div>



            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">ازالة طالب من الدورة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    هل انت متأكد من أنك تريد ازالة الطالب؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">ازالة</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                </div>
                </div>
            </div>
            </div>
            <!-- script-->
            @include('script')
        <script >
            $(document).ready(function() {
                //alert("/*/**");
                if($('#course_id').val())
                    getGroups_date($('#course_id').val());
                var student_id = 0;

                // autocomplete students
                $('#student-id').keyup(function () {
                    var query=$(this).val();
                    console.log(query);
                    if (query===""){
                        $('#studentsList').html("");
                        return;
                    }

                    loc = $('<a>', { href: window.location })[0];
                    var data = "name="+query;
                    $.ajax({
                        url: "/search_student_by_name",
                        method: "GET",
                        data: data,
                        dataType: "json",
                        success: function (data) {
                            $('#studentsList').show();
                            var output='<ul class="dropdown-menu" style="display:block; position:relative">';

                            $.each(data, function (i, v) {
                                console.log(v.id+" --> "+v.nameAr);
                                output+=" <li value="+ v.id +"><a href=''>"+v.nameAr+"</a></li>"

                            });
                            output += '</ul>';
                            $("#studentsList").fadeIn();
                            $("#studentsList").html(output);

                        },
                        error: function (res) {
                            alert(res.data);
                        }

                    });
                });

                $(document).on('click', 'li', function(){
                    student_id = $(this).val();
                    $('#student-id').val($(this).text());
                    $('#studentsList').fadeOut();
                    return false;
                });

                // get selected course's groups
                $('#course_id').change(function() {
                    var course_id = $(this).val();
                    console.log(course_id);
                    if(course_id != 0) getGroups_date(course_id);

                });


                function getGroups_date(course_id){
                    $('#time').empty();
                    $('#time').append('<option value="0">اختر ميعادا</option>');
                    $.ajax({
                        url: "/get_course_groups",
                        method: "GET",
                        data: {course_id: course_id, _token: "{{ csrf_token() }}"},
                        dataType: "json",
                        success: function (data) {
                            // console.log(data);
                            $.each(data, function (i, v) {
                                // console.log(group.id)
                                $('#time').append('<option value="' + v.id + '">' + v.start_at + '</option>');
                            });

                        },
                        error: function (res) {
                            alert(res.data);
                        }

                    });

                }
                // enroll in course group

                $('#enroll').on('click', function(e) {
                    // check if all fields if filled
                    var course_id = $('#course_id').val();
                    var group_id = $('#time').val();
                    var student_input = $('#student-id').val();
                    console.log(course_id+" / "+group_id+" / "+student_id);
                    if(course_id != 0 && group_id != 0 && student_input ) {
                        // remove errors
                        $('#course_error').html("<lable class = 'text-success'></lable>");
                        $('#course_error').removeClass('has-error');
                        $('#dateselector_error').html("<lable class = 'text-success'></lable>");
                        $('#dateselector_error').removeClass('has-error');
                        $('#stuselector_error').html("<lable class = 'text-success'></lable>");
                        $('#stuselector_error').removeClass('has-error');


                        $.ajax({
                            url : '{{ route('course_enrollment.store') }}',
                            method : 'post',
                            data : {student_id : student_id, course_id : course_id,group_id : group_id, _token: "{{csrf_token()}}"},
                            success : function (res) {
                                alert(res);
                            }
                        });


                    }
                    if(course_id == 0) {
                        $('#course_error').html("<lable class = 'text-danger'>choose a test</lable>");
                        $('#course_error').addClass('has-error');

                    }
                    if(group_id == 0) {
                        $('#dateselector_error').html("<lable class = 'text-danger'>choose a date</lable>");
                        $('#dateselector_error').addClass('has-error');
                    }
                    if(!student_input) {
                        $('#stuselector_error').html("<lable class = 'text-danger'>choose a students</lable>");
                        $('#stuselector_error').addClass('has-error');
                    }



                });

                $('#course_id').change(function () {
                    $('#course_error').html("<lable class = 'text-success'></lable>");
                    $('#course_error').removeClass('has-error');

                });

                $('#time').change(function () {
                    $('#dateselector_error').html("<lable class = 'text-success'></lable>");
                    $('#dateselector_error').removeClass('has-error');
                });


                $('#student-id').change(function () {
                    $('#stuselector_error').html("<lable class = 'text-success'></lable>");
                    $('#stuselector_error').removeClass('has-error');
                });





            });
        </script>


        </body>

</html>

