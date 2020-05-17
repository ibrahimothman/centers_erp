<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS & js -->
    @include('library')
    <title>register a student</title>
</head>

<body id="page-top">
<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
<<<<<<< HEAD
    <!-- Main Content -->
        <div id="content">
            <!-- Page Heading -->
=======

    <!-- Main Content -->
        <div id="content">
            <!-- Begin Page Content -->
>>>>>>> c41eee09e4a3e28fec761df558ef71049c27c599
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-header text-primary">
                                تعديل بيانات الطالب
                            </div>
                            <div class="card-body">
<<<<<<< HEAD
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="text-center">
                                            <img src="{{ $student->getImage("image") }}"
                                                 class="avatar img-circle img-thumbnail" alt="">
                                        </div>
                                        </hr><br>
=======
                                <form action="{{ route('students.update', $student->id) }}" method="post" enctype="multipart/form-data" id="studentCreate">
>>>>>>> c41eee09e4a3e28fec761df558ef71049c27c599

                                @csrf
                                @method('put')
                                <!-- photo -->
                                    <div class="form-row image-upload">
                                        <div class="col-sm-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" accept="image/*" name="idImage"
                                                       id="customFile1" src="" onchange="readURL(this, 1);" required>
                                                <input type="file" class="custom-file-input" accept="image/*" name="image"
                                                       id="customFile2" src="" onchange="readURL(this, 2);" required>
                                            </div>
                                        </div>
                                    </div>
<<<<<<< HEAD
                                    <div class="col-sm-9">
                                        <form action="{{ route('students.update',['student' => $student]) }}"
                                              method="post" enctype="multipart/form-data" class="needs-validation"
                                              novalidate>

                                            @method('patch')
                                            @csrf

                                            <div class="form-row">
=======
                                    <div class="d-flex justify-content-center  ">
                                        <div class="course-image-input">
                                            <img id="imageUploaded1" src="{{ $student->idImage }}"
                                                 alt="your image"/>
                                            <p>صورة البطاقه</p>
                                            <!--      <div id="photo1" class="photo" >هذه الخانه مطلوبه</div> -->
                                        </div>
                                        <div class="course-image-input">
                                            <img id="imageUploaded2" src="{{ $student->image }}"
                                                 alt="your image"/>
                                            <p>الصوره الشخصيه</p>
                                            <!--      <div id="photo2" class="photo" >هذه الخانه مطلوبه</div> -->

                                        </div>
                                    </div>
                                    <!-- end photo -->
                                    <div class="form-row">
>>>>>>> c41eee09e4a3e28fec761df558ef71049c27c599

                                                <div class="col-sm-12 form-group">

<<<<<<< HEAD
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
=======
                                            <label for="validationCustom01">الاسم باللغه العربيه</label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" name="nameAr" id="validationCustom01" placeholder="الاسم باللغه العربيه "  value="{{ $student->nameAr }}" >
                                            <div>{{ $errors->first('nameAr') }}</div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 form-group">
                                            <label for="validationCustom03">الاسم باللغه الانجليزيه</label>
                                            <span class="required">*</span>
                                            <input type="text" name= "nameEn" class="form-control" id="validationCustom03" placeholder="الاسم باللغه الانجليزيه" value="{{ $student->nameEn }}" >
                                            <div>{{ $errors->first('nameEn') }}</div>
                                        </div>
                                    </div>
                                    <div class=" form-row ">
                                        <div class="col-sm-12 form-group">
                                            <label for="validationCustom05">البريد الالكترونى </label>
                                            <span class="required">*</span>
                                            <input type="text" name="email" id="validationCustom05" placeholder="ادخل البريد الالكترونى " class="form-control" value="{{ $student->email }}">
                                            <div>{{ $errors->first('email') }}</div>
                                        </div>

                                    </div>
                                    <div class=" form-row">
                                        <div class="col-sm-6 ">
                                            <label>رقم التليفون المحمول</label>
                                            <span class="required">*</span>
                                            <input type="text" name="phoneNumber"  data-inputmask="'mask' : '(999) 99999999'"  placeholder="ادخل رقم التليفون المحمول"  class="form-control" value="{{ $student->phoneNumber }}">
                                            <div>{{ $errors->first('phoneNumber') }}</div>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>تليفون اخر </label>
                                            <input type="text" name="phoneNumberSec" placeholder="ادخل رقم التليفون" value="{{ $student->phoneNumberSec }}"   class="form-control">
                                            <div>{{ $errors->first('phoneNumberSec') }}</div>
                                        </div>
>>>>>>> c41eee09e4a3e28fec761df558ef71049c27c599

                                            </div>

<<<<<<< HEAD
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
=======
                                    <div class=" form-row">
                                        <div class="col-sm-6">
                                            <label for="validationCustom06">الرقم القومى </label>
                                            <input type="text" name="idNumber" id="validationCustom06" value="{{ $student->idNumber }}"  placeholder="ادخل الرقم القومى " class="form-control" >
                                            <div>{{ $errors->first('idNumber') }}</div>

                                        </div>
                                        <div class="col-sm-6">
                                            <label>رقم جواز السفر</label>
                                            <input name="passportNum" type="text" placeholder="ادخل رقم جواز السفر" value="{{ $student->passportNum}}" class="form-control" >
                                            <div>{{ $errors->first('passportNum') }}</div>
                                        </div>

                                    </div>
                                    <br>

                                    {{--  <div class=" form-row ">
                                          <div class="col-sm-6" >

                                              <div class="custom-file">
                                                  <input type="file" class="custom-file-input" name="image" id="customFile1" src="{{ old('image') }}" >
                                                  <label class="custom-file-label" for="customFile">صوره الشخصيه</label>
                                                  <div>{{ $errors->first('image') }}</div>
                                              </div>
                                          </div>
                                          <div class="col-sm-6 ">
                                              <div class="custom-file">
                                                  <input type="file" class="custom-file-input" name="idPicture" src="{{ old('idPicture') }}" id="customFile2">
                                                  <label class="custom-file-label" for="customFile">صوره  البطاقه </label>
                                                  <div>{{ $errors->first('idPicture') }}</div>
                                              </div>
                                          </div>

                                      </div>
                                    --}}
                                    <div class="form-row">
                                        <div class="col-sm-12  ">

                                        </div>
                                        <div class="col-sm-6 form-group ">
                                            <label for="">البلد </label>
                                            <input name="state" type="text" placeholder="البلد" value="{{ $student->address->state }}" class="form-control">
                                            <div>{{ $errors->first('state') }}</div>

                                        </div>

                                        <div class="col-sm-6 form-group ">
                                            <label for="">المدينه </label>
                                            <input name="city" type="text" placeholder="المدينه" value="{{ $student->address->city }}" class="form-control">
                                            <div>{{ $errors->first('city') }}</div>
                                        </div>
                                    </div>

                                    <div class=" form-row form-group">
                                        <label>العنوان</label>
                                        <span class="required">*</span>

                                        <textarea name="address" placeholder="ادخل العنوان " rows="3" class="form-control">{{ $student->address->address }}</textarea>
                                        <div>{{ $errors->first('address') }}</div>
                                    </div>
>>>>>>> c41eee09e4a3e28fec761df558ef71049c27c599

                                            <div class=" form-row">
                                                <label>العنوان</label>
                                                <textarea name="address" placeholder="" rows="3"
                                                          class="form-control">{{ old('address') ?? $student->address->address }}</textarea>
                                                <div>{{ $errors->first('address') }}</div>
                                            </div>

<<<<<<< HEAD

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

=======
                                    <div class="form-row form-group">
                                        <div class="col-sm-6  ">
                                            <label for="">المؤهل الدراسى </label>
                                            <select name="degree" class="form-control" id="exampleFormControlSelect1">
                                                <option value="">اختار</option>
                                                @foreach($student->degreeOptions() as $degree)
                                                    <option {{ $degree == $student->degree? 'selected' : '' }}>{{ $degree }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-6  ">
                                            <label for="">الكليه </label>
                                            <select name="faculty" class="form-control" id="exampleFormControlSelect2">
                                                <option value="">اختار</option>
                                                @foreach($student->facultyOptions() as $faculty)
                                                    <option {{ $faculty == $student->faculty? 'selected' : '' }}>{{ $faculty }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" form-row">
                                        <div class="col-sm-12 form-group ">
                                            <label>كارت المهاره</label>
                                            <input type="text" value="{{ $student->skillCardNumber }}" placeholder="ادخل الرقم" name="skillCardNumber" class="form-control" >
                                            <div>{{ $errors->first('skillCardNumber') }}</div>
                                        </div>

                                    </div>
                                    <!-- photo -->



>>>>>>> c41eee09e4a3e28fec761df558ef71049c27c599

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

                                    <!-- end photo -->


<<<<<<< HEAD
                                    </div>
                                </div>
                            </div>


                            <!-- /.container-fluid -->
                        </div>
                    </div>
                </div>
            </div>
                    <!-- End of Main Content -->
=======
                                    <div class="form-row save">
                                        <div class="col-sm-3  form-group">
                                        </div>
                                        <div class="col-sm-6  form-group">
                                            <br>
                                            <button class="btn btn-primary" type="submit" id="submit"><i class="glyphicon glyphicon-ok-sign"></i> تعديل</button>
                                            <button class="btn  btn-danger" type="reset"><i class="glyphicon glyphicon-repeat"></i> الغاء</button>
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
            <!-- End of Main Content -->

            <!-- Footer -->
        @include('footer')
        <!-- End of Footer -->
        </div>
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
>>>>>>> c41eee09e4a3e28fec761df558ef71049c27c599
                </div>
                    <!-- Footer -->
                @include('footer')
                <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
<<<<<<< HEAD
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
=======
        </div>
    </div>
</div>
<!-- script-->
@include('script')
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="/js/students_create_validation.js"></script>
<script>

    $(document).ready(function() {
        $(":input").inputmask();

        $("#phone").inputmask({"mask": "(999) 99999999"});
        $(#phone).unmask();
    });
</script>

<!-- photo -->
<script>


    $('#imageUploaded1, #imageUploaded2, #imageUploaded3, #imageUploaded4').click(function () {
        let photoNum = this.id[this.id.length - 1];
        $(`#customFile${photoNum}`).trigger('click');
    })


    //code for the image uploaded to be shown
    function readURL(input, num) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                if (num > 3) {
                    $(`#imageUploaded${num}`)
                        .attr('src', 'https://icon-library.net/images/done-icon/done-icon-5.jpg')

                } else {
                    $(`#imageUploaded${num}`)
                        .attr('src', e.target.result)
                }
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


</script>

>>>>>>> c41eee09e4a3e28fec761df558ef71049c27c599
</body>
</html>
