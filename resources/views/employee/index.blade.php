<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Bootstrap CSS & js -->
    @include('library')
    <link href="{{url('employee')}}" rel="stylesheet">
    <script wesrc="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>employees</title>


</head>

<body id="page-top">
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
                                <div class="col-md-6">
                                    بيانات الموظفين
                                </div>

                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row cont-header">

                                <div class="col-md-6">


                                </div>
                                <div class="col-md-6">

                                    <div class="btn-group print-btn mr-2 ">

                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            الترتيب حسب
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="/employees?order_by=created_at&sort=desc">الاحدث اضافه</a>
                                            <a class="dropdown-item" href="/employees?order_by=updated_at&sort=desc">"الاحدث التعديل</a>
                                            <a class="dropdown-item" href="/employees?order_by=nameAr&sort=desc">"الحروف الابجديه</a>
                                        </div>
                                    </div>

                                    <div class="btn-group ">
                                        <div class="btn-group search-panel ">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span id="search_concept">البحث فى </span> <span class="caret"></span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" id="search_by_name" href="#">الاسماء</a>
                                                <a class="dropdown-item" id="search_by_id_number" href="#">الرقم القومى</a>
                                                <a class="dropdown-item" id="search_by_phone_number" href="#">رقم الموبايل</a>
                                            </div>
                                        </div>
                                        <input type="hidden" name="search_param" value="all" id="search_param">
                                        <input type="text" class="form-control " id="search" placeholder="ابحث">
                                        <div class="btn-group">
                                            <button class="btn btn-success" id="search" ><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            {{--                            @foreach($employees as $employees)--}}
                            <div class="row cont-det" id="container">

                                @foreach($employees as $employee)
                                    <div class="col-12 col-md-3" id="container-{{$employee->id}}">
                                        <div class="card card-sh  border-primary mb-3" >

                                            <div class="card-header bg-transparent border-primary">{{$employee->nameAr}}</div>
                                            <div class="card-body ">
                                                <p class="card-text">
                                                    <img src="{{$employee->image }}" alt="" onerror="imgError(this);" class="rounded-circle img-profile-contact float-right img-responsive">
                                                <ul class="list-unstyled contact-det">
                                                    <li><i class="fas fa-envelope btn-circle"></i> البريد الالكترونى
                                                        <br>{{$employee->email}}
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-phone btn-circle"></i> التليفون:
                                                        <span> {{$employee->phoneNumber}}  </span>
                                                    </li>
                                                    <li class="gray">تاريخ الاضافه : {{ $employee->created_at }}</li>


                                                </ul>
                                                </p>
                                            </div>

                                            <form class="card-footer border-primary">
{{--                                                @can('delete', $employee)--}}
                                                    <button type="button" class="btn btn-success btn-xs" id="delete-employees-{{ $employee->id }}"> <i class="fas fa-trash-alt"></i> </button>
{{--                                                @endcan--}}
{{--                                                @can('view', $employee)--}}
                                                    <a href="/employees/{{$employee->id}}" class="btn btn-primary btn-xs"><i class="fa fa-user"> </i> الملف الشخصى </a>
{{--                                                @endcan--}}
                                            </form>



                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{--                            {{$employees->links()}}--}}

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

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">هل تريد الخروج بالفعل</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">اضغط على الخروج اذا كنت ترغب قى  الخروج</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
                <a class="btn btn-primary" href="login.html">الخروج</a>
            </div>
        </div>
    </div>
</div>
<!-- script-->

@include('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{ asset('js/notify.min.js') }}"></script>
<script src="{{ asset('js/notification.js') }}"></script>
<script>var scope = 'employees';</script>
<script src="{{ asset('js/person.js') }}"></script>

</body>

</html>
