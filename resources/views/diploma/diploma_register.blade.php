<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('library')
    <!-- style --->
        <link href="/css/diploma_style.css" rel="stylesheet"/>
        <title>Add a diploma group</title>
</head>
<body id="page-top">
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title">
                                إضافة مجموعه دبلومه جديده
                            </div>
                        </header>
                        <div class="card-body">
                            <form id="diplomaRegister" enctype="multipart/form-data" action="{{ route('diploma-groups.store') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for="name">اسم الدبلومة</label>
                                        <span class="required">*</span>
                                        <select class="form-control" id="diplomas_options" name="diploma_id" required>
                                            <option value="">اختار</option>
                                            @foreach($diplomas as $diploma)
                                                <option data-content="{{ $diploma }}" value="{{ $diploma->id }}">{{ $diploma->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>قاعة الدبلومة</label>
                                       <span class="required">*</span>
                                        <select class="form-control" id="" name="room_id" required>

                                            <option value="">اختار</option>
                                            @foreach($rooms as $room)
                                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class='col-sm-6 form-group'>
                                            <label> تاريخ بداية الدبلومة</label>
                                            <div class='input-group date'>
                                                <input id="datetimepicker" name="starts_at" class="form-control" type="text">

                                            </div>
                                        <div class="dateError"></div>
                                    </div>
                                        <div class="col-sm-6 form-group">
                                            <label>اسم المدرس</label>
                                            <span class="required">*</span>
                                            <div class="dropdown " id="addInstructor" >
                                                <button data-toggle="dropdown" class="dropdown-toggle btnInstructor py-1">
                                                    اسم المدرس <b class="caret"></b>
                                                </button>
                                                <ul id="instructor_options" class=" dropdown-menu text-right " >

                                                </ul>
                                            </div>
                                            <div id="errorSelect"  class="errorMselector">هذه الخانه مطلوبه</div>
                                        </div>

                                    </div>
                                <br>
                                <div class="form-row save">
                                    <div class="col-sm-6 mx-auto" style="width: 200px;">
                                        <button class="btn btn-primary action-buttons" type="submit" id="submit"> إضافة
                                           </button>
                                        <button class="btn  btn-danger action-buttons" type="reset"> إلغاء
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
<!-- script -->
@include('script')
<!-- time picker -->
<link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>
<script src="{{url('js/jquery.datetimepicker.js')}}"></script>
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="{{ asset('js/diploma_register_validation.js ') }}"></script>

<script>
    $(function () {
        $('#datetimepicker').datetimepicker({
            timepicker: false,
            format: 'Y-m-d'
        });
    });

    $(document).ready(function () {

        console.log($('#add-more-days').parent().parent().parent());

        $('#diplomas_options').on('change', function () {
            $('#instructor_options').empty();
            var instructors = {};
            var diploma = $.parseJSON($(this).find(':selected').attr('data-content'));
            diploma.courses.forEach(function (course) {
                course.instructors.forEach(function (instructor) {
                    if((instructor.id in instructors) === false){
                        instructors[instructor.id] = instructor;
                        $('#instructor_options').append("<li><label class='checkbox'><input type='checkbox' name='instructors[]' value='"+ instructor.id +"'>"+ instructor.nameAr +"</label></li>");

                    }
                })
            });


        })
    })
</script>
</body>
</html>
