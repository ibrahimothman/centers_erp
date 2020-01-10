<!DOCTYPE html>
<html lang="en">
<head dir="rtl">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta charset="UTF-8">
    <title>صيغة الشهادة/الإفادة</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="/../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="/../../../css/sb-admin-rtl.css" rel="stylesheet">
    <link href="/../../../css/course-details.css" rel="stylesheet">
    <link href="/../../../css/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/58b9d7bcbd.js" crossorigin="anonymous"></script>


    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script src="{{url("js/summernote-ext-print.js")}}"></script>
    <script src="{{url("js/summernote-paper-size.js")}}"></script>
    <meta name="csrf_token" content="{{ csrf_token() }}">

</head>
<body>


<div class="card-body pb-5">
    @include('sidebar')

    <div class=" clearfix col-md-8 mb-4">
        <form >
            <div class="form-row col-md-12 ">
                <select   id="testselector"   class="form-control ">
                    <option value="0">اختر الامتحان</option>
                    @foreach($tests as $test)
                        <option value={{ $test->id }}>{{ $test->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

</div>



<div style="text-align: right; margin-top: 2em;"><p style="margin-right: 2em;">يمكنك إضافة (اسم الطالب - اسم المركز - اسم المدير - التاريخ) عن طريق كتابة @ لظهور الإختيارات  </p></div>
<div id="summernote"></div>
<div style="margin-right:2em;text-align:right;">

    <br>
    <button id="saveCert" name="saveCert">حفظ الشهادة</button>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{url('js/jquery-ui.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{url('js/sb-admin-2.min.js')}}"></script>
<script type='text/javascript' src="{{url('js/notify.min.js')}}"></script>

<script>
    $(document).ready(function() {
        //$('#summernote').summernote();

        $('#summernote').summernote({
            placeholder: 'أدخل صيغة الشهادة/الإفادة',
            tabsize: 4,
            width:900,
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
