<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('library')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Update Course</title>
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
                            <form enctype="application/x-www-form-urlencoded" id="form" >
                                @csrf
                                @method('patch')
                                <div class="form-row image-upload">
                                    <div class="col-sm-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" accept="image/*" name="image1" id="customFile1"  src="" onchange="readURL(this, 1);" >
                                            <input type="file" class="custom-file-input" accept="image/*" name="image2" id="customFile2"  src="" onchange="readURL(this, 2);" >
                                            <input type="file" class="custom-file-input" accept="image/*" name="image3" id="customFile3" src="" onchange="readURL(this, 3);">
                                            <input type="file" accept="video/*" class="custom-file-input" name="video" id="customFile4" src="" onchange="readURL(this, 4);">
                                            <label class="custom-file-label" for="customFile">صوره الدورة</label>
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex  justify-content-center">
                                    @php($j = 1)
                                    @foreach($course->images as $image)
                                        <div class="course-image-input selected">
                                            <img id="imageUploaded{{$j}}" src="{{$image->url}}" alt="your image"  />
                                            <p>صورة الدورة</p>
                                        </div>
                                        @php($j++)
                                    @endforeach
                                    @for($i = $j; $i <= 3 ; $i++)
                                        <div class="course-image-input">
                                            <img id="imageUploaded{{$j}}" src="http://simpleicon.com/wp-content/uploads/camera-2.svg" alt="your image" />
                                            <p>صورة الدورة</p>
                                        </div>
                                    @endfor
                                    <div class="course-image-input">
                                        <img id="imageUploaded4" src="http://simpleicon.com/wp-content/uploads/video.svg" alt="your video" />
                                        <p>ڤيديو الدورة</p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6 form-group">
                                        <label for="course-name">اسم الدورة</label>
                                        <input type="text" class="form-control" id="course-name" placeholder="اسم الدورة "
                                               value="{{$course->name}}" name="name" required>
                                        <span id="test_course-name_error"></span>
                                        <div></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="course-id">كود الدورة</label>
                                        <input type="text" class="form-control" id="course-id" placeholder="كود الدورة "
                                               value="{{$course->code}}" name="code" required>
                                        <span id="test_course-id_error"></span>
                                        <div></div>
                                    </div>
                                </div>
                                <div class=" form-row">
                                    <label for="course-description">وصف الدورة</label>
                                    <textarea placeholder="وصف الدورة"  rows="2" class="form-control" id="course-description"
                                              name="description" required>{{$course->description}}</textarea>
                                    <div></div>
                                </div>
                                <fieldset>
                                    <div class="form-row">
                                        <legend class="full-width"> محتوى الدورة <i class="fas fa-plus-circle" id='add-more' style="color:green; cursor:pointer"></i></legend>

                                        @php($i = 1)
                                        @foreach (json_decode($course->content, true) as $content)
                                            <div class="col-sm-12 input-group input-chapter">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">باب رقم   {{$i}}</span>
                                                </div>
                                                <input type="text" class="form-control" id="course-chapter-{{ $i }}"
                                                       placeholder="محتوى الدورة " value="{{$content['name']}}" name="course-chapter-{{ $i }}" required>
                                                <span id="test_course-chapter-1_error"></span>
                                                <div></div>
                                            </div>
                                    </div>
                                    <div class="form-row">
                                        <label for="chapter-1-desc">عن باب رقم  {{$i}}</label>
                                        <textarea placeholder="عن الباب" rows="2" class="form-control" id="chapter-{{ $i }}-desc"
                                                  name="chapter-{{ $i }}-desc">{{$content['description']}}</textarea>
                                        <div></div>
                                            @php($i++)
                                        @endforeach

                                    </div>
                                </fieldset>
                                <div class="form-row">
                                    <div class="col-sm-6 form-group">
                                        <label for="instructor-name">اسم المدرس</label>
                                        <div class="dropdown ">
                                            <button data-toggle="dropdown" class="dropdown-toggle py-1">
                                                اسم المدرس <b class="caret"></b>
                                            </button>
                                            <ul id="instructors-list"  class=" dropdown-menu text-right">
                                                @foreach($instructors as $instructor)
                                                    <li ><label class="checkbox"><input value="{{ $instructor->id }}"  type="checkbox" {{ $course->instructors->contains($instructor->id) ? 'checked' : ''}}>{{$instructor->nameAr}}</label></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <span id="test_course-teacher_error"></span>
                                        <div></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="course-duration">مدة الدورة</label>
                                        <input type="number" min='0' class="form-control" id="course-duration"
                                               placeholder="مدة الدورة " value="{{$course->duration}}" name="duration" required>
                                        <span id="test_course-duration_error"></span>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6 form-group">
                                        <label for="course-cost">تكلفة الدورة</label>
                                        <input type="number" min='0' class="form-control" id="course-cost"
                                               placeholder="تكلفة الدورة " value="{{$course->cost}}" name="cost" required>
                                        <span id="test_course-cost_error"></span>
                                        <div></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="course-group-cost">تكلفة الدورة المجمعة</label>
                                        <input type="number" min='0' class="form-control" id="course-group-cost"
                                               placeholder="تكلفة الدورة المجمعة " value="{{$course->teamCost}}" name="teamCost" required>
                                        <span id="test_course-group-cost_error"></span>
                                        <div></div>
                                    </div>
                                </div>

                                <div class="form-row save">

                                    <div class="col-sm-6 mx-auto" style="width: 200px;">
                                        <hr/>
                                        <button class="btn btn-primary action-buttons" type="button" id="submit"> تعديل  <i class="fas fa-plus"></i></button>
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

<!-- script-->
@include('script')
<script type='text/javascript' src="{{url('js/createCourse.js')}}"></script>

<script>
    $(document).ready(function () {
        console.log("ready");
        $("#submit").click(function (e) {
            e.preventDefault();

            var courseName = $("#course-name").val();
            var courseCode = $("#course-id").val();
            var courseDescription = $("#course-description").val();
            var courseDuration = $("#course-duration").val();
            var courseCost = $("#course-cost").val();
            var teamCost = $("#course-group-cost").val();
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
                    console.log(file.files[0]);
                    fd.append('images[]',file.files[0]);
                }
            });
            $('input[type="checkbox"]').each(function () {
                if(this.checked)
                    fd.append('instructors[]',$(this).val());
            });


            fd.append('name',courseName);
            fd.append('code', courseCode);
            fd.append('description', courseDescription);
            fd.append('duration', courseDuration);
            fd.append('cost', courseCost);
            fd.append('content', JSON.stringify(chapters));
            fd.append('teamCost', teamCost);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            $.ajax({
                url: "/courses/{{$course->id}}",
                type : "patch",
                data : fd,
                contentType : false,
                processData : false,
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    // document.getElementById('form').reset();
                    // alert(data);
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
