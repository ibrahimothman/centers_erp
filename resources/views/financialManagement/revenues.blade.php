<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
    <!-- style  date picker-->
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.datetimepicker.min.css')}}"/>
    <!-- style page -->
    <link href="/css/financialManagement_style.css" rel="stylesheet"/>
    <title>income</title>

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
                            <div class="card-header text-primary form-title view-courses-title">
                                <h3>الايرادات </h3>
                            </div>
                        </header>
                        <div class="card-body">
                            <!-- view section 1 -->
                            <div id="section-1">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- select date -->
                                        <form id="revenue-form">
                                            @csrf
                                            <div class="row title form-group">
                                                <!-- date -->
                                                <div class="  col-sm-6 title pb-3">
                                                    <h5 class="text-primary  pt-1 pr-3 pl-0">التاريخ: </h5>
                                                        <input id="date" name="date" class="form-control datetimepickerRevenues"  placeholder="التاريخ "    type="text" >
                                                    </div>
                                                <!-- add pill -->
                                                <div  class="form-group   mr-3  ">
                                                    <input type='button' class="btn btn-success  "
                                                           value=' + اضافه طالب ' id='addButtonIncome' name="addIncome"/>
                                                </div>
                                            </div>
                                            <BR>
                                            <!-- end -->
                                            <!-- add row pill -->
                                            <div class="fieldIncome">
                                                <div class="form-row ">
                                                    <div class="col-lg-3 col-sm-4 form-group ">
                                                        <label> الاسم  </label>
                                                        <input placeholder="اختار" type="text" id="student" class="form-control student-selector" name="student" list="studentList"   />
                                                        <datalist id="studentList">
                                                            @foreach($students as $student)
                                                                <option data-id="{{ $student->id }}" data-customValue="{{ $student }}" value="{{ $student->nameAr }}"></option>
                                                            @endforeach
                                                        </datalist>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-4 form-group ">
                                                        <label>الكورس /الدبلومه</label>
                                                            <input placeholder="اختار" type="text" id="diploma" class="form-control" name="diploma" list="diplomaList"  />
                                                            <datalist id="diplomaList">

                                                            </datalist>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 form-group ">
                                                        <label> التكلفه </label><input type="number" name="cost" class="form-control "  id="cost"  readonly >
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 form-group ">
                                                        <label> المدفوع  </label><input type="number" name="pay" class=" form-control  payIncome"  id="payIncome"   >
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 form-group ">
                                                        <label>الباقي  </label><input type="number" name="noPayIncome" class="form-control "  id="noPayIncome"  readonly >
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end -->
                                            <hr class=" border-primary">
                                           <!-- sum -->
                                            <div class="row form-group">
                                                <h5 class="text-warning ">الايردات: </h5>
                                                <div class="col-sm-4">
                                                    <input type="number" name="sumIncome" id="sumIncome"  class="form-control"  readonly />
                                                </div>
                                            </div>
                                            <!-- save -->
                                            <div class="form-row save">
                                                <div class="col-sm-6 mx-auto" style="width: 200px;">
                                                    <button class="btn btn-primary action-buttons" type="submit" id="submit"> إضافة
                                                    </button>
                                                    <button class="btn  btn-danger action-buttons" type="reset"> إلغاء
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- end form -->
                                    </div>
                                </div>
                            </div>
                            <br>

                        </div>
                    </div>
                    <br>
                    <!--  end revenues view -->
                </div>
            </div>
        </div>
        <!-- footer -->
        @include('footer')
    </div>
</div>
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
<!-- date picker script -->
<script src="{{url('js/jquery.datetimepicker.js')}}"></script>
<!-- script style-->
<script type='text/javascript' src="/js/financialManagement.js"></script>

<script>


    $(document).ready(function () {

        $("input.student-selector").on('input', function () {
            console.log("changed");
            var value = $(this).val();
            if(value !== '') {
                var selected_student = $.parseJSON($('#studentList [value="' + value + '"]').attr('data-customValue'));
                selected_student.diplomas.forEach(function (diploma_group) {
                    $("#diplomaList").append("<option data-id = '"+ diploma_group.diploma.id +"' data-customValue='" + diploma_group.diploma.cost + "' value='" + diploma_group.diploma.name + "'></option>");
                });
            }



        });

        $('#diploma').on('input', function () {
            var value = $(this).val();
            if(value !== '') {
                var selected_diploma_cost = $('#diplomaList [value="' + value + '"]').attr('data-customValue');
                $('#cost').val(selected_diploma_cost);

            }


        });

        $('#payIncome').on('keyup', function () {
            var rest_of_cost = $('#cost').val() - $(this).val();
           $('#noPayIncome').val(rest_of_cost);
        });


        // submit form
        $("#revenue-form").submit(function (e) {
            e.preventDefault();
            console.log("trying submitting form");
            if($('#payIncome').val() && $('#date').val() && $('#studentList [value="' + $("#student").val() + '"]').attr("data-id") &&
                $('#diplomaList [value="' + $("#diploma").val() + '"]').attr("data-id")) {
                $.ajax({
                    url: "{{ route("transactions.store") }}",
                    type: "post",
                    data: {
                        meta_data: createTransactionMetaDataJSON(),
                        account: 1,
                        amount: $("#payIncome").val(),
                        date: $("#date").val(),
                        _token: "{{ csrf_token() }}"
                    },
                    success : function (message) {
                      alert(message);
                    }


                });
            }else{
                alert('fill in all fields');
            }
        });

        function createTransactionMetaDataJSON() {
            let meta_data = {};
            meta_data ["payer_id"] = $('#studentList [value="' + $("#student").val() + '"]').attr("data-id");
            meta_data ["payer_type"] = "Student";
            meta_data ["payFor_id"] = $('#diplomaList [value="' + $("#diploma").val() + '"]').attr("data-id");
            meta_data ["payFor_type"] = "Diploma";

            return JSON.stringify(meta_data);
        }

    });
</script>
</body>
</html>
