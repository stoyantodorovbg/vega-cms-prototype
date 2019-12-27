<template>
    <div>
        <label>{{ name }} from</label>
        <input @change="changeInput(name, 'greaterThen', 'greaterThenInputValue')"
               v-model="greaterThenInputValue"
               type="date"
               class="form-control"
        >
        <label>{{ name }} to</label>
        <input @change="changeInput(name, 'lessThen', 'lessThenInputValue')"
               v-model="lessThenInputValue"
               type="date"
               class="form-control">
    </div>
</template>

<script>
    export default {
        props: ['name'],

        name: 'DateInput',

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
