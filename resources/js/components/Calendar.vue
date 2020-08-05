<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">مواعيد الغرف</div>
                <div class="card-body">

                    <div class="form-group">
                        <label>اختر </label>
                        <select
                            class='form-control'
                            v-model="selectedMainOption">
                            <option v-for="(option, index) in mainOptions"
                                    :key="index"
                                    :value="option"
                            >
                                {{ option.title }}
                            </option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>اختر </label>
                        <select
                            class='form-control'
                            v-model="selectedResource">
                            <option v-for="resource in resources"
                                    :key="resource.id"
                                    :value="resource"
                            >
                                {{ resource.name }}
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
</template>
<script>
    import Fullcalendar from "@fullcalendar/vue";
    import dayGridPlugin from "@fullcalendar/daygrid";
    import interactionPlugin from "@fullcalendar/interaction";
    import axios from 'axios';

    export default {
        components: {
            Fullcalendar,
        },
        data: () => ({
            mainOptions: [
                {
                    model: 'rooms',
                    title: 'الغرف',
                    main_endpoint: '/all-rooms',
                    times_endpoint: '/rooms-calendar',
                    show: 'name',

                },
                {
                    model: 'instructors',
                    title: 'المدربين',
                    main_endpoint: '/all-instructors',
                    times_endpoint: '/instructors-calendar',
                    show: 'nameAr',
                },
            ],
            selectedMainOption: {},
            resources: [],
            selectedResource: {},
            calendarPlugins: [dayGridPlugin, interactionPlugin],
            events: "",
            newEvent: {
                event_name: "",
                start_date: "",
                end_date: ""
            },
            addingMode: true,
            indexToUpdate: "",
        }),

        watch: {
            selectedMainOption: async function(newVlaue, oldValue){
                const { main_endpoint } = newVlaue;
                const { show } = this.selectedMainOption;
                try {
                    const { data } = await axios.get(main_endpoint);
                    this.resources = data.map((item) => {
                        return item = {
                            id: item.id,
                            name: item[show],
                        };
                    });
                } catch (err) {
                    console.error(err);
                }


            },
            selectedResource: async function(){
                const { id } = this.selectedResource;
                const { times_endpoint } = this.selectedMainOption;
                try {
                    const { data } = await axios.get(`${times_endpoint}/${id}`);
                    console.log(data);
                    this.events = data;
                } catch (err) {
                    console.error(err);
                }
            },
            indexToUpdate() {
                return this.indexToUpdate;
            }
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
            resetForm() {
                Object.keys(this.newEvent).forEach(key => {
                    return (this.newEvent[key] = "");
                });
            },

        },
    }
</script>
<style scoped>
    @import "~@fullcalendar/core/main.css";
    @import "~@fullcalendar/daygrid/main.css";
    .fc-title {
        color: black;
    }
    .fc-title:hover {
        cursor: pointer;
    }
</style>
