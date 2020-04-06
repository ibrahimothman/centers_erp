<!DOCTYPE html>
<html lang="ar">
<head>
@include('library')
<!-- Bootstrap CSS & js -->
   <link rel="stylesheet" href="/css/employee.css">
   <title>employee profile</title>
</head>
<body id="page-top">
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
                        <h3 class="float-left"> الملف الشخصي </h3>
                            <button type="button" class="btn btn-success float-right ">تعديل الملف الشخصي</button>
                    </div>
                        <div class="card-body">
                            <div class="container emp-profile">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="profile-head">

                                                <h5>
                                                   <span class="text-primary icons"><i class="fas fa-user-circle"></i> </span>
                                                  احمد محمد محمود
                                                </h5>
                                                <br>
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                           href="#home" role="tab" aria-controls="home"
                                                           aria-selected="true">البيانات الشخصيه</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tab" data-toggle="tab"
                                                           href="#profile" role="tab" aria-controls="profile"
                                                           aria-selected="false">بيانات اخري</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-8">
                                            <div class="tab-content profile-tab" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                     aria-labelledby="home-tab">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>الاسم باللغه العربيه</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>احمد محمد محمود</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>الاسم باللغه الانجليزيه</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>Ahmed mohamed</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>الرقم القومي</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>2562215662255</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>رقم التليفون</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>4555555555</p>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="tab-pane fade" id="profile" role="tabpanel"
                                                     aria-labelledby="profile-tab">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>تليفون اخر</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>555555555555</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>رقم جواز السفر</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>888888888888</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>البلد</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>مصر</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>المدينه</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>منصوره</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>العنوان</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>المشايه</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>نظام المحاسبه</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>ساعه</p>
                                                        </div>
                                                    </div>
                                   </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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