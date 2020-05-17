<!DOCTYPE html>
<html lang="en">
<head >
    <title>statement preview</title>
    @include('library')


    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>
    <script src="{{url('js/jquery.datetimepicker.js')}}"></script>
</head>
<body>

<!-- Page Wrapper -->

<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')

<<<<<<< HEAD
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"> <i class="fa fa-bars"></i> </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="البحث عن " aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button"> <i class="fas fa-search fa-sm"></i> </button>
                        </div>
                    </div>
                </form>
<div id="statement">
    <style type="text/css">
    @page{
    size: auto;
    margin: 3mm;
    }
    </style>
=======
        <div id="statement">
            <style type="text/css">
                @page{
                    size: auto;
                    margin: 3mm;
                }
            </style>

            {!!$statement['body']!!}

        </div>

        <input type="button" id="print"  value="Print">
    </div>
</div>

>>>>>>> c41eee09e4a3e28fec761df558ef71049c27c599


</body>
</html>

@include('script')
<script>

        $('#print').on('click', function () {
            console.log('asdasd');
            var prtContent = document.getElementById("statement");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        });

</script>
