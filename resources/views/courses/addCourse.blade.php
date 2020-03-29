<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
<!-- category plugin -->
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--style multi select-->
    <link rel="stylesheet" href="/css/multiSelect.css">
    <title>Add a Course</title>
</head>
<body id="page-top">
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
                                إضافه دورة
                            </div>
                        </header>
                        <div class="card-body">
                            <form method="post" action="{{url('/courses')}}" enctype="multipart/form-data" id="form">
                                @csrf
                                <div class="form-row image-upload">
                                    <div class="col-sm-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" accept="image/*" name="image1"
                                                   id="customFile1" src="" onchange="readURL(this, 1);" required>
                                            <input type="file" class="custom-file-input" accept="image/*" name="image2"
                                                   id="customFile2" src="" onchange="readURL(this, 2);">
                                            <input type="file" class="custom-file-input" accept="image/*" name="image3"
                                                   id="customFile3" src="" onchange="readURL(this, 3);">
                                            <input type="file" accept="video/*" class="custom-file-input" name="video"
                                                   id="customFile4" src="" onchange="readURL(this, 4);">
                                            <label class="custom-file-label" for="customFile">صوره الدورة</label>
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex  justify-content-center">
                                    <div class="course-image-input">
                                        <div class="required-image-input">
                                            <img id="imageUploaded1"
                                                 src="http://simpleicon.com/wp-content/uploads/camera-2.svg"
                                                 alt="your image"/>
                                        </div>

                                        <p>صورة الدورة
                                            <span class="required">*</span></p>

                                        <div id="photo1" class="photo">هذه الخانه مطلوبه</div>
                                    </div>
                                    <div class="course-image-input">
                                        <img id="imageUploaded2"
                                             src="http://simpleicon.com/wp-content/uploads/camera-2.svg"
                                             alt="your image"/>
                                        <p>صورة الدورة</p>
                                        <!--             <div id="photo2" class="photo" >هذه الخانه مطلوبه</div> -->

                                    </div>
                                    <div class="course-image-input">
                                        <img id="imageUploaded3"
                                             src="http://simpleicon.com/wp-content/uploads/camera-2.svg"
                                             alt="your image"/>
                                        <p>صورة الدورة</p>
                                        <!--     <div id="photo3" class="photo" >هذه الخانه مطلوبه</div> -->
                                    </div>
                                    <div class="course-image-input">
                                        <img id="imageUploaded4"
                                             src="http://simpleicon.com/wp-content/uploads/video.svg" alt="your video"/>
                                        <p>ڤيديو الدورة</p>
                                        <!--     <div id="photo4" class="photo" >هذه الخانه مطلوبه</div> -->
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6 form-group">
                                        <label for="course-name">اسم الدورة</label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" id="course-name"
                                               placeholder="اسم الدورة " value="" name="name" required>
                                        <span id="test_course-name_error"></span>
                                        <div></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="course-id">كود الدورة</label>
                                        <input type="text" class="form-control" id="course-id" placeholder="كود الدورة "
                                               value="" name="code">
                                        <span id="test_course-id_error"></span>
                                        <div></div>
                                    </div>
                                </div>
                                <div class=" form-row">
                                    <label for="course-description">وصف الدورة</label>
                                    <span class="required">*</span>
                                    <textarea placeholder="وصف الدورة" rows="2" class="form-control"
                                              id="course-description" name="description" required></textarea>
                                    <div></div>
                                </div>
                                <fieldset>
                                    <div class="form-row">
                                        <legend class="full-width"> محتوى الدورة <i class="fas fa-plus-circle"
                                                                                    id='add-more'
                                                                                    style="color:green; cursor:pointer"></i>
                                        </legend>
                                        <div class="col-sm-12 input-group input-chapter">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">باب  1</span>
                                            </div>
                                            <input type="text" class="form-control" id="course-chapter-1"
                                                   placeholder="محتوى الدورة " value="" name="course-chapter-1"
                                            >
                                            <span id="test_course-chapter-1_error"></span>
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <label for="chapter-1-desc">عن باب 1</label>
                                        <textarea placeholder="عن الباب" rows="2" class="form-control"
                                                  id="chapter-1-desc" name="chapter-1-desc"></textarea>
                                        <div></div>
                                    </div>
                                </fieldset>
                                <div class="form-row">
                                    {{--
                                                                            <div class="col-sm-6 form-group">
                                                                                                              <label for="instructor-name">اسم المدرس</label>
                                                                                                                                                       <select class="form-control" id="instructor-name" multiple required>
                                        @foreach($instructors as $instructor)
                                        <option value="{{$instructor->id}}">{{$instructor->name}}</option>
                                        @endforeach
                                        </select>
                                        <span id="test_course-teacher_error"></span>
                                        <div></div>
                                        </div>
                                        --}}
                                    <div class="col-sm-6 form-group">
                                        <label for="instructor-name">
                                            اسم المدرس</label>
                                        <span class="required">*</span>
                                        <div class="dropdown ">
                                            <button data-toggle="dropdown" class="dropdown-toggle btnInstructor py-1">
                                                اسم المدرس <b class="caret"></b>
                                            </button>

                                            <ul class=" dropdown-menu text-right " >
                                                @foreach($instructors as $instructor)
                                                    <li ><label class="checkbox"><input value="{{ $instructor->id }}" class="instructors" type="checkbox">{{$instructor->nameAr}}</label></li>
                                                @endforeach

                                            </ul>
                                        </div>
                                        <div id="errorSelect" class="errorMselector">هذه الخانه مطلوبه</div>
                                        <span id="test_course-teacher_error"></span>
                                        <div></div>

                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="course-duration">مدة الدورة</label>
                                        <input type="number" min='0' class="form-control" id="course-duration"
                                               placeholder="مدة الدورة " value="" name="duration">
                                        <span id="test_course-duration_error"></span>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6 form-group">
                                        <label for="course-cost">تكلفة الدورة</label>
                                        <span class="required">*</span>
                                        <input type="number" min='0' class="form-control" id="course-cost"
                                               placeholder="تكلفة الدورة " value="" name="cost" required>
                                        <span id="test_course-cost_error"></span>
                                        <div></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="course-group-cost">تكلفة الدورة المجمعة</label>
                                        <input type="number" min='0' class="form-control" id="course-group-cost"
                                               placeholder="تكلفة الدورة المجمعة " value="" name="course-group-cost"
                                        >
                                        <span id="test_course-group-cost_error"></span>
                                        <div></div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <label>التصنيف</label>
                                        <span class="required">*</span>
                                        <div class="dropdown dropdown-tree" id="firstDropDownTree"></div>
                                    </div>
                                </div>
                                <br>

                                    <div id="errorSelect" class="errorMselector">هذه الخانه مطلوبه</div>
                                    <span id="test_course-teacher_error"></span>
                                    <div></div>
                                    <div class="form-row save">

                                    <div class="col-sm-6 mx-auto" style="width: 200px;">
                                        <hr/>
                                        <button class="btn btn-primary action-buttons" type="button" id="submit"> إضافة
                                            <i class="fas fa-plus"></i></button>
                                        <button class="btn  btn-danger action-buttons" type="reset"> إلغاء <i
                                                class="fas fa-times"></i></button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
<!--  course and category script plugin  -->
<script type='text/javascript' src="{{url('js/createCourse.js')}}"></script>
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="/js/course_create_validation.js"></script>
<!--  end script-->
<script>
    $(document).ready(function () {

        $("#submit").click(function () {
            var ins=$('#instructors-list').find('li').map(function()
            {
                return $(this).val()
            }).get().join(',');
            console.log("ins"+ins);
            // return;
            var courseName = $("#course-name").val();
            var courseCode = $("#course-id").val();
            var courseDescription = $("#course-description").val();
            var courseDuration = $("#course-duration").val();
            var courseCost = $("#course-cost").val();
            var teamCost = $("#course-group-cost").val();
            // var instructorId = $("#instructor-name").val();
            var courseChapter = $("#course-chapter-1").val();
            var chapterDesc = $("#chapter-1-desc").val();
            let chapters = []; //add this eventually  it's like [ { name: 'test', description: 'test'}, { name: 'test', description: 'test'}, { name: 'test', description: 'test'}]
            let chapterDescription = [...$('fieldset textarea')];
            let chapterName = [...$('fieldset input')];
            chapterName.forEach(function (chapter, chapterIndex) {
                let chapterInfo = {};
                chapterInfo.name = chapterName[chapterIndex].value;
                chapterInfo.description = chapterDescription[chapterIndex].value;
                chapters.push(chapterInfo);
            });


            var fd = new FormData();
            $('input[type="file"]').each(function (index, file) {
               if(file.files.length != 0){
                    fd.append('images[]',file.files[0]);
               }
            });
            $('.instructors[type="checkbox"]').each(function () {
                if(this.checked)
                    fd.append('instructors[]',$(this).val());
            });

            $('.categories[type="checkbox"]').each(function () {
                if(this.checked)
                    fd.append('categories[]',$(this).val());
            });


            fd.append('_token',"{{ csrf_token() }}");
            fd.append('name',courseName);
            fd.append('code', courseCode);
            fd.append('description', courseDescription);
            fd.append('duration', courseDuration);
            fd.append('cost', courseCost);
            fd.append('content', JSON.stringify(chapters));
            fd.append('teamCost', teamCost);

            $.ajax({
                url: "/courses",
                method: "POST",
                data : fd,
                contentType : false,
                processData : false,
                dataType: "json",
                success: function (course) {
                    // console.log(data);
                    // alert(data);
                    location.href = '/courses/'+course.id;
                    document.getElementById('form').reset();
                },
                error: function (error) {
                    if (error.status == 422) {// validation
                        // loop through the errors and show them to the user
                        $.each(error.responseJSON.errors, function (i, error) {
                            // error is message
                            // i is element's name
                            console.log(error);
                            var element = $(document).find('[name="' + i + '"]');
                            element.after($('<span style="color: red;">' + error[0] + '</span>'));
                        });
                    }
                }
            });
        });
    });

</script>


</body>

</html>

