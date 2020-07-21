<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
    <!-- style -->
    <link href="/css/financialManagement_style.css" rel="stylesheet"/>
    <title>expenses</title>
</head>
<body id="page-top">

<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div id="asd" class="col-lg-12">

                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title view-courses-title">
                                <h3>المرتبات </h3>

                            </div>
                        </header>
                        <div id="app" class="card-body">
                            <div class="row title form-group">
                                <!-- date -->
                                <div class=" col-sm-3 title pb-3">
                                    <h5 class="text-primary  pt-1 pr-3 pl-0">التاريخ: </h5>
                                    <input readonly value="{{date('Y-m-d')}}" name="date" class="form-control  "  placeholder="التاريخ "    type="text" >
                                </div>

                            </div>
                            <salary_transaction
                                :payer="{{ Session('center_id') }}"
                            ></salary_transaction>

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

<script src="{{ asset("js/app.js") }}"></script>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
<!-- script style-->

<script type='text/javascript' src="{{asset('js/financialManagement.js')}}"></script>
</body>
</html>
