<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Bootstrap CSS & js -->
@include('library')
    <title>Enrolling students in diploma</title>
</head>
<body id="page-top">
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
                                <h3>تسجيل الطلاب بالدبلومة </h3>
                            </div>
                        </header>
                        <div class="card-body">
                            <form  id="form" enctype="multipart/form-data" action="{{ route('diploma-enrollments.store') }}" method="post" >
                                @csrf
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for="student-id">اسم الطالب</label>
                                        <input type="hidden" id="student_id" name="student_id">
                                        <span class="required">*</span>
                                        <input type="text"  placeholder="اسم الطالب"  name="student_name" class="form-control" id="student_name" required>
                                        <div class="list-gpfrm-list" id="studentsList"></div>
                                        <span id="stuselector_error"></span>
                                        <div></div>

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for="course-id">الدبلومة</label>
                                        <span class="required">*</span>
                                        <select class="form-control" id="diploma_option" required name="selectDiploma">

                                            <option value="">اختار</option>
                                            @foreach($diplomas as $diploma)
                                                <option data-content="{{ $diploma->groups }}" value="{{ $diploma->id }}">{{ $diploma->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label >مواعيد الدبلومه</label>
                                        <select  class="form-control "  id="diploma_group_date" name="diploma_group_id" required>

                                            <option value="">اختار</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row save">
                                    <div class="col-sm-6 mx-auto" style="width: 200px;">
                                        <button class="btn btn-primary " type="submit" id="submit"> إضافة
                                            </button>
                                        <button class="btn  btn-danger " type="reset"> إلغاء
                                                   </button>
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
<!-- script-->
@include('script')
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="{{ asset('js/diploma_student_register_validation.js') }} "></script>

<script>
    $(document).ready(function () {

        $('#student_name').keyup(function () {
            var query=$(this).val();
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
                        output+=" <li value="+ v.id +"><a href='#'>"+v.nameAr+"</a></li>"

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
            $('#student_name').val($(this).text());
            $('#student_id').val($(this).val());
            $('#studentsList').fadeOut();
        });

        $('#diploma_option').on('change', function () {
            $('#diploma_group_date').empty();
            $('#diploma_group_date').append("<option value='0'>اختر ميعادا</option>");
            let groups = $.parseJSON($(this).find(':selected').attr('data-content'));
            groups.forEach(function (group) {
                $('#diploma_group_date').append("<option value='"+ group.id +"'>"+ group.starts_at +"</option>");
            })
        })
    });
</script>
</body>
</html>

