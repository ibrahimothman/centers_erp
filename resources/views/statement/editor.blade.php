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

<div style="text-align: right; margin-top: 2em;"><p style="margin-right: 2em;">يمكنك إضافة (اسم الطالب - اسم المركز - اسم المدير - التاريخ) عن طريق كتابة @ لظهور الإختيارات  </p></div>
<div id="summernote"></div>
<div style="margin-right:2em;text-align:right;">

    <select id="tests">
        <option value="">select test</option>
        @foreach($tests as $test)
            <option value="{{$test->id}}">{{$test->name}}</option>
        @endforeach
    </select>

    <br> <br> <br>
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
            //alert(content);

            $.ajax({
                url: "{{url('saveStatementTemplate')}}",
                type: "POST",
                dataType: 'text',
                data: {"_token": "{{ csrf_token() }}","body":content},
                //contentType: 'application/x-www-form-urlencoded',
                success: function(data, textStatus, jqXHR){
                    alert(data);
                },
                error: function(data, errorThrown)
                {
                    alert('request failed :');
                }

            });
        });

    });
</script>
</body>
</html>
