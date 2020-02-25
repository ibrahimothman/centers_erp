<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
    <!-- style -->
    <link href="/css/financialManagement_style.css" rel="stylesheet"/>
    <title>profit form</title>

</head>
<body id="page-top">
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title view-courses-title">
                                <h3> حساب الارباح</h3>
                            </div>
                        </header>
                        <div class="card-body">
                            <form class="mx-5" >
                                <div class="form-row form-group">
                                    <div class="col form-group">
                                        <label>من يوم</label>
                                        <input type="date" class='form-control' name="">
                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <div class=" col form-group ">
                                        <label> الي يوم</label>
                                        <input type="date" class='form-control' name="">
                                    </div>
                                </div>


                                <br>
                                <!-- save -->
                                <div class="form-row save">
                                    <div class="col mx-auto text-center">
                                        <button class="btn btn-primary " type="submit" id="submit">حساب الارباح</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
</body>
</html>
