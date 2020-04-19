<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
<!-- style-->
    <link rel="stylesheet" href="/css/dashboard.css"/>
    <!-- style  date picker-->
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>
    <!--style multi select-->
    <link rel="stylesheet" href="{{url('css/multiSelect.css')}}">
    <title>report</title>

</head>
<body>
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="card mb-4 border">
                        <header>
                            <div class="card-header text-primary form-title view-courses-title">
                                <h3>تقارير</h3>
                            </div>
                        </header>

                        <div class="card-body">
                            <!-- Courses -->
                            <div class="card mb-4 border p-3">
                                <div class="card-header text-primary form-title view-courses-title bg-transparent">
                                    <h5  >Courses</h5>
                                    <div>
                                    <div   class="btn-group print-btn d-inline-block">
                                        <button type="button" class="btn btn-success float-right " data-toggle="modal" data-target="#formDateCourse">اختيار مده محدده</button>
                                    </div>
                                    <div class="dropdown d-inline-block mx-2 border border-primary">
                                        <button data-toggle="dropdown" class=" btn  dropdown-toggle py-1">
                                            اختيار القسم
                                        </button>
                                        <ul class=" dropdown-menu text-right">
                                            <li><label class="checkbox"><input type="checkbox">web</label></li>
                                            <li><label class="checkbox"><input type="checkbox">english</label></li>
                                        </ul>
                                    </div>
                                </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="state  diploma yellow">
                                                <i class="fas fa-book-open pr-2"></i>
                                                <div class="row hideSM">
                                                    <div class="col-sm-6">
                                                        <span>10</span>
                                                        <span>active</span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <span>10</span>
                                                        <span>completed</span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div>
                                                    <b>3</b>
                                                    <span> جميع الدبلومات</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="state course Purple">

                                                <i class="fas fa-book-open pr-2"></i>
                                                <div class="row hideSM">
                                                    <div class="col-sm-6">
                                                        <span>10</span>
                                                        <span>active</span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <span>10</span>
                                                        <span>completed</span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div>
                                                    <b>6</b>
                                                    <span> جميع الكورسات</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="state test foshia ">
                                                <i class="fas fa-file-alt pr-2"></i>
                                                <div class="row hideSM">
                                                    <div class="col-sm-6">
                                                        <span>10</span>
                                                        <span>active</span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <span>10</span>
                                                        <span>completed</span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div>
                                                    <b>4</b>
                                                    <span>جميع الامتحانات</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- student -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card mb-4 border p-3">
                                        <div class="card-header text-primary form-title view-logos-title bg-transparent">
                                                <h5>Student</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4 my-1">
                                                    <input type="text" list="courses"class="form-control border-primary" placeholder=" كورس">
                                                    <datalist id="courses">
                                                        <option>front</option>
                                                    </datalist>
                                                </div>
                                                <div class="col-sm-4  my-1">
                                                    <input type="text" list="diploma" class="form-control border-primary" placeholder="دبلومه">
                                                    <datalist id="diploma">
                                                        <option>front</option>
                                                    </datalist>
                                                </div>
                                                <div class="col-sm-2 my-1">
                                                    <div   class=" btn-group print-btn">
                                                        <button type="button" class="btn btn-primary  " data-toggle="modal" data-target="#formDateStudent"> مده</button>
                                                    </div>
                                                </div>
                                            </div>
                                                    <div class="state student pink">
                                                        <i class="fas fa-users"></i>
                                                        <div class="row hideSM">
                                                            <div class="col-sm-6">
                                                                <span>10</span>
                                                                <span>active</span>
                                                            </div>
                                                            <div class="col-sm-6 ">
                                                                <span>10</span>
                                                                <span>old</span>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div>
                                                            <b>20</b>
                                                            <span class="pb-2">جميع الطلاب</span>
                                                        </div>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <!-- Instructors -->
                                    <div class="card mb-4 border p-3">
                                        <header>
                                            <div class="card-header  text-primary form-title view-logos-title bg-transparent">
                                                <h5>Instructors</h5>
                                            </div>
                                        </header>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4 my-1">
                                                    <input type="text" list="courses"class="form-control border-primary" placeholder=" كورس">
                                                    <datalist id="courses">
                                                        <option>front</option>
                                                    </datalist>
                                                </div>
                                                    <div class="col-sm-4 my-1">
                                                        <input type="text" list="diploma" class="form-control border-primary" placeholder="دبلومه">
                                                        <datalist id="diploma">
                                                            <option>front</option>
                                                        </datalist>
                                                    </div>
                                                <div class="col-sm-2 my-1">
                                                    <div   class=" btn-group print-btn">
                                                        <button type="button" class="btn btn-primary  " data-toggle="modal" data-target="#formDateInstructor"> مده</button>
                                                    </div>
                                                </div>

                                            </div>
                                                    <div class="state instructors red ">
                                                        <i class="fas fa-chalkboard-teacher pr-2"></i>
                                                        <div class="row hideSM">
                                                            <div class="col-sm-6">
                                                                <span>10</span>
                                                                <span>active</span>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <span>10</span>
                                                                <span>old</span>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div>
                                                            <b>1</b>
                                                            <span> جميع المدربين</span>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                            </div>

                        <!-- structure -->
                            <div class="card mb-4  border p-3">
                                <header>
                                    <div class="card-header text-primary form-title view-logos-title bg-transparent ">
                                        <h5>Structure</h5>
                                    </div>
                                </header>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="state  green ">
                                                        <i class="fas fa-briefcase"></i>

                                                    <div>
                                                        <b>2</b>
                                                        <span>الموظفين</span>
                                                    </div>
                                        </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="state deeppink ">
                                                <i class="fas fa-school"></i>
                                                <div>
                                                    <b>5</b>
                                                    <span>الغرف</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="state orange ">
                                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                <div>
                                                    <b>5</b>
                                                    <span>الاقسام</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    <!-- rating -->
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card mb-4 border p-3">
                                <div class="card-header  text-primary form-title  bg-transparent">
                                    <h4>Best courses</h4>
                                </div>
                                            <div class="card-body">
                                              <div class="row">
                                                  <div class="col-lg-4 text-center  best">
                                                          <i class="fas fa-book-open pr-2"></i>
                                                      <h5 class="text-primary">name course</h5>
                                                      <span class="text-secondary">50 course</span>
                                                  </div>
                                                  <div class="col-lg-4 text-center  best">
                                                      <i class="fas fa-book-open pr-2"></i>
                                                      <h5 class="text-primary">name course</h5>
                                                      <span class="text-secondary">50 course</span>
                                                  </div>

                                                  <div class="col-lg-4 text-center  best">
                                                      <i class="fas fa-book-open pr-2"></i>
                                                      <h5 class="text-primary">name course</h5>
                                                      <span class="text-secondary">50 course</span>
                                                  </div>


                                              </div>
                                            </div>
                        </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Instructors -->
                            <div class="card mb-4 border">
                                    <!-- SOCIAL COUNTER START -->
                                    <div class="social-counter">

                                        <a class="count facebook" href="#">
                                            <div class="icon"><i class="fab fa-facebook" aria-hidden="true"></i></div>
                                            <p><span>34.2k</span> likes</p>
                                        </a>
                                        <a class="count twitter" href="#">
                                            <div class="icon"><i class="fab fa-twitter" aria-hidden="true"></i></div>
                                            <p><span>34.2k</span> likes</p>

                                        </a>
                                        <a class="count linked" href="#">
                                            <div class="icon"><i class="fab fa-linkedin" aria-hidden="true"></i></div>
                                            <p><span>34.2k</span> likes</p>
                                        </a>

                                    </div>
                            </div>
                        </div>
                    </div>
                        </div><!--  end card body-->
                    </div><!-- end card -->
                    <br>
                </div>
            </div>
        </div>
        <!-- footer -->
        @include('footer')
    </div>
</div>

<!-- modal form course -->
<div class="modal fade" id="formDateCourse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog form-dark" role="document">
        <!--Content-->
        <div class="modal-content card card-image">
            <div class="text-white rgba-stylish-strong py-2 px-2 z-depth-4">
                <!--Header-->
                <div class="modal-header text-center pb-4">
                    <h3 class="modal-title w-100 text-primary font-weight-bold" id="myModalLabel">تحديد المده
                    </h3>
                    <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <!--Body-->
                    <form id="date_form" >
                        <div class="form-row">
                            <label class="text-primary">من يوم</label>
                            <div class='input-group date'>
                                <input id="datetimepickerModal1" name="start_date"  class="form-control" type="text">

                            </div>
                        </div>
                        <div class="form-row">
                            <label class="text-primary">الي يوم</label>
                            <div class='input-group date'>
                                <input id="datetimepickerModal2" name = "end_date" class="form-control" type="text">

                            </div>
                        </div>
                        <br>
                        <div class="form-row save">
                            <div class="col-lg-6 mx-auto" style="width: 200px;">
                                <button class="btn btn-primary action-buttons" type="submit" id="submit">حساب
                                </button>
                                <button class="btn  btn-danger action-buttons" type="reset"> إلغاء
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- end modal form -->


    <!-- modal form student -->
    <div class="modal fade" id="formDateStudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog form-dark" role="document">
            <!--Content-->
            <div class="modal-content card card-image">
                <div class="text-white rgba-stylish-strong py-2 px-2 z-depth-4">
                    <!--Header-->
                    <div class="modal-header text-center pb-4">
                        <h3 class="modal-title w-100 text-primary font-weight-bold" id="myModalLabel">تحديد المده
                        </h3>
                        <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--Body-->
                    <div class="modal-body">
                        <!--Body-->
                        <form id="date_form" >
                            <div class="form-row">
                                <label class="text-primary">من يوم</label>
                                <div class='input-group date'>
                                    <input id="datetimepickerModal1" name="start_date"  class="form-control" type="text">

                                </div>
                            </div>
                            <div class="form-row">
                                <label class="text-primary">الي يوم</label>
                                <div class='input-group date'>
                                    <input id="datetimepickerModal2" name = "end_date" class="form-control" type="text">

                                </div>
                            </div>
                            <br>
                            <div class="form-row save">
                                <div class="col-lg-6 mx-auto" style="width: 200px;">
                                    <button class="btn btn-primary action-buttons" type="submit" id="submit">حساب
                                    </button>
                                    <button class="btn  btn-danger action-buttons" type="reset"> إلغاء
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- end modal form -->

    <!-- modal form instructor -->
    <div class="modal fade" id="formDateInstructor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog form-dark" role="document">
            <!--Content-->
            <div class="modal-content card card-image">
                <div class="text-white rgba-stylish-strong py-2 px-2 z-depth-4">
                    <!--Header-->
                    <div class="modal-header text-center pb-4">
                        <h3 class="modal-title w-100 text-primary font-weight-bold" id="myModalLabel">تحديد المده
                        </h3>
                        <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--Body-->
                    <div class="modal-body">
                        <!--Body-->
                        <form id="date_form" >
                            <div class="form-row">
                                <label class="text-primary">من يوم</label>
                                <div class='input-group date'>
                                    <input id="datetimepickerModal1" name="start_date"  class="form-control" type="text">

                                </div>
                            </div>
                            <div class="form-row">
                                <label class="text-primary">الي يوم</label>
                                <div class='input-group date'>
                                    <input id="datetimepickerModal2" name = "end_date" class="form-control" type="text">

                                </div>
                            </div>
                            <br>
                            <div class="form-row save">
                                <div class="col-lg-6 mx-auto" style="width: 200px;">
                                    <button class="btn btn-primary action-buttons" type="submit" id="submit">حساب
                                    </button>
                                    <button class="btn  btn-danger action-buttons" type="reset"> إلغاء
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- end modal form -->
<!-- script-->
@include('script')
<!-- date picker script for modal -->
<script src="{{url('js/jquery.datetimepicker.js')}}"></script>
<script>
    // date picker modal
    $(function () {
        $('#datetimepickerModal1').datetimepicker({
            timepicker:false,
            format:'Y-m-d'
        });
    });
    $(function () {
        $('#datetimepickerModal2').datetimepicker({
            timepicker:false,
            format:'Y-m-d'
        });
    });
</script>
</body>
</html>
