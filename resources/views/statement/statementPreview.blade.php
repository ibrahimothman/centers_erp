<!DOCTYPE html>
<html lang="en">
<head >
    <title>statement preview</title>
    <script src="{{url('js/jquery.min.js')}}"></script>
</head>
<body>

<div id="statement">
    <style type="text/css">
    @page{
    size: auto;
    margin: 3mm;
    }
    </style>

    {!!$statement->body!!}

</div>

<input type="button" id="print"  value="Print">

<script>

    $(document).ready(function() {
        $('#print').click(function(){
            var prtContent = document.getElementById("statement");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        });
    });
</script>

</body>
</html>
