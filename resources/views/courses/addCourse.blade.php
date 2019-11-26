

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<link href="{{asset('css/form.css')}}" rel="stylesheet" type="text/css"/>

<div class="form-style-5">

    @include('sidebar')
<span style="font-family: Courier ;color: #1abc9c;margin-bottom: 10px ">


        </span>

    <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
        @csrf
            <legend><span class="number">.</span> Course Registeration </legend>
            <input type="text" name="name" placeholder="course Name *" required>
            <input type="text" name="code" placeholder="course code *" required>
            <input type="number" name="duration" placeholder="course duration *" required>
            <input type="number" name="price" placeholder="course price *" required>
            <textarea name="description" placeholder="course Description" required></textarea>
            <textarea name="content" placeholder="course content" required></textarea>
        Media<br>
        <input type="file" name="images" class="file" required>

        <input name="add" type="submit" value="Add Course" required />
    </form>


</div>




</html>

