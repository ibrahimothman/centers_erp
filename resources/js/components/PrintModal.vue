<template>
    <div v-if="show" class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- Change class .modal-sm to change the size of the modal -->
            <div class="modal-dialog modal-sm " id="modalForPrint"  role="document">
                <div class="modal-content " ref="contentForPrint">
                    <div class="modal-body">
                        <div id="section-6">
                            <div class="row  mb-3">
                                <div class="col-sm-12">
                                    <div class="card  p-3 ">
                                        <div class="card-body ">
                                            <div class="col-sm-12">
                                                <div class="fRight">
                                                    <h5>رقم الفاتوره: <span class="data"> {{ transaction.data.code }} </span></h5>
                                                    <h5>التاريخ: <span class="data">{{ transaction.data.date }}</span></h5>
                                                    <h5 >الاسم: <span class="data"> {{ transaction.data.client }} </span></h5>
                                                </div>
                                                <br>
                                                <!-- table -->
                                                <div class="table-responsive ">
                                                    <table id="dtBasicExample"
                                                        class="table table-bordered table-sm"
                                                        cellspacing="0"
                                                        width="100%">
                                                        <!-- <thead style="background-color: #dee2e6">
                                                        <tr>
                                                            <th v-for="(option, index) in transactions.options"
                                                                :key="index"
                                                                class="th-sm"> {{ option }}
                                                                </th>

                                                        </tr>
                                                        </thead> -->
                                                        <tbody>
                                                        <tr v-for="(option, index) in transaction.options"
                                                            :key="index">
                                                            <td> {{ option.key }}</td>
                                                            <td>{{ option.value }}</td>

                                                        </tr>

                                                        </tbody>

                                                    </table>
                                                    <!-- end table -->
                                                    <div class="fRight">
                                                        <h5>المدفوع: <span  class="data"> {{ transaction.data.amount }} </span></h5>
                                                        <h5>المطلوب: <span class="data"> {{ transaction.data.deserved_amount }}  </span></h5>
                                                        <h5 >الباقي: <span class="data"> {{ transaction.data.rest }} </span></h5>
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
                        <button @click="print" type="button" class="btn btn-success  dismiss" id="print-button-revenues"> <i class="fa fa-print   px-2"> </i>طباعه </button>
                        <button type="button" class="btn btn-danger  print" data-dismiss="modal">الغاء</button>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
export default {
    props: ['show', 'transaction'],
    methods: {
        print(){
            const prtHtml = this.$refs.contentForPrint;
            const WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');

            WinPrint.document.write(prtHtml.innerHTML);

            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
    }


}
</script>

