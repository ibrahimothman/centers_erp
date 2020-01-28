<!DOCTYPE html>
<html lang="ar">
<head>
    @include('library')
    <link rel="stylesheet" href="/css/room_style.css">
    <link rel="stylesheet" href="/css/calendar.css">
    <title>room calendar</title>
  </head>
<body class="bg-light">
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
<!-- Begin Page Content -->
<div class="container text-center ">
    <div class="row">
        <div class=" col">
            <div class="card  motionCard text-center">
                <div class="card-body">
                    <a class="add btn btn-outline-primary" href="#" type="button"> حجز موعد جديد</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Begin calendar -->
<div class="container calendarshow">
    <div class="row">
        <div class="col">
            <div id="calendarContainer"></div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="organizerContainer" style="margin-top: 50px;"></div>
        </div>
    </div>
</div>
<br>

        @include('footer')
    </div>
</div>
<!-- script-->

@include('script')
<script src="{{url('js/calendar.js')}}"></script>
</body>
</html>
