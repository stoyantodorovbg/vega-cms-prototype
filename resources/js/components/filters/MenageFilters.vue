<template>
    <div class="col-lg-12">
        <div class="row">
            <!-- Filter Options -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <button @click="changeEditing" type="button" class="btn btn-success">{{ getButtonValue() }}</button>
                    </div>
                    <div class="col-lg-12">
                        <div v-if="editing" class="form-group custom-filter-panel">
                            <div class="form-check"
                                 v-for="filter in filters">
                                <b-form-checkbox
                                        class="form-check-input"
                                        :checked="filter.visibility"
                                        @change="checkVisibility(filter.name, filter.visibility)">

                                    {{ filter.name }}
                                </b-form-checkbox>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Form -->
            <div class="col-lg-12">
                <filters :filters="filters"></filters>
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
