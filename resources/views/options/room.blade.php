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
                        <div class="card-body">
                            <form id="form" method="post" action="{{route('centers.update', session('center_id'))}}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for="name">امكانيات المعمل</label>
                                        <input id="option" type="text" placeholder="امكانيات المعمل" class="form-control " >
                                    </div>
                                </div>
                                <div class="options">
                                    @if($options && count($options) > 0)
                                        @foreach($options as $option)
                                            <div  style='display: inline-block' class='option-item'>
                                                <input hidden name='options[room][]' value='{{$option}}'>
                                                <button type="button" style='margin: 0 20px 20px;' class='btn btn-primary remove-option' data-dismiss='toast' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                    {{ $option }}</button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <br>
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
