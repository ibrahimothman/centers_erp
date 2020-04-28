<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('library')
    <title>update diploma group</title>

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
                                تعديل معلومات الدورة
                            </div>
                        </header>
                        <div class="card-body">
                            <form action="{{ route('diploma-groups.update', $diplomaGroup->id) }}" method="post" enctype="multipart/form-data" id="courseGroupCreate">
                                @csrf
                                @method('put')
                                <div class="form-row ">

                                    <div class='col-sm-6 form-group'>
                                        <label for="validationCustom01">   تاريخ بداية الدورة</label>
                                        <span class="required">*</span>
                                        <div class='input-group date'>
                                            <input value="{{ $diplomaGroup->starts_at }}"   id="datetimepicker" name="starts_at"  class="form-control" type="text" >                                                            <span class="input-group-addon">
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
                                            <input value="{{ $diplomaGroup->available_chairs }}"   id="available_chairs" name="available_chairs"  class="form-control" type="number" >
                                        </div>
                                        <div class="addError" ></div>
                                        <div>{{ $errors->first('available_chairs') }}</div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-sm-6 form-group">
                                        <label for="course">الدبلومه</label>
                                        <input class="form-control" id="selected_diploma"  value="{{ $diplomaGroup->diploma->name }}" readonly>
                                        <input hidden name="diploma" value="{{ $diplomaGroup->diploma_id }}" readonly>
                                    </div>

                                    <div class="col-sm-6 form-group">
                                        <label for="validationCustom01">اختر المدرس</label>
                                        <select class="form-control" id="instructor-options" name="instructor_id">
                                            @foreach($instructors as $instructor)
                                                <option value="{{ $instructor->id }}" {{ $instructor->id == $diplomaGroup->instructor_id? 'selected' : '' }}>{{ $instructor->nameAr }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <fieldset>
                                    <div class="form-row days">
                                        <header class="full-width"><h4> ايام الدورة <i class="fas fa-plus-circle" id='add-more-days' onclick="" style="color:green; cursor:pointer"></i></h4></header>
                                        @php($i = 1)
                                        @foreach($diplomaGroup->times as $time)
                                            <div class="col-sm-3 form-group {{ $i > 1? 'extra_time' : ''}}">
                                                <label for="validationCustom01">   اختر اليوم</label>
                                                <div class='input-group date'>

                                                    <input id="diploma-day-1" name="diploma-days[]" onclick="onDayClicked(1)" value="{{ $time->day }}" class="form-control" type="text" >
                                                    <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                    <div>{{ $errors->first('diploma-days.0') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group {{ $i > 1? 'extra_time' : ''}}">
                                                <label for="diploma-day-1-begin"> بداية المحاضرة</label>
                                                <select class="form-control" id="diploma-day-begin-1" name="diploma-begins[]">
                                                    <option value="{{ $time->begin }}">{{ $time->begin }}</option>
                                                </select>
                                                <span id="test_course-day-1-end_error"></span>
                                                <div>{{ $errors->first('diploma-begins.0') }}</div>
                                            </div>

                                            <div class="col-sm-3 form-group {{ $i > 1? 'extra_time' : ''}}">
                                                <label for="diploma-day-1-end"> نهاية المحاضرة</label>
                                                <select class="form-control" id="diploma-day-end-1" name="diploma-ends[]">
                                                    <option value="{{ $time->end }}">{{ $time->end }}</option>
                                                </select>
                                                <span id="test_course-day-1-end_error"></span>
                                                <div>{{ $errors->first('diploma-ends.0') }}</div>
                                            </div>

                                            <div class="col-sm-3 form-group {{ $i > 1? 'extra_time' : ''}}">
                                                <label for="validationCustom01">اختر الغرفه</label>
                                                <select class="form-control" id="diploma-room-1" name="diploma-rooms[]">
                                                    <option value="{{ $time->pivot->room_id }}">{{ App\Room::findOrFail($time->pivot->room_id)->name }}</option>
                                                </select>
                                            </div>
                                            @php($i++)
                                        @endforeach


                                    </div>
                                </fieldset>
                                <div class="form-row save">

                                    <div class="col-sm-6 mx-auto" style="width: 200px;">
                                        <hr/>
                                        <button class="btn btn-primary action-buttons" type="submit" id="submit"> تعديل  <i class="fas fa-plus"></i></button>
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

