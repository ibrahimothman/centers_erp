<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1 , shrink-to-fit=no"/>
    <!-- Bootstrap CSS & js -->
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">


    <title>jobs</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="/../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="/../../../css/sb-admin-rtl.css" rel="stylesheet">
    <link href="/../../../css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/58b9d7bcbd.js" crossorigin="anonymous"></script>

</head>
<body>
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form enctype="multipart/form-data" id="from">
                            @csrf
                            <div class="form-group">
                                <label>اسم الوظيفه</label>
                                <input type="text" class="form-control" id="job_name" name="job_name" placeholder="اسم الوظيفه">
                            </div>

                            <div class="card ">
                                <div class="card-body">
                                    @for($i = 0; $i < count($roles)/4; $i++)
                                        <div class="row">
                                            @for($j = $i * 4; $j < ($i + 1) * 4; $j++)
                                                <div class="col">
                                                    <input  name="check"  type="checkbox" value="{{ $roles[$j]->id }}">
                                                    <label>{{ $roles[$j]->name }}</label>
                                                </div>
                                            @endfor
                                        </div>
                                    @endfor

                                    <div class="row">
                                        <div class="col">
                                            <input type="checkbox" onClick="selectall(this)">
                                            <label>تحديد الكل</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <br>


                            <div class="form-row save">

                                <div class="col-sm-6 mx-auto text-center" style="width: 200px;">
                                    <button class="btn btn-primary" type="button" onclick="submitJob();" id="submit_job">اضافه</button>
                                    <button class="btn  btn-danger" type="reset"> الغاء</button>


                                </div>

                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






<script type="text/javascipt" src="{{ url('js/jQuery.js') }}"></script>
<script type="text/javascript" src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('static/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ url('static/js/popper.min.js') }}"></script>
<script src="{{ url('static/js/bootstrap.min.js') }}"></script>

<script src="src={{url('vendor/jquery/jquery.js/jquery.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script>

    function selectall(source) {
        var checkboxes = document.getElementsByName('check');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    function submitJob() {
        var job_name = document.getElementById('job_name').value;
        if(job_name.length === 0){
            alert('enter job name');
        }else {
            var checkBoxes = document.getElementsByName('check');
            var selected_roles_ids = [];
            for (var i = 0; i < checkBoxes.length; i++) {
                // And stick the checked ones onto an array...
                if (checkBoxes[i].checked) {
                    console.log(checkBoxes[i].value);
                    selected_roles_ids.push(checkBoxes[i].value);
                }
            }


            $.ajax({
                type: 'POST',
                url: '/jobs',
                data: {
                    job_name: job_name,
                    roles_ids: selected_roles_ids,
                    "_token": "{{csrf_token()}}"
                },
                success: function (response) {
                    alert(response);
                    document.getElementById('from').reset();
                }
            });
        }

    }
</script>

</body>
</html>
