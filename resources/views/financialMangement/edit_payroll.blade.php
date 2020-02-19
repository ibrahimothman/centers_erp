<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
<!-- style  date picker-->
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>
    <!-- style page -->
    <link href="/css/financialManagement_style.css" rel="stylesheet"/>
    <title>payroll edit</title>
</head>
<body>

<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title view-courses-title">
                                <h3> تعديل المرتبات </h3>
                            </div>
                        </header>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <!-- select date -->
                                    <form>
                                        <div class="form-row ">
                                            <div class="col-sm-6  form-group ">
                                                <label> الاسم </label>
                                                <input placeholder="اختار" type="text" id="nameInstructor" class="form-control" name="nameInstructor" list="nameSelect"  />
                                                <datalist id="nameSelect">
                                                    <option >احمد</option>
                                                    <option>محمد</option>
                                                </datalist>
                                            </div>
                                            <div class="col-sm-6 form-group ">
                                                <label> تصنيف</label>
                                                <select  name="money" class="form-control "  id="type"   >
                                                    <option value=""> اختار</option>
                                                    <option value="">كورس</option>
                                                    <option value=""> ساعه</option>
                                                    <option value="">الشهر</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row ">
                                            <div class="col-sm-6  form-group ">
                                                <label> المرتب </label><input type="text" name="payroll" class="form-control "  id="payroll"   >
                                            </div>
                                            <div class="col-sm-6  form-group ">
                                                <label> المدفوع  </label><input type="text" name="payIncome" class=" form-control  payIncome"  id="payIncome"   >
                                            </div>
                                        </div>
                                        <div class="form-row ">
                                            <div class="col-sm-6 form-group ">
                                                <label>الباقي  </label><input type="text" name="noPayPayroll" class="form-control "  id="noPayPayroll"   >
                                            </div>
                                            <div class="  col-sm-6  form-group ">
                                                <label>التاريخ </label>
                                                <input id="datetimepickerPayrollEdit" name="test_timePayrollEdit" class="form-control datetimepickerPayrollEdit"  placeholder="التاريخ "    type="text" >
                                            </div>
                                        </div>
                                        <!-- save -->
                                        <div class="form-row save">
                                            <div class="col-sm-6 mx-auto" style="width: 200px;">
                                                <button class="btn btn-primary action-buttons" type="submit"
                                                        id="submit">حفظ
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

        <!-- footer -->
        @include('footer')
    </div>
</div>
<!-- script-->
@include('script')
<!-- date picker script for modal -->
<script src="{{url('js/jquery.datetimepicker.js')}}"></script>
<!-- script style-->
<script type='text/javascript' src="/js/financialManagement.js"></script>
</body>
</html>
