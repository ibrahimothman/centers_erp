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
                                        <input type="text" name="name" class="form-control firstCategory" value="{{ old('name') }}"
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
                                    <th>التصنيف الفرعي</th>
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

    $(document).ready(function () {
       loadAllCategories();
    });
    function addNewCategory(name, parent_id){
        $.ajax({
            url: "{{ route('categories.store') }}",
            type: "post",
            data: {name: name, parent_id: parent_id, _token: "{{ csrf_token() }}"},
            success: function (category) {
                if(parent_id == null) displayCategories(category);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.responseText);
            }
        })
    }

    function loadAllCategories() {
        $.ajax({
            url: "{{ route('categories.index') }}",
            type: "get",
            success: function (categories) {
                displayCategories(categories);
            },

        })
    }
    function displayCategories(categories) {
        console.log(categories);
        $.each(categories, function (i, category) {
            // console.log(category.name);
            var lines = '';
            lines += "<tr data-id='"+ category.id +"' >";
            lines += "<td>" + category.name + "</td><td><button class='btn btn-primary btn-xs btn-edit '>تعديل</button></td>";
            lines += "<td class='add'><input type='button' class=' btn  btn-warning  addbtn' value='  اضافه تصنيف '><div class='addnew'></div></td>";
            lines += "<td class='newROW'>" ;
            $.each(category.children, function (i, child) {
                lines += "<div class='field row mx-3'><span>" + child.name + "<button type='button' class='ml-2 mb-1 close' onclick='deleteCategory("+ child.id +")'  data-dismiss='toast' aria-label='Close'><span style='color:red;' aria-hidden='true'>&times;</span></button></span></div>";
            });
            lines += "</td>";
            lines += "<td><button class='btn btn-danger btn-xs btn-delete'>حذف</button></td></tr>";
            $(".data-table tbody").append(lines);
        })
    }

    // save form in table
    $("form").submit(function (e) {
        e.preventDefault();
        var name = $("input[name='name']").val();
        addNewCategory(name, null);
        $("input[name='name']").val('');
    });

    function deleteCategory(category_id, target) {
        $.ajax({
            url: "/categories/"+category_id,
            type: "delete",
            data: {category_id: category_id, _token: "{{ csrf_token() }}"},
            success: function (categories) {
                
            },

        })
    }

    //delete row
    $("body").on("click", ".btn-delete", function () {
        var parent_id = $(this).closest('tr').attr('data-id');
        console.log(parent_id);
        deleteCategory(parent_id);
        $(this).parents("tr").remove();
    });
    //edit category
    // $("body").on("click", ".btn-edit", function () {
    //     var name = $(this).parents("tr").attr('data-name');
    //     $(this).parents("tr").find("td:eq(0)").html('<input name="edit_name" value="' + name + '">');
    //     $(this).parents("tr").find("td:eq(1)").prepend("<button class='btn btn-primary btn-xs btn-update'>تحديث</button>")
    //     $(this).hide();
    // });
    //update value of category
    // $("body").on("click", ".btn-update", function () {
    //     var name = $(this).parents("tr").find("input[name='edit_name']").val();
    //     $(this).parents("tr").find("td:eq(0)").text(name);
    //     $(this).parents("tr").attr('data-name', name);
    //     $(this).parents("tr").find(".btn-edit").show();
    //     $(this).parents("tr").find(".btn-update").remove();
    // });
    // add new sub category in row
    $(document).on('click', '.addbtn', function () {
        var newSub = $(this).closest('tr').find(".add .addnew").html("<div class='row m-2' ><input class='category' type='text' name='name' value='' required><button type='submit' class='btn btn-success save'>حفظ</button><button type='reset' class='btn btn-danger cancel'>الغاء</button> </div>");
        console.log(newSub);
        $(".save").click(function () {
            var sub_category = $(this).closest('tr').find($(".category")).val();
            console.log('sub category: '+sub_category);
            // if value empty
            if (sub_category !== '') {
                var parent_id = $(this).closest('tr').attr('data-id');
                console.log('parent id: '+parent_id);
                addNewCategory(sub_category, parent_id);
                $(this).closest('tr').find(".newROW").append("<div class='field row mx-3'><span>" + sub_category + "<button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'><span style='color:red;' aria-hidden='true'>&times;</span></button></span></div>");
                $(this).closest('tr').find(newSub).html('');
            }
            //delete sub category in row
            $(".close").click(function () {
                deleteCategory();
                $(this).parents(".field").remove();
            }) ;
        });
        // cancel button which add new sub category
        $(".cancel").click(function () {
            $(this).closest('tr').find(newSub).html('');
        });
        // hide input sub category
        $(".save-btn").click(function () {
            newSub.html('');
        });
    });
</script>
</body>
</html>
