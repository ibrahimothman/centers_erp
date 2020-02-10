<!DOCTYPE html>
<html lang="en">
<head>
@include('library')

    <!-- Custom fonts for this template-->
    <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    -->

    <title>test-stu-add</title>
    <style>
        .error {
            color: #dc3545;
            font-size: 1rem;
            line-height: 1;
        }
        input.error , select.error {
            border: 1px solid #dc3545;
        }
    </style>
</head>
<body id="page-top">
<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
    <!-- Main Content -->
        <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header text-primary"> تسجيل الطلاب</div>
                            <div class="card-body">
                                <form class="needs-validation" method="post" action="{{url("test_enrollment")}}"
                                      novalidate autocomplete="off" id="testEnrollCreate">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <label for="validationCustom01"> اسم الامتحان </label>
                                            <span class="required">*</span>
                                            <select class="form-control " placeholder="اختار الامتحان" id="testselector"
                                                    name="test" required>
                                                <option value="">اختر مبعادا</option>
                                                @foreach($tests as $test)
                                                    <option value={{$test->id}}>{{$test->name}}</option>
                                                @endforeach
                                            </select>
                                            <span id="testselector_error"></span>

                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>مواعيد الامتحان</label>
                                            <span class="required">*</span>
                                            <select class="form-control " placeholder="اختار ميعاد الامتحان" id="time"
                                                    name="time" required>
                                                <option value="">اختر مبعادا</option>
                                                <option value="2">2</option>

                                            </select>
                                            <span id="dateselector_error"></span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <!--stu-name-->
                                        <div class="col-sm-5 form-group">
                                            <label for="student-id"> الطالب</label>
                                            <span class="required">*</span>
                                            <input type="text" placeholder="اسم الطالب" name="student"
                                                   class="form-control" id="student-id" required>
                                            <div class="list-gpfrm-list" id="studentsList"></div>
                                            <span id="stuselector_error"></span>
                                            <div></div>
                                        </div>


                                    </div>
                                    <div class="form-row save">
                                        <div class="col-sm-6 mx-auto text-center">
                                            <button class="btn btn-primary" type="submit" id="submit">حفظ</button>
                                            <button class="btn  btn-danger" type="reset"> الغاء</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Footer -->
@include('footer')
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top"> <i class="fas fa-angle-up"></i> </a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">هل تريد الخروج بالفعل</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">اضغط على الخروج اذا كنت ترغب قى الخروج</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
                <a class="btn btn-primary" href="login.html">الخروج</a></div>
        </div>
    </div>
</div>
<!-- script-->
@include('script')
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="/js/test_enrollment_create_validation.js"></script>
<!-- Custom scripts for alwl pages-->
{{--<script src="{{url('employee')}}"></script>--}}

<script>
    /*
            $(document).ready(function(){

                getGroupsDate($('#testselector').val());
                var student_id = 0;

                $('#student-id').keyup(function () {
                    var query=$(this).val();
                    console.log(query);
                    if (query===""){
                        $('#studentsList').html("");
                        return;
                    }
                    $.ajax({
                        url: "/search_student_by_name",
                        method: "GET",
                        data: {query:query, _token: "{{ csrf_token() }}"},
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        $('#studentsList').show();
                        var output='<ul class="dropdown-menu" style="display:block; position:relative">';

                        $.each(data, function (i, v) {
                            console.log(i+" --> "+v.nameAr);
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

            $('#testselector').change(function() {
                var test_id = $(this).val();
                if(test_id != 0) getGroupsDate(test_id);

            });

            function getGroupsDate(test_id){
                $('#time').empty();
                $('#time').append('<option value="0">اختر ميعادا</option>');
                    $.ajax({
                        url: "/get_test_groups",
                        method: "GET",
                        data: {test: test_id, _token: "{{ csrf_token() }}"},
                        dataType: "json",
                        success: function (data) {
                            // console.log(data);
                            $.each(data, function (i, v) {
                                // console.log(group.id)
                                $('#time').append('<option value="' + v.id + '">' + v.group_date + '</option>');
                            });

                        },
                        error: function (res) {
                            alert(res.data);
                        }

                    });

            }

        $(document).on('click', 'form button[type=button]', function(e) {
            // check if all fields if filled
            var test_id = $('#testselector').val();
            var group_id = $('#time').val();
            var student_input = $('#student-id').val();

            if(test_id !== 0 && group_id !==0 && student_input) {
                // remove errors
                $('#testselector_error').html("<lable class = 'text-success'></lable>");
                $('#testselector_error').removeClass('has-error');
                $('#dateselector_error').html("<lable class = 'text-success'></lable>");
                $('#dateselector_error').removeClass('has-error');
                $('#stuselector_error').html("<lable class = 'text-success'></lable>");
                $('#stuselector_error').removeClass('has-error');


                $.ajax({
                   url : '{{ route('test-enrollments.store') }}',
                    method : 'post',
                    data : {stu_id : student_id, test_id : test_id,group_id : group_id, _token: "{{csrf_token()}}"},
                    success : function (res) {
                        alert(res);
                    }
                });


            }
                if(test_id == 0) {
                    $('#testselector_error').html("<lable class = 'text-danger'>choose a test</lable>");
                    $('#testselector_error').addClass('has-error');
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

        $('#testselector').change(function () {
            $('#testselector_error').html("<lable class = 'text-success'></lable>");
            $('#testselector_error').removeClass('has-error');
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
        */
</script>


</body>
</html>
