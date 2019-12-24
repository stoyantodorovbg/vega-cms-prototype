<template>
    <div>
        <button @click="changeEditing" type="button" class="btn btn-success float-right m-1">{{ getButtonValue() }}</button>
        <div v-if="showFilters" class="form-group d-flex mt-3">
            <div class="form-check w-25"
                 v-for="filter in getFiltersData()"
            >
                <div v-if="filter.visibility">
                    <component v-bind:is="getFilterDefaultType(filter.name)"
                               :name="filter.name"
                    ></component>
                </div>
            </div>
            <button @click="filter" type="button" class="btn btn-primary float-right m-1">FILTER</button>
        </div>
    </div>
</template>

<script>
    import BoolInput from "./BoolInput";
    import DateInput from "./DateInput";
    import TextInput from "./TextInput";
    import NumberInput from "./NumberInput";

    export default {
        components: { BoolInput, DateInput, TextInput, NumberInput },

        name: 'Filters',

        props: ['filters'],

        data() {
            return {
                showFilters: false,
                filtersData: [],
                filterDefaultTypes: {
                    id: 'number-input',
                    status: 'bool-input',
                    created_at: 'date-input',
                    updated_at: 'date-input',
                }
            }
        },

        methods: {
            checkVisibility(filterName, filterVisibility, position) {
                filterVisibility = !filterVisibility;
                this.$parent.changeFieldVisibility(filterName, filterVisibility, position);
            },
            getButtonValue() {
                return this.showFilters ? 'Hide filters' : 'Show filters';
            },
            changeEditing() {
                this.showFilters = !this.showFilters;
            },
            getFiltersData() {
                this.filtersData = this.filters;

                return this.filtersData;
            },
            getFilterDefaultType(filterName) {
                return this.filterDefaultTypes[filterName] ? this.filterDefaultTypes[filterName] : 'text-input';
            },
            filter() {
                this.$parent.$parent.load(false);
            }
        }
    }
</script>
