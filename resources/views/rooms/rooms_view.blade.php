<!DOCTYPE html>
<html lang="ar">
<head>
@include('library')
<!-- Bootstrap CSS & js -->
    <link rel="stylesheet" href="{{asset("css/room_style.css")}}">
    <title> view rooms</title>
    <style>

    </style>
</head>
<body class="bg-light" id="page-top">
<!-- Page Wrapper -->
<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
    <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-10">
                    <div class="card mb-4">
                        <div class="card-header text-primary ">
                            <h3 class="float-left"> الغرف</h3>
                            <a href="{{ route('rooms.create') }}">
                                <button type="button" class="btn btn-success float-right ">اضافه غرفه جديده</button>
                            </a>
                        </div>
                        <div class="card-body">
                            <!-- card-->
                            <div class="row">
                                @foreach($rooms as $room)
                                    <div class=" col-md-3  col-xs-1">
                                        <div class="card motionCard">
                                            <div class="card-body">
                                                <h5 class="card-text text-center">{{ $room->name }}</h5>
                                                <a href="{{ route('rooms.edit',$room->id) }}"
                                                   class=" btn btn-outline-primary  py-1 px-1 ">
                                                    <i class="fas fa-edit  "></i> </a>
                                                <a href="" class="btn btn-outline-success  py-1 px-1 "><i
                                                            class="fas fa-eye "></i></a>
                                                <a href="" class="btn btn-outline-success  py-1 px-1 ">
                                                    <i class="far fa-calendar-plus"></i>
                                                </a>
                                                <button type="submit" class="btn btn-outline-danger py-1 px-1 ">
                                                    <i class="fas fa-trash-alt "></i>
                                                </button>

                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->
        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
</body>
</html>