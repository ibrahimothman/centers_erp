<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
    <!-- style page -->
    <link href="/css/financialManagement_style.css" rel="stylesheet"/>
    <title>profit edit</title>
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
                                <h3>تعديل حساب الارباح</h3>
                            </div>
                        </header>
                        <div class="card-body">
                            <!-- time -->
                            <form  >
                                <div class="form-row form-group">
                                    <div class="col-sm-4 form-group">
                                        <label>من يوم</label>
                                        <input type="date" class='form-control' name="">
                                    </div>
                                    <div class=" col-sm-4 form-group ">
                                        <label> الي يوم</label>
                                        <input type="date" class='form-control' name="">
                                    </div>
                                    <!-- save -->
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-3">
                                        <label>حساب الارباح</label>
                                        <button class="btn btn-primary form-control" type="submit" id="submit">حساب </button>
                                    </div>
                                </div>
                            </form>
                            <hr class="border-primary">
                            <!-- end -->
                            <div class="card">
                                <div class="card-body">
                                    <!-- view form -->
                                    <form>
                                        <div class="row form-group">
                                            <div class="col-sm-6 ">
                                                <h5 class="text-warning ">المصروفات: </h5>
                                                <input value="200" type="number" name="sumOutlayProfit" id="pay"
                                                       class="form-control" readonly/>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <h5 class="text-warning ">الايرادات: </h5>
                                                <input value="5000" type="number" name="sumRevenuesProfit" id="revenues"
                                                       class="form-control" readonly/>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-6 ">
                                                <h5 class="text-warning ">الارباح: </h5>
                                                <input type="number" name="sumOutlayProfit" id="profit"
                                                       class="form-control" readonly/>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <h5 class="text-warning ">الضرائب: </h5>
                                                <input type="text" name="profit" class=" form-control profit "
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

</script>
</body>
</html>
