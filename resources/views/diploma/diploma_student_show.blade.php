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
                                    <a class="dropdown-item" href="{{ route('diploma-enrollments.index') }}?id={{ $diploma->id }}">{{ $diploma->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="btn-group p-3 ">
                            <input type="text" class="form-control " name="x" placeholder="ابحث">
                            <div class="btn-group">
                                <button class="btn btn-success"><i class="fas fa-search"></i></button>
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
                            @foreach($diplomas as $diploma)
                                @foreach($diploma->groups as $group)
                                    @foreach($group->students as $student)
                                        <tr>
                                            <td>{{ $student->nameAr }}</td>
                                            <td>{{ $diploma->name }}</td>
                                            <td>{{ $group->starts_at }}</td>
                                            <td>

                                                <a href="{{ route('diploma-enrollments.edit', ['student_id' => $student->id, 'diploma_group' => $group->id]) }}" class=" btn btn-outline-primary  py-1 px-2 "><i
                                                            class="fas fa-edit m-0 "></i> </a>

                                            </td>
                                            <td>
                                                <form>
                                                    <button type="button" onclick="deleteEnrollment('{{ $group->id }}', '{{  $student->id }}');" class="btn btn-outline-danger py-1 px-2">
                                                        <i class="fas fa-trash-alt m-0"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
    function deleteEnrollment(diploma_group_id, student_id) {
        console.log("diploma_group_id : "+diploma_group_id+", student_id : "+student_id);
        {{--$.ajax({--}}
        {{--    url : '/diploma-enrollments/1',--}}
        {{--    type : 'delete',--}}
        {{--    data : { diploma_group_id : diploma_group_id, student_id : student_id, '_token' : '{{ csrf_token() }}'  },--}}
        {{--    success : function (data) {--}}
        {{--        window.location.reload();--}}
        {{--    }--}}
        {{--});--}}
    }
</script>

</body>
</html>
