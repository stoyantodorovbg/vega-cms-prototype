<template>
    <div>
        <label>{{ name }}</label>
        <b-input-group size="lg">
            <b-form-input
                    @change="changeInput(name, 'greaterThen', 'greaterThenInputValue')"
                    v-model="greaterThenInputValue"
                    type="date"
            ></b-form-input>
        </b-input-group>

        <label>{{ name }}</label>
        <b-input-group size="lg">
            <b-form-input
                    @change="changeInput(name, 'lessThen', 'lessThenInputValue')"
                    v-model="lessThenInputValue"
                    type="date"
            ></b-form-input>
        </b-input-group>
    </div>

</template>

<script>
    export default {
        name: 'DateInput',

        props: {
            name: {
                type: String,
                default: 'created_at',
            },
        },

        data() {
            return {
                greaterThenInputValue: 0,
                lessThenInputValue: 0,
            }
        },

        methods: {
            changeInput(fieldName, type, valueKey)
            {
                let value = this[valueKey];

                if(this[valueKey] === '') {
                    if(valueKey === 'greaterThenInputValue') {
                        value = '1001-01-01';
                    } else {
                        value = '9970-01-01';
                    }
                }
                this.$parent.$parent.$parent.updateFilters(fieldName, value, type);
            },
        }
    }
</script>
