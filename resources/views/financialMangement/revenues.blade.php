<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
    <!-- style  date picker-->
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>
    <!-- style page -->
    <link href="/css/financialManagement_style.css" rel="stylesheet"/>
    <title>income</title>
</head>
<body id="page-top">

<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title view-courses-title">
                                <h3>الايرادات </h3>
                            </div>
                        </header>
                        <div class="card-body">
                            <!-- view section 1 -->
                            <div id="section-1">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- select date -->
                                        <form>
                                            <div class="row title form-group">
                                                <!-- date -->
                                                <div class="  col-sm-6 title pb-3">
                                                    <h5 class="text-primary  pt-1 pr-3 pl-0">التاريخ: </h5>
                                                        <input id="datetimepickerRevenues" name="test_timeRevenues" class="form-control datetimepickerRevenues"  placeholder="التاريخ "    type="text" >
                                                    </div>
                                                <!-- add pill -->
                                                <div  class="form-group   mr-3  ">
                                                    <input type='button' class="btn btn-success  "
                                                           value=' + اضافه طالب ' id='addButtonIncome' name="addIncome"/>
                                                </div>
                                            </div>
                                            <BR>
                                            <!-- end -->
                                            <!-- add row pill -->
                                            <div class="fieldIncome">
                                                <div class="form-row ">
                                                    <div class="col-lg-3 col-sm-4 form-group ">
                                                        <label> الاسم  </label>
                                                        <input placeholder="اختار" type="text" id="name" class="form-control" name="nameStudent" list="nameSelect"  />
                                                        <datalist id="nameSelect">
                                                            <option >احمد</option>
                                                            <option>محمد</option>
                                                        </datalist>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-4 form-group ">
                                                        <label>الكورس /الدبلومه</label>
                                                            <input placeholder="اختار" type="text" id="course" class="form-control" name="course" list="courseSelect"  />
                                                            <datalist id="courseSelect">
                                                                <option >  full stack  (جنيه2000)  </option>
                                                                <option>full stack  (600جنيه) </option>
                                                            </datalist>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 form-group ">
                                                        <label> التكلفه </label><input type="text" name="cost" class="form-control "  id="cost"   >
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 form-group ">
                                                        <label> المدفوع  </label><input type="text" name="payIncome" class=" form-control  payIncome"  id="payIncome"   >
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 form-group ">
                                                        <label>الباقي  </label><input type="text" name="noPayIncome" class="form-control "  id="noPayIncome"   >
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end -->
                                            <hr class=" border-primary">
                                           <!-- sum -->
                                            <div class="row form-group">
                                                <h5 class="text-warning ">الايردات: </h5>
                                                <div class="col-sm-4">
                                                    <input type="number" name="sumIncome" id="sumIncome"  class="form-control"  readonly />
                                                </div>
                                            </div>
                                            <!-- save -->
                                            <div class="form-row save">
                                                <div class="col-sm-6 mx-auto" style="width: 200px;">
                                                    <button class="btn btn-primary action-buttons" type="submit"
                                                            id="submit"> إضافة
                                                    </button>
                                                    <button class="btn  btn-danger action-buttons" type="reset"> إلغاء
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- end form -->
                                    </div>
                                </div>
                            </div>
                            <br>

                        </div>
                    </div>
                    <br>
                    <!--  end revenues view -->
                </div>
            </div>
        </div>
        <!-- footer -->
        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
<!-- date picker script -->
<script src="{{url('js/jquery.datetimepicker.js')}}"></script>
<!-- script style-->
<script type='text/javascript' src="/js/financialManagement.js"></script>
</body>
</html>
