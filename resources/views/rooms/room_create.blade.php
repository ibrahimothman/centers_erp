<!DOCTYPE html>
<html lang="ar">
<head>
    <!-- Bootstrap CSS & js -->
@include('library')

    <title> room create</title>
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
                            تسجيل بيانات الغرفه
                        </div>
                        <div class="card-body">
                            <form id="formRoom" action="{{ route('rooms.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('rooms/form')
                                <div class="form-row save">
                                    <div class="col-sm-6 mx-auto text-center">
                                        <button class="btn btn-primary" type="submit" id="submit">حفظ</button>
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
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="/js/room_create_validation.js"></script>

</body>
</html>
