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
                // clear all for fields
                $("#profit").val("");
                $("#tax").val("");
                $("#netProfit").val("");
                // fill inputs
                $("#revenues").val(transactions.revenues_amount);
                $("#expenses").val(transactions.expenses_amount);
            }
        });
    });

</script>
</body>
</html>
