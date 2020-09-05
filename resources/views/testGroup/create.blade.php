<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS & js -->
    @include('library')
    <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    -->
    <link href="{{url('employee')}}" rel="stylesheet">
    <title>test-time-add</title>
</head>

<body id="page-top">
<link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>
<script src="{{url('js/jquery.datetimepicker.js')}}"></script>
<!-- Page Wrapper -->
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
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                        <div class="card mb-4">
                            <div class="card-header text-primary"> تسجيل الامتحان </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('test-groups.store') }}" class="needs-validation"  id="testGroupCreate">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <label class="s" for="test-options"> اسم الامتحان </label>
                                            <select id="test-options" name="test_id" class="form-control required" id="exampleFormControlSelect1">
                                                <option value="0">اختار</option>
                                                @foreach($allTests as $test)
                                                    <option value="{{ $test->id }}" {{ $test->id == $selected_test->id? 'selected': '' }}>{{ $test->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group clearfix mr-0 "> <br>
                                            <input type='button' class="btn btn-outline-success float-right" value=' + اضافه ميعاد ' id='addButton'  name="add" />
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="form-row ">
                                            <div class="col-sm-6 col-md-2 form-group" id="form-group">
                                                <label for="validationCustom01">   تاريخ الامتحان</label>'
                                                <div class="input-group-append">
                                                    <input autocomplete="off"  id="date-1" name="groups[1][date][day]" class="form-control datetimepicker required"  placeholder="تاريخ الامتحان"    type="text" >
                                                    <span class="fas fa-calendar-alt input-group-text start_date_calendar" aria-hidden="true "></span>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-2 form-group" id="form-group">
                                                <label for="test_time[1][begin]">  البدايه  </label>
                                                <select name="groups[1][date][begin]" class="form-control times required"  id="begin-1">
                                                </select>
                                            </div>

                                            <div class="col-sm-6 col-md-2 form-group" id="form-group">
                                                <label for="test_time[1][end]">  النهايه  </label>
                                                <select  name="groups[1][date][end]" class="form-control times required"  id="end-1"></select>
                                            </div>

                                            <div class="col-sm-6 col-md-2 form-group" id="form-group">
                                                <label for="test_time[1][room]">  الغرفه  </label>
                                                <select name="groups[1][room]" class="form-control required"  id="room-1"></select>
                                            </div>

                                            <div class="col-sm-6 col-md-1 form-group" id="form-group">
                                                <label for="test_time[1][seats]">  عدد المقاعد  </label>
                                                <input type="number" name="groups[1][available_chairs]" class="form-control char required"  id="seat-1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row save">
                                        <div class="col-sm-6  ml-auto form-group">
                                            <button id="submit" class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> حفظ</button>
                                            <button class="btn  btn-danger" type="reset"><i class="glyphicon glyphicon-repeat"></i> الغاء</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- /.container-fluid -->
                    </div>
                </div>
            </div>
                <!-- End of Main Content -->
        </div>
                <!-- Footer -->
            @include('footer')
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>


        <!-- End of Page Wrapper -->
<!-- scroll top -->
@include('scroll_top')
        <!-- script-->
    @include('script')
<script src="{{url('js/jquery.min.js')}}"></script>
    <!-- client side validation plugin -->
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page  -->
<script type='text/javascript' src="{{asset("js/testGroup_create_validation.js")}}"></script>

<script type="text/javascript" src="{{ asset('js/createTestGroup.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>
<script src="{{url('js/jquery.datetimepicker.js')}}"></script>


</body>
</html>

<script>
    $(function () {
        $(".datetimepicker").datetimepicker({
            timepicker:false,
            format:'Y-m-d'
        });
    })



    $('#submit').on('click', function (e) {
        console.log($( "#test-options option:selected" ).val() == 0);
        if ($('.required').filter(function () {
            return $.trim($(this).val()).length == 0;
        }).length !== 0 || $( "#test-options option:selected" ).val() == 0) {
            e.preventDefault();
            alert('Please enter all data');
        }
    });


</script>


