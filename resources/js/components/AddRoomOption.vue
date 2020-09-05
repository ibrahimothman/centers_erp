<template>
    <div class="card-body">
        <form @submit.prevent="saveOption" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col form-group">
                    <input v-model="option" type="text" placeholder="امكانيات المعمل" class="form-control " >
                </div>
            </div>
            <div class="options">
                <span v-for="(option, index) in newOptions" :key="index"
                       class="field "
                       style=" display: inline-block; padding: 5px; border-radius: 10em; color: #007bff; margin: 5px;  border: solid 1px #007bff;  " >
                    <span>{{ option }}
                        <button style="background: none;border:none" @click.prevent="deleteOption(option)" type="button" class="ml-2 mb-1" >
                            <span aria-hidden="true"><i class="fas fa-minus fa-lg"></i></span>
                        </button>
                    </span>
                </span >


            </div>
            <br>
            <div class="form-row save">
                <div class="col-sm-6 mx-auto" style="width: 200px;">
                    <button class="btn btn-primary action-buttons" type="submit" id="submit"> إضافة
                    </button>
                    <button class="btn  btn-danger action-buttons" type="reset"> إلغاء
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "AddRoomOption",
    props: ['options', 'center_id'],
    data() {
        return {
            option: '',
            newOptions: []
        }
    },
    created(){
      this.newOptions = this.options || [];
    },
    methods: {
        async deleteOption(option) {
            let temp = this.newOptions.filter(o => o !== option);
            await this.updateOptions(temp);
            this.newOptions = temp;
        },
        async saveOption() {
            if(this.option){
                let temp = [...this.newOptions, this.option];
                console.log(temp);
                await this.updateOptions(temp);
                this.newOptions = temp;
                this.option = '';
            }
        },
        async updateOptions(options) {
            try{
                const response = await axios.put(`/centers/${this.center_id}`, {
                    'options': {'room': options},
                    'source': 'api',
                });

            }catch (err) {
                console.error(err);
            }


        }
    },
}
</script>

<style scoped>

</style>
