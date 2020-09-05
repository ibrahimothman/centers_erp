<template>
    <div class="card ">
        <!-- if there are option -->
        <div v-if="options" class="card-body">
            <div class=" row smiley-wrapper justify-content-center">
                <div class="smiley " >
                    <!-- display options -->
                    <div v-for="(option, index) in newOptions" :key="index" name="add">
                        <button @click.prevent="addExtra(option)"  class="btn btn-primary"> <span >{{ option }}</span></button>
                    </div>
                </div>
            </div>
            <!-- modal-->
            <button type="button" class="btn btn-success " data-toggle="modal" data-target="#exampleModal">
                اضف
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">اضف امكانيات للغرف</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div v-if="success" class="alert alert-success">
                                تمت الاضافه
                            </div>
                            <input v-model="option" type="text" placeholder="امكانيات المعمل" class="form-control " >
                        </div>
                        <div class="modal-footer mr-auto">
                            <button @click="saveNewOption" type="button" class="btn btn-primary" >حفظ</button>
                            <button type="button" class="btn btn-secondary " data-dismiss="modal">اغلاق</button>
                        </div>
                    </div>
                </div>
            </div>
<!--            <Br>-->
                <div class=" row">
                    <div class="col text-center">
                        <fieldset  name="message"  style="min-height: 100px;" id="reply-message" class="markItUpEditor ">
                            <span  v-for="(extra, index) in newExtras" :key="index"
                                class="field "
                                style=" display: inline-block; padding: 5px; border-radius: 10em; color: #007bff; margin: 5px;  border: solid 1px #007bff;  " >
                                <input name="extras[]" :value="extra" hidden>
                                <span>{{ extra }}
                                    <button style="background: none;border:none" @click.prevent="deleteExtra(extra)" type="button" class="ml-2 mb-1" >
                                        <span aria-hidden="true"><i class="fas fa-minus fa-lg"></i></span>
                                    </button>
                                </span>
                            </span >
                        </fieldset>
                    </div>
                </div>
        </div>

        <!-- if there are no options-->


    </div>
</template>

<script>
import axios from "axios";

export default {
    name: 'RoomOptions',
    props: ['options', 'extras', 'center_id'],
    data(){
        return {
            option: '',
            newOptions: [],
            newExtras: [],
            success: false,

        }
    },
    created() {
        this.newOptions = this.options;
        this.newExtras = this.extras;
    },
    watch: {
        success: function () {
            setTimeout(function () {
                console.log('after 1000 sec');
                this.success = false;
            }, 1000);
        },
    },
    methods: {
        addExtra(option) {
            // prevent duplicate choices
            if (! this.newExtras.find(extra => extra === option)){
                this.newExtras.push(option);
            }
        },
        deleteExtra(extra) {
            console.log(extra);
            this.newExtras = this.newExtras.filter(e => e !== extra);
        },
        async saveNewOption() {
            if (this.option) {
                try{
                    const response = await axios.put(`/centers/${this.center_id}`, {
                        'options': {'room': [
                                ...this.newOptions,
                                this.option
                            ]},
                        'source': 'api',
                    });
                    this.newOptions.push(this.option);
                    this.success = true;
                    this.option = '';


                }catch (err) {
                    console.error(err);
                }

            }

        },
    }

}
</script>

<style scoped>
    div[name="add"]{
        display: inline-block;
        margin: 10px;

    }
</style>
