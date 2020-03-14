<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('library')
    <!-- style -->
    <link href="/css/financialManagement_style.css" rel="stylesheet"/>
    <title>expenses</title>
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
                                <h3>المصروفات </h3>

                            </div>
                        </header>
                        <div class="card-body">
                            <!-- nav btn-->
                            <ul class="menu">
                                <li><button class="item  btn btn-light px-5"  id="all">الكل</button></li>
                                <li><button class="item btn btn-light "  id="outlay" > المصروفات </button></li>
                                <li><button class="item  btn btn-light "  id="payroll">الرواتب</button></li>
                            </ul>
                            <!-- view section 1 -->
                            <div id="section-1">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- select date -->
                                        <form>
                                        <div class="row">
                                            <div class=" col">
                                        <!-- add pill -->
                                                <input type='button' class="btn btn-success  "
                                                       value=' + اضافه فاتوره ' id='addButton' name="add"/>
                                        </div>
                                        </div>
                                          <br>
                                        <!-- end -->
                                        <!-- add row pill -->
                                        <div class="field">
                                            <div class="form-row ">
                                                <div class="col-lg-3 col-sm-6  form-group">
                                                    <label for="validationCustom01"> التاريخ</label>
                                                    <input type="date" id="dateOutlay" name="dateOutlay" class="form-control dateOutlay">
                                                   </div>
                                                <div class="col-lg-3 col-sm-6 form-group ">
                                                    <label> الفاتوره  </label><input type="text" name="bill" class="form-control "  id="bill"   >
                                                </div>
                                                <div class="col-lg-3 col-sm-4 form-group ">
                                                    <label> المطلوب سداده </label><input type="text" name="money" class="form-control "  id="money"   >
                                                </div>
                                                <div class="col-lg-2 col-sm-4 form-group ">
                                                    <label> المدفوع  </label><input type="text" name="payOutlay" class=" form-control payOutlay"  id="payOutlay"   >
                                                </div>
                                                <div class="col-lg-1 col-sm-4 form-group ">
                                                    <label>الباقي  </label><input type="text" name="noPay" class="form-control "  id="noPay"   >
                                                </div>

                                            </div>
                                        </div>
                                        <!-- end -->
                                        <hr class=" border-primary">
                                            <!-- sum -->
                                            <div class="row form-group">
                                                <h5 class="text-warning ">المصروفات: </h5>
                                                <div class="col-sm-4">
                                                    <input type="number" name="sumOutlay" id="sumOutlay"  class="form-control"  readonly />
                                                </div>
                                            </div>
                                        <!-- save -->
                                        <div class="form-row save">
                                            <div class="col-sm-6 mx-auto" style="width: 200px;">
                                                <button class="btn btn-primary action-buttons" type="submit"
                                                        id="submit"> إضافة
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
                            <!--  view section 2 -->
                            <div id="section-2">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- select date -->
                                        <form id="salaries_form">
                                            <div class="row">
                                                <div class=" col">
                                                    <!-- add pill -->
                                                    <div>
                                                        <input type='button' class="btn btn-success  "
                                                               value=' + اضافه مرتب' id='addButtonPayroll' name="addPayoll"/>
                                                    </div>
                                                </div>
                                            </div>
                                        <br>
                                            <!-- end -->
                                            <!-- add row pill -->
                                            <div class="fieldPayroll">
                                                <div class="form-row " id="data1">
                                                    <div class="col-lg-2 col-sm-4 form-group">
                                                        <label > التاريخ</label>
                                                        <input type="date" id="datePayroll" name="datePayroll" class="form-control datePayroll instructor_field">
                                                       </div>
                                                    <div class="col-lg-2 col-sm-4 form-group ">
                                                        <label> الاسم </label>
                                                        <input placeholder="اختار" type="text" id="instructor1" class="form-control instructor-selector instructor_field" name="instructor" list="instructor_list"  />
                                                        <datalist id="instructor_list">
                                                            @foreach($instructors as $instructor)
                                                                <option data-id="{{ $instructor->id }}" data-customValue="{{ $instructor }}" value="{{ $instructor->nameAr }}"></option>
                                                            @endforeach
                                                        </datalist>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- end -->
                                            <hr class=" border-primary">
                                            <!-- sum -->
                                            <div class="row form-group">
                                                <h5 class="text-warning ">المرتبات: </h5>
                                                <div class="col-sm-4">
                                                    <input type="number" name="sumPayroll" id="sumPayroll"  class="form-control"  readonly />
                                                </div>
                                            </div>
                                            <!-- save -->
                                            <div class="form-row save">
                                                <div class="col-sm-6 mx-auto" style="width: 200px;">
                                                    <button class="btn btn-primary action-buttons" type="submit"
                                                            id="submit"> إضافة
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
                            <!-- end section 2 -->
                        </div>
                    </div>
                    <br>
                    <!--  end outlay view -->
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
<!-- script style-->
<script type='text/javascript' src="/js/financialManagement.js"></script>
<script>
    $(document).ready(function () {

        $(document).on('input', '[id^=instructor]',  function () {
            var id = $(this).attr('id')[10];
            $(".meta_data"+id).remove();
            console.log("changed");
            var value = $(this).val();
            if (value !== '') {
                var selected_instructor = $.parseJSON($('#instructor_list [value="' + value + '"]').attr('data-customValue'));
                console.log(selected_instructor);
                $.each(selected_instructor.payment_model, function (key, value) {
                    console.log(key);
                    $('#data'+id).append("<div class='col-lg-2 col-sm-4 form-group meta_data"+ id +"'><label>"+ key +"</label><input id='"+ key +id+"' value='"+value +"' class='form-control ' readonly/></div>");
                });
                // $('#data').append("<div class='col-lg-1 col-sm-4 form-group meta_data'><label>المستحق</label><input type='number' name='cost' class=' form-control'  id='cost' value='1000' readonly/></div>");
                $('#data'+id).append("<div class='col-lg-1 col-sm-4 form-group meta_data"+ id +"'><label>المدفوع</label><input type='number' name='pay' class=' form-control  payPayroll instructor_field'  id='payIncome"+ id +"' /></div>");
                $('#data'+id).append("<div class='col-lg-1 col-sm-4 form-group meta_data"+ id +"'><label>الباقي</label><input type='number' name='noPayIncome' class='form-control '  id='noPayIncome"+ id +"'  readonly /></div>");

            }
        });

        $(document).on('keyup', '[id^=payIncome]',  function () {
            var id = $(this).attr('id')[9];
            console.log($('#salary'+id).val());
            var rest_of_cost = $('#salary'+id).val() - $(this).val();
            $('#noPayIncome'+id).val(rest_of_cost);
        });

        // submit form
        $("#salaries_form").submit(function (e) {
            e.preventDefault();
            if(checkIfAllInputsFilled()){
                $.ajax({
                    url: "{{ route("transactions.store") }}",
                    type: "post",
                    data: {
                        transactions : createTransactionMetaDataJSON(),
                        _token: "{{ csrf_token() }}"
                    },
                    success : function (data) {
                        alert(data.message);
                        if(! data.error){
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        }
                    }

                });
        }else{
            alert('fill in all fields');
        }
    });

        function createTransactionMetaDataJSON() {
            let transactions = [];
            $(".instructor-selector").each(function (i, v) {
                let transaction = {};
                let meta_data = {};
                meta_data["payer_id"] = "{{ Session('center_id') }}";
                meta_data['payer_type'] = "App\\Center";
                meta_data['payFor_id'] = $('#instructor_list [value="' + $("#instructor"+ (i+1)).val() + '"]').attr("data-id");
                meta_data['payFor_type'] = "App\\Instructor";

                transaction['account'] = 2;
                transaction['date'] = $("#datePayroll").val();
                transaction['meta_data'] = meta_data;
                transaction['amount'] =  $("#payIncome"+ (i+1)).val();

                transactions.push(transaction);

            });

            return transactions;
        }


        function checkIfAllInputsFilled() {
            var empty = $(".instructor_field").filter(function () {
                return $(this).val().length === 0;
            });

            return empty.length === 0;
        }
    });


</script>
</body>
</html>
