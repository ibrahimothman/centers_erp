<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS & js -->
    @include('library')

    <!-- Custom styles for this page -->
    <link href="{{url('vendor/datatables/datatables.min.css')}}" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>test-take</title>

</head>

<body id="page-top">

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
                                <div class="col-md-6">تسجيل حضور الطلاب</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class=" clearfix col-md-8 mb-4">

                                <form method="get" action="{{url("test-takes/create")}}" >
                                    <div class="form-row col-md-12 ">
                                        <select name="test"  id="testselector"     class="form-control ">
                                            <option value="0"> اختر الامتحان</option>
                                            @foreach($tests as $test)
                                                <option data-extra="{{ $test }}" value="{{$test->id}}">{{$test->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>

                            <!-- stu-block -->


                        <div id="dispay_date"/>
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
<script src="{{url('vendor/datatables/datatables.min.js')}}"></script>
<!-- Page level custom scripts -->
<script src="{{url('js/demo/datatables-demo.js')}}"></script>
<script type='text/javascript' src="{{url('js/notify.min.js')}}"></script>
<script type='text/javascript' src="{{url('js/notification.js')}}"></script>
@include('script')

<script>
    $(document).ready( function () {
        $('#DataTable').DataTable();
        $('input[type=checkbox]').change(function(){
            if (this.checked) {
                alert('checked');
            }
        });
    } );
</script>

<script>


    $('#testselector').change(function () {
       var test_id = $(this).val();
       if(test_id !== 0){
           var selected_test = $.parseJSON($(this).find(':selected').attr('data-extra'));
           console.log(selected_test);
           displayData(selected_test);

       }

    });



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

            lines+="<td>تاريخ الامتحان : <span>"+ group.times[0].day +"</span></td>";
            lines+="<td>ميعاد البدايه  : <span>"+ group.times[0].begin +"</span></td>";
            lines+="<td>ميعاد النهايه  : <span>"+ group.times[0].end +"</span></td>";
            lines+="</tr>";
            lines+="</table>";
            lines+="</div>";
            lines+="</div>";
            lines += "<div class='card card  card-sh   p-3 test-view '>";
            lines += "<div class='card-header bg-transparent border-primary text-success font-weight-bold  clearfix'>";
            lines += "<span  class='float-left text-succes'>تسجيل حضور الطلاب</span> </div>";
            lines += "<div class='card-body '>";
            lines += "<form class='needs-validation' novalidate>";
            lines += "<table id='DataTable' class='table table-striped table-bordered display  hover'>";

            <!--Table head-->
            lines += "<thead>";
            lines += "<tr class='w-100 t2 table-info'>";
            lines += "<th class='' >صوره الطالب </th>";
            lines += "<th class='' >اسم الطالب</th>";
            lines += "<th class='' >رقم الطالب</th>";
            lines += "<th class='' >حاله الدفع </th>";
            lines += "<th class='' >تسجيل حضور</th>";
            lines += "<th class='' >تاكيد الشخصيه</th>";


            lines += "</tr>";
            lines += "</thead>";
            lines += "<tbody>";
            <!--Table head-->

            <!--Table body-->
            var i = 1;
            group.enrollers.forEach(function (student) {

                    lines += "<tr>";


                    lines += "<td><img src='"+ student.image +"' onerror='imgError(this)' alt='' class='rounded-circle img-profile-contact float-right img-responsive'></td>";
                    lines += "<td >" + student.nameAr + "</td>";
                    lines += "<td >" + student.id + "</td>";

                    lines += "<td>تم الدفع</td>";
                   lines += " <td >";
                   lines += " <div class='custom-control custom-checkbox'>";
                   if(group.opened){
                       if(student.pivot.take) lines += "<input type='checkbox' checked  onchange='saveTake("+ student.id+","+ group.id +","+i+")' class='custom-control-input'  id='confirm-"+group.id+"' >";
                       else lines += "<input type='checkbox'  onchange='saveTake("+ student.id+","+ group.id +","+i+")' class='custom-control-input'  id='confirm-"+group.id+"' >";
                   }
                   else{
                       if(student.pivot.take) lines += "<input type='checkbox' disabled checked  onchange='saveTake("+ student.id+","+ group.id +","+i+")' class='custom-control-input'  id='confirm-"+group.id+" '>";
                       else lines += "<input type='checkbox' disabled  onchange='saveTake("+ student.id+","+ group.id +","+i+")' class='custom-control-input'  id='confirm-"+group.id+"'>";
                   }

                   lines += " <label class='custom-control-label' for='confirm-"+group.id+"'></label>";
                    lines += "</div>";
                    lines += "</td>";
                    lines += "<td  class='up'><div class='file  upload btn btn-sm btn-primary'>";
                    if(group.opened) lines += "<input type='file' id='upload-photo-"+ group.id +"' name='photo' /> تحميل الصوره </div></td>";
                    else lines += "<input type='file' id='upload-photo-"+ group.id +"' name='photo' disabled /> تحميل الصوره </div></td>";
                    lines += "</tr>";
                    i++;

            });

            lines += "<tr class='align-middle ' >";
            lines += "<td colspan='7' class='align-middle  ' >";
            var btn_txt = group.opened? 'اغلاق الامتحان' : 'اعاده فتح الامتحان';
            lines += "<button data-isOpened='"+ group.opened +"' id='close-group-"+ group.id +"' class='cg btn btn-success w-100'  type='button'>"+ btn_txt +"</button>";
            lines += "</td>";
            lines += "</tr>";
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

    function saveTake(student_id,group_id,i) {
        var take = 0;
        if($('#confirm-'+group_id).prop('checked') == true) take = 1;
        $.ajax({
            url:'/test-takes',
            type:'post',
            data:{student_id : student_id, group_id : group_id, take : take, _token: "{{ csrf_token() }}"},
            success: function (data) {
            data=data.replace(/\r?\n|\r/, '');
            var className;
            if (take===1)className='done';
                    else className='notDone';

            $.notify(data, {
                    position:"bottom left",
                    style: 'successful-process',
                    className: 'done',
                    // autoHideDelay: 500000
                });

            }
        })

    }

    $(document).on('click', '[id^=close-group-]', function (e) {
       var group_id = $(this).attr('id').split('-')[2];
       toggleGroup(group_id);
    });
    function toggleGroup(group_id) {
        $.ajax({
            url:'/close_group',
            type:'post',
            data:{group_id : group_id,  _token: "{{ csrf_token() }}"},
            success: function (data) {
                $.notify(data, {
                    position:"bottom left",
                    style: 'successful-process',
                    className: 'done',
                    // autoHideDelay: 500000
                });
                $('#close-group-'+group_id).text(function () {
                    var isOpened = $(this).attr('data-isOpened');
                    console.log("group was opened: "+isOpened);
                    if (isOpened == 1){
                        // toggle to reopen
                        $(this).attr('data-isOpened', 0);


                        return "اعاده فتح الامتحان";
                    }else{
                        $(this).attr('data-isOpened', 1);

                        return "اغلاق الامتحان";
                    }

                });

                // toggle take checkbox and update image ability
                $('#confirm-'+group_id).prop('disabled', function (i,v) {
                    return !v;
                });
                $('#upload-photo-'+group_id).prop('disabled', function (i,v) {
                    return !v;
                });

            }
        })
    }




</script>


</body>
</body>
</html>
