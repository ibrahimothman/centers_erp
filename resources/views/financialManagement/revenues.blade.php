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
                                                        <input id="date" name="date" class="form-control datetimepickerRevenues required_field"  placeholder="التاريخ "    type="text" >
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
                                                    <div class="col-lg-3 col-md-4 form-group ">
                                                        <label> الاسم  </label>
                                                        <input placeholder="اختار" type="text" id="student1" class="form-control student-selector required_field" name="student" list="studentList" autocomplete="off"   />
                                                        <datalist id="studentList">
                                                            @foreach($students as $student)
                                                                <option data-id="{{ $student->id }}" data-customValue="{{ $student }}" value="{{ $student->nameAr }}"></option>
                                                            @endforeach
                                                        </datalist>
                                                    </div>
                                                    <div class="col-lg-2 col-md-4 form-group ">
                                                        <label>الكورس </label>
                                                            <input placeholder="اختار" type="text" id="diploma1" class="form-control required_field" name="diploma" list="diplomaList"  />
                                                            <datalist id="diplomaList">

                                                            </datalist>
                                                    </div>
                                                    <div class="col-lg-2 col-md-4 form-group ">
                                                        <label> التكلفه </label><input type="text" name="cost" class="form-control  "  id="cost1"  readonly >
                                                    </div>
                                                    <div class="col-lg-2 col-md-4 form-group ">
                                                        <label> المدفوع  </label><input type="text" name="pay" class=" form-control  payIncome required_field"  id="payIncome1"   >
                                                    </div>
                                                    <div class="col-lg-2 col-md-4 form-group ">
                                                        <label>الباقي  </label><input type="text" name="noPayIncome" class="form-control "  id="noPayIncome1"  readonly >
                                                    </div>
                                                    <div class="col-lg-1 col-md-4 form-group ">
                                                        <label>طباعه</label>
                                                        <button type="button" name="print" class="btn btn-warning form-control" data-toggle="modal" data-target="#printModal"><i class="fa fa-print   px-2"> </i></button>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end -->
                                            <hr class=" border-primary">
                                           <!-- sum -->
                                            <div class="row form-group">
                                                <h5 class="text-warning ">الايردات: </h5>
                                                <div class="col-sm-4">
                                                    <input type="text" name="sumIncome" id="sumIncome"  class="form-control"  readonly />
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
<!-- print -->
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
                                                    <th class="th-sm">امتحان/دبلومه</th>
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
                <button type="button" class="btn btn-success  dismiss" id="print-button-revenues"> <i class="fa fa-print   px-2"> </i>طباعه </button>
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
<!-- date picker script -->
<script src="{{url('js/jquery.datetimepicker.js')}}"></script>
<!-- script style-->
<script type='text/javascript' src="/js/financialManagement.js"></script>

<script>
    $(document).ready(function () {

        $(document).on('input', "[id^=student]",  function () {
            var id = $(this).attr('id')[7];
            // console.log("changed");
            var value = $(this).val();
            if(value !== '') {
                var selected_student = $.parseJSON($('#studentList [value="' + value + '"]').attr('data-customValue'));
                selected_student.diplomas.forEach(function (diploma_group) {
                    $("#diplomaList").append("<option data-id = '"+ diploma_group.diploma.id +"' data-customValue='" + diploma_group.diploma.cost + "' value='" + diploma_group.diploma.name + "'></option>");
                });
            }
        });

        $(document).on('input', "[id^=diploma]",  function () {
            var id = $(this).attr("id")[7];
            var value = $(this).val();
            if(value !== '') {
                var selected_diploma_cost = $('#diplomaList [value="' + value + '"]').attr('data-customValue');
                $("#cost"+id).val(selected_diploma_cost);
            }


        });

        $(document).on('keyup', '[id^=payIncome]', function () {
            var id = $(this).attr("id")[9];
            var rest_of_cost = $('#cost'+id).val() - $(this).val();
           $('#noPayIncome'+id).val(rest_of_cost);
        });


        // submit form
        $("#revenue-form").submit(function (e) {
            e.preventDefault();

            console.log(createTransactionMetaDataJSON());
            if(checkIfAllInputsFilled()) {
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
            $(".student-selector").each(function (i, v) {
                let transaction = {};
                let meta_data = {};
                meta_data["payer_id"] = $('#studentList [value="' + $(this).val() + '"]').attr("data-id");
                meta_data['payer_type'] = "App\\Student";
                meta_data['payFor_id'] = $('#diplomaList [value="' + $("#diploma"+ (i+1)).val() + '"]').attr("data-id");
                meta_data['payFor_type'] = "App\\Diploma";

                transaction['account_id'] = 3;
                transaction['date'] = $("#date").val();
                transaction['rest'] = $("#noPayIncome"+ (i+1)).val();
                transaction['meta_data'] = meta_data;
                transaction['amount'] =  $("#payIncome"+ (i+1)).val();
                transaction['deserved_amount'] =  $("#cost"+ (i+1)).val();

                transactions.push(transaction);

            });

            return transactions;
        }

        function checkIfAllInputsFilled() {
            var empty = $(".required_field").filter(function () {
                return $(this).val().length === 0;
            });

            return empty.length === 0 ;
        }

    });
</script>
</body>
</html>
