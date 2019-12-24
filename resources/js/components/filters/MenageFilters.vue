<template>
    <div>
        <filters :filters="filters"></filters>
        <button @click="changeEditing" type="button" class="btn btn-success float-right m-1">{{ getButtonValue() }}</button>
        <div v-if="editing" class="form-group d-flex mt-3">
            <div class="form-check w-25"
                 v-for="filter in filters"
            >
                <input type="checkbox"
                       class="form-check-input"
                       :checked="filter.visibility"
                       @change="checkVisibility(filter.name, filter.visibility)"
                >
                <label class="form-check-label ml-1">{{ filter.name }}</label>
            </div>
        </div>
    </div>
</template>

<script>
    import Filters from "./Filters";

    export default {
        components: { Filters },

        name: 'MenageFilters',

        props: ['fields'],

        data() {
            return {
                filters: []
            }
        },

        computed: {
            filters: {
                get: function() {
                    let filters = [];
                    for(let field of this.fields) {
                        filters.push({
                            name: field.name,
                            visibility: true
                        });
                    }

                    return filters;
                },
            },
        },

        data() {
            return {
                editing: false,
            }
        },

        methods: {
            checkVisibility(fieldName, fieldVisibility) {
                fieldVisibility = !fieldVisibility;
                this.changeFilterVisibility(fieldName, fieldVisibility);
            },
            getButtonValue() {
                return this.editing ? 'Menage filters - hide menu' : 'Menage filters - show menu';
            },
            changeEditing() {
                this.editing = !this.editing;
            },
            changeFilterVisibility(fieldName, fieldVisibility) {
                this.filters.map((obj) => {
                    if(obj.name === fieldName){
                        obj.visibility = fieldVisibility;
                    }
                })
            }
        }
    }
</script>
