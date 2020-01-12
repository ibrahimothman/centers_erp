<!DOCTYPE html>
<html lang="ar">
<head>

    <!-- Bootstrap CSS & js -->
    @include('library')
    <link rel="stylesheet" href="/css/room_style.css">
    <title> view rooms</title>
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
            <div class="card motionCard  text-center">
                <div class="card-body">
                    <a class="add btn btn-outline-primary" href="#" type="button"> اضافه غرفه جديده</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container addRoom text-right px-5 py-5">
    <div class="row">
        <div class="col">
            <h2 class="text-primary ">الغرف</h2>
            <br>
        </div>
    </div>
    <!-- card -->
    <div class="row">
        <div class=" col-md-3  col-xs-1">
            <div class="card motionCard">
                <div class="card-body">
                    <h5 class="card-text">غرفه رقم 1</h5>
                    <a href="#" class="text-primary">قراء المزيد</a>
                </div>
            </div>
            <br>
        </div>
        <div class=" col-md-3  col-xs-1">
            <div class="card motionCard">
                <div class="card-body">
                    <h5 class="card-text">غرفه رقم 1</h5>
                    <a href="#" class="text-primary">قراء المزيد</a>
                </div>
            </div>
            <br>
        </div>
        <div class=" col-md-3  col-xs-1">
            <div class="card motionCard">
                <div class="card-body">
                    <h5 class="card-text">غرفه رقم 1</h5>
                    <a href="#" class="text-primary">قراء المزيد</a>
                </div>
            </div>
            <br>
        </div>
        <div class=" col-md-3  col-xs-1">
            <div class="card motionCard">
                <div class="card-body">
                    <h5 class="card-text">غرفه رقم 1</h5>
                    <a href="#" class="text-primary">قراء المزيد</a>
                </div>
            </div>
            <br>
        </div>
    </div>
    <br>
    <div class="row">
        <div class=" col-md-3  col-xs-1">
            <div class="card motionCard">
                <div class="card-body">
                    <h5 class="card-text">غرفه رقم 1</h5>
                    <a href="#" class="text-primary">قراء المزيد</a>
                </div>
            </div>
            <br>
        </div>
        <div class=" col-md-3  col-xs-1">
            <div class="card motionCard">
                <div class="card-body">
                    <h5 class="card-text">غرفه رقم 1</h5>
                    <a href="#" class="text-primary">قراء المزيد</a>
                </div>
            </div>
            <br>
        </div>
        <div class=" col-md-3  col-xs-1">
            <div class="card motionCard">
                <div class="card-body">
                    <h5 class="card-text">غرفه رقم 1</h5>
                    <a href="#" class="text-primary">قراء المزيد</a>
                </div>
            </div>
            <br>
        </div>
        <div class=" col-md-3  col-xs-1">
            <div class="card motionCard">
                <div class="card-body">
                    <h5 class="card-text">غرفه رقم 1</h5>
                    <a href="#" class="text-primary">قراء المزيد</a>
                </div>
            </div>
            <br>
        </div>
    </div>
    <br>
</div>
        @include('footer')
    </div>
</div>
<!-- script-->

@include('script')

</body>
</html>