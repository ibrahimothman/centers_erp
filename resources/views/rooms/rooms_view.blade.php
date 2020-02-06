<!DOCTYPE html>
<html lang="ar">
<head>

    <!-- Bootstrap CSS & js -->
    @include('library')
<!-- Bootstrap CSS & js -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
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

@include('script')

</body>
</html>