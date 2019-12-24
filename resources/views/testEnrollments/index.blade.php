<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>test-stu-view</title>

<!-- Custom fonts for this template-->
<link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{url('css/sb-admin-rtl.css')}}" rel="stylesheet">
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
 <link href="/../../../vendor/datatables/datatables.min.css" rel="stylesheet">

 <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

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
                        <div class="col-md-6"> الطلاب المسجلين بالامتحانات</div>
                    </div>
                </div>
                <div class="card-body">




                    <div class=" clearfix col-md-8 mb-4">

                            <form >
                                    <div class="form-row col-md-12 ">
                                            <select   id="testselector"   class="form-control ">
                                                <option value="0">اختر الامتحان</option>
                                                @foreach($tests as $test)
                                                    <option value={{ $test->id }}>{{ $test->name }}</option>
                                                 @endforeach
                                                </select>
                                    </div>
                            </form>
                        </div>

                            <div id="test1">

                            </div>

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
<script src={{url('vendor/jquery/jquery.min.js')}}></script>
<script src={{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}></script>

<!-- Core plugin JavaScript-->
<script src={{url('vendor/jquery-easing/jquery.easing.min.js')}}></script>

<!-- Custom scripts for all pages-->
<script src={{url('employee')}}></script>
<!-- Page level plugins -->
<script src={{url('vendor/datatables/datatables.min.js')}}></script>
<!-- Page level custom scripts -->
<script src={{url('js/demo/datatables-demo.js')}}></script>
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
  $('#datatable-buttons2').DataTable( {
      dom: 'Bfrtip',
      buttons: [
          'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5'
      ]
  } );$('#datatable-buttons3').DataTable( {
      dom: 'Bfrtip',
      buttons: [
          'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5'
      ]
  } );



} );

  function displayTestsEnrollments(test) {
      var lines ="";
          lines += "<div class='row cont-det' >";
          lines+="<div class='col-md-12'>";
          lines+="<div class='card card  card-sh  border-primary p-3 test-view'>";
          lines+= "<div class='card-header bg-transparent border-primary text-success font-weight-bold  clearfix'>";
          lines+="<span class='float-right'><a href='{{ route('test-enrollments.create') }}' class='btn btn-outline-success'>";
          lines+="<i class='fas fa-plus'></i> <SPAN> اضافه طالب</SPAN> </a></span>";
      lines+="<span  class='float-left'>الطلاب المسجلين على امتحان "+ test.name +"</span> </div>";
          lines+= "<div class='card-body'>";
          lines+="<table id='datatable-buttons_wrapper' class='table table-striped table-bordered display  hover'>";
          lines+="<thead>";
          lines+= "<tr class='w-100'>";
          lines+= '<th class="w-10">امتحان</th>';
          lines+= '<th class="w-30">ميعاد الامتحان</th>';
          lines+='<th class="w-30">رقم الطالب</th>';
          lines+='<th class="w-30">اسم الطالب</th>';
          lines+='<th class="w-10"></th>';
          lines+= '</tr>';
          lines+= '</thead>';
          lines+="<tbody>";

      test.groups.forEach(function (group) {
          console.log('group '+group.id);
          group.enrollers.forEach(function (student) {
              lines += "<tr>";
              lines += "<td>" + test.name + "</td>";
              lines += "<td>"+ group.group_date +"</td>";
              lines += "<td>" + student.id + "</td>";
              lines += "<td>" + student.nameAr + "</td>";
              lines += "<td><button onclick='deleteEnrollment("+ student.pivot.student_id +","+ student.pivot.test_group_id +");'  class='btn btn-outline-danger  btn-sm '><i class='fas fa-trash-alt'></i> </button></td>";
              lines += "</tr>";
          });
      });


          lines+="</tbody>";
          lines+="</table>";
          lines+="</div>";
          lines+="</div>";
          lines+="</div>";
          lines+="</div>";


        $('#test1').html(lines);
  }


// if user choose a test to display its group enrollment
$('#testselector').change(function () {
    var test_id = $('#testselector').val();
    getTestEnrollments(test_id);

});
function getTestEnrollments(test_id) {

      // var test_id = $('#testselector').val();
    // console.log('getTestEnrollments');

    $.ajax({
        url:'/get_tests_enrollments',
        type:'GET',
        data : {test_id : test_id},
        dataType : 'json',
        success: function (data) {
            // console.log(data);
            displayTestsEnrollments(data);
        }
    });
}

    function deleteEnrollment(student_id, test_group_id) {
        console.log(student_id+','+test_group_id);
        $.ajax({
            url:'/delete-test-enrollments',
            type:'DELETE',
            data : {student_id : student_id, test_group_id : test_group_id, _token : '{{ csrf_token() }}'},

            success: function (data) {
                // console.log(data);
                window.location = 'test-enrollments';
            }
        });
    }
  </script>

<script>
        $(function() {
            $('#testselector').change(function(){

                if($(this).val()=="test")
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

        </script>

</body>
</body>
</html>
