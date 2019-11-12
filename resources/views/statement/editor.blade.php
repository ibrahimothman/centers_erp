<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>صيغة الشهادة/الإفادة</title>
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
    <button id="saveCert" name="saveCert">حفظ الشهادة</button>
</div>

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
            //alert(content);
            if(test_id != 0) {
                $.ajax({
                    url: "/test-statements",
                    type: "POST",
                    // dataType: 'text',
                    data: {test_id : test_id,  body: content, _token: "{{ csrf_token() }}"},
                    success: function (data) {
                        alert(data);
                    },
                    error: function (data, errorThrown) {
                        alert('request failed :');
                    }

                });
            }else alert('choose test');
        });

    });
</script>
</body>
</html>
