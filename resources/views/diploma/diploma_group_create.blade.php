<!doctype html>

    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            @include('library')
            <title>Add a diploma group</title>

        </head>
        <body id="page-top">
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
                            <div class="col-lg-10">
                                <div class="card mb-4 shadowed">
                                    <header>
                                        <div class="card-header text-primary form-title">
                                        إضافة معلومات مجموعة الدورة
                                       </div>
                                    </header>
                                    <div class="card-body">
                                        <form action="{{ route('diploma-groups.store') }}" method="post" enctype="multipart/form-data" id="courseGroupCreate">
                                            @csrf

                                            <div class="form-row ">

                                                <div class='col-sm-6 form-group'>
                                                    <label for="validationCustom01">   تاريخ بداية الدورة</label>
                                                        <span class="required">*</span>
                                                        <div class='input-group date'>
                                                            <input   id="datetimepicker" name="starts_at"  class="form-control" type="text" >                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>

                                                        </div>
                                                    <div class="addError" ></div>
                                                    <div>{{ $errors->first('starts_at') }}</div>
                                                </div>

                                                <div class='col-sm-6 form-group'>
                                                    <label for="validationCustom01">عدد المقاعد المتاحه</label>
                                                    <span class="required">*</span>
                                                    <div class='input-group '>
                                                        <input   id="available_chairs" name="available_chairs"  class="form-control" type="number" >                                                            <span class="input-group-addon">
                                                            </span>
                                                    </div>
                                                    <div class="addError" ></div>
                                                    <div>{{ $errors->first('available_chairs') }}</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-sm-6 form-group">
                                                    <label for="course">اختار الدبلومه</label>
                                                    <span class="required">*</span>
                                                    <select class="form-control" name="diploma"  id="selected_diploma" >
                                                        <option value="">اختر</option>
                                                        @foreach($diplomas as $diploma)
                                                            <option data-extra="{{ $diploma }}" value="{{ $diploma->id }}">{{ $diploma->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="test_course-teacher_error"></span>
                                                    <div>{{ $errors->first('diploma') }}</div>
                                                </div>

                                                <div class="col-sm-6 form-group">
                                                    <label for="validationCustom01">اختر المدرس</label>
                                                    <select class="form-control" id="instructor-options" name="instructor_id">
                                                    </select>
                                                </div>

                                            </div>
                                            <fieldset>
                                            <div class="form-row days">
                                                <header class="full-width"><h4> ايام الدورة <i class="fas fa-plus-circle" id='add-more-days' onclick="" style="color:green; cursor:pointer"></i></h4></header>
                                                <div class="col-sm-3 form-group">
                                                    <label for="validationCustom01">   اختر اليوم</label>
                                                    <div class='input-group date'>

                                                        <input id="diploma-day-1" name="diploma-days[]" onclick="onDayClicked(1)"  class="form-control" type="text" >
                                                        <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                        <div>{{ $errors->first('diploma-days.0') }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label for="diploma-day-1-begin"> بداية المحاضرة</label>
                                                    <select class="form-control" id="diploma-day-begin-1" name="diploma-begins[]"
                                                            >

                                                    </select>
                                                    <span id="test_course-day-1-end_error"></span>
                                                    <div>{{ $errors->first('diploma-begins.0') }}</div>
                                                </div>

                                                <div class="col-sm-3 form-group">
                                                    <label for="diploma-day-1-end"> نهاية المحاضرة</label>
                                                    <select class="form-control" id="diploma-day-end-1" name="diploma-ends[]"
                                                            >

                                                    </select>
                                                        <span id="test_course-day-1-end_error"></span>
                                                    <div>{{ $errors->first('diploma-ends.0') }}</div>
                                                </div>

                                                <div class="col-sm-3 form-group">
                                                    <label for="validationCustom01">اختر الغرفه</label>
                                                    <select class="form-control" id="diploma-room-1" name="diploma-rooms[]"
                                                            >

                                                    </select>
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

            <!-- scroll top -->
            @include('scroll_top')
<!-- script -->
            @include('script')
            <script src="{{url('js/jquery.min.js')}}"></script>
            <!-- client side validation plugin -->
            <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
            <!-- client side validation page -->
            <script type='text/javascript' src="{{url("js/course_group_create_validation.js")}}"></script>
            <script type='text/javascript' src="{{url("js/create_diploma_group.js")}}"></script>

          <script>
            $(function () {
                $('#datetimepicker').datetimepicker({
                    timepicker:false,
                    format:'Y-m-d'
                });
            });
             // let number = 1;

             function onDayClicked(num) {
                 $('#diploma-day-'+num).datetimepicker({
                     timepicker:false,
                     format:'Y-m-d',
                 });
             }

        </script>
    </body>

    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>
    <script src="{{url('js/jquery.datetimepicker.js')}}"></script>
    <script type='text/javascript' src="{{url('js/createCourse.js')}}"></script>

</html>

