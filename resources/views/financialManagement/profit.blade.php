<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
   <!-- style page -->
    <link href="/css/financialManagement_style.css" rel="stylesheet"/>
    <title>profit</title>
</head>
<body id="page-top">

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
                                <h3> حساب الارباح</h3>
                            </div>
                        </header>
                        <div class="card-body">
                            <!-- time -->
                                    <form id="form" >
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 form-group">
                                                <label>من يوم</label>
                                                <input type="date" class='form-control' name="start_date" id="start_date">
                                            </div>
                                            <div class=" col-sm-4 form-group ">
                                                <label> الي يوم</label>
                                                <input type="date" class='form-control' name="end_date" id="end_date">
                                            </div>
                                        <!-- save -->
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-3">
                                                <label>حساب الارباح</label>
                                                <button class="btn btn-primary form-control" type="button" id="getProfitBtn">حساب </button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr class="border-primary">
<!-- end -->
                                <div class="card">
                                <div class="card-body">
                                    <!-- view form -->
                                    <form id="form">
                                        <div class="row form-group">
                                            <div class="col-sm-6 ">
                                                <h5 class="text-warning ">المصروفات: </h5>
                                                <input  type="number" name="expenses" id="expenses"
                                                       class="form-control" readonly/>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <h5 class="text-warning ">الايرادات: </h5>
                                                <input  type="number" name="revenues" id="revenues"
                                                       class="form-control" readonly/>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-6 ">
                                                <h5 class="text-warning ">الارباح: </h5>
                                                <input type="number" name="profit" id="profit"
                                                       class="form-control" readonly/>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <h5 class="text-warning ">الضرائب: </h5>
                                                <input type="number" name="tax" class=" form-control profit "
                                                       placeholder="قيمه الضربيه ك 20%" id="tax">

                                            </div>
                                        </div>
                                        <hr class=" border-primary">
                                        <!-- sum -->
                                        <div class="row form-group title">
                                            <div class=" col-sm-6">
                                                <h5 class="text-warning ">صافي الربح: </h5>
                                                <input type="number" name="netProfit" id="netProfit"
                                                       class="form-control" readonly/>
                                            </div>
                                            <div class=" col-sm-6">
                                            <div class="btn-group print-btn ">
                                                <button type="button" class="btn btn-success fLeft" data-toggle="modal" data-target="#printModal">طباعه</button>
                                            </div>
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
<!-- print -->
<!-- Central Modal Small -->
<div class="modal fade"  id="printModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog " id="modalForPrint"  role="document">


        <div class="modal-content " id="contentForPrint">
            <div class="modal-body">
                <div id="section-6">
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
<script>
    $("#getProfitBtn").click(function () {
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        $.ajax({
            url: "/all_transactions?start_date="+start_date+"&end_date="+end_date,
            type: "get",
            success: function (transactions) {
                $("#revenues").val(transactions.revenues_amount);
                $("#expenses").val(transactions.expenses_amount);
                $("#profit").val(transactions.profit);
                $("#tax").val(transactions.tax);
                $("#netProfit").val(transactions.net_profit);
            }
        });
    });

</script>
</body>
</html>
