<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">مواعيد الغرف</div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>اختر </label>
                            <select class='form-control' v-model='room' @change='getEvents()'>
                                <option v-for="room in rooms" :value='room.id'>{{ room.name }}</option>
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
                room: 0,
                rooms : []


            }
        },
        methods:{
            getRooms: function(){
                axios.get('/all-rooms')
                    .then(function (response) {
                        this.rooms = response.data;
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
                console.log('getEvent room id = '+this.room);
                axios
                    .get("/room-calendar/"+this.room)
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
