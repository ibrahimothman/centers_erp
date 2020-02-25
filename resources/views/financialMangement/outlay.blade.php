<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
    <!-- style -->
    <link href="/css/financialManagement_style.css" rel="stylesheet"/>
    <title>expenses</title>
    <style>

    </style>
</head>
<body>

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
                                <h3>المصروفات </h3>

                            </div>
                        </header>
                        <div class="card-body">
                            <!-- nav btn-->
                            <ul class="menu">
                                <li><button class="item  btn btn-light px-5"  id="all">الكل</button></li>
                                <li><button class="item btn btn-light "  id="outlay" > المصروفات </button></li>
                                <li><button class="item  btn btn-light "  id="payroll">الرواتب</button></li>
                            </ul>
                            <!-- view section 1 -->
                            <div id="section-1">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- select date -->
                                        <form>
                                        <div class="row">
                                            <div class=" col">
                                        <!-- add pill -->
                                                <input type='button' class="btn btn-success  "
                                                       value=' + اضافه فاتوره ' id='addButton' name="add"/>
                                        </div>
                                        </div>
                                          <br>
                                        <!-- end -->
                                        <!-- add row pill -->
                                        <div class="field">
                                            <div class="form-row ">
                                                <div class="col-lg-3 col-sm-6  form-group">
                                                    <label for="validationCustom01"> التاريخ</label>
                                                    <input type="date" id="dateOutlay" name="dateOutlay" class="form-control dateOutlay">
                                                   </div>
                                                <div class="col-lg-3 col-sm-6 form-group ">
                                                    <label> الفاتوره  </label><input type="text" name="bill" class="form-control "  id="bill"   >
                                                </div>
                                                <div class="col-lg-3 col-sm-4 form-group ">
                                                    <label> المطلوب سداده </label><input type="text" name="money" class="form-control "  id="money"   >
                                                </div>
                                                <div class="col-lg-2 col-sm-4 form-group ">
                                                    <label> المدفوع  </label><input type="text" name="payOutlay" class=" form-control payOutlay"  id="payOutlay"   >
                                                </div>
                                                <div class="col-lg-1 col-sm-4 form-group ">
                                                    <label>الباقي  </label><input type="text" name="noPay" class="form-control "  id="noPay"   >
                                                </div>

                                            </div>
                                        </div>
                                        <!-- end -->
                                        <hr class=" border-primary">
                                            <!-- sum -->
                                            <div class="row form-group">
                                                <h5 class="text-warning ">المصروفات: </h5>
                                                <div class="col-sm-4">
                                                    <input type="number" name="sumOutlay" id="sumOutlay"  class="form-control"  readonly />
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
                            <!--  view section 2 -->
                            <div id="section-2">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- select date -->
                                        <form>
                                            <div class="row">
                                                <div class=" col">
                                                    <!-- add pill -->
                                                    <div>
                                                        <input type='button' class="btn btn-success  "
                                                               value=' + اضافه مرتب' id='addButtonPayroll' name="addPayoll"/>
                                                    </div>
                                                </div>
                                            </div>
                                        <br>
                                            <!-- end -->
                                            <!-- add row pill -->
                                            <div class="fieldPayroll">
                                                <div class="form-row ">
                                                    <div class="col-lg-3 col-sm-4 form-group">
                                                        <label > التاريخ</label>
                                                        <input type="date" id="datePayroll" name="datePayroll" class="form-control datePayroll">
                                                       </div>
                                                    <div class="col-lg-2 col-sm-4 form-group ">
                                                        <label> الاسم </label>
                                                        <input placeholder="اختار" type="text" id="nameInstructor" class="form-control" name="nameInstructor" list="nameSelect"  />
                                                        <datalist id="nameSelect">
                                                            <option >احمد</option>
                                                            <option>محمد</option>
                                                        </datalist>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 form-group ">
                                                        <label> تصنيف</label>
                                                        <select  name="money" class="form-control "  id="type"   >
                                                            <option value=""> اختار</option>
                                                            <option value="">كورس</option>
                                                            <option value=""> ساعه</option>
                                                            <option value="">الشهر</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 form-group ">
                                                        <label> المرتب </label><input type="text" name="payroll" class="form-control "  id="payroll"   >
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 form-group ">
                                                        <label> المدفوع  </label><input type="text" name="payPayroll" class=" form-control payPayroll "  id="payPayroll"   >
                                                    </div>
                                                    <div class="col-lg-1 col-sm-4 form-group ">
                                                        <label>الباقي  </label><input type="text" name="noPayPayroll" class="form-control "  id="noPayPayroll"   >
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- end -->
                                            <hr class=" border-primary">
                                            <!-- sum -->
                                            <div class="row form-group">
                                                <h5 class="text-warning ">المرتبات: </h5>
                                                <div class="col-sm-4">
                                                    <input type="number" name="sumPayroll" id="sumPayroll"  class="form-control"  readonly />
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
                            <!-- end section 2 -->
                        </div>
                    </div>
                    <br>
                    <!--  end outlay view -->
                </div>
            </div>
        </div>
        <!-- footer -->
        @include('footer')
    </div>
</div>
<!-- script-->
@include('script')
<!-- script style-->
<script type='text/javascript' src="/js/financialManagement.js"></script>
</body>
</html>
