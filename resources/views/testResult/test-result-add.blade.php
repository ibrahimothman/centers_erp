<!DOCTYPE html>
<html lang="en">
<head>
    @include('library')
<title> تسجيل نتيجه الامتحانات</title>
 <!-- Custom styles for this page -->
 <link href="/../../../vendor/datatables/datatables.min.css" rel="stylesheet">

 <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

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
                        <div class="col-md-6">  تسجيل نتيجه الامتحانات</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class=" clearfix col-md-8 mb-4">


                                    <div class="form-row col-md-12 ">
                                        <label for="testselector"> اسم الامتحان </label>
                                            <select   id="testselector"   class="form-control ">
                                                <option value="0">اختر الامتحان</option>
                                                @foreach($tests as $test)
                                                    <option data-extra="{{ $test }}" value="{{ $test->id }}">{{ $test->name }}</option>
                                                @endforeach
                                                </select>
                                    </div>

                        </div>

                          <!-- stu-block -->


                            <div id="sss">

                            </div>


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

            <!-- Footer -->
@include('footer')
            <!-- End of Footer -->


        <!-- End of Content Wrapper -->
    </div>
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
<script src="/../../../vendor/datatables/datatables.min.js"></script>
<!-- Page level custom scripts -->
<script src="/../../../js/demo/datatables-demo.js"></script>
<script type='text/javascript' src="{{url('js/notify.min.js')}}"></script>

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


    $('#testselector').change(function () {
        var test_id = $('#testselector').val();
        // var date = '2019-09-17 15:15:0';
        if(test_id !== 0){
            var selected_test = $.parseJSON($(this).find(':selected').attr('data-extra'));
            displayGroups(selected_test);

        }
    })

} );



    function saveResult(studentId,groupId,full_mark,i,count) {

        var result = $('#result'+count+i).val();
        if(result.length !== 0 && result <= full_mark){
            $.ajax({
                url:'/test-results',
                type:'post',
                data:{student_id : studentId, group_id : groupId,result : result, _token: "{{ csrf_token() }}"},
                success: function (data) {
                    data=data.replace(/\r?\n|\r/, '');
                    $.notify(data, {
                            position:"bottom left",
                            style: 'successful-process',
                            className: 'done',
                            // autoHideDelay: 500000
                        });
                }
            })
        }else{
            $.notify('الدرجه النهائيه لهذا الامتحان هي '+full_mark, {
                position:"bottom left",
                style: 'successful-process',
                className: 'notDone',
                // autoHideDelay: 500000
            });
        }
    }



    function displayGroups(test) {
        var  lines = "";
        var count = 0;
        test.groups.forEach(function (group) {
            lines+="<div class='card-body col-md-12'>";
            lines+="<div class='card card-sh p-3 mb-4 border-bottom-info'>";
            lines+=   "<div class='card-body'>";
            lines+=   "<table  class='table'>";
            lines+=   "<tr class='table-warning'>";
            lines+=   "<td>اسم الامتحان :<span>"+test.name+"</span></td>";

            lines+= "<td>تاريخ الامتحان :<span>"+group.times[0].day+"</span></td>";
            lines+= "<td>ميعاد البدايه  :<span>"+ group.times[0].begin +"</span></td>";
            lines+= "<td>ميعاد النهايه  :<span>"+ group.times[0].end +"</span></td>";
            lines+= "</tr>";
            lines+="<tr class='table-warning'>";
            lines+=  "<td></td>";
            lines+=  "<td>درجه الامتحان :<span>"+test.result+" درجه</span></td>";
            lines+="<td>درجه النجاح :<span>"+ test.result * .5+" درجه</span></td>";
            lines+= "<td></td>";
            lines+="</tr>";
            lines+='</table>';
            lines+='</div>';
            lines+= '</div>';
            lines+= "<div class='card card  card-sh   p-3 test-view '>";
            lines+= "<div class='card-header bg-transparent border-primary text-success font-weight-bold  clearfix'>";
            lines+=    "<span  class='float-left text-success'>تسجيل نتيجه امتحان "+ test.name +"</span> </div>";
            lines+="<div class='card-body'>";
            lines+= "<div>";
            lines+="<table   id='datatable-buttons' class='table table-striped table-bordered display  hovert'>";
            lines+="<thead>";
            lines+= "<tr class='w-100'>";
            lines+= "<th class='w-10'>#</th>";
            lines+= '<th class="w-10">اسم الامتحان</th>';
            lines+= '<th class="w-30">اسم الطالب</th>';
            lines+='<th class="w-30">الحضور</th>';
            lines+='<th class="w-30">الدرجه</th>';
            lines+='<th class="w-10"></th>';
            lines+= '</tr>';
            lines+= '</thead>';
            lines+="<tbody>";
            for(var i = 0 ,y = 1; i < group.enrollers.length; i++,y++) {
                lines += "<tr>";
                lines += "<td>" + y + "</td>";
                lines += "<td>" + test.name + "</td>";
               lines += "<td>" + group.enrollers[i].nameAr + "</td>";

                if(group.enrollers[i].pivot.take){
                    lines += "<td ><i class='fas fa-check-circle fas-3x text-success'></i></td>";
                    if(group.enrollers[i].pivot.result)lines += "<td><input id="+"result"+count+i+ " type='text' class='form-control' value='"+ group.enrollers[i].pivot.result +"'  required></td>";
                    else lines +=  "<td><input id="+"result"+count+i+ " type='text' class='form-control'  required></td>";
                    lines += "<td><button id="+"save"+count+i+ " class='btn btn-primary' onclick='saveResult("+ group.enrollers[i].id+","+ group.id +","+test.result+","+i+","+count+");' type='button'>حفظ</button></td>";
                }
                else {
                    lines += "<td ><i class='fas fa-times-circle fas-3x text-danger'></i></td>";
                    lines +=  "<td><input id="+"result"+count+i+ " disabled type='text' class='form-control'  required></td>";
                    lines += "<td><button id="+"save"+count+i+ " disabled class='btn btn-primary' onclick='saveResult("+ group.enrollers[i].id+","+ group.id +","+test.result+","+i+","+count+");' type='button'>حفظ</button></td>";
                }


                lines += "</tr>";
            }
            lines += "</tbody>";
            lines +=  '</table>';
            lines +=  '</div>';
            lines +=  '</div>';
            lines +=  '</div>';
            lines += '</div>';
            count++;
        });

        // console.log(lines);
        $('#sss').html(lines);
    }
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

        </script>

<script>
    $.notify.addStyle('successful-process', {
        html: `<div>
                            <span data-notify-text/>
                            <i class="fas fa-times-circle"
                            style="
                                    color:white;
                                    opacity:0.7;
                                    position: relative;
                                    top: 0px;
                                    left: -28px;
                                  "
                            ></i>
                        </div>`,
        classes: {
            base: {
                "white-space": "nowrap",
                "background-color": "green",
                "padding": "15px",
                "padding-left": "35px",
                "border-radius": "3px"
            },
            done: {
                "color": "white",
                "background-color": "#28a745",
                "font-weight":"bold"
            },
            notDone:{
                "color": "white",
                "background-color": "#dc3545",
                "font-weight":"bold"
            }
        }
    });

    $('.btn').click(function(){

        $.notify('تمت العملية بنجاح', {
            position:"bottom left",
            style: 'successful-process',
            className: 'done',
            // autoHideDelay: 500000
        });

    });

    // $.notify('فشلت العملية', {
    // position:"bottom left",
    // style: 'successful-process',
    // className: 'notDone',
    // });

</script>

</body>
</body>
</html>
