<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1 , shrink-to-fit=no"/>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/room_style.css">
    <link rel="stylesheet" href="/css/calendar.css">
    <title>room calendar</title>
  </head>
<body class="bg-light">
<!-- Begin Page Content -->
<div class="container text-center ">
    <div class="row">
        <div class=" col">
            <div class="card text-center">
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
<!-- script -->
<script src="/js/calendar.js"></script>
</body>
</html>
