<template>
    <div>
        <div v-if="success" class="alert alert-success">
                    عمليه ناجحه
        </div>
        <form @submit.prevent="submitTransaction">

            <div class="fieldPayroll">
                <div class="form-row " id="data-1">
                    <div class="col-lg-2 col-sm-4 form-group ">
                        <label> مدرب/موظف </label>
                        <span class="required">*</span>
                        <select
                            v-model="selectedModel"
                            class="form-control "
                            required>
                            <option v-for="(model, index) in models"
                                :key="index"
                                :value="model"
                                > {{ model.value }}
                            </option>
                        </select>
                    </div>

                    <!-- search -->
                    <search
                        :endpoint="selectedModel.endpoint"
                        :onPersonSelected="onPersonSelected"
                        ></search>

                    <div class='col-lg-1 col-sm-4 form-group meta_data'>
                        <label>النظام</label>
                        <input
                            v-model="person.payment_model.model"
                            type='text' class=' form-control' readonly/>
                    </div>
                    <div class='col-lg-1 col-sm-4 form-group meta_data'>
                        <label>المرتب</label>
                        <input
                            v-model="person.payment_model.salary"
                            type='number' class=' form-control' readonly/>
                    </div>
                    <div class='col-lg-1 col-sm-4 form-group meta_data'>
                        <label>المستحق</label>
                        <input v-model="deserved_amount" type='number' class=' form-control' readonly/>
                    </div>
                    <div class='col-lg-1 col-sm-4 form-group meta_data '>
                        <label>المدفوع</label>
                        <input
                            @input="rest = deserved_amount-amount"
                            v-model="amount" type='number' class=' form-control' />
                    </div>
                    <div class='col-lg-1 col-sm-4 form-group meta_data'>
                        <label>الباقي</label>
                        <input v-model="rest" type='number' class=' form-control' readonly/>
                    </div>


                </div>
            </div>
            <!-- end -->

            <!-- save -->
            <div class="form-row save">
                <div class="col-sm-6 mx-auto" style="width: 200px;">
                    <button class="btn btn-primary action-buttons" type="submit"
                            id="submit"> حفظ و انشاء جدبد
                    </button>
                    <button :disabled="!saved" type="button" class="btn btn-primary" data-toggle="modal" data-target="#printModal">
                        طباعه
                    </button>
                    <button class="btn  btn-danger action-buttons" @click="resetData"> إلغاء
                    </button>
                </div>
            </div>
        </form>
        <print :show="saved" :transaction="printData"></print>
    </div>
</template>

<script>
import axios from 'axios';
import Search from './Search'
import Print from './PrintModal';
export default {
    props: ['payer'],
    components: {
        Search,
        Print,
    },
    data: function(){
        return this.initialData();
    },
    methods: {
        onPersonSelected(person){
            this.person = person;
            this.deserved_amount = person.total;
        },
        async submitTransaction(){
            try {
                const res = await axios.post('/transactions',{
                    transaction: this.prepareTransaction()
                });
                this.saved = true;
                this.success = true;
                setTimeout(() => {
                    this.success = false;
                }, 2000);
                this.transaction = {};
                this.printData.data = res.data.data;
                this.printData.options = this.preparePrintOptions(res.data.data);
            } catch (err) {
                console.log(err);
            }
        },
        prepareTransaction() {
            return this.transaction = {
                account_id: this.selectedModel.account,
                amount: this.amount,
                rest: this.rest,
                meta_data: {
                    payer_id: this.payer,
                    payer_type: 'App\\Center',
                    payFor_id: this.person.id,
                    payFor_type: this.selectedModel.model
                },
                deserved_amount: this.deserved_amount,
            }
        },
        preparePrintOptions(data){
            return [
                {
                    key: 'المرتب',
                    value: data.service,
                },

            ];
        },
        resetData(){
            Object.assign(this.$data, this.initialData());
        },
        initialData(){
            return {
                success: false,
                saved: false,
                models: [
                    {
                        model: 'App\\Instructor',
                        account: '4',
                        endpoint: '/search_for_instructors',
                        value: 'المدربين'
                    },
                    {
                        model: 'App\\Employee',
                        account: '5',
                        endpoint: '/search_for_employees',
                        value: 'الموظفين'
                    }
                ],
                selectedModel: {},
                person: {
                    payment_model: {},
                },
                deserved_amount: '',
                amount: '',
                rest: '',
                transaction: {},
                printData: {
                    data: [],
                },


            }
        }
    }


}
</script>

