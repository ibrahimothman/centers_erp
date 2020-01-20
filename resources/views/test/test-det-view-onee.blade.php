<!DOCTYPE html>
<html lang="en">
<head>
    @include('library')
    <title>test-det-view</title>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15"> </div>
            <div class="sidebar-brand-text mx-3">اداره النظام</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item "> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"> <i class="fas fa-users-cog"></i> <span>الطلاب</span> </a>
            <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded"> <a class="collapse-item" href="contact-reg.html">تسجيل  الطلاب</a> <a class="collapse-item " href="contact.html">عرض/تعديل  بيانات الطلاب</a> </div>
            </div>
        </li>





        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item active"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities"> <i class="fas fa-fw fa-wrench"></i> <span>الامتحانات</span> </a>
            <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">


                    <a class="collapse-item active " href="/test/create">اضافه بيانات الامتحانات</a>
                    <a class="collapse-item " href="/test"> عرض/تعديل بيانات الامتحانات </a>
                    <a class="collapse-item " href="/test_group/create"> تسجيل الامتحانات </a>
                    <a class="collapse-item " href="/test_group"> عرض مواعيد الامتحانات </a>
                    <a class="collapse-item " href="/test_enrollment/create">تسجيل الطلاب على الامتحان </a>
                    <a class="collapse-item " href="/test_enrollment">عرض الطلاب المسجلين  </a>
                </div>
            </div>
        </li>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities"> <i class="fas fa-fw fa-wrench"></i> <span>الدورات</span> </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded"> <a class="collapse-item" href="utilities-color.html">تسجيل الدورات</a> </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"> <i class="fa fa-bars"></i> </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="البحث عن " aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button"> <i class="fas fa-search fa-sm"></i> </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none"> <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-search fa-fw"></i> </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder=" البحث عن" aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button"> <i class="fas fa-search fa-sm"></i> </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow"> <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span> <img class="img-profile rounded-circle" src="img/user.png"> </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown"> <a class="dropdown-item" href="#"> <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> الملف الشخصى </a> <a class="dropdown-item" href="#"> <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> الاعدادات </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> الخروج </a> </div>
                    </li>
                </ul>
            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->

            <!-- Page Heading -->

            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-primary">
                            <div class="row  ">
                                <div class="col-md-6"> الامتحانات </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class=" clearfix"> <span class="float-right">
                        <div class="btn-group print-btn p-3 ">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> الترتيب حسب </button>
                            <div class="dropdown-menu"> <a class="dropdown-item" href="#">الاحدث اضافه</a> <a class="dropdown-item" href="#">الاحدث التعديل</a> </div>
                        </div>
                        <div class="btn-group p-3 ">
                            <div class="btn-group search-panel ">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span id="search_concept">البحث فى </span> <span class="caret"></span> </button>
                                <ul class="dropdown-menu">
                                    <li><a href="">الكل</a></li>
                                    <li><a href="">الاسماء</a></li>
                                </ul>
                            </div>
                            <input type="hidden" name="search_param" value="all" id="search_param">
                            <input type="text" class="form-control " name="x" placeholder="ابحث">
                            <div class="btn-group">
                                <button class="btn btn-success"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </span> </div>
                            <div class="row cont-det">
                                <div class="col-md-12">
                                    <div class="card card  card-sh  border-primary p-3 test-view ">
                                        <div class="card-header bg-transparent border-primary text-success font-weight-bold  clearfix"> <span class="float-right"> <a href="/add_test_time" class="btn btn-outline-success "><i class="fas fa-plus"></i> <SPAN>تسجيل الامتحان</SPAN> </a> <a href="test/1/edit" class=" btn btn-outline-primary "><i class="fas fa-edit"></i> </a> <a href=""  class="btn btn-outline-danger "> <i class="fas fa-trash-alt"></i> </a> </span> <span  class=" float-left">ICDL</span> </div>
                                        <div class="card-body ">
                                            <p class="card-title text-primary "> عن الامتحان : </p>
                                            <span class="card-text text-justify"> تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان </span>
                                            <div class="dropdown-divider"></div>
                                            <div class="card-text clearfix "> <span class="w-50 p-3  text-primary" > تكلفه الامتحان :</span>
                                                <div class="d-inline p-2 "> <span class="text-warning " >فردى : </span> <span class=" text-secondary " >1000 جنيه </span> </div>
                                                <div class="d-inline p-2 "> <span class="text-warning  " >كورس : </span> <span class=" text-secondary " >500 جنيه </span> </div>
                                                <div class="d-inline p-5  "> <span class="btn-success rep " >قابل للاعادة </span> </div>
                                                <footer class="blockquote-footer float-right">
                                                    تاريخ الاضافه <span>8/8/2019<span>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-sh  border-primary p-3 test-view ">
                                        <div class="card-header bg-transparent border-primary text-success font-weight-bold  clearfix"> <span class="float-right"> <a href="test-time-add.html" class="btn btn-outline-success "><i class="fas fa-plus"></i> <SPAN>تسجيل الامتحان</SPAN> </a> <a href="test-det-edit.html" class="btn btn-outline-primary "><i class="fas fa-edit"></i> </a> <a href=""  class="btn btn-outline-danger"> <i class="fas fa-trash-alt"></i> </a> </span> <span  class=" float-left">ICDL</span> </div>
                                        <div class="card-body ">
                                            <p class="card-title text-primary "> عن الامتحان : </p>
                                            <span class="card-text text-justify"> تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان </span>
                                            <div class="dropdown-divider"></div>
                                            <div class="card-text clearfix "> <span class="w-50 p-3  text-primary" > تكلفه الامتحان :</span>
                                                <div class="d-inline p-2 "> <span class="text-warning " >فردى : </span> <span class=" text-secondary " >1000 جنيه </span> </div>
                                                <div class="d-inline p-2 "> <span class="text-warning  " >كورس : </span> <span class=" text-secondary " >500 جنيه </span> </div>
                                                <div class="d-inline p-5  "> <span class="btn-warning rep " >غير قابل للاعادة </span> </div>
                                                <footer class="blockquote-footer float-right">
                                                    تاريخ الاضافه <span>8/8/2019<span>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-sh  border-primary p-3 test-view ">
                                        <div class="card-header bg-transparent border-primary text-success font-weight-bold  clearfix"> <span class="float-right"> <a href="test-time-add.html" class="btn btn-outline-success "><i class="fas fa-plus"></i> <SPAN>تسجيل الامتحان</SPAN> </a> <a href="test-det-edit.html" class="btn btn-outline-primary "><i class="fas fa-edit"></i> </a> <a href=""  class="btn btn-outline-danger"> <i class="fas fa-trash-alt"></i> </a> </span> <span  class=" float-left">ICDL</span> </div>
                                        <div class="card-body ">
                                            <p class="card-title text-primary "> عن الامتحان : </p>
                                            <span class="card-text text-justify"> تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان </span>
                                            <div class="dropdown-divider"></div>
                                            <div class="card-text clearfix "> <span class="w-50 p-3  text-primary" > تكلفه الامتحان :</span>
                                                <div class="d-inline p-2 "> <span class="text-warning " >فردى : </span> <span class=" text-secondary " >1000 جنيه </span> </div>
                                                <div class="d-inline p-2 "> <span class="text-warning  " >كورس : </span> <span class=" text-secondary " >500 جنيه </span> </div>
                                                <div class="d-inline p-5  "> <span class="btn-success rep " >قابل للاعادة </span> </div>
                                                <footer class="blockquote-footer float-right">
                                                    تاريخ الاضافه <span>8/8/2019<span>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-sh  border-primary p-3 test-view ">
                                        <div class="card-header bg-transparent border-primary text-success font-weight-bold  clearfix"> <span class="float-right"> <a href="test-time-add.html" class="btn btn-outline-success "><i class="fas fa-plus"></i> <SPAN>تسجيل الامتحان</SPAN> </a> <a href="test-det-edit.html" class="btn btn-outline-primary "><i class="fas fa-edit"></i> </a> <a href=""  class="btn btn-outline-danger"> <i class="fas fa-trash-alt"></i> </a> </span> <span  class=" float-left">ICDL</span> </div>
                                        <div class="card-body ">
                                            <p class="card-title text-primary "> عن الامتحان : </p>
                                            <span class="card-text text-justify"> تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان </span>
                                            <div class="dropdown-divider"></div>
                                            <div class="card-text clearfix "> <span class="w-50 p-3  text-primary" > تكلفه الامتحان :</span>
                                                <div class="d-inline p-2 "> <span class="text-warning " >فردى : </span> <span class=" text-secondary " >1000 جنيه </span> </div>
                                                <div class="d-inline p-2 "> <span class="text-warning  " >كورس : </span> <span class=" text-secondary " >500 جنيه </span> </div>
                                                <div class="d-inline p-5  "> <span class="btn-success rep " >قابل للاعادة </span> </div>
                                                <footer class="blockquote-footer float-right">
                                                    تاريخ الاضافه <span>8/8/2019<span>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-sh  border-primary p-3 test-view ">
                                        <div class="card-header bg-transparent border-primary text-success font-weight-bold  clearfix"> <span class="float-right"> <a href="test-time-add.html" class="btn btn-outline-success "><i class="fas fa-plus"></i> <SPAN>تسجيل الامتحان</SPAN> </a> <a href="test-det-edit.html" class="btn btn-outline-primary "><i class="fas fa-edit"></i> </a> <a href=""  class="btn btn-outline-danger"> <i class="fas fa-trash-alt"></i> </a> </span> <span  class=" float-left">ICDL</span> </div>
                                        <div class="card-body ">
                                            <p class="card-title text-primary "> عن الامتحان : </p>
                                            <span class="card-text text-justify"> تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان </span>
                                            <div class="dropdown-divider"></div>
                                            <div class="card-text clearfix "> <span class="w-50 p-3  text-primary" > تكلفه الامتحان :</span>
                                                <div class="d-inline p-2 "> <span class="text-warning " >فردى : </span> <span class=" text-secondary " >1000 جنيه </span> </div>
                                                <div class="d-inline p-2 "> <span class="text-warning  " >كورس : </span> <span class=" text-secondary " >500 جنيه </span> </div>
                                                <div class="d-inline p-5  "> <span class="btn-success rep " >قابل للاعادة </span> </div>
                                                <footer class="blockquote-footer float-right">
                                                    تاريخ الاضافه <span>8/8/2019<span>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-sh  border-primary p-3 test-view ">
                                        <div class="card-header bg-transparent border-primary text-success font-weight-bold  clearfix"> <span class="float-right"> <a href="test-time-add.html" class="btn btn-outline-success "><i class="fas fa-plus"></i> <SPAN>تسجيل الامتحان</SPAN> </a> <a href="test-det-edit.html" class="btn btn-outline-primary "><i class="fas fa-edit"></i> </a> <a href=""  class="btn btn-outline-danger"> <i class="fas fa-trash-alt"></i> </a> </span> <span  class=" float-left">ICDL</span> </div>
                                        <div class="card-body ">
                                            <p class="card-title text-primary "> عن الامتحان : </p>
                                            <span class="card-text text-justify"> تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان </span>
                                            <div class="dropdown-divider"></div>
                                            <div class="card-text clearfix "> <span class="w-50 p-3  text-primary" > تكلفه الامتحان :</span>
                                                <div class="d-inline p-2 "> <span class="text-warning " >فردى : </span> <span class=" text-secondary " >1000 جنيه </span> </div>
                                                <div class="d-inline p-2 "> <span class="text-warning  " >كورس : </span> <span class=" text-secondary " >500 جنيه </span> </div>
                                                <div class="d-inline p-5  "> <span class="btn-success rep " >قابل للاعادة </span> </div>
                                                <footer class="blockquote-footer float-right">
                                                    تاريخ الاضافه <span>8/8/2019<span>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-sh  border-primary p-3 test-view ">
                                        <div class="card-header bg-transparent border-primary text-success font-weight-bold  clearfix"> <span class="float-right"> <a href="test-time-add.html" class="btn btn-outline-success "><i class="fas fa-plus"></i> <SPAN>تسجيل الامتحان</SPAN> </a> <a href="test-det-edit.html" class="btn btn-outline-primary "><i class="fas fa-edit"></i> </a> <a href=""  class="btn btn-outline-danger"> <i class="fas fa-trash-alt"></i> </a> </span> <span  class=" float-left">ICDL</span> </div>
                                        <div class="card-body ">
                                            <p class="card-title text-primary "> عن الامتحان : </p>
                                            <span class="card-text text-justify"> تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان </span>
                                            <div class="dropdown-divider"></div>
                                            <div class="card-text clearfix "> <span class="w-50 p-3  text-primary" > تكلفه الامتحان :</span>
                                                <div class="d-inline p-2 "> <span class="text-warning " >فردى : </span> <span class=" text-secondary " >1000 جنيه </span> </div>
                                                <div class="d-inline p-2 "> <span class="text-warning  " >كورس : </span> <span class=" text-secondary " >500 جنيه </span> </div>
                                                <div class="d-inline p-5  "> <span class="btn-success rep " >قابل للاعادة </span> </div>
                                                <footer class="blockquote-footer float-right">
                                                    تاريخ الاضافه <span>8/8/2019<span>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-sh  border-primary p-3 test-view ">
                                        <div class="card-header bg-transparent border-primary text-success font-weight-bold  clearfix"> <span class="float-right"> <a href="test-time-add.html" class="btn btn-outline-success "><i class="fas fa-plus"></i> <SPAN>تسجيل الامتحان</SPAN> </a> <a href="test-det-edit.html" class="btn btn-outline-primary "><i class="fas fa-edit"></i> </a> <a href=""  class="btn btn-outline-danger"> <i class="fas fa-trash-alt"></i> </a> </span> <span  class=" float-left">ICDL</span> </div>
                                        <div class="card-body ">
                                            <p class="card-title text-primary "> عن الامتحان : </p>
                                            <span class="card-text text-justify"> تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان
                                    تفاصيل الامتحان </span>
                                            <div class="dropdown-divider"></div>
                                            <div class="card-text clearfix "> <span class="w-50 p-3  text-primary" > تكلفه الامتحان :</span>
                                                <div class="d-inline p-2 "> <span class="text-warning " >فردى : </span> <span class=" text-secondary " >1000 جنيه </span> </div>
                                                <div class="d-inline p-2 "> <span class="text-warning  " >كورس : </span> <span class=" text-secondary " >500 جنيه </span> </div>
                                                <div class="d-inline p-5  "> <span class="btn-success rep " >قابل للاعادة </span> </div>
                                                <footer class="blockquote-footer float-right">
                                                    تاريخ الاضافه <span>8/8/2019<span>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                    <nav aria-label="Page navigation ">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item disabled"> <span class="page-link">السابق</span> </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item active"> <span class="page-link"> 2 <span class="sr-only">(current)</span> </span> </li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"> <a class="page-link" href="#">التالى</a> </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.container-fluid -->

                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto"> <span>Copyright &copy;وحدة التعليم الالكترونى - جامعه المنصورة </span> </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->
            </div>
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"> <i class="fas fa-angle-up"></i> </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">هل تريد الخروج بالفعل</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
                    <div class="modal-body">اضغط على الخروج اذا كنت ترغب قى  الخروج</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
                        <a class="btn btn-primary" href="login.html">الخروج</a> </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="/../../../vendor/jquery/jquery.min.js"></script>
        <script src="/../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="/../../../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="/../../../js/sb-admin-2.min.js"></script>
</body>
</html>
