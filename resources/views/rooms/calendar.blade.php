<!DOCTYPE html>
<html lang="ar" xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
    <!-- Bootstrap CSS & js -->
@include('library')
    <link rel="stylesheet" href="/css/room_style.css">
    <title> room calender</title>
</head>
<body class="bg-light">
    <div id="app">
        <div id="wrapper">
            @include('sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                @include('operationBar')
                <calendar_component></calendar_component>
            </div>
        </div>
    </div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

