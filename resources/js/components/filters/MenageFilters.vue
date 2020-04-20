<template>
    <section class="section-filters">
        <div class="row">
            <!-- Filter Options -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <button @click="changeEditing" type="button" class="btn btn-main">{{ getButtonValue() }}</button>
                    </div>
                    <div class="col-lg-12">
                        <div v-if="editing" class="form-group custom-filter-panel">
                            <div class="form-check"
                                 v-for="filter in filters">
                                <b-form-checkbox
                                        class="form-check-input"
                                        :checked="filter.visibility"
                                        @change="checkVisibility(filter.name, filter.visibility)">

                                        <div class="slot">
                                            {{ filter.name }}
                                        </div>
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
    </section>

</template>

<script>
    import Filters from "./Filters";

    export default {
        components: { Filters },

        name: 'MenageFilters',

        props: {
            fields: {
                type: Array,
                default: function() {
                    return [
                        {
                            name: 'id',
                            visibility: true
                        }
                    ]
                },
            },
        },
       data() {
         return {
           editing: false,
         }
       },
      computed: {
            filters: {
                get: function() {
                     let filters = [];

                      this.fields.forEach((field) => {
                            filters.push({
                              name: field.name,
                              visibility: true
                            });
                      });

                    return filters;
                },
            },
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
