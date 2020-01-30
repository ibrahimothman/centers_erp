<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS & js -->
    @include('library')
<!-- style -->
    <link href="/css/diploma_style.css" rel="stylesheet"/>
    <title>show student in diploma</title>
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
                            <h3>الطلاب المسجلين بالدبلومه </h3>
                            <a href="">
                                <button type="button" class="btn btn-success">أضف طالب</button>
                            </a>
                        </div>
                    <div class="card-body">
                        <div class=" clearfix"> <span class="float-right">
                        <div class="btn-group print-btn p-3 ">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"> اختار اسم الدبلومه </button>
                            <div class="dropdown-menu">
                               <a class="dropdown-item" href="#">full stack diploma</a>
                                <a class="dropdown-item" href="#">full stack diploma</a>
                                <a class="dropdown-item" href="#">full stack diploma</a>
                            </div>
                        </div>
                        <div class="btn-group p-3 ">
                            <input type="text" class="form-control " name="x" placeholder="ابحث">
                            <div class="btn-group">
                                <button class="btn btn-success"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </span></div>
                        <!-- table -->
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th class="th-sm">اسم الطالب</th>
                                <th class="th-sm">اسم الدبلومه</th>
                                <th class="th-sm">الايام</th>
                                <th class="th-sm">المعاد</th>
                                <th class="th-sm"> تعديل</th>
                                <th class="th-sm"> ازاله</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>احمد محمد</td>
                                <td>full stack diploma</td>
                                <td> السبت والاربعاء</td>
                                <td>2 : 5</td>
                                <td>
                                    <a href="" class=" btn btn-outline-primary  py-1 px-2 "><i
                                                class="fas fa-edit m-0 "></i> </a>

                                </td>
                                <td>
                                    <form>
                                        <button type="submit" class="btn btn-outline-danger py-1 px-2">
                                            <i class="fas fa-trash-alt m-0"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <!-- second row -->
                            <tr>
                                <td>احمد محمد</td>
                                <td>full stack diploma</td>
                                <td> السبت والاربعاء</td>
                                <td>2 : 5</td>
                                <td>
                                    <a href="" class=" btn btn-outline-primary  py-1 px-2 "><i
                                                class="fas fa-edit m-0 "></i> </a>

                                </td>
                                <td>
                                    <form>
                                        <button type="submit" class="btn btn-outline-danger py-1 px-2">
                                            <i class="fas fa-trash-alt m-0"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <!-- third row -->
                            <tr>
                                <td>احمد محمد</td>
                                <td>full stack diploma</td>
                                <td> السبت والاربعاء</td>
                                <td>2 : 5</td>
                                <td>
                                    <a href="" class=" btn btn-outline-primary  py-1 px-2 "><i
                                                class="fas fa-edit m-0 "></i> </a>

                                </td>
                                <td>
                                    <form>
                                        <button type="submit" class="btn btn-outline-danger py-1 px-2">
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
        <!-- /.container-fluid -->
        <!-- Footer -->
    @include('footer')
    <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
@include('script')

</body>
</html>
