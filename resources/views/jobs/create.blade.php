<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1 , shrink-to-fit=no"/>
@include('library')
<!-- Bootstrap CSS & js -->
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">


    <title>jobs</title>
    <style>
        body {
            direction: rtl;

        }

        .error {
            color: #b60000;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
        }
    </style>
</head>
<body class="bg-light">


<!-- Begin Page Content -->
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
    @include('operationBar')
    {{-- old version --}}
        {{--
   <section>
       <div class="container-fluid text-right">
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
                                <button class="btn btn-primary" type="submit"  onclick="submitJob();" id="submit_job">اضافه</button>
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
--}}
    <!-- new version -->
        <!-- Page Heading -->
        <div class="container-fluid text-right">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="card mb-4">
                        <header>
                            <div class="card-header text-primary form-title ">
                                <h3>تسجيل وظيفه جديده </h3>
                            </div>
                        </header>
                        <div class="card-body">
                            <form enctype="multipart/form-data" id="from">
                                @csrf
                                <div class="form-group">
                                    <label>اسم الوظيفه</label>
                                    <input type="text" class="form-control" id="job_name" name="job_name"
                                           placeholder="اسم الوظيفه">
                                </div>
                                <!-- table -->
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm"
                                       cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th class="th-sm">اضافه</th>
                                        <th class="th-sm">عرض</th>
                                        <th class="th-sm"> تعديل</th>
                                        <th class="th-sm"> ازاله</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- first row -->
                                    <tr>
                                        <th scope="row">الطلاب</th>
                                        <td><input name="check" type="checkbox" value=""></td>
                                        <td><input name="check" type="checkbox" value=""></td>
                                        <td><input name="check" type="checkbox" value=""></td>
                                        <td><input name="check" type="checkbox" value=""></td>
                                    </tr>
                                    <!-- second row -->
                                    <tr>
                                        <th scope="row">المدربين</th>
                                        <td><input name="check" type="checkbox" value=""></td>
                                        <td><input name="check" type="checkbox" value=""></td>
                                        <td><input name="check" type="checkbox" value=""></td>
                                        <td><input name="check" type="checkbox" value=""></td>
                                    </tr>
                                    <!-- third row -->
                                    <tr>
                                        <th scope="row">الامتحانات</th>
                                        <td><input name="check" type="checkbox" value=""></td>
                                        <td><input name="check" type="checkbox" value=""></td>
                                        <td><input name="check" type="checkbox" value=""></td>
                                        <td><input name="check" type="checkbox" value=""></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div class="form-row save">
                                    <div class="col-sm-6 mx-auto text-center" style="width: 200px;">
                                        <button class="btn btn-primary" type="submit" onclick="submitJob();"
                                                id="submit_job">اضافه
                                        </button>
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
        <!-- /.container-fluid -->
        @include('footer')
    </div>
</div>


@include('script')

<script src="src={{url('vendor/jquery/jquery.js/jquery.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->
<script type='text/javascript' src="/js/jobs_create_validation.js"></script>
<script>
    /*
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
*/
</script>

</body>
</html>
