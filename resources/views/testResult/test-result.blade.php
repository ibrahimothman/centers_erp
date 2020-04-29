<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS & js -->
    @include('library')
    <title>test-result</title>
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/datatables.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    @inject('Utility', 'App\Utility')

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
    <!-- Main Content -->
        <div id="content">
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
                                                <option data-extra="{{ $test }}" value={{$test->id}}>{{$test->name}}</option>
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
        </div>
        <!-- End of Main Content -->
    </div>
    <!-- Footer -->
@include('footer')
<!-- End of Footer -->


    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
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
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
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

    function displayData(test) {
        console.log(test);
        var lines = '';
        lines += "<div class='row cont-det  border-bottom-info mb-4 ' id='test1'>";
        lines += "<div class=' card-body col-md-12'>";
        lines += "<div class='card card-sh p-3 mb-4 border-bottom-info '>";
        lines+="<div class='card-body'>";
        test.groups.forEach(function (group) {
            lines+="<table  class='table '>";
            lines+="<tr class='table-warning'>";
            lines+="<td>اسم الامتحان : <span>"+ test.name +"</span></td>";
            // var groupDate = (group.group_date).split(' ')[0];
            // var startTime = convertTime((group.group_date).split(' ')[1]);
            lines+="<td>تاريخ الامتحان : <span>"+ group.times[0].day +"</span></td>";
            lines+="<td>ميعاد البدايه  : <span>"+ group.times[0].begin +"</span></td>";
            lines+="<td>ميعاد النهايه  : <span>"+ group.times[0].end +"</span></td>";
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
                    lines += " <td> <button class='btn btn-primary' type='button' onclick='printStatement("+ test.statement.id+", "+ student.id +")' ><i></i> طباعة افاده</button> </td>";
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
        console.log('satement: '+test_statement_id+", student: "+student_id);
        location.href = 'test-statements-preview/1/'+student_id;
        // console.log(test_statement_id+" / "+student_id);
    }
</script>

</body>
</body>
</html>
