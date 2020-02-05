<!doctype html>

    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            @include('library')
            <title>Add a Course group</title>
            <style>
                .error {
                    color: #b60000;
                    font-size: 1rem;
                    font-weight: 400;
                    line-height: 1.5;
                }
                /* img error */
            </style>

        </head>

        <body>
            <div id="wrapper">
                @include('sidebar')
                <div id="content-wrapper" class="d-flex flex-column">
                    @include('operationBar')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">
                                <div class="card mb-4 shadowed">
                                    <header>
                                        <div class="card-header text-primary form-title">
                                        إضافة معلومات مجموعة الدورة
                                       </div>
                                    </header>
                                    <div class="card-body">
                                        <form action="{{ route('course_groups.store') }}" method="post" enctype="multipart/form-data" id="courseGroupCreate">
                                            @csrf

                                            <div class="form-row">
                                                <div class="col-sm-6 form-group">
                                                    <label for="name">اسم الدورة</label>
                                                    <input type="text" class="form-control" id="name" placeholder="اسم الدورة " value="{{ old('name') }}" name="name" required>
                                                    <span id="test_course-name_error"></span>
                                                    <div>{{ $errors->first('name') }}</div>
                                                </div>
                                                <div class='col-sm-6'>
                                                    <div class="form-group">
                                                    <label for="validationCustom01">   تاريخ بداية الدورة</label>
                                                        <div class='input-group date'>

                                                            <input  id="datetimepicker" name="start_at"  class="form-control" type="text" >
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div>{{ $errors->first('start_at') }}</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-sm-6 form-group">
                                                    <label for="course">اختار كورس</label>
                                                    <select class="form-control" name="course" id="course" required>
                                                        @foreach($courses as $course)
                                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="test_course-teacher_error"></span>
                                                    <div>{{ $errors->first('course') }}</div>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label for="course-group-room">قاعة الدورة</label>
                                                    <select class="form-control" id="course-group-room" name="room" required>
                                                        @foreach($rooms as $room)
                                                            <option value="{{ $room->id }}">قاعة {{ $room->name }}1</option>
                                                         @endforeach

                                                    </select>
                                                        <span id="test_course-group-room_error"></span>
                                                    <div>{{ $errors->first('room') }}</div>
                                                </div>
                                            </div>
                                            <fieldset>
                                            <div class="form-row days">
                                                <header class="full-width"><h4> ايام الدورة <i class="fas fa-plus-circle" id='add-more-days' onclick="" style="color:green; cursor:pointer"></i></h4></header>
                                                <div class="col-sm-4 form-group">
                                                    <label for="validationCustom01">   اختر اليوم</label>
                                                    <div class='input-group date'>

                                                        <input id="course-day-1" name="course-day[]" onchange="onDayChanged(1)" onclick="onDayClicked(1)"  class="form-control" type="text" >
                                                        <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label for="course-day-1-begin"> بداية المحاضرة</label>
                                                    <select class="form-control" id="course-day-1-begin" name="course-begin[]"
                                                            onchange="onBeginChanged();" required>
                                                    </select>
                                                </div>

                                                <div class="col-sm-4 form-group">
                                                    <label for="course-day-1-end"> نهاية المحاضرة</label>
                                                    <select class="form-control" id="course-day-1-end" name="course-end[]"
                                                            required>
                                                    </select>
                                                        <span id="test_course-day-1-end_error"></span>
                                                    <div>{{ $errors->first('end') }}</div>
                                                </div>
                                            </div>
                                            </fieldset>
                                            <div class="form-row save">

                                                <div class="col-sm-6 mx-auto" style="width: 200px;">
                                                    <hr/>
                                                    <button class="btn btn-primary action-buttons" type="submit" id="submit"> إضافة  <i class="fas fa-plus"></i></button>
                                                    <button class="btn  btn-danger action-buttons" type="reset">  إلغاء  <i class="fas fa-times"></i></button>
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



            @include('script')
            <script src="{{url('js/jquery.min.js')}}"></script>
            <!-- client side validation plugin -->
            <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
            <!-- client side validation page -->
            <script type='text/javascript' src="{{url("js/course_group_create_validation.js")}}"></script>

          <script>
            $(function () {
                $('#datetimepicker').datetimepicker({
                    timepicker:false,
                    format:'Y-m-d'
                });
            });
             let number = 1;

             function onDayClicked(num) {
                 $('#course-day-'+num).datetimepicker({
                     timepicker:false,
                     format:'Y-m-d',
                 });
             }
            function onDayChanged (num) {
                number = num;
                $('#course-day-'+number+'-begin').empty();
                $('#course-day-'+number+'-end').empty();
                var room_id = $('#course-group-room').val();
                var day = $('#course-day-'+number).val();
                console.log('room id = '+room_id+' and day = '+day);
                getAvailableBeginsForTheRoom(room_id, day);
            }

            function getAvailableBeginsForTheRoom(room_id, day) {
                $.ajax({
                    url : "/available_begins_for_the_room",
                    type : 'GET',
                    data : {room_id : room_id, day : day},
                    success : function (begins) {
                        console.log(begins);
                        fillBegins(begins);
                    }

                });
            }

            function fillBegins(begins) {
                $('#course-day-'+number+'-begin').empty();
                $('#course-day-'+number+'-begin').append('<option value="0">اختر ميعاد</option>');
                $.each(begins, function (i, v) {
                    $('#course-day-'+number+'-begin').append('<option value="' + i + '">' + v + '</option>');
                });
            }

            function onBeginChanged () {
                var room_id = $('#course-group-room').val();
                var day_id = $('#course-day-'+number).val();
                var begin_id = $('#course-day-'+number+'-begin').val();
                getAvailableEndsForTheRoom(room_id, day_id, begin_id);
                // console.log('room id = '+room_id+" / day = "+day_id);
            }

            function getAvailableEndsForTheRoom(room_id, day_id, begin_id) {
                $.ajax({
                    url : "/available_ends_for_the_room",
                    type : 'GET',
                    data : {room_id : room_id, day_id : day_id, begin_id : begin_id},
                    success : function (ends) {
                        // console.log(ends);
                        fillEnds(ends);
                    }

                });
            }

            function fillEnds(ends) {
                $('#course-day-'+number+'-end').empty();
                $('#course-day-'+number+'-end').append('<option value="0">اختر ميعاد</option>');
                $.each(ends, function (i, v) {
                    // console.log('i = '+ i +" / v = "+v);
                    $('#course-day-'+number+'-end').append('<option value="' + i + '">' + v + '</option>');
                });
            }


        </script>
    </body>

    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>
    <script src="{{url('js/jquery.datetimepicker.js')}}"></script>
    <script type='text/javascript' src="{{url('js/createCourse.js')}}"></script>

</html>

