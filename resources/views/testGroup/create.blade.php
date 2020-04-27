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
                        <div class="card mb-4">
                            <div class="card-header text-primary"> تسجيل الامتحان </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('test-groups.store') }}" class="needs-validation"  id="testGroupCreate">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <label class="s" for="test-options"> اسم الامتحان </label>
                                            <select id="test-options" name="test_id" class="form-control" id="exampleFormControlSelect1">
                                                <option value="0">اختار</option>
                                                @foreach($allTests as $test)
                                                    <option value="{{ $test->id }}" {{ $test->id == $selected_test->id? 'selected': '' }}>{{ $test->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group clearfix "> <br>
                                            <input type='button' class="btn btn-outline-success float-right" value=' + اضافه ميعاد ' id='addButton'  name="add" />
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="form-row ">
                                            <div class="col-sm-6 col-md-2 form-group" id="form-group">
                                                <label for="validationCustom01">   تاريخ الامتحان</label>'
                                                <div class="input-group-append">
                                                    <input value="2020-05-01" id="date-1" name="test_time[1][date]" class="form-control datetimepicker"  placeholder="تاريخ الامتحان"    type="text" >
                                                    <span class="fas fa-calendar-alt input-group-text start_date_calendar" aria-hidden="true "></span>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-2 form-group" id="form-group">
                                                <label for="test_time[1][begin]">  البدايه  </label>
                                                <select name="test_time[1][begin]" class="form-control begins "  id="begin-1">
                                                    <option value="0">اختر ميعادا</option>
                                                    @foreach($begins as $begin)
                                                        <option value="{{ $begin }}">{{ $begin }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-sm-6 col-md-2 form-group" id="form-group">
                                                <label for="test_time[1][end]">  النهايه  </label>
                                                <select  name="test_time[1][end]" class="form-control "  id="end-1"></select>
                                            </div>

                                            <div class="col-sm-6 col-md-2 form-group" id="form-group">
                                                <label for="test_time[1][room]">  الغرفه  </label>
                                                <select name="test_time[1][room]" class="form-control "  id="room-1"></select>
                                            </div>

                                            <div class="col-sm-6 col-md-1 form-group" id="form-group">
                                                <label for="test_time[1][seats]">  عدد المقاعد  </label>
                                                <input type="number" name="test_time[1][seats]" class="form-control char"  id="seat-1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row save">
                                        <div class="col-sm-6  ml-auto form-group">
                                            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> حفظ</button>
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

<script>
    $(function () {
        $('.begins').each(function (index, row) {
            console.log('asd');
            for (var i = 1; i < '{{ count($begins) }}'; i++) {
                $(this).append($("<option>").text(i).val(i));
            }
        });
    })
</script>
</body>
</html>
