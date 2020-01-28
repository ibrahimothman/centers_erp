<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

            </div>
            <div class="col-md-8">
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
        data() {
            return {
                calendarPlugins: [dayGridPlugin, interactionPlugin],
                events: "",
                newEvent: {
                    event_name: "",
                    start_date: "",
                    end_date: ""
                },
                addingMode: true,
                indexToUpdate: ""
            };
        },
        created() {
            this.getEvents();
        },
        methods: {
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

            getEvents() {
                axios
                    .get("/room-time")
                    .then(resp => (this.events = resp.data))
                    .catch(err => console.log(err.response.data));
            },
            resetForm() {
                Object.keys(this.newEvent).forEach(key => {
                    return (this.newEvent[key] = "");
                });
            }
        },
        watch: {
            indexToUpdate() {
                return this.indexToUpdate;
            }
        }
    };
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
