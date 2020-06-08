<!DOCTYPE html>
<html lang="ar">
<head>
    <!-- Bootstrap CSS & js -->
@include('library')
<!-- Bootstrap CSS & js -->
    <link rel="stylesheet" href="{{asset("css/room_style.css")}}">
    <title> room edit</title>
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
        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
<!-- script room option field-->
<script type='text/javascript' src="/js/room_style.js"></script>
</body>
</html>
