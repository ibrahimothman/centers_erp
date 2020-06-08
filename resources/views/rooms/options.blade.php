<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
    <title>Add option</title>
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
                            <div class="card-header text-primary form-title">
                              اضافه امكانيات الغرف
                            </div>
                        </header>
                        <div class="card-body">
                            <form>

                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for="name">امكانيات المعمل</label>
                                        <input  type="text" placeholder="امكانيات المعمل" class="form-control " >
                                    </div>
                                </div>

                                <br>
                                <div class="form-row save">
                                    <div class="col-sm-6 mx-auto" style="width: 200px;">
                                        <button class="btn btn-primary action-buttons" type="submit" id="submit"> إضافة
                                        </button>
                                        <button class="btn  btn-danger action-buttons" type="reset"> إلغاء
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        @include('footer')
    </div>
</div>
<!-- script -->
@include('script')
</body>
</html>
