<!DOCTYPE html>
<html lang="ar">
<head>
    <!-- Bootstrap CSS & js -->
@include('library')
<!-- Bootstrap CSS & js -->
    <link href="/css/invitation_style.css" rel="stylesheet"/>
    <title>invite</title>
    <style>

    </style>
</head>
<body class="bg-light">
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title">
                             دعوه موظف
                            </div>
                        </header>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dtBasicExample"
                                   class="table table-striped table-bordered table-sm"
                                   cellspacing="0"
                                   width="100%">
                                <thead>
                                <th>الاسم</th>
                                <th>الايميل</th>
                                <th>الوظيفه</th>
                                <th>الصلاحيات</th>
                                <th>دعوه</th>
                                </thead>
                                <tbody>
                                </tbody>
                                <tr>
                                    <td>احمد محمد</td>
                                    <td>fag@ysyhsn</td>
                                    <td>
                                        <input type="text" class="form-control" name="job"  placeholder="الوظيفه "  list="jobList">
                                        <datalist id="jobList">
                                            <option>job</option>
                                        </datalist>
                                    </td>
                                    <td>
                                            <div class="col form-group">
                                                <select name="basic[]" multiple="multiple" class="col active">
                                                    <optgroup label="student">
                                                        <option value="a">access</option>
                                                        <option value="a">access</option>
                                                    </optgroup>

                                                </select>
                                            </div>

                                    </td>
                                    <td><input type='button' class=' btn  btn-warning  addbtn' value='invite'></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
        @include('footer')
    </div>
</div>
<!-- script-->
@include('script')
<script>
    //invite
    $("body").on("click", ".addbtn", function () {
        $(this).parents("tr").find("td:eq(4)").prepend("<input type='button' class='btn btn-success' value='invited'>")
        $(this).hide();
    });
    /* multi select authorization */
    $(function () {
        $('select[multiple]').multiselect({
            columns  : 2,
            search   : true,
            selectAll: true,
            texts    : {
                placeholder: 'الصلاحيات',
            }
        });
    });

</script>
<!-- script  multi selector courses-->
<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet"/>
<script src="/js/jquery.multiselect.js"></script>
</body>
</html>

