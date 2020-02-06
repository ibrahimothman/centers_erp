<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
<!-- style -->
    <link href="/css/diploma_style.css" rel="stylesheet"/>
    <title>update a diploma</title>
    <style>
        .error {
            color: #b60000;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
        }
        /* img error */
        .photo{
            display: none;
            color: #b60000;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            text-align: center;
        }

    </style>
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
                                تعديل دبلومه
                            </div>
                        </header>
                        <div class="card-body">
                            <form id="formDiploma" enctype="multipart/form-data" action="{{ route('diplomas.update', $diploma->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-row image-upload">
                                    <div class="col-sm-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" accept="image/*" name="image"
                                                   id="customFile1" src="" onchange="readURL(this, 1);" required>
                                            <input type="file" accept="video/*" class="custom-file-input" name="video"
                                                   id="customFile4" src="" onchange="readURL(this, 4);">

                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex  justify-content-center">
                                    <div class="course-image-input">
                                        <img id="imageUploaded1"
                                             src="{{ $diploma->image }}"
                                             alt="your image"/>
                                        <p>صورة الدبلومة</p>
                                        <div id="photo1" class="photo" >هذه الخانه مطلوبه</div>
                                    </div>
                                    <div class="course-image-input">
                                        <img id="imageUploaded4"
                                             src="http://simpleicon.com/wp-content/uploads/video.svg" alt="your video"/>
                                        <p>ڤيديو الدبلومة</p>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-sm-6 form-group">
                                        <label for="course-name">اسم الدبلومه</label>
                                        <input type="text" class="form-control" id="name"
                                               placeholder="اسم الدبلومه " value="{{ $diploma->name }}" name="name" required>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="course-id">عدد المحاضرات</label>
                                        <input type="text" class="form-control" id="course-id"
                                               placeholder="عدد المحاضرات "
                                               value="{{ $diploma->number_of_lectures }}" name="number_of_lectures" required>
                                    </div>

                                </div>
                                <div class="form-row">

                                    <div class="col-sm-6 form-group">
                                        <label for="course-duration">مدة الدبلومه</label>
                                        <input type="number" min='0' class="form-control" id="duration"
                                               placeholder="مدة الدبلومه " value="{{ $diploma->duration }}" name="duration" required>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="course-cost">تكلفة الدبلومه</label>
                                        <input type="number" min='0' class="form-control" id="cost"
                                               placeholder="تكلفة الدبلومه " value="{{ $diploma->cost }}" name="cost" required>
                                    </div>
                                </div>
                                <div class=" form-row">
                                    <label for="course-description">وصف الدبلومه</label>
                                    <textarea placeholder="وصف الدبلومه" rows="2" class="form-control"
                                              id="description" name="description" required>{{ $diploma->description }}</textarea>
                                </div>
                                <br>
                                <fieldset>
                                    <div class="form-row">
                                        <legend class="full-width "> محتوى الدبلومه<SPAN id="course"  class="photo pl-2">هذه الخانه مطلوبه</SPAN>
                                        </legend>
                                        <div class="col form-group">
                                            <select name="courses[]" multiple="multiple" class="col active">
                                                <optgroup label="Programming Languages">
                                                    @foreach($courses as $course)
                                                        <option value="{{ $course->id }}" {{ $diploma->courses->contains($course->id)? 'selected' : '' }}>{{ $course->name }}</option>
                                                    @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-row save">
                                    <div class="col-sm-6 mx-auto" style="width: 200px;">
                                        <button class="btn btn-primary action-buttons" type="submit" id="submit"> إضافة
                                        </button>
                                        <button class="btn  btn-danger action-buttons" type="reset"> إلغاء
                                        </button>
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
<!-- script  for page -->
<script type='text/javascript' src="{{ asset('/js/diploma.js') }}"></script>
<!-- script  multi selector courses-->
<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet"/>
<script src="{{ asset('/js/jquery.multiselect.js') }}"></script>
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="{{ asset('/js/diploma_update_validation.js') }} "></script>


</body>

</html>

