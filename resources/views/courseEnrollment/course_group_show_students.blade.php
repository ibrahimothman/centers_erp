<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS & js -->
    @include('library')
 <!-- Custom styles for this page -->
    <link href="/../../../vendor/datatables/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>عرض الطلاب المسجلين علي الكورسات</title>
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
                            <div class="card-header text-primary">
                                <div class="row  ">
                                    <div class="col-md-6"> الطلاب المسجلين بالكورسات</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class=" clearfix col-md-8 mb-4">
                                    <form >
                                        <div class="form-row col-md-12 ">
                                            <select   id="course_selector"   class="form-control ">
                                                <option value="0">اختر الكورس</option>
                                                @foreach($courses as $course)
                                                    <option value={{ $course->id }}>{{ $course->name }}</option>
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
    @include('footer')
                <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
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

    function displayCourseEnrollments(course) {
        var lines ="";
        lines += "<div class='row cont-det' >";
        lines+="<div class='col-md-12'>";
        lines+="<div class='card card  card-sh  border-primary p-3 test-view'>";
        lines+= "<div class='card-header bg-transparent border-primary text-success font-weight-bold  clearfix'>";
        lines+="<span class='float-right'>";
        lines += "<a href="+"'course_enrollment/create?id=" +course.id + "'class='btn btn-outline-success'>";
        lines+="<i class='fas fa-plus'></i> <SPAN> اضافه طالب</SPAN> </a></span>";
        lines+="<span  class='float-left'>الطلاب المسجلين على الكورسات "+ course.name +"</span> </div>";
        lines+= "<div class='card-body'>";
        lines+="<table id='datatable-buttons_wrapper' class='table table-striped table-bordered display  hover'>";
        lines+="<thead>";
        lines+= "<tr class='w-100'>";
        lines+= '<th class="w-10">الكورس</th>';
        lines+= '<th class="w-30">بدايه الكورس</th>';
        lines+='<th class="w-30">رقم الطالب</th>';
        lines+='<th class="w-30">اسم الطالب</th>';
        lines+='<th class="w-10"></th>';
        lines+= '</tr>';
        lines+= '</thead>';
        lines+="<tbody>";

        course.groups.forEach(function (group) {
            console.log('group '+group.id);
            group.joiners.forEach(function (student) {
                lines += "<tr>";
                lines += "<td>" + course.name + "</td>";
                lines += "<td>"+ group.start_at +"</td>";
                lines += "<td>" + student.id + "</td>";
                lines += "<td>" + student.nameAr + "</td>";
                lines += "<td><button onclick='deleteEnrollment("+ student.id +","+ group.id +","+ course.id +");'  class='btn btn-outline-danger  btn-sm '><i class='fas fa-trash-alt'></i> </button></td>";
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
    $('#course_selector').change(function () {
        var course_id = $(this).val();
        if(course_id != 0)
            getCourseEnrollments(course_id);

    });
    function getCourseEnrollments(course_id) {

        // var test_id = $('#testselector').val();
        // console.log('getTestEnrollments');

        $.ajax({
            url:'/get_course_enrollments',
            type:'GET',
            data : {course_id : course_id},
            dataType : 'json',
            success: function (data) {
                // console.log(data);
                displayCourseEnrollments(data);
            }
        });
    }

    function deleteEnrollment(student_id, course_group_id, course_id) {
        console.log(student_id+','+course_group_id);
        $.ajax({
            url:'/course_enrollment/'+1,
            type:'DELETE',
            data : {student_id : student_id, course_group_id : course_group_id, _token : '{{ csrf_token() }}'},

            success: function (data) {
                // console.log(data);
                getCourseEnrollments(course_id);
                // window.location = 'course_enrollment';
            }
        });
    }
</script>

<script>
    $(function() {
        $('#course_selector').change(function(){

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
