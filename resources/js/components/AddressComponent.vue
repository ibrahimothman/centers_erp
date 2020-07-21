<template>

    <div class="form-row">
        <div class="col-sm-6 form-group">
            <label> المحافظة </label>
            <select class="form-control" name="state" v-model="selectedState" @change="getCities(selectedState)">
                <option v-for="state in states"
                    :value="state.state_id"
                    :key="state.id"

                >{{ state.name }}</option>
            </select>
        </div>
        <div class="col-sm-6 form-group">
            <label>المدينه </label>
            <select class="form-control" name="city" v-model="selectedCity" >
                <option v-for="city in cities"
                        :value="city.city_id"
                        :key="city.id"
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
            async getStates(){
                try {
                    const response = await axios.get('/states');
                    this.states = response.data

                } catch (err) {
                    console.log(err);
                }
            },
            async getCities(stateId){
                try {
                    const response = await axios.get(`/states/${stateId}/cities`)
                    this.cities = response.data
                    // console.log(response.data);
                    if(!this.selectedCity) {
                        this.selectedCity = response.data[0].city_id
                    }
                } catch (err) {
                    console.log(err);
                }

            },
        }
    }
</script>
