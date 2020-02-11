<!doctype html>

    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            @include('library')
            <title>Add a Course group</title>
            <style>

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

                                            <div class="form-row ">
                                                <div class="col-sm-6 form-group">
                                                    <label for="name">اسم الدورة</label>
                                                    <span class="required">*</span>
                                                    <input type="text" class="form-control" id="name" placeholder="اسم الدورة " value="{{ old('name') }}" name="name" required>
                                                    <span id="test_course-name_error"></span>
                                                    <div>{{ $errors->first('name') }}</div>
                                                </div>
                                                <div class='col-sm-6 form-group'>
                                                    <label for="validationCustom01">   تاريخ بداية الدورة</label>
                                                        <span class="required">*</span>
                                                        <div class='input-group date'>
                                                            <input   id="datetimepicker" name="start_at"  class="form-control" type="text" required>                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>

                                                        </div>
                                                    <div class="addError" ></div>
                                                    <div>{{ $errors->first('start_at') }}</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-sm-6 form-group">
                                                    <label for="course">اختار كورس</label>
                                                    <span class="required">*</span>
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
                                                    <select class="form-control" id="course-group-room" name="room" >
                                                        <option value="">اختار</option>
                                                        <option value="1">قاعة رقم 1</option>
                                                        <option value="2">قاعة رقم 2</option>
                                                        <option value="3">قاعة رقم 3</option>
                                                    </select>
                                                        <span id="test_course-group-room_error"></span>
                                                    <div>{{ $errors->first('room') }}</div>
                                                </div>
                                            </div>
                                            <fieldset>
                                            <div class="form-row days">
                                                <header class="full-width"><h4> ايام الدورة <i class="fas fa-plus-circle" id='add-more-days' style="color:green; cursor:pointer"></i></h4></header>
                                                <div class="col-sm-4 form-group">
                                                    <label for="course-day-1">يوم 1</label>
                                                    <select class="form-control" id="course-day-1" name="course-day[]" >
                                                        @foreach(\App\Time::days() as $key=>$value)
                                                            <option value="">اختار</option>
                                                            <option value="{{ $key }}">{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                        <span id="test_course-day-1_error"></span>
                                                        <div>{{ $errors->first('day') }}</div>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label for="course-day-1-begin"> بداية المحاضرة</label>
                                                    <select class="form-control" id="course-day-1-begin" name="course-begin[]" >
                                                        <option value="">اختار</option>
                                                        <option value="7">07:00</option>
                                                        <option value="8">08:00</option>
                                                        <option value="9">09:00</option>
                                                        <option value="10">10:00</option>
                                                        <option value="11">11:00</option>
                                                        <option value="12">12:00</option>
                                                        <option value="13">13:00</option>
                                                        <option value="14">14:00</option>
                                                        <option value="15">15:00</option>
                                                        <option value="16">16:00</option>
                                                        <option value="17">17:00</option>
                                                        <option value="18">18:00</option>
                                                        <option value="19">19:00</option>
                                                        <option value="20">20:00</option>
                                                        <option value="21">21:00</option>
                                                        <option value="22">22:00</option>
                                                    </select>
                                                        <span id="test_course-day-1-begin_error"></span>
                                                    <div>{{ $errors->first('begin') }}</div>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label for="course-day-1-end"> نهاية المحاضرة</label>
                                                    <select class="form-control" id="course-day-1-end" name="course-end[]" >
                                                        <option value="">اختار</option>
                                                        <option value="9">09:00</option>
                                                        <option value="10">10:00</option>
                                                        <option value="11">11:00</option>
                                                        <option value="12">12:00</option>
                                                        <option value="13">13:00</option>
                                                        <option value="14">14:00</option>
                                                        <option value="15">15:00</option>
                                                        <option value="16">16:00</option>
                                                        <option value="17">17:00</option>
                                                        <option value="18">18:00</option>
                                                        <option value="19">19:00</option>
                                                        <option value="20">20:00</option>
                                                        <option value="21">21:00</option>
                                                        <option value="22">22:00</option>
                                                        <option value="23">23:00</option>
                                                        <option value="24">24:00</option>
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
            <script type='text/javascript' src="/js/course_group_create_validation.js"></script>

          <script>
            $(function () {
                $('#datetimepicker').datetimepicker({
                timepicker:false,
                format:'Y-m-d'
                });
            })
        </script>
    </body>

    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>
    <script src="{{url('js/jquery.datetimepicker.js')}}"></script>
    <script type='text/javascript' src="{{url('js/createCourse.js')}}"></script>

</html>

