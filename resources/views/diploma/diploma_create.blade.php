<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
<!-- style -->
    <link href="/css/diploma_style.css" rel="stylesheet"/>
    <title>Add a diploma</title>
</head>
<body id="page-top">
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title">
                                إضافه دبلومه
                            </div>
                        </header>
                        <div class="card-body">
                            <form id="formDiploma" enctype="multipart/form-data" action="{{ route('diplomas.store') }}" method="post">
                                @csrf
                                <input name="next" value="save" hidden>
                                <div class="form-row image-upload">
                                    <div class="col-sm-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" accept="image/*" name="image"
                                                   id="customFile1" src="" onchange="readURL(this, 1);" required>


                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex  justify-content-center">
                                    <div class="course-image-input">
                                        <img id="imageUploaded1"
                                             src="http://simpleicon.com/wp-content/uploads/camera-2.svg"
                                             alt="your image"/>
                                        <p>صورة الدبلومة</p>
                                   <!--     <div id="photo1" class="photo" >هذه الخانه مطلوبه</div>-->
                                    </div>
                                    
                                </div>

                                <div class="form-row">
                                    <div class="col-sm-6 form-group">
                                        <label for="course-name">اسم الدبلومه</label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" id="name"
                                               placeholder="اسم الدبلومه " value="" name="name" required>

                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="course-id">عدد المحاضرات</label>
                                        <input type="text" class="form-control" id="course-id"
                                               placeholder="عدد المحاضرات "
                                               value="" name="number_of_lectures" required>

                                    </div>

                                </div>
                                <div class="form-row">

                                    <div class="col-sm-6 form-group">
                                        <label for="course-duration">مدة الدبلومه</label>
                                        <input type="number" min='0' class="form-control" id="duration"
                                               placeholder="مدة الدبلومه " value="" name="duration" >
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="course-cost">تكلفة الدبلومه</label>
                                        <span class="required">*</span>
                                        <input type="number" min='0' class="form-control" id="cost"
                                               placeholder="تكلفة الدبلومه " value="" name="cost" required>
                                    </div>
                                </div>
                                <div class=" form-row">
                                    <label for="course-description">وصف الدبلومه</label>
                                    <span class="required">*</span>
                                    <textarea placeholder="وصف الدبلومه" rows="2" class="form-control"
                                              id="description" name="description" required></textarea>
                                </div>
                                <br>
                                <fieldset>
                                <div class="form-row">
                                    <legend class="full-width ">
                                        محتوى الدبلومه
                                        <span class="required">*</span>
                                        <SPAN id="course"  class="photo pl-2">هذه الخانه مطلوبه</SPAN>
                                    </legend>
                                    <div class="col form-group">
                                        <select name="courses[]" multiple="multiple" class="col active">
                                            <optgroup label="All Courses">
                                                @foreach($courses as $course)
                                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach


                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                </fieldset>
                                <div class="form-row save">
                                    <div class="col-sm-6 mx-auto" style="width: 200px;">
                                        <button class="btn btn-primary action-buttons" type="submit" id="submit"> إضافة
                                           </button>
                                        <button class="btn btn-primary action-buttons" type="submit" id="save_create"> حفظ و انشاء جديد
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
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
<!-- script  for page -->
<script type='text/javascript' src="{{ asset('js/diploma.js') }}"></script>
<!-- script  multi selector courses-->
<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet"/>
<script src="{{ asset('js/jquery.multiselect.js') }}"></script>
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="{{ asset('js/diploma_create_validation.js') }} "></script>

<script>
    $('#save_create').on('click', function () {
        $('input[name=next]').val('create');
    })
</script>
</body>

</html>

