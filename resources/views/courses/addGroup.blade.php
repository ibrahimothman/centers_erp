

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<link href="{{asset('css/form.css')}}" rel="stylesheet" type="text/css"/>

<div class="form-style-5">




    <form action="{{ route('groups.store') }}" method="post" enctype="multipart/form-data">
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

</html>

