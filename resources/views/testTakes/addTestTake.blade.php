<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<link href="{{asset('css/form.css')}}" rel="stylesheet" type="text/css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet"
          href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"
          type="text/css">

</head>

<body>
<div class="form-style-5">




    <form action="{{ route('testTakes.store') }}" method="post" >
        @csrf
        <legend><span class="number">.</span> Test Take Registration </legend>
        <input type="text" id="studentName" name="studentName" placeholder="student *" required>
        <select id="test" name="test" onchange="check(this)">
            <option value="-1">select Test</option>
            >
        </select>

        <select  name="group" id="group"  name="group" required>
            <option >select Group</option>
        </select>

        <input name="add" type="submit" value="register group student" required />
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

<script>
    $(document).ready(function() {
        $( "#studentName" )
            .autocomplete({

            source: function(request, response) {
                $.ajax({
                    url: "{{url('studentAutocomplete')}}",
                    data: {
                        term : request.term
                    },
                    dataType: "json",
                    success: function(data){
                        var resp = $.map(data,function(obj){
                            return {value: obj['nameEn'], id: obj['id']};
                        });

                        response(resp);
                    }
                });
            },
            minLength: 1,
                select: function(event, ui){
                    $('#studentName').val(ui.item.id);

                    return false;
                }
        });
    });



</script>

<script>
    function check(element){
        //alert(element[element.selectedIndex].id);
        alert(element.value);
    }
</script>

</body>
</html>


