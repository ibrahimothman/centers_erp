
<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

<!-- css statement -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
            <link href="/css/statementLibrary.css" rel="stylesheet">
        <!-- library -->
        @include('library')
            <title>صيغة الشهادة/الإفادة</title>
</head>
<body>
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title">
                                إضافه افاده
                            </div>
                        </header>
                        <div class="card-body">
                            <form >
{{--                                <div class="form-row form-group ">--}}
{{--                                    <div class="col">--}}
{{--                                        <label>اختيار الامتحان</label>--}}
{{--                                        <select   id="testselector"   class="form-control ">--}}
{{--                                            <option value="0">اختر الامتحان</option>--}}
{{--                                            @foreach($tests as $test)--}}
{{--                                                <option value={{ $test->id }}>{{ $test->name }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div  class="text-primary"><p >يمكنك إضافة (اسم الطالب - اسم المركز - اسم المدير - التاريخ) عن طريق كتابة @ لظهور الإختيارات  </p></div>
                                <div id="summernote"></div>
                                <div style="margin-right:2em;text-align:right;">

                                </div>

                                <div class="form-row save">
                                    <div class="col-sm-6 mx-auto" style="width: 200px;">
                                        <button  id="saveCert" name="saveCert" class="btn btn-primary action-buttons" type="submit" > حفظ الشهاده
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
<script>var jQuery = $.noConflict(true);</script>
<!-- Bootstrap core JavaScript -->
<script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{url('js/jquery-ui.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{url('js/sb-admin-2.min.js')}}"></script>
<script  src="{{asset('js/notify.min.js')}}"></script>
<script  src="{{asset('js/notification.js')}}"></script>



<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script src="{{url("js/summernote-ext-print.js")}}"></script>
<script src="{{url("js/summernote-paper-size.js")}}"></script>

<script>
    $(document).ready(function() {
        //$('#summernote').summernote();

        $('#summernote').summernote({
            placeholder: 'أدخل صيغة الشهادة/الإفادة',
            tabsize: 4,
            minHeight: 200,
            maxHeight: 700,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['fontname', ['fontname']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link','picture', 'hr']],
                ['height', ['height']],
                ['table', ['table']],
                ['view', ['fullscreen', 'help']],
                ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']],
                ['misc', ['undo','redo','print']],
                ['paperSize',['paperSize']]
            ],
            hint: {
                mentions: ['اسم الطالب', 'اسم المركز','اسم المدير', 'التاريخ'],
                match: /\B@(\w*)$/,
                search: function (keyword, callback) {
                    callback($.grep(this.mentions, function (item) {
                        return item.indexOf(keyword) == 0;
                    }));
                },
                content: function (item) {
                    return '@' + item;
                }
            }
        });

        $('#summernote').summernote('justifyRight');

        $.extend($.summernote.options.icons , {
            'note-icon-caret': 'fa fa-caret-right',
        });

        $('#saveCert').click(function(e){
            e.preventDefault();
            var content= {};
            content['body'] = $('.note-editable').html();
                $.ajax({
                    url: "/test-statements",
                    type: "POST",
                    // dataType: 'text',
                    data: {body: JSON.stringify(content), _token: "{{ csrf_token() }}"},
                    success: function (data) {
                        $.notify(data, {
                            position:"bottom left",
                            style: 'successful-process',
                            className: 'done',
                            // autoHideDelay: 500000
                        });
                    },
                    error: function (xhr, status, error) {
                        $.notify(error, {
                            position:"bottom left",
                            style: 'successful-process',
                            className: 'notDone',
                            // autoHideDelay: 500000
                        });
                    }

                });

        });

    });
</script>


</body>
</html>


