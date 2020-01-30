<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
<!-- style --->
    <link href="/css/diploma_style.css" rel="stylesheet"/>
    <title>Add a diploma group</title>
</head>
<body>
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
                              تعديل تسجيل الدبلومه
                            </div>
                        </header>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for="name">اسم الدبلومة</label>
                                        <select class="form-control" id="" name="name" required>
                                            <option value="">اختار</option>
                                            <option value="full">full stack diploma</option>
                                            <option value="programming">programming diploma</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>قاعة الدبلومة</label>
                                        <select class="form-control" id="" name="room" required>
                                            <option value="">اختار</option>
                                            <option value="1">قاعة رقم 1</option>
                                            <option value="2">قاعة رقم 2</option>
                                            <option value="3">قاعة رقم 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class='col-sm-6 form-group'>
                                        <label> تاريخ بداية الدبلومة</label>
                                        <div class='input-group date'>
                                            <input id="datetimepicker" name="" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>اسم المدرس</label>
                                        <div class="dropdown ">
                                            <button data-toggle="dropdown" class="dropdown-toggle btnInstructor py-1">
                                                اسم المدرس <b class="caret"></b>
                                            </button>
                                            <ul class=" dropdown-menu text-right ">
                                                <li><label class="checkbox"><input type="checkbox" name="check">احمد
                                                        محمد</label>
                                                </li>
                                                <li><label class="checkbox"><input type="checkbox" name="check">محمود
                                                        مصطفي</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="form-row save">
                                    <div class="col-sm-6 mx-auto" style="width: 200px;">
                                        <button class="btn btn-primary action-buttons" type="submit" id="submit"> إضافة
                                            <i class="fas fa-plus"></i></button>
                                        <button class="btn  btn-danger action-buttons" type="reset"> إلغاء <i
                                                    class="fas fa-times"></i></button>
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
<script>
    $(function () {
        $('#datetimepicker').datetimepicker({
            timepicker: false,
            format: 'Y-m-d'
        });
    })
</script>
</body>
</html>
