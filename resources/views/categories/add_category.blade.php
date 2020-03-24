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

    $(document).ready(function () {
       loadAllCategories();
    });
    function addNewCategory(name, parent_id){
        $.ajax({
            url: "{{ route('categories.store') }}",
            type: "post",
            data: {name: name, parent_id: parent_id, _token: "{{ csrf_token() }}"},
            success: function (category) {
                this.category_id = category.id;

                // add parent category
                if(parent_id == null) {
                    displayCategories(category);
                }
                // add sub_category
                else{
                    var row = $('tr[data-id="' + parent_id + '"]');
                    row.find(".newROW").append("<div id='category"+ category[0].id +"' class='field row mx-3'><span>" + category[0].name + "<button type='button'  class='ml-2 mb-1 close' onclick='deleteCategory("+ category[0].id +")' data-dismiss='toast' aria-label='Close'><span style='color:red;' aria-hidden='true'>&times;</span></button></span></div>");
                    row.find(".add .addnew").html('');

                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.responseText);
            }
        });
    }


    function loadAllCategories() {
        $.ajax({
            url: "/all_categories/",
            type: "get",
            success: function (categories) {
                displayCategories(categories);
            },

        })
    }

    function deleteCategory(category_id, target) {
        $.ajax({
            url: "/categories/"+category_id,
            type: "delete",
            data: {category_id: category_id, _token: "{{ csrf_token() }}"},
            success: function () {
                $('#category'+(category_id)).remove();
            },

        })
    }

    function updateCategory(category_id, new_name) {
        $.ajax({
            url: "/categories/"+category_id,
            type: "put",
            data: {category_id: category_id, name: new_name,  _token: "{{ csrf_token() }}"},
            success: function () {
                // console.log(date);
                // $('#category'+(category_id)).remove();
                var row = $('tr[data-id="' + category_id + '"]');
                row.find("td:eq(0)").text(new_name);
                row.attr('data-name', new_name);
                row.find(".btn-edit").show();
                row.find(".btn-update").remove();

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.responseText);
            }

        })
    }

    function displayCategories(categories) {
        console.log(categories);
        $.each(categories, function (i, category) {
            // console.log(category.name);
            var lines = '';
            lines += "<tr data-name='"+ category.name +"' data-id='"+ category.id +"' >";
            lines += "<td >" + category.name + "</td><td><button class='btn btn-primary btn-xs btn-edit '>تعديل</button></td>";
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

    //delete row
    $("body").on("click", ".btn-delete", function () {
        var parent_id = $(this).closest('tr').attr('data-id');
        console.log(parent_id);
        deleteCategory(parent_id);
        $(this).parents("tr").remove();
    });
    //edit category
    $("body").on("click", ".btn-edit", function () {
        var name = $(this).parents("tr").attr('data-name');
        var category_id = $(this).parents("tr").attr('data-id');
        $(this).parents("tr").find("td:eq(0)").html('<input name="edit_name" value="' + name + '">');
        $(this).parents("tr").find("td:eq(1)").prepend("<button class='btn btn-primary btn-xs btn-update'>تحديث</button>")
        $(this).hide();
    });



    //update value of category
    $("body").on("click", ".btn-update", function () {
        var new_name = $(this).parents("tr").find("input[name='edit_name']").val();
        var category_id = $(this).parents("tr").attr('data-id');
        console.log('categoty id: '+category_id+ '/ new name: '+new_name);
        updateCategory(category_id, new_name);

    });
    // add new sub category in row
    $(document).on('click', '.addbtn', function () {
        var newSub = $(this).closest('tr').find(".add .addnew").html("<div class='row m-2' ><input class='category' type='text' name='name' value='' required><button type='submit' class='btn btn-success save'>حفظ</button><button type='reset' class='btn btn-danger cancel'>الغاء</button> </div>");
        console.log(newSub);
        $(".save").click(function () {
            var sub_category = $(this).closest('tr').find($(".category")).val();
            // if value empty
            if (sub_category !== '') {
                var parent_id = $(this).closest('tr').attr('data-id');
                console.log('parent id: '+parent_id);
                addNewCategory(sub_category, parent_id);


            }


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
