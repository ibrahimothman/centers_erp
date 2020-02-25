<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
<!-- style  date picker-->
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>
    <!-- style page -->
    <link href="/css/financialManagement_style.css" rel="stylesheet"/>
    <title>outlay edit</title>
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
                                <h3> تعديل المصروفات </h3>
                            </div>
                        </header>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <!-- add row pill -->
                                        <div class="form-row ">
                                            <div class="col-sm-6  form-group ">
                                                <label> الفاتوره  </label>
                                                <input type="text" name="bill" class="form-control "  id="bill"   >
                                            </div>
                                            <div class="col-sm-6 form-group ">
                                                <label> المطلوب سداده </label>
                                                <input type="text" name="money" class="form-control "  id="money"   >
                                            </div>
                                        </div>
                                        <div class="form-row ">
                                            <div class="col-sm-6  form-group ">
                                                <label> المدفوع  </label>
                                                <input type="text" name="payOutlay" class=" form-control payOutlay"  id="payOutlay"   >
                                            </div>
                                            <div class="col-sm-6  form-group ">
                                                <label>الباقي  </label>
                                                <input type="text" name="noPay" class="form-control "  id="noPay"   >
                                            </div>
                                        </div>
                                        <div class="form-row ">
                                            <div class="  col-sm-6  form-group ">
                                                <label>التاريخ </label>
                                                <input id="datetimepickerOutlayEdit" name="test_timeOutlayEdit" class="form-control datetimepickerOutlayEdit"  placeholder="التاريخ "    type="text" >
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
<!-- date picker script for modal -->
<script src="{{url('js/jquery.datetimepicker.js')}}"></script>
<!-- script style-->
<script type='text/javascript' src="/js/financialManagement.js"></script>
</body>
</html>
