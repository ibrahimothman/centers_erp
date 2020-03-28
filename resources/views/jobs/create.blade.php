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
                                <h3>تسجيل وظيفه جديده </h3>

                            </div>
                        </header>
                        <div class="card-body">
                            <form id="fromJob">
                                <div class="form-group">
                                    <label>اسم الوظيفه</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" id="name" name="name"
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
                                        <button class="btn btn-primary" type="submit"
                                                id="submit">اضافه
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
<!-- scroll top -->
@include('scroll_top')
<!-- script -->
@include('script')

<script src="src={{url('vendor/jquery/jquery.js/jquery.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- client side validation plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<!-- client side validation page -->

<script type='text/javascript' src="/js/jobs_create_validation.js"></script>
<script>

    $('#fromJob').submit(function (e) {
        e.preventDefault();
        $('.errors').remove();
        var job_name = $('#name').val();
        if(job_name.length === 0){
            alert('enter job name');
        }else {
            // var checkBoxes = document.getElementsByName('check');
            // var selected_roles_ids = [];
            // for (var i = 0; i < checkBoxes.length; i++) {
            //     // And stick the checked ones onto an array...
            //     if (checkBoxes[i].checked) {
            //         console.log(checkBoxes[i].value);
            //         selected_roles_ids.push(checkBoxes[i].value);
            //     }
            // }


            $.ajax({
                type: 'POST',
                url: '/jobs',
                data: {
                    name: job_name,
                    "_token": "{{csrf_token()}}"
                },
                success: function (response) {
                    alert(response.message);
                    location.reload();
                },
                error: function (error) {
                    if (error.status == 400) {// validation
                        // loop through the errors and show them to the user
                        $.each(error.responseJSON.errors, function (i, error_message) {
                            // error is message
                            // i is element's name
                            var element = $(document).find('[name="' + i + '"]');
                            element.after($('<span class="errors" style="color: red;">' + error_message + '</span>'));
                        });
                    }
                }

            });
        }

    });

</script>

</body>
</html>
