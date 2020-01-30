<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">مواعيد الغرف</div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>اختر </label>
                            <select  class='form-control' v-model='option' @change='getData()'>
                                <option v-for="option in options" >{{ option }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>اختر </label>
                            <select class='form-control' v-model='source' @change='getEvents()'>
                                    <option v-for="source in sources" :value='source.id'>
                                        {{ option === 'rooms' ? source.name : source.nameAr }}
                                    </option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-8 mt-5">
                <Fullcalendar @eventClick="showEvent" :plugins="calendarPlugins" :events="events"/>
            </div>

        </div>
    </div>
</template>

<script>
    import Fullcalendar from "@fullcalendar/vue";
    import dayGridPlugin from "@fullcalendar/daygrid";
    import interactionPlugin from "@fullcalendar/interaction";
    import axios from "axios";
    export default {
        components: {
            Fullcalendar
        },

        data(){
            return {
                calendarPlugins: [dayGridPlugin, interactionPlugin],
                events: "",
                newEvent: {
                    event_name: "",
                    start_date: "",
                    end_date: ""
                },
                addingMode: true,
                indexToUpdate: "",
                options : ['rooms', 'instructors'],
                option : 0,
                source: 0,
                sources : []


            }
        },
        methods:{
            getData: function(){
                axios.get('/all-'+this.option)
                    .then(function (response) {
                        this.sources = response.data;
                        this.source = 0;
                    }.bind(this));

            },

            showEvent(arg) {
                this.addingMode = false;
                const { id, title, start, end } = this.events.find(
                    event => event.id === +arg.event.id
                );
                this.indexToUpdate = id;
                this.newEvent = {
                    event_name: title,
                    start_date: start,
                    end_date: end
                };
            },

            getEvents: function() {
                axios
                    .get("/"+this.option+"-calendar/"+this.source)
                    .then(resp => (this.events = resp.data))
                    .catch(err => console.log(err.response.data));
            },

            resetForm() {
                Object.keys(this.newEvent).forEach(key => {
                    return (this.newEvent[key] = "");
                });
            }

        },

        created: function(){
            this.getRooms()
        },

        watch: {
            indexToUpdate() {
                return this.indexToUpdate;
            }
        }
    }
</script>
<style lang="css">
    @import "~@fullcalendar/core/main.css";
    @import "~@fullcalendar/daygrid/main.css";
    .fc-title {
        color: #fff;
    }
    .fc-title:hover {
        cursor: pointer;
    }
</style>
