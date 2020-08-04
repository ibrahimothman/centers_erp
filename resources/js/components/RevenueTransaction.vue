<template>
    <div>
        <div class="card">
            <div class="card-body">
                <div v-if="success" class="alert alert-success">
                    تمت العمليه بنجاح
                    </div>
                <form id="revenue-form" @submit.prevent="submitTransaction">
                    <div class="row title form-group">
                        <!-- date -->
                        <div class=" col-sm-3 title pb-3">
                            <h5 class="text-primary  pt-1 pr-3 pl-0">التاريخ: </h5>
                                <input readonly v-model="date" class="form-control " type="text" >
                        </div>

                    </div>

                    <!-- row  -->
                    <div class="fieldIncome">
                        <div class="form-row ">
                            <div class="col-lg-2 col-sm-2 form-group ">
                                <label>امتحان/دبلومه</label>
                                <span class="required">*</span>
                                <select
                                    v-model="selectedModel"
                                    class="form-control "
                                    placeholder="اختار"
                                    required>

                                    <option v-for="(model, index) in models"
                                        :key="index"
                                        :value="model"
                                    >{{ model.value }}</option>


                                </select>
                            </div>

                           <search
                                endpoint="/search_for_students"
                                :onPersonSelected="onPersonSelected">
                                </search>

                            <div class="col-lg-2 col-sm-4 form-group ">
                                <label>الامتحان /الدبلومه</label>
                                <span class="required">*</span>
                                <select
                                v-model="enrollment"
                                @change="deserved_amount = enrollment.cost"
                                class="form-control">
                                    <option
                                        v-for="(enrollment, index) in enrollments"
                                        :key="index"
                                        :value="enrollment"
                                    >
                                        {{ enrollment.name }}
                                    </option>
                                </select>
                            </div>

                            <div class="col-lg-1 col-sm-1 form-group ">
                                <label> التكلفه </label><input v-model="deserved_amount" type="text" class="form-control  " readonly >
                            </div>

                            <div class="col-lg-1 col-sm-1 form-group ">
                                <label> المدفوع  </label>
                                <input
                                @input="rest = deserved_amount-amount"
                                v-model="amount"
                                type="text"
                                class="form-control">
                            </div>
                            <div class="col-lg-1 col-sm-1 form-group ">
                                <label>الباقي  </label>
                                <input v-model="rest"  type="text" class="form-control " readonly >
                            </div>

                        </div>
                    </div>

                    <!-- save -->
                    <div class="form-row save">
                        <div class="col-sm-6 mx-auto" style="width: 200px;">
                            <button class="btn btn-primary action-buttons" type="submit"> حفظ و انشاء جدبد
                            </button>
                            <button :disabled="!saved" type="button" class="btn btn-primary" data-toggle="modal" data-target="#printModal">
                                طباعه
                            </button>
                            <button class="btn  btn-danger action-buttons" type="button" @click="resetData"> جديد
                            </button>
                        </div>
                    </div>
                </form>
                <!-- end form -->
            </div>
        </div>
        <print :show="saved" :transaction="printDate"></print>
    </div>
</template>

<script>
import moment from 'moment';
import axios from 'axios';
import Print from './PrintModal.vue';
import Search from './Search.vue';

export default {
    props: ['account_id'],
    components: {
        Print,
        Search,
    },
    computed: {
        date(){
            return moment().format('l');
        },
    },
    data: function(){
        return this.initialData();
    },

    methods: {
        onPersonSelected(person){
            this.person = person;
            this.getInfo();
        },
        // get diplomas or tests for student
        async getInfo(){

            try {
                const res = await await axios.get(this.selectedModel.endpoint, {
                    params: {student_id: this.person.id}
                });
                this.enrollments = res.data;
                } catch (error) {
                    console.log(error);
                }
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
                this.printDate = this.preparePrintData(res.data.data);


            } catch (err) {
                console.log(err);
            }
        },
        prepareTransaction() {
            console.log('account: ', this.account_id);
            return this.transaction = {
                meta_data: {
                    payer_id: this.person.id,
                    payer_type: 'App\\Student',
                    payFor_id: this.enrollment.id,
                    payFor_type: this.selectedModel.model
                },
                deserved_amount: this.deserved_amount,
                account_id: this.account_id,
                amount: this.amount,
                rest: this.rest,
            }
        },
        preparePrintData(data){
            return {
                data: data,
                options: [
                    {
                        key: 'امتحان / دبلومه',
                        value: data.service,
                    }
                ]
            }
        },
        resetData(){
            Object.assign(this.$data, this.initialData());
        },
        initialData() {
            return {
                modal: false,
                success: false,
                saved: false,
                models: [
                    {
                        model: "App\\Test",
                        endpoint: "/get_student_tests",
                        value: "امتحان"
                    },
                    {
                        model: "App\\Diploma",
                        endpoint: "/get_student_diplomas",
                        value: "دبلومه"
                    }
                ],
                selectedModel: {},
                person: {},
                enrollments:[], // => student's tests or diplomas
                enrollment: {},
                transaction: {},
                printDate: {},
                deserved_amount: '',
                amount: '',
                rest: '',
            }

        }
    }
}
</script>

<style scoped>
    ul {
        display:block; position:relative
    }
</style>
