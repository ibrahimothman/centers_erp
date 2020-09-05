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
                                    <label>اسم الوظيفه</label>
                                    <input type="text" id="job_name" name="name" class="form-control" value="{{$job->name}}">

                                </div>
                                <!-- table -->
                                <table id="roles_list" class="table table-striped table-bordered table-sm roles_list"
                                       cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        @foreach(Lang::get('rules.options') as $option)
                                            <th class="th-sm"> {{ $option }} </th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- first row -->
                                    @foreach(Lang::get('rules.scopes') as $scopeKey => $scope)
                                        <tr>
                                            <th scope="row" id="{{ $scope }}">{{$scope}}</th>
                                            @foreach(Lang::get('rules.options') as $optionKey => $option)
                                                <td>
                                                    <input
                                                        id="{{ strtolower($scopeKey). '.'. strtolower($optionKey) }}"
                                                        name=""
                                                        type="checkbox"
                                                        {{ $job
                                                            ->roles[Lang::get(strtolower($scopeKey))][Lang::get(strtolower($optionKey))] == 'true'? 'checked': '' }}
                                                    >
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <br>
                                <div class="form-row save">
                                    <div class="col-sm-6 mx-auto text-center" style="width: 200px;">
                                        <button class="btn btn-primary" type="submit"
                                                id="submit">تعديل
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
<script src="{{ asset('js/notify.min.js') }}"></script>
<script src="{{ asset('js/notification.js') }}"></script>
<script>



    function createRolesJson () {
        const checkboxes = Array.from($('input:checkbox').map(function () {
            const [scope, option] = $(this).attr('id').split('.');
            return {
                scope,
                option,
                isChecked: $(this).is(':checked'),
            }
        }));
        const rolesByScope =  checkboxes.reduce(function (byScope, {scope, option, isChecked}) {
            byScope[scope] = {
                ...byScope[scope],
                [option]: `${isChecked}`,
            };
            return byScope;

        }, {});

        console.log(rolesByScope);
        return rolesByScope;
    }

    $('#fromJob').submit(function (e) {
        e.preventDefault();
        $('.errors').remove();
        const id = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
        console.log(id);
        const job_name = $('#job_name').val();
            $.ajax({
                type: 'PATCH',
                url: `/jobs/${id}`,
                data: {
                    name: job_name,
                    roles: JSON.stringify(createRolesJson()),
                    "_token": "{{csrf_token()}}"
                },
                success: function (response) {
                    $.notify(response.message, {
                        position:"bottom left",
                        style: 'successful-process',
                        className: 'done',
                        // autoHideDelay: 500000
                    });
                    
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


    });


</script>

</body>
</html>
