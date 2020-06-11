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
                                        <form id="expenses_form">
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
                                                <div class="col-lg-3 col-md-6  form-group">
                                                    <label for="validationCustom01"> التاريخ</label>
                                                    <input type="date" id="dateOutlay1" name="dateOutlay" class="form-control dateOutlay">
                                                   </div>
                                                <div class="col-lg-3 col-md-6 form-group ">
                                                    <label> تحت بند  </label>
                                                    <input type="text" placeholder="اختار" name="account" class="form-control expenses_field expenses_required"  id="account1" autocomplete="off" list="account_list"  >
                                                    <datalist id="account_list">
                                                        @foreach($accounts as $account)
                                                            <option data-account-id="{{ $account['id'] }}" value="{{ $account['name'] }}"></option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                                <div class="col-lg-2 col-md-3 form-group ">
                                                    <label>المطلوب </label><input type="text" autocomplete="off" name="deserved_amount" class="form-control expenses_required"  id="deserved_amount1"   >
                                                </div>
                                                <div class="col-lg-2 col-md-3 form-group ">
                                                    <label> المدفوع  </label><input type="text" autocomplete="off" name="amount" class=" form-control payOutlay expenses_required"  id="amount1"   >
                                                </div>
                                                <div class="col-lg-1 col-md-3 form-group ">
                                                    <label>الباقي  </label><input type="text" autocomplete="off" name="noPay" class="form-control "  id="noPay1"   >
                                                </div>
                                                <div class="col-lg-1 col-md-3 form-group ">
                                                    <label>طباعه</label>
                                                    <button type="button" name="printPill" class="btn btn-warning form-control" data-toggle="modal" data-target="#printModal"><i class="fa fa-print   px-2"> </i></button>

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
                                                    <div class="col-lg-3 col-sm-4 form-group">
                                                        <label > التاريخ</label>
                                                        <input type="date" id="datePayroll1" name="datePayroll1" class="form-control datePayroll required_field">
                                                       </div>

                                                    <div class="col-lg-3 col-md-6 form-group ">
                                                        <label> اختار </label>
                                                        <input placeholder="اختار" type="text" id="instructor_employee1" class="form-control pay_for_selector required_field" name="list1" list="list"  />
                                                        <datalist id="list">
                                                            <option data-account="4" data-type="App\Instructor"  data-customValue="{{ $instructors }}" value="المدربين"></option>
                                                            <option data-account="5" data-type="App\Employee" data-customValue="{{ $employees }}" value="الموظفين"></option>
                                                        </datalist>
                                                    </div>

                                                    <div class="col-lg-3 col-md-6 form-group ">
                                                        <label> الاسم </label>
                                                        <input placeholder="اختار" autocomplete="off" type="text" id="pay_for1" class="form-control  required_field" name="pay_for1" list="pay_for_list1"  />
                                                        <datalist id="pay_for_list1">

                                                        </datalist>
                                                    </div>
                                                    <div class="col-lg-1 col-md-3 form-group ">
                                                        <label>طباعه</label>
                                                        <button type="button" name="printPayroll" class="btn btn-warning form-control" data-toggle="modal" data-target="#printModalPayroll"><i class="fa fa-print   px-2"> </i></button>

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
<!-- print pill -->
<!-- Central Modal Small -->
<div class="modal fade"  id="printModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog " id="modalForPrint"  role="document">


        <div class="modal-content " id="contentForPrint">
            <div class="modal-body">
                <div id="section-6">
                    <div class="row  mb-3">
                        <div class="col-sm-12">
                            <div class="card  p-3 ">
                                <div class="card-body ">
                                    <div class="col-sm-12">
                                        <div class="fRight">
                                            <h5>رقم الفاتوره: <span class="data"> 5000 </span></h5>
                                            <h5>التاريخ: <span class="data"> 20000  </span></h5>
                                            <h5 >الاسم: <span class="data"> hhhh </span></h5>
                                        </div>
                                        <br>
                                        <!-- table -->
                                        <div class="table-responsive ">
                                            <table id="dtBasicExample"
                                                   class="table table-bordered table-sm"
                                                   cellspacing="0"
                                                   width="100%">
                                                <thead style="background-color: #dee2e6">
                                                <tr>
                                                    <th class="th-sm">البند</th>
                                                    <th class="th-sm">التكلفه</th>
                                                    <th class="th-sm">المدفوع</th>
                                                    <th class="th-sm">الباقي</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>lang</td>
                                                    <td>300</td>
                                                    <td>1000</td>
                                                    <td>1000</td>
                                                </tr>
                                                <!-- second row -->
                                                <tr>
                                                    <td>lang</td>
                                                    <td>300</td>
                                                    <td>1000</td>
                                                    <td>1000</td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                <td>الاجمالي</td>
                                                <td>300</td>
                                                <td>1000</td>
                                                <td>1000</td>
                                                </tfoot>
                                            </table>
                                            <!-- end table -->
                                            <div class="fRight">
                                                <h5>المدفوع: <span  class="data"> 5000 </span></h5>
                                                <h5>المطلوب: <span class="data"> 20000  </span></h5>
                                                <h5 >الباقي: <span class="data"> 5555 </span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end section 5 profit -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success  dismiss" id="print-button-expenses"> <i class="fa fa-print   px-2"> </i>طباعه </button>
                <button type="button" class="btn btn-danger  print" data-dismiss="modal">الغاء</button>
            </div>
        </div>
    </div>
</div>
<!-- end print -->
<!-- print payroll -->
<!-- Central Modal Small -->
<div class="modal fade"  id="printModalPayroll" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog " id="modalForPrint"  role="document">


        <div class="modal-content " id="contentForPrint">
            <div class="modal-body">
                <div id="section-6">
                    <div class="row  mb-3">
                        <div class="col-sm-12">
                            <div class="card  p-3 ">
                                <div class="card-body ">
                                    <div class="col-sm-12">
                                        <div class="fRight">
                                            <h5>رقم الفاتوره: <span class="data"> 5000 </span></h5>
                                            <h5>التاريخ: <span class="data"> 20000  </span></h5>
                                            <h5 >الاسم: <span class="data"> hhhh </span></h5>
                                        </div>
                                        <br>
                                        <!-- table -->
                                        <div class="table-responsive ">
                                            <table id="dtBasicExample"
                                                   class="table table-bordered table-sm"
                                                   cellspacing="0"
                                                   width="100%">
                                                <thead style="background-color: #dee2e6">
                                                <tr>
                                                    <th class="th-sm">الاسم</th>
                                                    <th class="th-sm">المرتب</th>
                                                    <th class="th-sm">المدفوع</th>
                                                    <th class="th-sm">الباقي</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>lang</td>
                                                    <td>300</td>
                                                    <td>1000</td>
                                                    <td>1000</td>
                                                </tr>

                                                </tbody>
                                                <tfoot>
                                                <td>الاجمالي</td>
                                                <td>300</td>
                                                <td>1000</td>
                                                <td>1000</td>
                                                </tfoot>
                                            </table>
                                            <!-- end table -->
                                            <div class="fRight">
                                                <h5>المدفوع: <span  class="data"> 5000 </span></h5>
                                                <h5>المطلوب: <span class="data"> 20000  </span></h5>
                                                <h5 >الباقي: <span class="data"> 5555 </span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end section 5 profit -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success  dismiss" id="print-button-payroll"> <i class="fa fa-print   px-2"> </i>طباعه </button>
                <button type="button" class="btn btn-danger  print" data-dismiss="modal">الغاء</button>
            </div>
        </div>
    </div>
</div>
<!-- end print -->
<!-- scroll top -->
@include('scroll_top')
<!-- script-->
@include('script')
<!-- script style-->
<script type='text/javascript' src="/js/financialManagement.js"></script>
<script>



    $(document).ready(function () {

        $(document).on('input', '[id^=instructor_employee]',  function (){
            var id = $(this).attr('id')[19];
            $('#pay_for_list'+id).html('');
            $('#pay_for'+id).val('');
            var value = $(this).val();
            if (value !== '') {
                var selected = $.parseJSON($('#list [value="' + value + '"]').attr('data-customValue'));
                var type = $('#list [value="' + value + '"]').attr('data-type');
                $.each(selected, function (key, member) {
                    $('#pay_for_list'+id).append($("<option></option>")
                        .data('custom', member)
                        .data('type', type)
                        .val(member.nameAr));
                });
            }
        });

        $(document).on('input', '[id^=pay_for]',  function () {
            var id = $(this).attr('id')[7];
            console.log(id);
            $(".meta_data"+id).remove();
            var value = $(this).val();
            if (value !== '') {
                var selected_pay_for_type = $('#pay_for_list'+id+' [value="' + value + '"]').data('type');
                var selected_pay_for = $('#pay_for_list'+id+' [value="' + value + '"]').data('custom');
                console.log(selected_pay_for_type);
                $.each(selected_pay_for.payment_model, function (key, value) {
                    console.log(key);
                    $('#data'+id).append("<div class='col-lg-1 col-sm-4 form-group meta_data"+ id +"'><label>"+ key +"</label><input id='"+ key +id+"' value='"+value +"' class='form-control ' readonly/></div>");
                });
                $('#data'+id).append("<div class='col-lg-1 col-sm-4 form-group meta_data"+ id +"'><label>المستحق</label><input type='number' value='"+ selected_pay_for.total +"' name='total' class=' form-control   '  id='total"+ id +"' readonly/></div>");
                $('#data'+id).append("<div class='col-lg-1 col-sm-4 form-group meta_data"+ id +"'><label>المدفوع</label><input type='number' name='pay' class=' form-control  payPayroll required_field'  id='payIncome"+ id +"' /></div>");
                $('#data'+id).append("<div class='col-lg-1 col-sm-4 form-group meta_data"+ id +"'><label>الباقي</label><input type='number' name='noPayIncome' class='form-control '  id='noPayIncome"+ id +"'  readonly /></div>");

            }
        });

        $(document).on('keyup', '[id^=payIncome]',  function () {
            var id = $(this).attr('id')[9];
            // console.log($('#total'+id).val());
            var rest_of_cost = $('#total'+id).val() - $(this).val();
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
                        transactions : createSalaryTransactionMetaDataJSON(),
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

        function createSalaryTransactionMetaDataJSON() {
            let transactions = [];
            $(".pay_for_selector").each(function (i, v) {
                let transaction = {};
                let meta_data = {};
                meta_data["payer_id"] = "{{ Session('center_id') }}";
                meta_data['payer_type'] = "App\\Center";
                meta_data['payFor_id'] = $('#pay_for_list'+ (i+1) +' [value="' + $("#pay_for"+ (i+1)).val() + '"]').data("custom").id;
                meta_data['payFor_type'] = $('#pay_for_list'+(i+1)+' [value="' + $("#pay_for"+ (i+1)).val() + '"]').data('type');

                transaction['account_id'] = $('#list [value="' + $("#instructor_employee"+ (i+1)).val() + '"]').attr("data-account");
                transaction['rest'] = $('#noPayIncome'+ (i+1)).val();
                transaction['date'] = $("#datePayroll"+(i+1)).val();
                transaction['meta_data'] = meta_data;
                transaction['amount'] =  $("#payIncome"+ (i+1)).val();
                transaction['deserved_amount'] =  $("#salary"+ (i+1)).val();

                transactions.push(transaction);

            });

            return transactions;
        }


        function checkIfAllInputsFilled() {
            var empty = $(".required_field").filter(function () {
                return $(this).val().length === 0;
            });

            return empty.length === 0;
        }


        $('#expenses_form').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route("transactions.store") }}",
                type: "post",
                data: {
                    transactions : createExpensesTransactionMetaDataJSON(),
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


        });

        function createExpensesTransactionMetaDataJSON() {
            let transactions = [];
            $(".expenses_field").each(function (i, v) {
                let transaction = {};
                let meta_data = {};
                meta_data["payer_id"] = "{{ Session('center_id') }}";
                meta_data['payer_type'] = "App\\Center";
                meta_data["payFor_id"] = null;
                meta_data['payFor_type'] = null;


                transaction['account_id'] = $('#account_list [value="' + $("#account"+ (i+1)).val() + '"]').attr("data-account-id");
                transaction['rest'] = $('#noPay'+ (i+1)).val();
                transaction['date'] = $("#dateOutlay"+(i+1)).val();
                transaction['meta_data'] = meta_data;
                transaction['amount'] =  $("#amount"+ (i+1)).val();
                transaction['deserved_amount'] =  $("#deserved_amount"+ (i+1)).val();

                transactions.push(transaction);

            });

            return transactions;
        }
    });


</script>
</body>
</html>
