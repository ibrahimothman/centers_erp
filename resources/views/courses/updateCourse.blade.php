<!doctype html>

    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Update Course</title>

            <!-- Custom fonts for this template-->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
            <link href="/../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

            <!-- Custom styles for this template-->
            <link href="/../../../css/sb-admin-rtl.css" rel="stylesheet">
            <link href="/../../../css/styles.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">

            <!-- Latest compiled and minified JavaScript -->
            <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>
            <script src="https://kit.fontawesome.com/58b9d7bcbd.js" crossorigin="anonymous"></script>
        </head>

        <body>
            <div id="wrapper">
                @include('sidebar')
                <div id="content-wrapper" class="d-flex flex-column">
                    @include('operationBar')
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">
                                <div class="card mb-4 shadowed">
                                    <header>
                                        <div class="card-header text-primary form-title">
                                        تعديل دورة
                                        </div>
                                    </header>
                                    <div class="card-body">
                                        <form enctype="multipart/form-data" >

                                            @csrf
                                            <div class="form-row image-upload">
                                                <div class="col-sm-8">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" accept="image/*" name="image1" id="customFile1" src="" onchange="readURL(this, 1);" required>
                                                        <input type="file" class="custom-file-input" accept="image/*" name="image2" id="customFile2" src="" onchange="readURL(this, 2);">
                                                        <input type="file" class="custom-file-input" accept="image/*" name="image3" id="customFile3" src="" onchange="readURL(this, 3);">
                                                        <input type="file" accept="video/*" class="custom-file-input" name="video" id="customFile4" src="" onchange="readURL(this, 4);">
                                                        <label class="custom-file-label" for="customFile">صوره الدورة</label>
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex  justify-content-center">
                                                <div class="course-image-input">
                                                    <img id="imageUploaded1" src="http://simpleicon.com/wp-content/uploads/camera-2.svg" alt="your image" />
                                                    <p>صورة الدورة</p>
                                                </div>
                                                <div class="course-image-input">
                                                    <img id="imageUploaded2" src="http://simpleicon.com/wp-content/uploads/camera-2.svg" alt="your image" />
                                                    <p>صورة الدورة</p>
                                                </div>
                                                <div class="course-image-input">
                                                    <img id="imageUploaded3" src="http://simpleicon.com/wp-content/uploads/camera-2.svg" alt="your image" />
                                                    <p>صورة الدورة</p>
                                                </div>
                                                <div class="course-image-input">
                                                    <img id="imageUploaded4" src="http://simpleicon.com/wp-content/uploads/video.svg" alt="your video" />
                                                    <p>ڤيديو الدورة</p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-6 form-group">
                                                    <label for="course-name">اسم الدورة</label>
                                                    <input type="text" class="form-control" id="course-name" placeholder="اسم الدورة "
                                                           value="{{$course->name}}" name="course-name" required>
                                                    <span id="test_course-name_error"></span>
                                                    <div></div>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="course-id">كود الدورة</label>
                                                    <input type="text" class="form-control" id="course-id" placeholder="كود الدورة "
                                                           value="{{$course->code}}" name="course-id" required>
                                                    <span id="test_course-id_error"></span>
                                                    <div></div>
                                                </div>
                                            </div>
                                            <div class=" form-row">
                                                <label for="course-description">وصف الدورة</label>
                                                <textarea placeholder="وصف الدورة"  rows="2" class="form-control" id="course-description"
                                                          name="course-description" required>{{$course->description}}</textarea>
                                                <div></div>
                                            </div>
                                            <fieldset>
                                                <div class="form-row">
                                                <legend class="full-width"> محتوى الدورة <i class="fas fa-plus-circle" id='add-more' style="color:green; cursor:pointer"></i></legend>
                                                    <div class="col-sm-12 input-group input-chapter">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">باب  1</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="course-chapter-1" placeholder="محتوى الدورة " value="" name="course-chapter-1" required>
                                                        <span id="test_course-chapter-1_error"></span>
                                                        <div></div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <label for="chapter-1-desc">عن باب 1</label>
                                                    <textarea placeholder="عن الباب" rows="2" class="form-control" id="chapter-1-desc" name="chapter-1-desc"></textarea>
                                                    <div></div>
                                                </div>
                                            </fieldset>
                                            <div class="form-row">
                                                        <div class="col-sm-6 form-group">
                                                        <label for="instructor-name">اسم المدرس</label>
                                                        <select class="form-control" id="instructor-name" multiple required>
{{--                                                            @foreach($instructors as $instructor)--}}
{{--                                                                <option {{$instructor->id==$course->instructor_id?"selected":""}} value="{{$instructor->id}}">{{$instructor->name}}</option>--}}

{{--                                                            @endforeach--}}
                                                        </select>
                                                            <span id="test_course-teacher_error"></span>
                                                            <div></div>
                                                        </div>
                                                        <div class="col-sm-6 form-group">
                                                            <label for="course-duration">مدة الدورة</label>
                                                            <input type="number" min='0' class="form-control" id="course-duration"
                                                                   placeholder="مدة الدورة " value="{{$course->cost}}" name="course-duration" required>
                                                            <span id="test_course-duration_error"></span>
                                                            <div></div>
                                                        </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-6 form-group">
                                                    <label for="course-cost">تكلفة الدورة</label>
                                                    <input type="number" min='0' class="form-control" id="course-cost"
                                                           placeholder="تكلفة الدورة " value="{{$course->cost}}" name="course-cost" required>
                                                    <span id="test_course-cost_error"></span>
                                                    <div></div>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="course-group-cost">تكلفة الدورة المجمعة</label>
                                                    <input type="number" min='0' class="form-control" id="course-group-cost"
                                                           placeholder="تكلفة الدورة المجمعة " value="{{$course->teamCost}}" name="course-group-cost" required>
                                                    <span id="test_course-group-cost_error"></span>
                                                    <div></div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-sm-6 form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input part-of-diploma" name="retake" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">هذه الدورة جزء من دبلومة</label>
                                                </div>
                                                <div class="shown-if-checked">
                                                    <div>
                                                        <label for="diploma-name">اسم الدبلومة</label>
                                                        <input type="text" class="form-control" id="diploma-name" placeholder="اسم الدبلومة " value="" name="diploma-name" required>
                                                        <span id="test_diploma-name_error"></span>
                                                        <div></div>
                                                        <label for="diploma-course-num"> ترتيب الدورة بالدبلومة</label>
                                                        <input type="number" class="form-control" id="diploma-course-num" placeholder=" ترتيب الدورة بالدبلومة " value="" name="diploma-course-num" required>
                                                        <span id="test_diploma-course-num_error"></span>
                                                        <div></div>
                                                    </div>
                                                </div>


                                        </div>

                                            <div class="col-sm-6 form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="retake" id="customCheck2" checked="">
                                                    <label class="custom-control-label" for="customCheck2">هذه الدورة لها امتحان</label>
                                                </div>
                                            </div>
                                        </div>
<!--
                                            <div class="form-row">
                                                <header class="col-sm-12">
                                                    <label class="full-width">مرافق المنشأة</label>
                                                </header>
                                                <div class="col-sm-4 form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="retake" id="customCheck1" checked="">
                                                    <label class="custom-control-label" for="customCheck1">شاشة عرض</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="retake" id="customCheck2" checked="">
                                                    <label class="custom-control-label" for="customCheck2">قاعة مكيفة</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="retake" id="customCheck3" checked="">
                                                    <label class="custom-control-label" for="customCheck3">انترنت</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="retake" id="customCheck4" checked="">
                                                    <label class="custom-control-label" for="customCheck4">أجهزة حاسب ألي</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="retake" id="customCheck5" checked="">
                                                    <label class="custom-control-label" for="customCheck5">سبورة</label>
                                                </div>
                                            </div>
                                            </div> -->
                                            <div class="form-row save">

                                                <div class="col-sm-6 mx-auto" style="width: 200px;">
                                                    <hr/>
                                                    <button class="btn btn-primary action-buttons" type="submit" id="submit"> تعديل  <i class="fas fa-plus"></i></button>
                                                    <button class="btn  btn-danger action-buttons" type="reset">  إلغاء  <i class="fas fa-times"></i></button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <!-- /.container-fluid -->
                        </div>
                    </div>
                    @include('footer')
                </div>
            </div>


        <!-- Bootstrap core JavaScript-->
        <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{url('js/sb-admin-2.min.js')}}"></script>
        <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>


        <script type='text/javascript' src="{{url('js/createCourse.js')}}"></script>

        <script >
            $(document).ready(function() {

                $("#submit").click(function() {
                    var courseName = $("#course-name").val();
                    var courseCode = $("#course-id").val();
                    var courseDescription = $("#course-description").val();
                    var courseDuration = $("#course-duration").val();
                    var courseCost = $("#course-cost").val();
                    var teamCost = $("#course-group-cost").val();
                    // var instructorId = $("#instructor-name").val();
                    var courseChapter = $("#course-chapter-1").val();
                    var chapterDesc = $("#chapter-1-desc").val();
                    var courseContent=courseChapter+chapterDesc;
                    $.ajax({
                        url: "/courses/1",
                        method: "PUT",
                        data: {name:courseName,code:courseCode,description:courseDescription,
                            duration:courseDuration,cost:courseCost, content:courseContent,
                            teamCost:teamCost,
                            instructor_id:1,_token: "{{ csrf_token() }}"},
                        dataType: "json",
                        success: function (data) {
                            // console.log(data);
                            alert(data);
                        },
                        error: function (xhr, textStatus, error) {
                            alert(">> " +xhr.statusText);
                        }

                    });

                });
            });

        </script>

    </body>

</html>

