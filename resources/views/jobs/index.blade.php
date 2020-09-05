<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1 , shrink-to-fit=no"/>
    @include('library')

    <title>jobs</title>
</head>
<body class="bg-light" id="page-top">


<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')

    <!-- new version -->
        <!-- Page Heading -->
        <div class="container-fluid ">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="card mb-4">
                        <header>
                            <div class="card-header text-primary form-title ">
                                <h3>تعديل الوظائف</h3>

                            </div>
                        </header>
                        <div class="card-body">
                            <form id="fromJob">
                                <div class="form-group">
                                    <label>اختر الوظيفه</label>
                                    <select id="jobs-options" class="form-control">
                                        <option value="0">اختر</option>
                                        @foreach($jobs as $job)
                                            <option value="{{ $job->id }}">{{ $job->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script -->
@include('script')
<script>


    $('#jobs-options').change(function(){
        var id = $(this).val();
        if(id != 0){
            window.location = `/jobs/${id}`;
        }
    });



</script>

</body>
</html>
