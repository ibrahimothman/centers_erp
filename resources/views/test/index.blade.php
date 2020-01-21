<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>test-det-view</title>

    <!-- Custom fonts for this template-->
    <link href="/../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/../../../css/sb-admin-rtl.css" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
        integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If"
        crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script
        src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"
        integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k"
        crossorigin="anonymous"></script>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    @include('sidebar')
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
                        <input type="text" class="form-control bg-light border-0 small" placeholder="البحث عن " id="search" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button"> <i class="fas fa-search fa-sm"></i> </button>
                        </div>
                    </div>
                </form>

               @include('tobbar')
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
                                <div  class="col-md-12">
                                    <div id="data">
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

        <script>
            $(document).ready(function () {
                // get all center's tests
                getTests();
            });

            function getTests() {
                $.ajax({
                    url:'/all-tests',
                    type:'GET',
                    success: function (data) {
                        var lines = "";
                        data.forEach(function (test) {
                            // console.log(test.name);
                            lines += "<div class='card card  card-sh  border-primary p-3 test-view'>";
                            lines += "<div class='card-header bg-transparent border-primary text-success font-weight-bold  clearfix'>";
                            lines += "<span class='float-right'>";
                            lines += "<a href='/test-groups/create?id="+test.id+"' class='btn btn-outline-success '><i class='fas fa-plus'></i> <SPAN>تسجيل الامتحان</SPAN> </a>";
                            lines += "<a href='tests/"+test.id+"/edit/' class=' btn btn-outline-primary '><i class='fas fa-edit'></i> </a>";
                            lines += "<button onclick='deleteTest("+test.id+");' class='btn btn-outline-danger'> <i class='fas fa-trash-alt'></i> </button>";
                            lines += "</span>";
                            lines += "<span  class=' float-left'>"+test.name+"</span>";
                            lines += "</div>";
                            lines += "<div class='card-body '>";
                            lines += "<p class='card-title text-primary '> عن الامتحان : </p>";
                            lines += "<span class='card-text text-justify'>"+test.description+"</span>";
                            lines += "<div class='dropdown-divider'></div>";
                            lines += "<div class='card-text clearfix '> <span class='w-50 p-3  text-primary' > تكلفه الامتحان :</span>";
                            lines += "<div class='d-inline p-2 '> <span class='text-warning  ' >فردي : </span> <span class=' text-secondary ' >"+test.cost_ind+" جنيها </span> </div>";
                            lines += "<div class='d-inline p-2 '> <span class='text-warning  ' >كورس : </span> <span class=' text-secondary ' >"+test.cost_course+" جنيها </span> </div>";
                            if(test.retake)
                                lines += "<div class='d-inline p-5  '> <span class='btn-success rep ' >قابل للاعاده</span> </div>";
                            else
                                lines += "<div class='d-inline p-5  '> <span class='btn-warning rep ' >غير قابل للاعاده</span> </div>";
                            lines += "<footer class='blockquote-footer float-right'>";
                            lines += "<span>تاريخ الاضافه "+test.created_at+"</span>";
                            lines += " </footer>";
                            lines += "</div>";
                            lines += "</div>";
                            lines += "</div>";

                        });

                        $('#data').html(lines);
                    }
                });
            }

            function deleteTest(test_id) {
                $.ajax({
                    url: '/tests/'+test_id,
                    type: 'DELETE',
                    data : {'_token':"{{csrf_token()}}"},
                    success : function (data) {
                        console.log(data);
                        getTests();
                    }
                });
            }
        </script>
</body>
</html>
