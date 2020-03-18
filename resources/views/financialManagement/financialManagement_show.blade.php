<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- library  -->
@include('library')
<!-- style  date picker-->
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>
    <!-- style -->
    <link href="/css/financialManagement_style.css" rel="stylesheet"/>
    <title>expenses show</title>
</head>
<body id="page-top">
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-12">
                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title view-courses-title">
                                <h3>عرض المصروفات والايرادات والارباح  </h3>
                            </div>
                        </header>
                        <div class="card-body">
                            <!-- view -->
                            <div class="card   mb-3" style="max-width: 100%; ">
                                <!-- nav btn-->
                                <ul class="menu">
                                    <li><button class="item  btn btn-light "  id="allShow">الكل</button></li>
                                    <li><button class="item btn btn-light "  id="profitShowBtn" > الارباح </button></li>
                                    <li><button class="item  btn btn-light "  id="revenuesShow">الايرادات</button></li>
                                    <li><button class="item btn btn-light "  id="outlayShow" > المصروفات </button></li>
                                    <li><button class="item  btn btn-light "  id="payrollShow">الرواتب</button></li>
                                    <li><button class="item  btn btn-light "  id="details">تفاصيل الارباح والطباعه</button></li>
                                </ul>
                                <!-- end nav -->
                                <!-- time btn -->
                                <div class="">
                                    <div class="btn-group print-btn p-3 ">
                                        <button type="button" class="btn btn-success float-right " data-toggle="modal" data-target="#formDate">اختيار مده محدده</button>
                                    </div>
                                </div>
                                <!-- view section 1 -->
                                <div id="section-1">
                                    <div class="row  mb-3">
                                        <div class="col-sm-12">
                                            <div class="card border-primary p-3 ">
                                                <div class="card-header text-primary bg-transparent border-primary ">
                                                    <h5>   صافي الارباح</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row form-group">
                                                        <div class="col-sm-6 ">
                                                            <h5 class="text-warning ">المصروفات: </h5>
                                                            <input type="number" name="expenses" id="expenses"
                                                                   class="form-control" value="{{ $transactions["expenses_amount"] }}" readonly/>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <h5 class="text-warning ">الايرادات: </h5>
                                                            <input type="number" name="revenues" id="revenues"
                                                                   class="form-control" value="{{ $transactions['revenues_amount'] }}"  readonly/>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-sm-6 ">
                                                            <h5 class="text-warning ">الارباح: </h5>
                                                            <input type="number" name="profit" id="profit"
                                                                   class="form-control" value="{{ $transactions['profit'] }}" readonly/>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                            <h5 class="text-warning ">الضرائب: </h5>
                                                            <input type="number" name="tax" id="tax"
                                                                   class="form-control" value="20" readonly/>
                                                        </div>
                                                    </div>
                                                    <hr class=" border-primary">
                                                    <!-- sum -->
                                                    <div class="row form-group title">
                                                        <div class=" col-sm-6">
                                                            <h5 class="text-warning ">صافي الربح: </h5>
                                                            <input type="number" name="netProfit" id="netProfit"
                                                                   class="form-control" value="{{ $transactions['net_profit'] }}" readonly/>
                                                        </div>
                                                        <div>
                                                        <button class="btn btn-success mt-4 "  id="showBtn"> عرض التفاصيل</button>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <!-- end -->
                                                    <!-- details show -->
                                                    <div class="row  mb-3"  id="showDetails">
                                                        <div class="col-sm-12">
                                                                        <!-- table -->
                                                                        <div class="table-responsive ">
                                                                            <table id="dtBasicExample"
                                                                                   class="table table-striped table-bordered table-sm"
                                                                                   cellspacing="0"
                                                                                   width="100%">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th class="th-sm">الشهر</th>
                                                                                    <th class="th-sm">الربح</th>
                                                                                    <th class="th-sm">المصروفات</th>
                                                                                    <th class="th-sm">الضرائب</th>
                                                                                    <th class="th-sm">الربح الصافي بعد الضرائب</th>
                                                                                    <th class="th-sm"> تعديل</th>
                                                                                    <th class="th-sm"> ازاله</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td>1/2020</td>
                                                                                    <td>10000</td>
                                                                                    <td>5000</td>
                                                                                    <td>1000</td>
                                                                                    <td>9000</td>
                                                                                    <td>
                                                                                        <a href=""
                                                                                           class=" btn btn-outline-primary  py-1 px-2 "><i
                                                                                                    class="fas fa-edit m-0 "></i> </a>

                                                                                    </td>
                                                                                    <td>
                                                                                        <form>
                                                                                            <button type="submit"
                                                                                                    class="btn btn-outline-danger py-1 px-2">
                                                                                                <i class="fas fa-trash-alt m-0"></i>
                                                                                            </button>
                                                                                        </form>
                                                                                    </td>
                                                                                </tr>
                                                                                <!-- second row -->
                                                                                <tr>
                                                                                    <td>2/2020</td>
                                                                                    <td>10000</td>
                                                                                    <td>5000</td>
                                                                                    <td>1000</td>
                                                                                    <td>9000</td>
                                                                                    <td>
                                                                                        <a href=""
                                                                                           class=" btn btn-outline-primary  py-1 px-2 "><i
                                                                                                    class="fas fa-edit m-0 "></i> </a>

                                                                                    </td>
                                                                                    <td>
                                                                                        <form>
                                                                                            <button type="submit"
                                                                                                    class="btn btn-outline-danger py-1 px-2">
                                                                                                <i class="fas fa-trash-alt m-0"></i>
                                                                                            </button>
                                                                                        </form>
                                                                                    </td>
                                                                                </tr>
                                                                                <!-- third row -->
                                                                                <tr>
                                                                                    <td>3/2020</td>
                                                                                    <td>10000</td>
                                                                                    <td>5000</td>
                                                                                    <td>1000</td>
                                                                                    <td>9000</td>
                                                                                    <td>
                                                                                        <a href=""
                                                                                           class=" btn btn-outline-primary  py-1 px-2 "><i
                                                                                                    class="fas fa-edit m-0 "></i> </a>

                                                                                    </td>
                                                                                    <td>
                                                                                        <form>
                                                                                            <button type="submit"
                                                                                                    class="btn btn-outline-danger py-1 px-2">
                                                                                                <i class="fas fa-trash-alt m-0"></i>
                                                                                            </button>
                                                                                        </form>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>

                                                                            </table>
                                                                            <!-- end table -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    <!-- end details -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end  section 1-->
                                <!-- section 2  revenues-->
                                <div id="section-2">
                                    <div class="row  mb-3">
                                        <div class="col-sm-12">
                                            <div class="card border-primary p-3 ">
                                                <div class="card-header text-primary bg-transparent  border-primary ">
                                                    <h5 class="fRight">  الايرادات</h5>
                                                    <form class="form-inline" style="float: left">
                                                    <div class="btn-group ">
                                                        <div class="btn-group search-panel ">
                                                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span id="search_concept">البحث فى </span> <span class="caret"></span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">الاسماء</a>
                                                                <a class="dropdown-item" href="#">الكورس</a>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="search_param" value="all" id="search_param">
                                                        <input type="text" class="form-control " id="search" placeholder="ابحث">
                                                        <div class="btn-group">
                                                            <button class="btn btn-success" id="search" ><i class="fas fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                                <!-- card table -->
                                                <div class="card-body ">
                                                    <div class="row form-group">
                                                    <div class="col-sm-12">
                                                        <!-- table -->
                                                        <div class="table-responsive">
                                                            <table id="dtBasicExample"
                                                               class="table table-striped table-bordered table-sm"
                                                               cellspacing="0"
                                                               width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th class="th-sm">الاسم</th>
                                                                <th class="th-sm">الكورس/الدبلومه</th>
                                                                <th class="th-sm">التكلفه</th>
                                                                <th class="th-sm">المدفوع</th>
                                                                <th class="th-sm">الباقي</th>
                                                                <th class="th-sm">التاريخ</th>
                                                                <th class="th-sm"> تعديل</th>
                                                                <th class="th-sm"> ازاله</th>
                                                                <th class="th-sm"> الديون</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="student_table">
                                                            @php($revenue = 0)
                                                            @foreach($transactions->filterByAccount(1) as $transaction)
                                                                @php($revenue += $transaction->amount)
                                                                <tr>
                                                                    <td>{{ $transaction->payer()->nameAr }}</td>
                                                                    <td>{{ $transaction->payFor()->name }}</td>
                                                                    <td>{{ $transaction->deserved_amount }}</td>
                                                                    <td>{{ $transaction->amount }}</td>
                                                                    <td>{{ $transaction->rest}}</td>
                                                                    <td>{{ $transaction->date }}</td>
                                                                    <td>
                                                                        <a href=""
                                                                           class=" btn btn-outline-primary  py-1 px-2 "><i
                                                                                    class="fas fa-edit m-0 "></i> </a>

                                                                    </td>
                                                                    <td>
                                                                        <form>
                                                                            <button type="submit"
                                                                                    class="btn btn-outline-danger py-1 px-2">
                                                                                <i class="fas fa-trash-alt m-0"></i>
                                                                            </button>
                                                                        </form>
                                                                    </td>
                                                                    <td>
                                                                        <a href=""
                                                                           class=" btn btn-outline-primary  py-1 px-2 ">
                                                                            <i class="fas fa-money-check-alt"></i> </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                            </tbody>

                                                        </table>
                                                        <!-- end table -->
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <!-- sum -->
                                                    <div class="row form-group">
                                                        <h5 class="text-warning ">الايرادات: </h5>
                                                        <div class="col-sm-4">
                                                            <input type="number" value="{{ $revenue }}" name="sum" id="sum"  class="form-control"  readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- end section 2 -->
                                <!-- section12  3outlay -->
                                <div id="section-3">
                                    <div class="row  mb-3">
                                        <div class="col-sm-12">
                                            <div class="card border-primary p-3 ">
                                                <div class="card-header text-primary bg-transparent border-primary ">
                                                    <h5 class="fRight">المصروفات</h5>
                                                    <form class="form-inline fLeft " >
                                                        <input type="search" class="form-control" placeholder="البحث بالفاتوره" list="pill">
                                                        <datalist id="pill">
                                                            <option>الايجار</option>
                                                            <option>الكهرباء</option>
                                                        </datalist>
                                                        <div class="btn-group">
                                                            <button class="btn btn-success" id="search" ><i class="fas fa-search"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="card-body ">
                                                    <div class="row form-group">
                                                    <div class="col-sm-12">
                                                        <!-- table -->
                                                    <div class="table-responsive">
                                                        <table id="dtBasicExample"
                                                               class="table table-striped table-bordered table-sm"
                                                               cellspacing="0"
                                                               width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th class="th-sm">الفاتوره</th>
                                                                <th class="th-sm">المطلوب سداده</th>
                                                                <th class="th-sm">المدفوع</th>
                                                                <th class="th-sm">الباقي</th>
                                                                <th class="th-sm">التاريخ</th>
                                                                <th class="th-sm"> تعديل</th>
                                                                <th class="th-sm"> ازاله</th>
                                                                <th class="th-sm"> الديون</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>الايجار</td>
                                                                <td>5000</td>
                                                                <td> 5000</td>
                                                                <td>0</td>
                                                                <td>20/10/2019</td>
                                                                <td>
                                                                    <a href=""
                                                                       class=" btn btn-outline-primary  py-1 px-2 "><i
                                                                                class="fas fa-edit m-0 "></i> </a>

                                                                </td>
                                                                <td>
                                                                    <form>
                                                                        <button type="submit"
                                                                                class="btn btn-outline-danger py-1 px-2">
                                                                            <i class="fas fa-trash-alt m-0"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <a href=""
                                                                       class=" btn btn-outline-primary  py-1 px-2 ">
                                                                        <i class="fas fa-money-check-alt"></i> </a>
                                                                </td>
                                                            </tr>
                                                            <!-- second row -->
                                                            <tr>
                                                                <td>الكهرباء</td>
                                                                <td>300</td>
                                                                <td> 300</td>
                                                                <td>0</td>
                                                                <td>20/10/2019</td>
                                                                <td>
                                                                    <a href=""
                                                                       class=" btn btn-outline-primary  py-1 px-2 "><i
                                                                                class="fas fa-edit m-0 "></i> </a>

                                                                </td>
                                                                <td>
                                                                    <form>
                                                                        <button type="submit"
                                                                                class="btn btn-outline-danger py-1 px-2">
                                                                            <i class="fas fa-trash-alt m-0"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <a href=""
                                                                       class=" btn btn-outline-primary  py-1 px-2 ">
                                                                        <i class="fas fa-money-check-alt"></i> </a>
                                                                </td>
                                                            </tr>
                                                            <!-- third row -->
                                                            <tr>
                                                                <td>شراء كمبيوتر</td>
                                                                <td>20000</td>
                                                                <td> 15000</td>
                                                                <td>5000</td>
                                                                <td>20/10/2019</td>
                                                                <td>
                                                                    <a href=""
                                                                       class=" btn btn-outline-primary  py-1 px-2 "><i
                                                                                class="fas fa-edit m-0 "></i> </a>

                                                                </td>
                                                                <td>
                                                                    <form>
                                                                        <button type="submit"
                                                                                class="btn btn-outline-danger py-1 px-2">
                                                                            <i class="fas fa-trash-alt m-0"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <a href=""
                                                                       class=" btn btn-outline-primary  py-1 px-2 ">
                                                                        <i class="fas fa-money-check-alt"></i> </a>
                                                                </td>
                                                            </tr>
                                                            </tbody>

                                                        </table>
                                                        <!-- end table -->
                                                    </div>
                                                </div>
                                                </div>
                                                    <!-- sum -->
                                                    <div class="row form-group">
                                                        <h5 class="text-warning ">المصروفات: </h5>
                                                        <div class="col-sm-4">
                                                            <input type="number" name="sumOutlaySow" id="sumOutlaySow"  class="form-control"  readonly />
                                                        </div>
                                                    </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end section 3-->
                                <!-- section4 payroll -->
                                <div id="section-4"  >
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <div class="card border-primary p-3 ">
                                                <div class="card-header text-primary bg-transparent border-primary ">
                                                    <h5 class="fRight"> الرواتب</h5>
                                                    <form class="form-inline fLeft " >
                                                        <input type="search" class="form-control"  placeholder="البحث باسم المدرب" list="instructorName">
                                                        <datalist id="instructorName">
                                                            <option>احمد</option>
                                                            <option>محمد</option>
                                                        </datalist>
                                                        <div class="btn-group">
                                                            <button class="btn btn-success" id="search" ><i class="fas fa-search"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="card-body ">
                                                    <div class="row form-group">
                                                    <div class="col-sm-12">
                                                        <!-- table -->
                                                        <div class="table-responsive">
                                                        <table id="dtBasicExample"
                                                               class="table table-striped table-bordered table-sm"
                                                               cellspacing="0"
                                                               width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th class="th-sm">الاسم</th>
                                                                <th class="th-sm">المرتب</th>
                                                                <th class="th-sm">تصنيف</th>
                                                                <th class="th-sm">المستحق</th>
                                                                <th class="th-sm">المدفوع</th>
                                                                <th class="th-sm">الباقي</th>
                                                                <th class="th-sm">التاريخ</th>
                                                                <th class="th-sm"> تعديل</th>
                                                                <th class="th-sm"> ازاله</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php($total_salaries = 0)
                                                            @foreach($transactions->filterByAccount(2) as $transaction)
                                                                @php($total_salaries += $transaction->amount)
                                                                <tr>
                                                                    <td>{{ $transaction->payFor()->nameAr }}</td>
                                                                    <td>{{ $transaction->deserved_amount }}</td>
                                                                    <td> {{ $transaction->payFor()->payment_model['model'] }}</td>
                                                                    <td> {{ $transaction->amount + $transaction->rest }}</td>
                                                                    <td>{{ $transaction->amount }}</td>
                                                                    <td>{{ $transaction->rest }}</td>
                                                                    <td>{{ $transaction->date }}</td>
                                                                    <td>
                                                                        <a href=""
                                                                           class=" btn btn-outline-primary  py-1 px-2 "><i
                                                                                    class="fas fa-edit m-0 "></i> </a>

                                                                    </td>
                                                                    <td>
                                                                        <form>
                                                                            <button type="submit"
                                                                                    class="btn btn-outline-danger py-1 px-2">
                                                                                <i class="fas fa-trash-alt m-0"></i>
                                                                            </button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                            </tbody>

                                                        </table>
                                                        <!-- end table -->
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <!-- sum -->
                                                    <div class="row form-group">
                                                        <h5 class="text-warning ">المرتبات: </h5>
                                                        <div class="col-sm-4">
                                                            <input type="number" value="{{ $total_salaries }}" name="sumPayrollSow" id="sumPayrollSow"  class="form-control"  readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end section 4 payroll -->
                                <!-- section5 profit -->
                                    <div id="section-5">
                                        <div class="row  mb-3">
                                            <div class="col-sm-12">
                                                <div class="card border-primary p-3 ">
                                                    <div class="card-header text-primary bg-transparent border-primary ">
                                                        <h5 class="fRight">   الربح</h5>
                                                            <div class="btn-group print-btn ">
                                                                <button type="button" class="btn btn-success fLeft" data-toggle="modal" data-target="#printModal">طباعه</button>
                                                            </div>
                                                    </div>
                                                    <div class="card-body ">
                                                        <div class="col-sm-12">
                                                            <div class="fRight">
                                                                <h4>الارباح: <span> {{ $transactions['profit'] }} </span></h4>
                                                                <h4>صافي الارباح: <span> {{ $transactions['net_profit'] }}  </span></h4>

                                                            </div>
                                                            <div class="fLeft">
                                                                <h4 >المصروفات: <span> {{ $transactions['expenses_amount'] }} </span></h4>
                                                                <h4 >الايرادات: <span> {{ $transactions['revenues_amount'] }}  </span></h4>
                                                                <h4>الضرائب: <span> 20% </span></h4>
                                                            </div>
                                                            <br>
                                                            <!-- table -->
                                                            <div class="table-responsive ">
                                                                <table id="dtBasicExample"
                                                                       class="table table-striped table-bordered table-sm"
                                                                       cellspacing="0"
                                                                       width="100%">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="th-sm">الشهر</th>
                                                                        <th class="th-sm">التاريخ</th>
                                                                        <th class="th-sm">الايرادات</th>
                                                                        <th class="th-sm">تفاصيل الايرادات</th>
                                                                        <th class="th-sm">المصروفات</th>
                                                                        <th class="th-sm">تفاصيل المصروفات</th>

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>يناير</td>
                                                                        <td>2/1/2020</td>
                                                                        <td>300</td>
                                                                        <td>طلاب</td>
                                                                        <td>1000</td>
                                                                        <td>الايجار</td>
                                                                    </tr>
                                                                    <!-- second row -->
                                                                    <tr>
                                                                        <td>يناير</td>
                                                                        <td>2/1/2020</td>
                                                                        <td>300</td>
                                                                        <td>طلاب</td>
                                                                        <td>1000</td>
                                                                        <td>الايجار</td>
                                                                    </tr>
                                                                    <!-- third row -->
                                                                    <tr>
                                                                        <td>يناير</td>
                                                                        <td>2/1/2020</td>
                                                                        <td>300</td>
                                                                        <td>طلاب</td>
                                                                        <td>1000</td>
                                                                        <td>الايجار</td>
                                                                    </tr>
                                                                    </tbody>

                                                                </table>
                                                                <!-- end table -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end section 5 profit -->
                                <!-- end card -->
                            </div>
                            <br>
                            <!--  end  view -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
            </div>
        </div>
        <!-- script -->
        @include('footer')
    </div>
</div>


<!-- modal form -->
<div class="modal fade" id="formDate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                            <div class="col-sm-6 mx-auto" style="width: 200px;">
                                <button class="btn btn-primary action-buttons" type="submit" id="submit">حساب الارباح
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
<!-- print -->
<!-- Central Modal Small -->
<div class="modal fade"  id="printModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog " id="modalForPrint"  role="document">


        <div class="modal-content " id="contentForPrint">
            <div class="modal-body">
                <div id="section-5">
                    <div class="row  mb-3">
                        <div class="col-sm-12">
                            <div class="card  p-3 ">
                                <div class="card-body ">
                                    <div class="col-sm-12">
                                        <h1>طباعه تقرير الارباح</h1>
                                        <div class="fRight">
                                            <h4>الارباح: <span> 5000 </span></h4>
                                            <h4>صافي الارباح: <span> 20000  </span></h4>

                                        </div>
                                        <div class="fLeft">
                                                <h4 >المصروفات: <span> 5000 </span></h4>
                                                <h4 >الايرادات: <span> 20000  </span></h4>
                                            <h4>الضرائب: <span> 20% </span></h4>
                                        </div>
                                        <br>
                                        <!-- table -->
                                        <div class="table-responsive ">
                                            <table id="dtBasicExample"
                                                   class="table table-striped table-bordered table-sm"
                                                   cellspacing="0"
                                                   width="100%">
                                                <thead>
                                                <tr>
                                                    <th class="th-sm">الشهر</th>
                                                    <th class="th-sm">التاريخ</th>
                                                    <th class="th-sm">الايرادات</th>
                                                    <th class="th-sm">تفاصيل الايرادات</th>
                                                    <th class="th-sm">المصروفات</th>
                                                    <th class="th-sm">تفاصيل المصروفات</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>يناير</td>
                                                    <td>2/1/2020</td>
                                                    <td>300</td>
                                                    <td>طلاب</td>
                                                    <td>1000</td>
                                                    <td>الايجار</td>
                                                </tr>
                                                <!-- second row -->
                                                <tr>
                                                    <td>يناير</td>
                                                    <td>2/1/2020</td>
                                                    <td>300</td>
                                                    <td>طلاب</td>
                                                    <td>1000</td>
                                                    <td>الايجار</td>
                                                </tr>
                                                <!-- third row -->
                                                <tr>
                                                    <td>يناير</td>
                                                    <td>2/1/2020</td>
                                                    <td>300</td>
                                                    <td>طلاب</td>
                                                    <td>1000</td>
                                                    <td>الايجار</td>
                                                </tr>
                                                </tbody>

                                            </table>
                                            <!-- end table -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end section 5 profit -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success  dismiss" id="print-button"> <i class="fa fa-print   px-2"> </i>طباعه </button>
                <button type="button" class="btn btn-danger  print" data-dismiss="modal">الغاء</button>
            </div>
        </div>
    </div>
</div>
<!-- end print -->
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
<!-- script style-->
<script type='text/javascript' src="/js/financialManagement.js"></script>
<!-- date picker script for modal -->
<script src="{{url('js/jquery.datetimepicker.js')}}"></script>

<script>

    $(document).ready(function () {
        // $('#date_form').submit(function (e) {
        //     // e.preventDefault();
        //     var start_date = $("<input>")
        //         .attr('type', 'hidden')
        //         .attr('name', 'start_date')
        //         .attr('value', $("#datetimepickerModal1").val());
        //     var end_date = $("<input>").attr('type', 'hidden').attr('name', 'end_date').attr('value', $("#datetimepickerModal2").val());
        //
        //     $(this).append(start_date).append(end_date);
        // })
            // var start_date = "2019-03-01";
            // var end_date = "2020-01-01";
            //
            // $.ajax({
            //     url: "/all_transactions?start_date="+start_date+"&end_date="+end_date,
            //     type: "get",
            //     success: function (transactions) {
            //          // fill inputs
            //         $("#revenues").val(transactions.revenues_amount);
            //         $("#expenses").val(transactions.expenses_amount);
            //
            //         var profit = transactions.revenues_amount - transactions.expenses_amount;
            //         $("#profit").val(transactions.revenues_amount - transactions.expenses_amount);
            //
            //         $("#tax").val("20");
            //         var taxValue = profit * $("#tax").val() / 100;
            //
            //         $("#netProfit").val(profit - taxValue);
            //
            //     }
            // });


        });


</script>

</body>
</html>
