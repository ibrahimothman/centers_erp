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
    <style>

        .error {
            color: #b60000;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
        }
        </style>
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
                                <form method="post" action="{{ route('test-groups.store') }}" class="needs-validation"  id="testGroupCreate" novalidate>
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <label for="validationCustom01"> اسم الامتحان </label>
                                            <input type="text" name="testName" value="{{$testName}}"  class="form-control" placeholder="اختار الامتحان"
                                                   id="validationCustom01" list="test" autocomplete="off"/>
                                            <datalist id="test">
                                                <select name="testt" onchange="onOptionSelected()">
                                                    @foreach($tests as $test)
                                                        <option  >{{$test->name}}</option>
                                                    @endforeach
                                                </select>
                                            </datalist>
                                        </div>
                                        <div class="col-md-6 form-group clearfix "> <br>
                                            <input type='button' class="btn btn-outline-success float-right" value=' + اضافه ميعاد ' id='addButton'  name="add" />
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="form-row ">
                                            <div class="col-sm-6 form-group" id="form-group"> </div>
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

        <!-- script-->
    @include('script')
    <!-- client side validation plugin -->
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page  -->
<script type='text/javascript' src="/js/testGroup_create_validation.js"></script>

        <script>

            $('input#addButton').on('click', function() {
                var id = ($('.field .form-row').length + 1).toString();
                $('.field').append(' <div class="form-row "> <div class="col-sm-6 form-group" "><label for="validationCustom01">   تاريخ الامتحان</label><div class="input-group-append"> <input id="datetimepicker' +id+'" name="test_time'+id+'" class="form-control datetimepicker"  placeholder="تاريخ الامتحان"    type="text" ><span class="fas fa-calendar-alt input-group-text start_date_calendar" aria-hidden="true "></span> </div></div><div class="col-sm-3 form-group "><label for="validationCustom01">  عدد المقاعد  </label><input type="number" name="seat'+id+'" class="form-control char"  id="seat'+id+'"   style="width: 100px" ></div></div></div>');
                $(".datetimepicker").datetimepicker();
            });

        </script>
        <script>
            function onOptionSelected() {
            }
        </script>

</body>
</html>
