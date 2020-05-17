<!DOCTYPE html>
<html lang="en">
<head>
    @include('library')
    <title>test-det-view</title>
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
        @include('sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-primary">
                            <div class="row  ">
                                <div class="col-md-6"> الامتحانات </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class=" clearfix"> <span class="float-right">
                        <div class="btn-group print-btn p-3 ">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> الترتيب حسب </button>
                            <div class="dropdown-menu"> <a class="dropdown-item" href="#latestCreated">الاحدث اضافه</a> <a class="dropdown-item" href="#latestUpdated">الاحدث التعديل</a> </div>
                        </div>
                        <div class="btn-group p-3 ">

                            <input type="hidden" name="search_param" value="all" id="search_param">
                            <input type="text" id="search" class="form-control " name="x" placeholder="ابحث">
                            <div class="btn-group">
                                <button class="btn btn-success"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </span> </div>
                            <div class="row cont-det">
                                <div  class="col-md-12">
                                    <div id="data">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.container-fluid -->
                </div>
                    <!-- End of Main Content -->
            </div>
            </div>
                    <!-- Footer -->
                @include('footer')
                    <!-- End of Footer -->
                <!-- End of Content Wrapper -->

        </div>
</div>
        <!-- End of Page Wrapper -->
    <!-- scroll top -->
    @include('scroll_top')
    @include('script')
    <script src="{{ asset('js/notify.min.js') }}"></script>
    <script src="{{ asset('js/notification.js') }}"></script>
        <script>
            $(document).ready(function () {
                // get all center's tests
                getTests({
                    order_by: 'created_at',
                    sort: 'desc'
                });

                $('#search').on('keyup', function (e) {
                    if(e.keyCode == 13){
                        var query = $(this).val();
                        if (query != ''){
                            getTests({
                                search_by: 'name',
                                value: query,
                                order_by: 'created_at',
                                sort: 'desc'
                            })
                        }
                    }
                })
            });



            function getTests(data) {
                $.ajax({
                    url:'/all-tests',
                    type:'GET',
                    data: data,
                    success: function (data) {
                        console.log(data);
                        var lines = "";
                        data.data.forEach(function (test) {
                            // console.log(test.name);
                            lines += "<div class='card card  card-sh  border-primary p-3 test-view'>";
                            lines += "<div class='card-header bg-transparent border-primary text-success font-weight-bold  clearfix'>";
                            lines += "<span class='float-right'>";
                            lines += "<a href='/test-groups/create?id="+test.id+"' class='btn btn-outline-success mx-1 form-group '><i class='fas fa-plus'></i> <SPAN>تسجيل الامتحان</SPAN> </a>";
                            lines += "<a href='tests/"+test.id+"/edit/' class=' btn btn-outline-primary  form-group mx-1'><i class='fas fa-edit'></i> </a>";
                            lines += "<button onclick='deleteTest("+test.id+");' class='btn btn-outline-danger form-group mx-1'> <i class='fas fa-trash-alt'></i> </button>";
                            lines += "</span>";
                            lines += "<span  class=' float-left'>"+test.name+"</span>";
                            lines += "</div>";
                            lines += "<div class='card-body '>";
                            lines += "<p class='card-title text-primary '> عن الامتحان : </p>";
                            lines += "<span class='card-text text-justify'>"+test.description+"</span>";
                            lines += "<div class='dropdown-divider'></div>";
                            lines += "<div class='card-text clearfix '> <span class='w-50 p-3  text-primary' > تكلفه الامتحان :</span>";
                            lines += "<div class='d-inline p-2 '> <span class='text-warning  ' >فردي : </span> <span class=' text-secondary ' >"+test.cost_ind+" جنيها </span> </div>";
                            lines += "<div class='d-inline p-2 '> <span class='text-warning  ' >كورس : </span> <span class=' text-secondary ' >"+test.cost_course+" جنيها </span> </div>";
                            if(test.retake)
                                lines += "<div class='d-inline p-5 '> <div class='btn-success rep mr-3' style='float: left'>قابل للاعاده</div> </div>";
                            else
                                lines += "<div class='d-inline p-5  '> <div class='btn-warning rep mr-3' style='float: left'>غير قابل للاعاده</div> </div>";
                            lines += "<footer class='blockquote-footer float-right'>";
                            lines += "<span>تاريخ الاضافه "+test.created_at+"</span>";
                            lines += " </footer>";
                            lines += "</div>";
                            lines += "</div>";
                            lines += "</div>";

                        });

                        $('#data').html(lines);
                    }
                });
            }

            function deleteTest(test_id) {
                $.ajax({
                    url: '/tests/'+test_id,
                    type: 'DELETE',
                    data : {'_token':"{{csrf_token()}}"},
                    success : function (data) {
                        console.log(data);
                        getTests();
                    },
                    error: function (xhr, status, error) {
                        if (xhr.status == 403){
                            $.notify(error, {
                                position:"bottom left",
                                style: 'successful-process',
                                className: 'notDone',
                                // autoHideDelay: 500000
                            });
                        }
                    }
                });
            }

            $('a[href="#latestCreated"]').click(function(e){
                e.preventDefault();
                getTests({
                    order_by: 'created_at',
                    sort: 'desc'
                })
            });

            $('a[href="#latestUpdated"]').click(function(e){
                e.preventDefault();
                getTests({
                    order_by: 'updated_at',
                    sort: 'desc'
                })
            });

        </script>
</body>
</html>
