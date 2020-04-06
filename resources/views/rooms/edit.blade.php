<!DOCTYPE html>
<html lang="ar">
<head>
    <!-- Bootstrap CSS & js -->
@include('library')
<!-- Bootstrap CSS & js -->
    <link rel="stylesheet" href="{{asset("css/room_style.css")}}">
    <title> room edit</title>
    <style>
        div[name="add"]{
            display: inline-block;
        }
    </style>
</head>
<body class="bg-light">
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
    <!-- Begin Page Content -->
        <div class="container-fluid  ">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header text-primary">
                            تعديل بيانات الغرفه
                        </div>
                        <div class="card-body">
                            <form action="{{ route('rooms.update',$room->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                @include('rooms/form')
                                <div class="form-row save">
                                    <div class="col-sm-6 mx-auto text-center">
                                        <button class="btn btn-primary" type="submit" id="submit">تعديل</button>
                                        <button class="btn  btn-danger" type="reset"> الغاء</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
<!-- script room option field-->
<script type='text/javascript' src="/js/room_style.js"></script>
</body>
</html>
