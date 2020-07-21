<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
<!-- style  date picker-->
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>
    <!-- style page -->
    <link href="/css/financialManagement_style.css" rel="stylesheet"/>
    <title>income</title>

</head>
<body id="page-top">

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
                                <h3>الاسترجاع </h3>
                            </div>
                        </header>
                        <div id="app" class="card-body">
                            <revenue_transaction
                            :account_id="9"
                            ></revenue_transaction>
                        </div>
                    </div>
                    <br>
                    <!--  end revenues view -->
                </div>
            </div>
        </div>
        <!-- footer -->
        @include('footer')
    </div>
</div>
<!-- scroll top -->
<script src="{{ asset("js/app.js") }}"></script>
@include('scroll_top')
<!-- script-->
@include('script')
<!-- date picker script -->
<!-- script style-->
<script type='text/javascript' src="{{asset('js/financialManagement.js')}}"></script>

</body>
</html>
