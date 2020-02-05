<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1 , shrink-to-fit=no"/>
    <!-- Bootstrap CSS & js -->

    @include('library')
<!-- Bootstrap CSS & js -->
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/room_style.css")}}">
    <title> view rooms</title>


    <link href="{{asset("css/styles.css")}}" rel="stylesheet">
    <!-- Custom fonts for this template-->

    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-rtl.css')}}" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
        integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If"
        crossorigin="anonymous">
</head>
<body class="bg-light">
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
<!-- Begin Page Content -->

<div class="container text-center ">
    <div class="row">
        <div class=" col">
            <div class="card text-center">
                <div class="card-body">
                    <a class="add btn btn-outline-primary" href="{{ route('rooms.create') }}" type="button"> اضافه غرفه جديده</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container addRoom  px-5 py-5">
    <div class="row">
        <div class="col">
            <h2 class="text-primary ">الغرف</h2>
            <br>
        </div>
    </div>
    <!-- card -->
    <div class="row">
        @foreach($rooms as $room)
            <div class=" col-md-3  col-xs-1">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-text">{{ $room->name }}</h5>
                        <a href="{{ route('rooms.edit',$room->id) }}" class="text-primary">قراء المزيد</a>
                    </div>
                </div>
                <br>
            </div>
        @endforeach

</div>
<!-- script-->
<script type="text/javascipt" src="{{asset("js/jQuery.js")}}"></script>
<script type="text/javascript" src="{{asset("js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("js/jquery-3.3.1.min.js")}}"></script>
<script src="{{asset("js/popper.min.js")}}"></script>
<script src="{{asset("js/bootstrap.min.js")}}"></script>
</body>
</html>
