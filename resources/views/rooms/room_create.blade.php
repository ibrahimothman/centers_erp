<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1 , shrink-to-fit=no"/>
    <!-- Bootstrap CSS & js -->
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/room_style.css")}}">
    <title> room create</title>


    <link href="{{asset("css/styles.css")}}" rel="stylesheet">
    <!-- Custom fonts for this template-->

    <link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{url('css/sb-admin-rtl.css')}}" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
        integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If"
        crossorigin="anonymous">

    <style>
        div[name="add"]{
            display: inline-block;

        }
    </style>

</head>
<body class="bg-light">
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
    <!-- Begin Page Content -->
        <div class="container-fluid  ">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card mb-4">
                        <div class="card-header text-primary">
                            تعديل بيانات الغرفه
                        </div>
                        <div class="card-body">
                            <form action="{{ route('rooms.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input name="next" value="save" hidden>
                                <div class="form-row form-group">
                                    <div class="col-3 ">اسم الغرفه</div>
                                    <div class="col-9 ">
                                        <input type="text" value="{{ old('name') ?? $room->name }}" name="name" class='form-control'
                                               placeholder='ادخل اسم الغرفه'>
                                        <div>{{ $errors->first('name') }}</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row form-group">
                                    <div class="col-3 ">الموقع</div>
                                    <div class="col-9 ">
                                        <input type="text" value="{{ old('location') ?? $room->location }}" name="location" class='form-control' placeholder='ادخل الموقع'>
                                        <div>{{ $errors->first('location') }}</div>
                                    </div>

                                </div>
                                <h6>تفاصيل مساحه الغرفه</h6>
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="form-row form-group">
                                            <div class="col-3 ">مساحه الغرفه</div>
                                            <div class="col-9 ">
                                                <input type="number" value="{{ old('area') ?? $room->details['area'] }}" name="area" class='form-control' placeholder='المساحه بالمتر المربع'>
                                                <div>{{ $errors->first('area') }}</div>
                                            </div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-3 ">عدد الكراسي</div>
                                            <div class="col-9 ">
                                                <input type="number" value="{{ old('no_of_chairs') ?? $room->details['no_of_chairs'] }}" name="no_of_chairs" class='form-control'
                                                       placeholder='ادخل عدد الكراسي'>
                                                <div>{{ $errors->first('no_of_chairs') }}</div>
                                            </div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-3 ">عدد الكمبيوتر</div>
                                            <div class="col-9 ">
                                                <input type="number" value="{{ old('no_of_computers') ?? $room->details['no_of_computers'] }}" name="no_of_computers" class='form-control'
                                                       placeholder='ادخل عدد الكمبيوتر'>
                                                <div>{{ $errors->first('no_of_computers') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h6>محتويات الغرفه</h6>

                                <div class="card ">
                                    @if($options)
                                    <div class="card-body">
                                        <div class=" row smiley-wrapper justify-content-center">
                                            <div class="smiley " id="addBtn">

                                                @foreach($options as $option)
                                                    <div name="add">
                                                        <button class="btn btn-primary" name="option"> <span >{{ $option }}</span></button>
                                                    </div>
                                                 @endforeach


                                            </div>
                                        </div>
                                        <Br>
                                        <div class=" row">
                                            <div class="col text-center">
                                                <fieldset  name="message"  style="min-height: 100px;" id="reply-message" class="markItUpEditor "></fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        <a href="/centers/options">اضف امكانيات</a>
                                    @endif

                                </div>
                                <br>
                                <div class="form-row save">
                                    <div class="col-sm-6 mx-auto text-center">
                                        <button class="btn btn-primary" type="submit" id="submit">حفظ</button>
                                        <button class="btn btn-primary" type="submit" id="submit_new">حفظ و انشاء جديد</button>
                                        <button class="btn  btn-danger" type="reset"> الغاء</button>


                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </section>

        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
<!-- script room option field-->
<script type='text/javascript' src="/js/room_style.js"></script>
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="/js/room_create_validation.js"></script>

<script>

    function selectAll(source) {
        console.log('asd');
        var checkboxes = document.getElementsByClassName('check');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    $('#submit_new').on('click', function (e) {
        $('input[name=next]').val('create');
    })
</script>

</body>
</html>
