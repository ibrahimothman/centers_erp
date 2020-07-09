{{--<!doctype html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--@include('library')--}}
{{--<!-- style  date picker-->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>--}}
{{--    <!-- style -->--}}
{{--    <link href="/css/financialManagement_style.css" rel="stylesheet"/>--}}
{{--    <title>dept</title>--}}
{{--    <style>--}}

{{--    </style>--}}
{{--</head>--}}
{{--<body id="page-top">--}}

{{--<div id="wrapper">--}}
{{--    @include('sidebar')--}}
{{--    <div id="content-wrapper" class="d-flex flex-column">--}}
{{--        @include('operationBar')--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row d-flex justify-content-center">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="card mb-4 shadowed">--}}
{{--                        <header>--}}
{{--                            <div class="card-header text-primary form-title view-courses-title">--}}
{{--                                <h3>الديون </h3>--}}

{{--                            </div>--}}
{{--                        </header>--}}
{{--                        <div class="card-body">--}}
{{--                            <!-- nav btn-->--}}
{{--                            <ul class="menu">--}}
{{--                                <li><button class="item  btn btn-light px-5"  id="all">الكل</button></li>--}}
{{--                                <li><button class="item btn btn-light "  id="deptStudent" > ديون الطلاب</button></li>--}}
{{--                                <li><button class="item  btn btn-light "  id="dept">الديون</button></li>--}}
{{--                            </ul>--}}
{{--                            <!-- view section 1 -->--}}
{{--                            <div id="section-1">--}}
{{--                                <div class="card border-primary p-3">--}}
{{--                                    <div class="card-header text-primary bg-transparent border-primary ">--}}
{{--                                        <h5>دفع الطلاب</h5>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-body">--}}
{{--                                        <form>--}}
{{--                                            <!-- add row revenues -->--}}
{{--                                            <div class="form-row ">--}}
{{--                                                <div class="col-sm-6  form-group ">--}}
{{--                                                    <label> الاسم  </label>--}}
{{--                                                    <input placeholder="اختار" type="text" id="name" class="form-control" name="nameStudent" list="nameSelect"  />--}}
{{--                                                    <datalist id="nameSelect" >--}}
{{--                                                        <option >احمد</option>--}}
{{--                                                        <option>محمد</option>--}}
{{--                                                    </datalist>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-6 form-group ">--}}
{{--                                                    <label>الكورس /الدبلومه</label>--}}
{{--                                                    <input placeholder="اختار" type="text" id="course" class="form-control" name="course" list="courseSelect"  />--}}
{{--                                                    <datalist id="courseSelect">--}}
{{--                                                        <option >  full stack  (جنيه2000)  </option>--}}
{{--                                                        <option>full stack  (600جنيه) </option>--}}
{{--                                                    </datalist>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-row ">--}}
{{--                                                <div class="col-sm-6  form-group ">--}}
{{--                                                    <label> التكلفه </label><input type="text" name="cost" class="form-control "  id="cost"   >--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-6  form-group ">--}}
{{--                                                    <label> المدفوع  </label><input type="text" name="payIncome" class=" form-control  payIncome"  id="payIncome"   >--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-row ">--}}
{{--                                                <div class="col-sm-6 form-group ">--}}
{{--                                                    <label>الباقي  </label><input type="text" name="noPayIncome" class="form-control "  id="noPayIncome"   >--}}
{{--                                                </div>--}}
{{--                                                <div class="  col-sm-6  form-group ">--}}
{{--                                                    <label>التاريخ </label>--}}
{{--                                                    <input id="datetimepickerstudentdept" name="test_timestudentdept" class="form-control datetimepickerstudentdept"  placeholder="التاريخ "    type="text" >--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <!-- save -->--}}
{{--                                            <div class="form-row save">--}}
{{--                                                <div class="col-sm-6 mx-auto" style="width: 200px;">--}}
{{--                                                    <button class="btn btn-primary action-buttons" type="submit"--}}
{{--                                                            id="submit">حفظ--}}
{{--                                                    </button>--}}
{{--                                                    <button class="btn  btn-danger action-buttons" type="reset"> إلغاء--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                        <!-- end form -->--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <br>--}}
{{--                            <!--  view section 2 -->--}}
{{--                            <div id="section-2">--}}
{{--                                <div class="card border-primary p-3 ">--}}
{{--                                    <div class="card-header text-primary bg-transparent border-primary ">--}}
{{--                                        <h5>تعديل الديون</h5>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-body">--}}
{{--                                        <form>--}}
{{--                                            <!-- add row pill -->--}}
{{--                                            <div class="form-row ">--}}
{{--                                                <div class="col-sm-6  form-group ">--}}
{{--                                                    <label> الفاتوره  </label>--}}
{{--                                                    <input type="text" name="bill" class="form-control "  id="bill"   >--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-6 form-group ">--}}
{{--                                                    <label> المطلوب سداده </label>--}}
{{--                                                    <input type="text" name="money" class="form-control "  id="money"   >--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-row ">--}}
{{--                                                <div class="col-sm-6  form-group ">--}}
{{--                                                    <label> المدفوع  </label>--}}
{{--                                                    <input type="text" name="payOutlay" class=" form-control payOutlay"  id="payOutlay"   >--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-6  form-group ">--}}
{{--                                                    <label>الباقي  </label>--}}
{{--                                                    <input type="text" name="noPay" class="form-control "  id="noPay"   >--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-row ">--}}
{{--                                                <div class="  col-sm-6  form-group ">--}}
{{--                                                    <label>التاريخ </label>--}}
{{--                                                    <input id="datetimepickerdept" name="test_timedept" class="form-control datetimepickerdept"  placeholder="التاريخ "    type="text" >--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <!-- save -->--}}
{{--                                            <div class="form-row save">--}}
{{--                                                <div class="col-sm-6 mx-auto" style="width: 200px;">--}}
{{--                                                    <button class="btn btn-primary action-buttons" type="submit"--}}
{{--                                                            id="submit">حفظ--}}
{{--                                                    </button>--}}
{{--                                                    <button class="btn  btn-danger action-buttons" type="reset"> إلغاء--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                        <!-- end form -->--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- end section 2 -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <br>--}}
{{--                    <!--  end outlay view -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- footer -->--}}
{{--        @include('footer')--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- scroll top -->--}}
{{--@include('scroll_top')--}}
{{--<!-- script-->--}}
{{--@include('script')<!-- date picker script for modal -->--}}
{{--<script src="{{url('js/jquery.datetimepicker.js')}}"></script>--}}
{{--<!-- script style-->--}}
{{--<script type='text/javascript' src="/js/financialManagement.js"></script>--}}

{{--</body>--}}
{{--</html>--}}
