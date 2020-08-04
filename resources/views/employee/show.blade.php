<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap CSS & js -->
    @include('library')
    <link href="{{url('employee')}}" rel="stylesheet">
    <title>employee-profile</title>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user orange"></i>
                                <span>{{$employee->nameAr}}
                            </span>
                                <span>-
                              </span>
                                <span>{{$employee->id}}</span>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-3">


                                        <div class="text-center">
                                            <img src="{{ $employee->image ?? 'https://www.nautec.com/wp-content/uploads/2018/04/placeholder-person.png' }}" onerror="imgError(this)" class="avatar img-circle img-thumbnail" alt="avatar">

                                        </div></hr><br>
                                        <p>تاريخ الاضافه : {{$employee->created_at}}</p>

                                        @can('update', $employee)
                                            <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}" class="btn btn-primary btn-xs"><i class="fas fa-edit"></i> تعديل الملف الشخصى  </a>
                                        @endcan
                                        <br>

                                    </div>


                                    <div class="col-sm-9">

                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" >
                                                <br>
                                                <div class="col-md-12">
                                                    <!--Table-->
                                                    <table class="table table-striped table-responsive mb-0"  id="printTable">
                                                        <!--Table head-->
                                                        <thead>
                                                        <tr>
                                                            <div class="print-btn">
                                                                <button class="btn btn-primary hidden-print" onclick="printData();">
                                                                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>

                                                            </div>

                                                        </tr>
                                                        </thead>
                                                        <!--Table head-->

                                                        <!--Table body-->
                                                        <tbody>
                                                        <tr class="table-danger profile" >

                                                            <td>الاسم </td>
                                                            <td>{{$employee->nameAr}}</td>
                                                            <td>{{$employee->nameEn}}


                                                        </tr>
                                                        <tr >

                                                            <td>التليفون</td>
                                                            <td>{{$employee->phoneNumber}}</td>
                                                            <td>{{$employee->phoneNumberSec}}</td>

                                                        </tr>
                                                        <tr>

                                                            <td>البريد الالكترونى </td>
                                                            <td colspan="2">{{$employee->email}}</td>



                                                        </tr>
                                                        <tr>

                                                            <td>العنوان</td>
                                                            <td colspan="2">
                                                                <span>{{$employee->address->state}} - </span>
                                                                <span>ا{{$employee->address->city}} - </span>
                                                                <span>{{$employee->address->address}}</span>
                                                        </tr>

                                                        <tr>

                                                            <td>رقم جواز السفر  </td>
                                                            <td colspan="2">{{$employee->passportNumber}}</td>

                                                        </tr>
                                                        <tr>


                                                            <td>الرقم القومى   </td>
                                                            <td colspan="2">{{$employee->idNumber}}</td>


                                                        </tr>

                                                        @if($employee->job)
                                                            <tr>

                                                                <td>الوظيفه</td>
                                                                <td colspan="2">{{$employee->job->name}}</td>


                                                            </tr>
                                                        @endif

                                                        <tr>

                                                            <td>نظام المحاسبه</td>
                                                            <td colspan="2">{{$employee->payment_model['model']}}</td>


                                                        </tr>

                                                        @foreach(json_decode($employee->payment_model_meta_data, true) as $key => $value)
                                                            <tr>

                                                                <td>{{ $key }}</td>
                                                                <td colspan="2">{{$value}}</td>


                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                        <!--Table body-->
                                                    </table>
                                                    <!--Table-->
                                                </div>    </div>


                                        </div>


                                    </div><!--/col-9-->
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
            <script>
                $(document).ready(function() {


                    var readURL = function(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('.avatar').attr('src', e.target.result);
                            }

                            reader.readAsDataURL(input.files[0]);
                        }
                    }


                    $(".file-upload").on('change', function(){
                        readURL(this);
                    });
                });
            </script>

            <script>
                function printData()
                {
                    var divToPrint=document.getElementById("printTable");
                    newWin= window.open("");
                    newWin.document.write(divToPrint.outerHTML);
                    newWin.print();
                    newWin.close();
                }

                $('img').on('error', function(){
                    console.log('error');
                    $(this).attr('src', "https://www.nautec.com/wp-content/uploads/2018/04/placeholder-person.png");
                });
            </script>


</body>

</html>
