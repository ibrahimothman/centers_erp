<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('library')
    <title>Add option</title>
</head>
<body id="page-top">
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title">
                                اضافه امكانيات الغرف
                            </div>
                        </header>
                        <div id="app">
                            <add-room-option :options="{{ $options }}" :center_id="{{ session('center_id') }}"></add-room-option>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        @include('footer')
    </div>
</div>
<!-- script -->
@include('script')

<script>

    $(document).ready(function() {
        $(window).keydown(function(event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        })
    });



    $('#option').on('keyup', function (e) {
        let option_name = $('#option').val();
        if(e.keyCode === 13 && option_name.length > 0) {
            let option = "<div  style='display: inline-block' class='option-item'> <input hidden name='options[room][]' value='"+ option_name +"'> <button style='margin: 0 20px 20px;' class='btn btn-primary remove-option' data-dismiss='toast' aria-label='Close'>" +
                "<span aria-hidden='true'>&times;</span>" +
                "" + option_name + "</button></div>";
            $('.options').append(option);
            $(this).val('');
        }
    });

    $('.remove-option').on('click', function (e) {
        e.preventDefault();
        $(this).parent('.option-item').remove();
    })


</script>
</body>
</html>
<script src="{{ asset('js/app.js') }}"></script>
