
<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('library')
<!-- css statement -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
            <link href="/css/statementLibrary.css" rel="stylesheet">
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
                                <div class="form-row form-group ">
                                    <div class="col">
                                        <label>اختيار الامتحان</label>
                                        <select   id="testselector"   class="form-control ">
                                            <option value="0">اختر الامتحان</option>
                                            @foreach($tests as $test)
                                                <option value={{ $test->id }}>{{ $test->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

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
<script type='text/javascript' src="{{url('js/notify.min.js')}}"></script>



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

        $('#saveCert').click(function(){
            var content=$('.note-editable').html();
            var test_id = $('#testselector').val();
            if(test_id != 0) {
                $.ajax({
                    url: "/test-statements",
                    type: "POST",
                    // dataType: 'text',
                    data: {test_id : test_id,  body: content, _token: "{{ csrf_token() }}"},
                    success: function (data) {
                        $.notify('تمت العملية بنجاح', {
                            position:"bottom left",
                            style: 'successful-process',
                            className: 'done',
                            // autoHideDelay: 500000
                        });
                    },
                    error: function (data, errorThrown) {
                        $.notify('تمت العملية بنجاح', {
                            position:"bottom left",
                            style: 'successful-process',
                            className: 'notDone',
                            // autoHideDelay: 500000
                        });
                    }

                });
            }else{
                $.notify('choose test first', {
                    position:"bottom left",
                    style: 'successful-process',
                    className: 'notDone',
                    // autoHideDelay: 500000
                });
            }
        });

    });
</script>

<script>
    $.notify.addStyle('successful-process', {
        html: `<div>
                            <span data-notify-text/>
                            <i class="fas fa-times-circle"
                            style="
                                    color:white;
                                    opacity:0.7;
                                    position: relative;
                                    top: 0px;
                                    left: -28px;
                                  "
                            ></i>
                        </div>`,
        classes: {
            base: {
                "white-space": "nowrap",
                "background-color": "green",
                "padding": "15px",
                "padding-left": "35px",
                "border-radius": "3px"
            },
            done: {
                "color": "white",
                "background-color": "#28a745",
                "font-weight":"bold"
            },
            notDone:{
                "color": "white",
                "background-color": "#dc3545",
                "font-weight":"bold"
            }
        }
    });

</script>
</body>
</html>


