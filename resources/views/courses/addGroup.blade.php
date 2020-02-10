

<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

<link href="{{asset('css/form.css')}}" rel="stylesheet" type="text/css"/>

    <style>
        .error {
            color: #dc3545;
            font-size: 1rem;
            line-height: 1;
        }
        input.error , textarea.error {
            border: 1px solid #dc3545;
        }
</style>
</head>
<body>
<div class="form-style-5">




    <form action="" method="post" enctype="multipart/form-data" id="addGroup">
        @csrf
        <legend><span class="number">.</span> Group Registeration </legend>
        <input type="text" name="course" placeholder="course *" required>
        <input type="date"  name="startDate" placeholder="start date *" required>
        <input type="text" name="instructor" placeholder="course instructor *" required>
        <input name="add" type="submit" value="Add group" required />
    </form>


</div>
<span class="alert">
    <p class="message">
    <?php
    if(session()->has('message')){
        echo session()->get("message");
    }
    ?>
</p>
</span>
<!-- jquery -->
<script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>

<!-- client side validation page -->
<script type='text/javascript' src="/js/courses_addGroup_validation.js"></script>


</body>
</html>

