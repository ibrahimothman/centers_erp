<!DOCTYPE html>
<html lang="en">
<head>
    @include('library')
    <title>social media edit</title>
</head>
<body id="page-top">
<!-- Page Wrapper -->
<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
    <!-- Begin Page Content -->
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-header text-primary ">
                                تعديل الروابط
                            </div>

                            <div class="card-body">
                                <form>
                                    <div class="form-row form-group">
                                        <div class="col-3 ">رابط الفيسبوك
                                        </div>
                                        <div class="col-9 ">
                                            <input type="url" name="" class='form-control'
                                                   placeholder='facebook link'>
                                        </div>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class="col-3 ">رابط توتير
                                        </div>
                                        <div class="col-9 ">
                                            <input type="url" name="" class='form-control'
                                                   placeholder='twitter link'>
                                        </div>
                                    </div>
                                    <div class="form-row form-group">
                                        <div class="col-3 ">رابط لينكد ان
                                        </div>
                                        <div class="col-9 ">
                                            <input type="url" name="" class='form-control'
                                                   placeholder='linked in link'>
                                        </div>
                                    </div>
                                    <div class="form-row save">
                                        <div class="col-sm-6 mx-auto" style="width: 200px;">
                                            <button class="btn btn-primary action-buttons" type="submit" id="submit">
                                                إضافة
                                            </button>
                                            <button class="btn  btn-danger action-buttons" type="reset"> إلغاء
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>        <!-- End of Main Content -->
        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
</body>
</html>
