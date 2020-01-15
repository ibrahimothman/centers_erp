<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>test-result</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-rtl.css" rel="stylesheet">
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

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/datatables.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    @inject('Utility', 'App\Utility')

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
                        <input type="text" class="form-control bg-light border-0 small" placeholder="البحث عن " aria-label="Search" aria-describedby="basic-addon2">
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
                                    <div class="col-md-6">  نتيجه الامتحانات</div>
                                </div>
                            </div>
                            <div class="card-body">




                                <form class="needs-validation" method="get"  novalidate autocomplete="off">


                                    @csrf
                                    <div class="form-row">

                                        <div class="col-md-6 form-group">
                                            <label for="testselector"> اسم الامتحان </label>

                                            <select class="form-control "  id="testselector" name="test" required>
                                                <option value="0">اختار الامتحان</option>
                                                @foreach($tests as $test)
                                                    <option value={{$test->id}}>{{$test->name}}</option>
                                                @endforeach
                                            </select>
                                            <span id="testselector_error"></span>
                                        </div>
                                    </div>
                                    <!-- stu-block -->
                                    <div id = 'dispay_date'/>



                                    <!-- stu-block-end -->



                                    <!-- stu-block -->




                                    <!-- stu-block-end -->

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
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="vendor/datatables/datatables.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<script>

    $('#datatable-responsive').DataTable( {
        responsive: true
    } );


    $(document).ready(function() {
        $('#datatable-buttons').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );

        $('#datatable-buttons1').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );


    } );

    $('#testselector').change(function () {
        var test_id = $('#testselector').val();
        console.log('test id : '+test_id);
        if(test_id != 0) getTestEnrollments(test_id);
    });
</script>

<script>
    $(function() {
        $('#testselector').change(function(){

            if($(this).val()==="test")
            {
                $('.cont-det').show();
            }
            else
            {
                $('.cont-det').hide();
                $('#' + $(this).val()).show();
            }
        });
    });

    function getTestEnrollments(test_id) {
        $.ajax({
            url:'/get_tests_enrollments',
            type:'GET',
            data : {test_id : test_id},
            dataType : 'json',
            success: function (data) {
                console.log( data);
                displayData(data);
            }
        });
    }


    function convertTime (time) {
        // Check correct time format and split into components
        time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

        if (time.length > 1) { // If time format correct
            time = time.slice (1);  // Remove full string match value
            time[5] = +time[0] < 12 ? 'am' : 'pm'; // Set AM/PM
            time[0] = +time[0] % 12 || 12; // Adjust hours
        }
        return time.join (''); // return adjusted time or original string
    }

    function displayData(test) {
        var lines = '';
        lines += "<div class='row cont-det  border-bottom-info mb-4 ' id='test1'>";
        lines += "<div class=' card-body col-md-12'>";
        lines += "<div class='card card-sh p-3 mb-4 border-bottom-info '>";
        lines+="<div class='card-body'>";

        test.groups.forEach(function (group) {
            lines+="<table  class='table '>";
            lines+="<tr class='table-warning'>";
            lines+="<td>اسم الامتحان : <span>"+ test.name +"</span></td>";
            var groupDate = (group.group_date).split(' ')[0];
            var startTime = convertTime((group.group_date).split(' ')[1]);
            lines+="<td>تاريخ الامتحان : <span>"+ groupDate +"</span></td>";
            lines+="<td>ميعاد البدايه  : <span>"+ startTime +"</span></td>";
            lines+="<td>ميعاد النهايه  : <span>****</span></td>";
            lines+="</tr>";
            lines+="<tr class='table-warning'>";
            lines += "<td></td>";
            lines+=  "<td>درجه الامتحان :<span>"+test.result+" درجه</span></td>";
            lines+="<td>درجه النجاح :<span>"+ test.result * .5+" درجه</span></td>";
            lines += "<td></td>";
            lines+="</table>";
            lines+="</div>";
            lines+="</div>";
            lines += "<div class='card card  card-sh   p-3 test-view '>";
            lines += "<div class='card-header bg-transparent border-primary text-success font-weight-bold  clearfix'>";
            lines += "<span  class='float-left text-succes'>نتيجه الطلاب</span> </div>";
            lines += "<div class='card-body '>";
            lines += "<form class='needs-validation' novalidate>";
            lines += "<table id='DataTable' class='table table-striped table-bordered display  hover'>";

            <!--Table head-->
            lines += "<thead>";
            lines += "<tr class='w-100 t2 table-info'>";
            lines += "<th class='' >اسم الامتحان </th>";
            lines += "<th class='' >اسم الطالب</th>";
            lines += "<th class='' >الدرجه</th>";
            lines += "<th class='' >الحاله </th>";
            lines += "<th class='' >اعاده الامتحان</th>";
            lines += "<th class='' >طباعة افاده</th>";


            lines += "</tr>";
            lines += "</thead>";
            lines += "<tbody>";
            <!--Table head-->

            <!--Table body-->
            var i = 1;
            group.enrollers.forEach(function (student) {
                if(student.pivot.take) {
                    lines += "<tr>";
                    lines += "<td>" + test.name + "</td>";
                    lines += "<td ><a href=''>" + student.nameAr + "</a></td>";
                    lines += "<td>" + student.pivot.result + "</td>";
                    var status = '';
                    if (student.pivot.result >= test.result * .5) status = 'ناجح';
                    else status = 'راسب';
                    lines += "<td>" + status + "</td>";
                    if (test.retake) lines += " <td> <button id='retake_test' type='button' class='btn btn-primary' >اعاده الامتحان</button> </td>";
                    else lines += " <td> <button class='btn btn-primary' disabled   ><i class='fas fa-sync'></i> اعاده الامتحان</button> </td>";
                    lines += " <td> <button class='btn btn-primary' type='button'  ><i></i> طباعة افاده</button> </td>";
                    lines += "</tr>";
                    i++;
                }

            });

            lines += " </tbody>";
            lines += "</table>";
            lines += "</form>";
            lines += "</div>";
            lines += "</div>";
            lines += "</div>";
            lines += "</div>";
        });

        $('#dispay_date').html(lines);

    }

    function printStatement(test_statement_id, student_id) {
        //
        location.href = 'test-statements-preview/'+test_statement_id+'/'+student_id;
        console.log(test_statement_id+" / "+student_id);
    }

</script>

</body>
</body>
</html>
