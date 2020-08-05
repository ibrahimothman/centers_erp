<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap CSS & js -->
    @include('library')
    <title>Calendar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
</head>
<body class="bg-light">
<div id="app">
    <div id="wrapper">
        @include('sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            @include('operationBar')
            <div class="container fluid">
                <calendar></calendar>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

