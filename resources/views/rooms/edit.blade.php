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
                    <div class="card mb-4">
                        <div class="card-header text-primary">
                            تعديل بيانات الغرفه
                        </div>
                        <div class="card-body">
                            <form action="{{ route('rooms.update',$room->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
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
                                    <div class="card-body">
                                        <div class="row ">
                                            <div class="col-md-3">
                                                <input name="extras[camera]" class="extra-class" type="checkbox" {{ ! is_null($room->extras) && array_key_exists('camera',$room->extras) && $room->extras['camera'] == 'on' ? 'checked' : '' }}>
                                                <label>كاميرات مراقبه</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input name="extras[air-conditioner]" class="extra-class" type="checkbox" {{  ! is_null($room->extras) && array_key_exists('air-conditioner',$room->extras) && $room->extras['air-conditioner'] == 'on' ? 'checked' : '' }} >
                                                <label>تكيف</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input name="extras[data-show]" class="extra-class" type="checkbox" {{ ! is_null($room->extras) && array_key_exists('data-show',$room->extras) && $room->extras['data-show'] == 'on' ? 'checked' : '' }} >
                                                <label>دتاشو</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="checkbox" onClick="selectAll(this)">
                                                <label>تحديد الكل</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-row save">
                                    <div class="col-sm-6 mx-auto text-center">
                                        <button class="btn btn-primary" type="submit" id="submit">تعديل</button>
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
        <!-- script-->
        <script type="text/javascipt" src="{{url('js/jQuery.js')}}"></script>
        <script type="text/javascript" src="{{url('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{url('js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{url('js/popper.min.js')}}"></script>
        <script src="{{url('js/bootstrap.min.js')}}"></script>

        <script>
            function selectAll(source) {
                var checkboxes = document.getElementsByName('check');
                for(var i=0, n=checkboxes.length;i<n;i++) {
                    checkboxes[i].checked = source.checked;
                }
            }
        </script>
</body>
</html>
