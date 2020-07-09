<template>

    <div class="form-row">
        <div class="col-sm-6 form-group">
            <label> المحافظة </label>
            <select class="form-control" name="state" v-model="selectedState" @change="getCities(selectedState)">
                <option v-for="state in states"
                    :value="state.state_id"

                >{{ state.name }}</option>
            </select>
        </div>
        <div class="col-sm-6 form-group">
            <label>المدينه </label>
            <select class="form-control" name="city" v-model="selectedCity" >
                <option v-for="city in cities"
                        :value="city.city_id"
                >{{ city.name }}</option>
            </select>
        </div>
    </div>

</template>

<script>
    import axios from 'axios';
    export default {
        props: ['address'],
        data(){
            return{
                states: [],
                selectedState: this.address.state || '',
                selectedCity: this.address.city || '',
                cities: [],


            }
        },
        created() {
            // this.state = 'cairo'
            console.log(this.selectedCity)
            this.getStates()
            if(this.selectedState){
                this.getCities(this.selectedState)
            }

        },
        methods: {
            getStates(){
                axios.get('/states')
                    .then(res => {
                        this.states = res.data
                    })
                    .catch(err => console.log(err))
            },
            getCities(stateId){
                axios.get(`/states/${stateId}/cities`)
                    .then(res => {
                        this.cities = res.data
                        if(!this.selectedCity) {
                            this.selectedCity = res.data[0].city_id
                        }


                    })
                    .catch(err => console.log(err))
            },
        }
    }
</script>
