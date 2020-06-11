<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS & js -->
@include('library')
    <title>show jobs</title>
    <style>
        .view-courses-title {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body id="page-top">
<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
    <!-- Page Heading -->
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-primary form-title view-courses-title">
                        <h3>الوظائف </h3>
                        <a href="">
                            <button type="button" class="btn btn-success">أضف وظيفه</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="btn-group p-3 " style="float:left;">
                            <input type="text" class="form-control " name="x" placeholder="ابحث">
                            <div class="btn-group">
                                <button class="btn btn-success"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <!-- table -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-sm" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th class="th-sm">اسم الوظيفه</th>
                                    <th class="th-sm">الموظفين</th>
                                    <th class="th-sm"> الصالحيات</th>
                                    <th class="th-sm"> تعديل</th>
                                    <th class="th-sm"> ازاله</th>
                                </tr>
                                </thead>
                                <tbody>
                                            <tr>
                                                <td>receptionist</td>
                                                <td>
                                                    <a href="">
                                                        <button type="button" class="btn btn-warning">عرض الموظفين</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>اضافه وحذف الطلاب</li>
                                                        <li>الاستقبال</li>
                                                        <li>تسجيل مواعيد</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <a href="" class=" btn btn-outline-primary  py-1 px-2 "><i
                                                                class="fas fa-edit m-0 "></i> </a>

                                                </td>
                                                <td>
                                                    <form>
                                                        <button type="button" onclick="" class="btn btn-outline-danger py-1 px-2">
                                                            <i class="fas fa-trash-alt m-0"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <!-- Footer -->
    @include('footer')
    <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- scroll top -->
@include('scroll_top')
@include('script')
</body>
</html>
