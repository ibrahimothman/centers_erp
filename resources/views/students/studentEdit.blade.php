<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS & js -->
    @include('library')
    <title>edit student</title>
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
                                <span>
                                    </span>
                                <span>-{{$student->id}}</span>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="text-center">
                                            <img src="{{ $student->getImage("image") }}"
                                                 class="avatar img-circle img-thumbnail" alt="">
                                        </div>
                                        </hr><br>

                                    </div>
                                    <div class="col-sm-9">
                                        <form action="{{ route('students.update',['student' => $student]) }}"
                                              method="post" enctype="multipart/form-data" class="needs-validation"
                                              novalidate>

                                            @method('patch')
                                            @csrf

                                            <div class="form-row">

                                                <div class="col-sm-12 form-group">

                                                    <label for="validationCustom01">الاسم باللغه العربيه</label>
                                                    <input type="text" class="form-control" name="nameAr"
                                                           id="validationCustom01" placeholder="بالاسم باللغه العربيه "
                                                           value="{{ old('nameAr') ?? $student->nameAr}}">
                                                    <div>{{ $errors->first('nameAr') }}</div>
                                                </div>

                                            </div>

                                            <div class="form-row">

                                                <div class="col-sm-12">
                                                    <label for="validationCustom03">الاسم باللغه الانجليزيه</label>
                                                    <input type="text" name="nameEn" class="form-control"
                                                           id="validationCustom03" placeholder="الاسم باللغه الانجليزيه"
                                                           value="{{ old('nameEn') ?? $student->nameEn}}" required>
                                                    <div>{{ $errors->first('nameEn') }}</div>
                                                </div>


                                            </div>


                                            <div class=" form-row">
                                                <label for="validationCustom05">البريد الالكترونى </label>
                                                <input type="text" name="email" id="validationCustom05"
                                                       placeholder="ادخل البريد الالكترونى " class="form-control"
                                                       value="{{ old('email') ?? $student->email}}">
                                                <div>{{ $errors->first('email') }}</div>
                                            </div>


                                            <div class=" form-row">
                                                <div class="col-sm-6 ">
                                                    <label>رقم التليفون المحمول</label>
                                                    <input type="text" name="phoneNumber"
                                                           placeholder="ادخل رقم التليفون المحمول" class="form-control"
                                                           value="{{ old('phoneNumber') ?? $student->phoneNumber }}">
                                                    <div>{{ $errors->first('phoneNumber') }}</div>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label>تليفون اخر </label>
                                                    <input type="text" name="phoneNumberSec"
                                                           placeholder="ادخل رقم التليفون"
                                                           value="{{ old('phoneNumberSec') ?? $student->phoneNumberSec }}"
                                                           class="form-control">
                                                    <div>{{ $errors->first('phoneNumberSec') }}</div>
                                                </div>

                                            </div>

                                            <div class=" form-row">
                                                <div class="col-sm-6">
                                                    <label for="validationCustom06">الرقم القومى </label>
                                                    <input type="text" name="idNumber" id="validationCustom06"
                                                           value="{{ old('idNumber') ?? $student->idNumber}}"
                                                           placeholder="ادخل الرقم القومى " class="form-control">
                                                    <div>{{ $errors->first('idNumber') }}</div>

                                                </div>
                                                <div class="col-sm-6">
                                                    <label>رقم جواز السفر</label>
                                                    <input name="passportNum" type="text"
                                                           placeholder="ادخل رقم جواز السفر"
                                                           value="{{ old('passportNum') ?? $student->passportNum }}"
                                                           class="form-control">
                                                    <div>{{ $errors->first('passportNum') }}</div>
                                                </div>

                                            </div>
                                            <br>
                                            <div class=" form-row ">
                                                <div class="col-sm-6">

                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="image"
                                                               id="customFile"
                                                               src="{{ old('image') ?? $student->getImage("image") }}">
                                                        <label class="custom-file-label" for="customFile">صوره
                                                            الشخصيه</label>
                                                        <div>{{ $errors->first('image') }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 ">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="idImage"
                                                               src="{{ old('idImage') ?? $student->getImage("idImage")}}"
                                                               id="customFile">
                                                        <label class="custom-file-label" for="customFile">صوره
                                                            البطاقه </label>
                                                        <div>{{ $errors->first('idImage') }}</div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12  ">

                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label for="">البلد </label>
                                                    <input name="state" type="text" placeholder="البلد"
                                                           value="{{ old('state') ?? $student->address->state}}"
                                                           class="form-control">
                                                    <div>{{ $errors->first('state') }}</div>

                                                </div>

                                                <div class="col-sm-6 form-group ">
                                                    <label for="">المدينه </label>
                                                    <input name="city" type="text" placeholder="المدينه"
                                                           value="{{ old('city') ?? $student->address->city }}"
                                                           class="form-control">
                                                    <div>{{ $errors->first('city') }}</div>
                                                </div>
                                            </div>

                                            <div class=" form-row">
                                                <label>العنوان</label>
                                                <textarea name="address" placeholder="" rows="3"
                                                          class="form-control">{{ old('address') ?? $student->address->address }}</textarea>
                                                <div>{{ $errors->first('address') }}</div>
                                            </div>


                                            <div class="form-row">
                                                <div class="col-sm-12  ">

                                                </div>
                                                <div class="col-sm-6 form-group ">
                                                    <label for="">المؤهل الدراسى </label>
                                                    <select name="degree" class="form-control"
                                                            id="exampleFormControlSelect1">
                                                        @foreach($student->degreeOptions() as $degree)
                                                            <option {{ $student->degree == $degree ? 'selected' : '' }}>{{ $degree }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-sm-6 form-group ">
                                                    <label for="">الكليه </label>

                                                    <select name="faculty" class="form-control"
                                                            id="exampleFormControlSelect1">
                                                        @foreach($student->facultyOptions() as $faculty)
                                                            <option {{ $student->faculty == $faculty ? 'selected' : '' }}>{{ $faculty }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class=" form-row">
                                                <div class="col-sm-6 form-group ">
                                                    <label>skill card</label>
                                                    <input type="text"
                                                           value="{{ old('skillCardNumber') ?? $student->skillCardNumber}}"
                                                           placeholder="Enter skill card Id Here.."
                                                           name="skillCardNumber" class="form-control">
                                                    <div>{{ $errors->first('skillCardNumber') }}</div>
                                                </div>

                                            </div>


                                            <div class="form-row save">
                                                <div class="col-sm-3  form-group">
                                                </div>
                                                <div class="col-sm-6  form-group">
                                                    <br>
                                                    <button class="btn btn-primary" type="submit"><i
                                                                class="glyphicon glyphicon-ok-sign"></i> تعديل
                                                    </button>
                                                </div>
                                                <div class="col-sm-3  form-group">
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>


                            <!-- /.container-fluid -->
                        </div>
                    </div>
                </div>
            </div>
                    <!-- End of Main Content -->
                </div>
                    <!-- Footer -->
                @include('footer')
                <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->
            <!-- scroll top -->
        @include('scroll_top')
        <!-- script-->
        @include('script')
        <!-- Custom scripts for all pages-->
            <script src="{{url('employee')}}"></script>
            <script>
                $(document).ready(function () {
                    $(":input").inputmask();

                    $("#phone").inputmask({"mask": "(999) 99999999"});
                    $(#phone).unmask();
                });
            </script>
</body>
</html>
