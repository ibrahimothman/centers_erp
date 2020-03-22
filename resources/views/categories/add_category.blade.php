<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('library')
    <title>Add category</title>
</head>
<body id="page-top">
<div id="wrapper">
    @include('sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        @include('operationBar')
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="card mb-4 shadowed">
                        <header>
                            <div class="card-header text-primary form-title">
                                إضافه فئه
                            </div>
                        </header>
                        <div class="card-body">
                            <!-- add category -->
                            <form>
                                <div class=" row form-group">
                                    <div class="col-sm-6">
                                        <label>الفئه</label>
                                        <input type="text" name="category" class="form-control firstCategory" value=""
                                               required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success save-btn">حفظ</button>
                                </div>
                            </form>
                            <br/>  <!-- end category -->
                            <!-- table -->
                            <div class="table-responsive">
                                <table class="table table-bordered data-table">
                                    <thead>
                                    <th>الفئه</th>
                                    <th>تعديل الفئه</th>
                                    <th>اضافه</th>
                                    <th>التصنيف الفرعي 1 / التصنيف الفرعي2</th>
                                    <th>حذف</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table -->
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')

<script type="text/javascript">
    // save form in table
    $("form").submit(function (e) {
        e.preventDefault();
        var name = $("input[name='category']").val();
        var sub = $("input[name='sub']").val();
        $(".data-table tbody").append("<tr data-name='" + name + "' data-sub='" + sub + "'><td>" + name + "</td><td><button class='btn btn-primary btn-xs btn-edit '>تعديل</button></td>" +
            "<td class='add'><input type='button' class=' btn  btn-warning  addbtn' value='  اضافه تصنيف ' onclick='addNewOption()'><div class='addnew'></div></td>" +
            "<td class='newROW'></td>" +
            "<td><button class='btn btn-danger btn-xs btn-delete'>حذف</button></td></tr>");
        $("input[name='category']").val('');
        $("input[name='sub']").val('');
    });
    //delete row
    $("body").on("click", ".btn-delete", function () {
        $(this).parents("tr").remove();
    });
    //edit category
    $("body").on("click", ".btn-edit", function () {
        var name = $(this).parents("tr").attr('data-name');
        $(this).parents("tr").find("td:eq(0)").html('<input name="edit_name" value="' + name + '">');
        $(this).parents("tr").find("td:eq(1)").prepend("<button class='btn btn-primary btn-xs btn-update'>تحديث</button>")
        $(this).hide();
    });
    //update value of category
    $("body").on("click", ".btn-update", function () {
        var name = $(this).parents("tr").find("input[name='edit_name']").val();
        $(this).parents("tr").find("td:eq(0)").text(name);
        $(this).parents("tr").attr('data-name', name);
        $(this).parents("tr").find(".btn-edit").show();
        $(this).parents("tr").find(".btn-update").remove();
    });
    // add new sub category in row
    $(document).on('click', '.addbtn', function () {
        var newSub = $(this).closest('tr').find(".add .addnew").html("<div class='row m-2' ><input class='category' type='text' name='category' value='' required><button type='submit' class='btn btn-success save'>حفظ</button><button type='reset' class='btn btn-danger cancel'>الغاء</button> </div>");
        $(".save").click(function () {
            var a = $(this).closest('tr').find($(".category")).val();
            // if value empty
            if (a != '') {
                $(this).closest('tr').find(".newROW").append("<section> <div class='field row mx-3 px-2' style=' background-color: #ced4da; margin-bottom: 2px;'><span>" + a + "</span><div><a class='categorybtn2' STYLE='color:#1e7e34;'><i class='fas fa-plus-circle'></i></a><button type='button' class='ml-2 mb-1 close close1' data-dismiss='toast' aria-label='Close'><span style='color:red;' aria-hidden='true'>&times;</span></button></div><div class='addnew2'></div><div class='area'></div></div></section>");
                $(this).closest('tr').find(newSub).html('');
            }
            //delete sub category in row
            if ($(".close1").click(function () {
                $(this).parents(".field").remove();
            })) ;
        });
        // cancel button which add new sub category
        $(".cancel").click(function () {
            $(this).closest('tr').find(newSub).html('');
        });
        // hid input sub category
        $(".save-btn").click(function () {
            newSub.html('');
        });
    });
    // add new second  sub category in row -----tree------
    $(document).on('click', '.categorybtn2', function () {
        var newSub2 = $(this).closest('section').find(".addnew2").html("<div class='row m-2' ><input class='category2' type='text' name='category2'  required><button type='submit' class='btn btn-success save2'>حفظ</button><button type='reset' class='btn btn-danger cancel2'>الغاء</button> </div>");
        $(".save2").click(function () {
            var a2 = $(this).closest('section').find($(".category2")).val();
            // if value empty
            if (a2 != '') {
                $(this).closest('section').find(".area").append("<fieldset style='float: left'><div class='field2 row mx-3 px-2' style='background-color: #e9f2f8; margin-bottom: 2px'><span>" + a2 + "</span><div><button type='button' class='ml-2 mb-1 close close2' data-dismiss='toast' aria-label='Close'><span style='color:red;' aria-hidden='sectionue'>&times;</span></button></div></div></fieldset>");
                $(this).closest('section').find(newSub2).html('');
            }
            //delete sub category in row
            if ($(".close2").click(function () {
                $(this).parents(".field2").remove();
            })) ;
        });
        // cancel button which add new sub category
        $(".cancel2").click(function () {
            $(this).closest('section').find(newSub2).html('');
        });
        // hid input sub category
        $(".save-btn").click(function () {
            newSub2.html('');
        });
    });
</script>
</body>
</html>