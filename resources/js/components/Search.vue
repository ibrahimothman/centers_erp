<template>
    <div class="col-lg-4 col-sm-2">
        <div class="form-row">
            <div class="col-lg-6 col-sm-2 form-group ">
                <label> ابحث ب  </label>
                <span class="required">*</span>
                <select
                    v-model="searchOption"
                    class="form-control "
                    placeholder="اختار"
                    required>

                    <option v-for="(option, index) in searchOptions"
                        :key="index"
                        :value="option.value"
                        >
                        {{ option.name }}
                    </option>
                </select>
            </div>

            <div class="col-lg-6 col-sm-4 form-group ">
                <label>ادخل </label>
                <input
                    v-model="searchValue"
                    type="text"
                    class="form-control"
                    autocomplete="off"   />
                <div>
                    <ul v-if="suggestionList.length > 0 && modal" class="dropdown-menu">
                        <li v-for="person in suggestionList"
                            :key="person.id"
                            :value="person.id"
                            @click="setPerson(person)">
                            <a href='#'> {{ person.nameAr }} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import debounce from 'lodash.debounce';

export default {
    props: ['endpoint', 'onPersonSelected'],
    data: function(){
        return this.initialData();
    },
    created(){
        this.debouncedSearch = debounce(this.search, 500);
    },
    watch: {
        searchValue: function(newValue, oldValue){
            this.debouncedSearch();
        }
    },
    methods: {
        setPerson(person){
            this.searchValue = person.nameAr;
            this.person = person;
            this.modal = false;
            this.onPersonSelected(person);
        },
        async search(){
            console.log('searching...');
            if(this.searchValue.trim()){
                try {
                    const res = await await axios.get(this.endpoint, {
                        params: {
                            search_by: this.searchOption,
                            value:  this.searchValue
                        }
                    });
                    this.suggestionList = res.data;
                    this.modal = true;
                } catch (error) {
                    console.log(error);
                }
            }
        },
        initialData(){
            return {
                modal: false,

                searchOptions: [
                    {
                        value: "nameAr",
                        name: "الاسم"
                    },
                    {
                        value: "idNumber",
                        name: "الرقم القومي"
                    },
                    {
                        value: "phoneNumber",
                        name: "الموبايل"
                    }
                ],
                searchOption: '',
                searchValue: '',
                suggestionList:[],
                selectedPerson: {},
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
