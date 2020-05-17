<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS & js -->
    @include('library')
    <link href="{{url('employee')}}" rel="stylesheet">
    <title>student-profile</title>
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
                                <span>{{$student->nameAr}}
                            </span>
                                <span>-
                              </span>
                                <span>{{$student->id}}</span>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-3">


                                        <div class="text-center">
                                            <img src="{{ $student->getImage("image") }}" class="avatar img-circle img-thumbnail" alt="avatar">

                                        </div></hr><br>
                                        <p>تاريخ الاضافه : {{$student->created_at}}</p>

                                        @can('update', $student)
                                            <a href="{{ route('students.edit', ['student' => $student]) }}" class="btn btn-primary btn-xs"><i class="fas fa-edit"></i> تعديل الملف الشخصى  </a>
                                        @endcan
                                        <br>
                                        <div class="card  border-info mb-3 user-course">
                                            <div class="card-header">courses <i class="fa fa-link fa-1x"></i></div>
                                            <div class="card-body">
                                                <ul class="list-group list-group-flush">
                                                    @foreach($student->diplomas_groups as $group)
                                                        <li class="list-group-item">
                                                            <span>{{ $group->diploma->name }}</span>
                                                            <div class="progress progress_sm">
                                                                <div class="progress-bar bg-danger" role="progressbar" data-transitiongoal="50" aria-valuenow="49" style="width: 50%;"></div>
                                                            </div>
                                                        </li>

                                                    @endforeach
                                                    <li class="list-group-item">
                                                        <a href="#" class="btn btn-primary btn-xs"> المزيد  </a>

                                                    </li>
                                                </ul>

                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-sm-9">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">البيانات</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">الكورسات</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">الامتحانات</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                                            <td>{{$student->nameAr}}</td>
                                                            <td>{{$student->nameEn}}


                                                        </tr>
                                                        <tr >

                                                            <td>التليفون</td>
                                                            <td>{{$student->phoneNumber}}</td>
                                                            <td>{{$student->phoneNumberSec}}</td>

                                                        </tr>
                                                        <tr>

                                                            <td>البريد الالكترونى </td>
                                                            <td colspan="2">{{$student->email}}</td>



                                                        </tr>
                                                        <tr>

                                                            <td>العنوان</td>
                                                            <td colspan="2">
                                                                <span>{{$student->address->state}} - </span>
                                                                <span>ا{{$student->address->city}} - </span>
                                                                <span>{{$student->address->address}}</span>
                                                        </tr>

                                                        <tr>

                                                            <td> المؤهل الدراسى </td>
                                                            <td colspan="2">
                                                                <span>{{$student->degree}}</span>
                                                                <span>ا{{$student->faculty}}</span>



                                                        </tr>
                                                        <tr>

                                                            <td>رقم جواز السفر  </td>
                                                            <td colspan="2">{{$student->passportNumber}}</td>



                                                        </tr>
                                                        <tr>


                                                            <td>الرقم القومى   </td>
                                                            <td colspan="2">{{$student->idNumber}}</td>


                                                        </tr>
                                                        <tr>

                                                            <td>skill card</td>
                                                            <td colspan="2">{{$student->skillCardNumber}}</td>



                                                        </tr>
                                                        </tbody>
                                                        <!--Table body-->
                                                    </table>
                                                    <!--Table-->
                                                </div>    </div>


                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="align-middle mb-0 table  table-striped table-hover">
                                                            <thead>
                                                            <tr>

                                                                <th class="text-center">الكورس</th>
                                                                <th class="text-center">الحاله</th>
                                                                <th class="text-center">القاعه</th>
                                                                <th class="text-center">المجموعه</th>
                                                                <th class="text-center">التفاصيل </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($student->diplomas_groups as $group)

                                                                <tr>

                                                                    <td class="text-center">{{ $group->diploma->name }}</td>
                                                                    <td class="text-center">
                                                                        <div class="badge badge-warning">Pending</div>
                                                                    </td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center">المجموعه {{ $group->id }}</td>

                                                                    <td class="text-center">
                                                                        <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                                    </td>
                                                                </tr>
                                                             @endforeach

                                                            </tbody>
                                                        </table>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="align-middle mb-0 table  table-striped table-hover">
                                                            <thead>
                                                            <tr>

                                                                <th class="text-center">الكورس</th>
                                                                <th class="text-center">الحاله</th>
                                                                <th class="text-center">القاعه</th>
                                                                <th class="text-center">المجموعه</th>
                                                                <th class="text-center">التفاصيل </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($student->testsEnrolling as $group)

                                                                <tr>

                                                                    <td class="text-center">{{ $group->test->name }}</td>
                                                                    <td class="text-center">
                                                                        <div class="badge badge-warning">Pending</div>
                                                                    </td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center">المجموعه {{ $group->id }}</td>

                                                                    <td class="text-center">
                                                                        <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                            </tbody>
                                                        </table>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div><!--/col-9-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
            </div>
        </div>

                <!-- Footer -->
            @include('footer')
                <!-- End of Footer -->
                <!-- End of Content Wrapper -->
            </div>
            <!-- End of Page Wrapper -->
</div>

        <!-- scroll top -->
        @include('scroll_top')

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
            </script>


</body>
</html>
