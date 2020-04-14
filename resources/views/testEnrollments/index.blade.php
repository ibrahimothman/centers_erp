<!DOCTYPE html>
<html lang="en">
<head>
    @include('library')
 <!-- Custom styles for this page -->
 <link href="/../../../vendor/datatables/datatables.min.css" rel="stylesheet">

 <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <title>test-stu-view</title>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<!-- Begin Page Content -->
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
</div>
            <!-- End of Main Content -->

            <!-- Footer -->
    @include('footer')
</div>
</div>
<!-- End of Page Wrapper -->
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
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
      lines+="<span class='float-right'>";
      lines += "<a href="+"'test-enrollments/create?id=" +test.id + "'class='btn btn-outline-success'>";
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
              lines += "<td><button onclick='deleteEnrollment("+ student.id +","+ group.id +","+ test.id +");'  class='btn btn-outline-danger  btn-sm '><i class='fas fa-trash-alt'></i> </button></td>";
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

    function deleteEnrollment(student_id, test_group_id, test_id) {
        console.log(student_id+','+test_group_id);
        $.ajax({
            url:'/delete-test-enrollments',
            type:'DELETE',
            data : {student_id : student_id, test_group_id : test_group_id, _token : '{{ csrf_token() }}'},

            success: function (data) {
                // console.log(data);
                getTestEnrollments(test_id);
                // window.location = 'test-enrollments';
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
