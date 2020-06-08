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
<body id="page-top">

<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
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
                                    <form action="{{ route('transactions.update', $transaction->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="form-row ">
                                            <div class="col-sm-6  form-group ">
                                                <label> الاسم </label>
                                                <input placeholder="اختار" type="text" id="nameInstructor" class="form-control" name="nameInstructor" value="{{ $transaction->payFor()->nameAr }}" readonly  />

                                            </div>
                                            <div class="col-sm-6 form-group ">
                                                <label> تصنيف</label>
                                                <input type="text" class="form-control" readonly value="{{ $transaction->payFor()->payment_model['model'] }}">
                                            </div>
                                        </div>
                                        <div class="form-row ">
                                            <div class="col-sm-4  form-group ">
                                                <label> المرتب </label><input type="text" name="payroll" class="form-control "  id="payroll" value="{{ $transaction->payFor()->payment_model['salary'] }}" readonly   >
                                            </div>

                                            <div class="col-sm-4  form-group ">
                                                <label> المستحق </label><input type="text" name="deserved_amount" class="form-control "  id="deserved_amount" value="{{ $transaction->deserved_amount }}" readonly   >
                                            </div>
                                            <div class="col-sm-4  form-group ">
                                                <label> المدفوع  </label><input type="text" name="amount" class=" form-control  payIncome"  id="payIncome" value="{{ $transaction->amount }}"  >
                                                <div>{{$errors->first('amount')}}</div>
                                            </div>
                                        </div>
                                        <div class="form-row ">
                                            <div class="col-sm-6 form-group ">
                                                <label>الباقي  </label><input type="text" name="rest" class="form-control "  id="noPayPayroll" value="{{ $transaction->rest }}" readonly  >
                                            </div>
                                            <div class="  col-sm-6  form-group ">
                                                <label>التاريخ </label>
                                                <input id="datetimepickerPayrollEdit" readonly name="date" class="form-control datetimepickerPayrollEdit"  placeholder="التاريخ "  type="text" value="{{ $transaction->date }}" >
                                                <div>{{$errors->first('date')}}</div>
                                            </div>
                                        </div>
                                        <!-- save -->
                                        <div class="form-row save">
                                            <div class="col-sm-6 mx-auto" style="width: 200px;">
                                                <button class="btn btn-primary action-buttons" type="submit"
                                                        id="submit">تعديل
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

<script>
    $('#payIncome').on('input', function (e) {
        var amount = $(this).val();
        var rest = $('#deserved_amount').val() - amount;
        $('#noPayPayroll').val(rest);
    })
</script>
