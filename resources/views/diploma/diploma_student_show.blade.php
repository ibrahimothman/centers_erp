<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS & js -->
@include('library')
<!-- style -->
    <link href="/css/diploma_style.css" rel="stylesheet"/>
    <title>show student in diploma</title>
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
                    <div class="card-header text-primary form-title view-courses-title">
                        <h3>الطلاب المسجلين بالدبلومه </h3>
                        <a href="{{ route('diploma-enrollments.create') }}">
                            <button type="button" class="btn btn-success">أضف طالب</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class=" clearfix"> <span class="float-right">
                        <div class="btn-group print-btn p-3 ">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"> اختار اسم الدبلومه </button>
                            <div class="dropdown-menu">
                                @foreach($all_diplomas as $diploma)
                                    <a class="dropdown-item" href="{{ route('diploma-enrollments.index') }}?diploma_id={{ $diploma->id }}">{{ $diploma->name }}</a>
                                @endforeach
                            </div>
                        </div>

                        </span></div>
                        <!-- table -->
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th class="th-sm">اسم الطالب</th>
                                <th class="th-sm">اسم الدبلومه</th>
                                <th class="th-sm">المعاد</th>
                                <th class="th-sm"> تعديل</th>
                                <th class="th-sm"> ازاله</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($groups as $group)
                                @foreach($group->students as $student)
                                    <tr id="container-{{$group->id}}-{{$student->id}}">
                                        <td>{{ $student->nameAr }}</td>
                                        <td>{{ $group->diploma->name }}</td>
                                        <td>{{ $group->starts_at }}</td>
                                        <td>

                                            <a href="{{ route('diploma-enrollments.edit', ['student_id' => $student->id, 'diploma_group' => $group->id]) }}" class=" btn btn-outline-primary  py-1 px-2 "><i
                                                    class="fas fa-edit m-0 "></i> </a>

                                        </td>
                                        <td>
                                            <form>
                                                <button type="button" id="delete-diploma-enrollment-{{$group->id}}-{{$student->id}}" class="btn btn-outline-danger py-1 px-2">
                                                    <i class="fas fa-trash-alt m-0"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <!-- Footer -->
    @include('footer')
    <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- scroll top -->
@include('scroll_top')
@include('script')
<script>

    $('button[id^=delete-diploma-enrollment-]').on('click', function () {
        var e = $(this).attr('id').split('-');
        var student_id = e[e.length-1];
        var group_id = e[e.length-2];

        deleteEnrollment(group_id, student_id);
    })
    function deleteEnrollment(group_id, student_id) {
        $.ajax({
            url : '/diploma-enrollments/'+student_id,
            type : 'delete',
            data : { student_id: student_id, group_id : group_id, '_token' : '{{ csrf_token() }}'  },
            success : function (data, status) {
                console.log(status);
                if(status === 'success') {
                    $('tr[id=container-'+group_id+'-'+ student_id +']').remove();
                }
            }
        });
    }
</script>

</body>
</html>
