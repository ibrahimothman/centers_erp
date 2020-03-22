<div id="section-2">
    <div class="row  mb-3">
        <div class="col-sm-12">
            <div class="card border-primary p-3 ">
                <div class="text-primary bg-transparent  ">
                    <h5 class="fRight">{{ $account->name }}</h5>
                </div>
                <!-- card table -->@foreach($account->children as $sub_account)
                                       @include("financialManagement/show_account", ['account' => $sub_account])
                                    @endforeach
                                                                <div class="card-body ">
                                                                    <div class="row form-group">
                                                                    <div class="col-sm-12">
                                                                        <!-- table -->
                                                                        <div class="table-responsive">
                                                                            <table id="dtBasicExample"
                                                                               class="table table-striped table-bordered table-sm"
                                                                               cellspacing="0"
                                                                               width="100%">
                                                                            <thead>
                                                                            <tr>
                                                                                <th class="th-sm">الاسم</th>
                                                                                <th class="th-sm">الكورس/الدبلومه</th>
                                                                                <th class="th-sm">التكلفه</th>
                                                                                <th class="th-sm">المدفوع</th>
                                                                                <th class="th-sm">الباقي</th>
                                                                                <th class="th-sm">التاريخ</th>
                                                                                <th class="th-sm"> تعديل</th>
                                                                                <th class="th-sm"> ازاله</th>
                                                                                <th class="th-sm"> الديون</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody id="student_table">
                                                                            @php($revenue = 0)
                                                                            @foreach($transactions->filterByAccount($account->id) as $transaction)
                                                                                @php($revenue += $transaction->amount)
                                                                                <tr>
                                                                                    <td>{{ $transaction->payer()->nameAr }}</td>
                                                                                    <td>{{ $transaction->payFor()->name }}</td>
                                                                                    <td>{{ $transaction->deserved_amount }}</td>
                                                                                    <td>{{ $transaction->amount }}</td>
                                                                                    <td>{{ $transaction->rest}}</td>
                                                                                    <td>{{ $transaction->date }}</td>
                                                                                    <td>
                                                                                        <a href=""
                                                                                           class=" btn btn-outline-primary  py-1 px-2 "><i
                                                                                                    class="fas fa-edit m-0 "></i> </a>

                                                                                    </td>
                                                                                    <td>
                                                                                        <form>
                                                                                            <button type="submit"
                                                                                                    class="btn btn-outline-danger py-1 px-2">
                                                                                                <i class="fas fa-trash-alt m-0"></i>
                                                                                            </button>
                                                                                        </form>
                                                                                    </td>
                                                                                    <td>
                                                                                        <a href=""
                                                                                           class=" btn btn-outline-primary  py-1 px-2 ">
                                                                                            <i class="fas fa-money-check-alt"></i> </a>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach

                                                                            </tbody>

                                                                        </table>
                                                                        <!-- end table -->
                                                                    </div>
                                                                    </div>
                                                                    </div>
                                                                    <!-- sum -->
                                                                    <div class="row form-group">
                                                                        <h5 class="text-warning ">الايرادات: </h5>
                                                                        <div class="col-sm-4">
                                                                            <input type="number" value="{{ $revenue }}" name="sum" id="sum"  class="form-control"  readonly />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
        </div>
    </div>

</div>
