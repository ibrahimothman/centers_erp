<template>

    <h1>Address</h1>

</template>

<script>
    import axios from 'axios';
    export default {
        data(){
            return{
                states: [],
                state: '',
                cities: []
            }
        },
        created() {
            this.getStates()
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
                console.log(stateId);
                axios.get(`/states/${stateId}/cities`)
                    .then(res => this.cities = res.data)
                    .catch(err => console.log(err))
            },
        }
    }
</script>
