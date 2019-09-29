<template>
    <div>
        <label>{{ name }} from</label>
        <input @change="changeInput(name, 'greaterThen', 'greaterThenInputValue')"
               v-model="greaterThenInputValue"
               type="number"
               class="form-control"
        >
        <label>{{ name }} to</label>
        <input @change="changeInput(name, 'lessThen', 'lessThenInputValue')"
               v-model="lessThenInputValue"
               type="number"
               class="form-control"
        >
    </div>
</template>

<script>
    export default {
        props: ['name'],

        name: 'NumberInput',

        data() {
            return {
                greaterThenInputValue: '',
                lessThenInputValue: '',
            }
        },

        methods: {
            changeInput(fieldName, type, valueKey)
            {
                let value = this[valueKey];

                if(this[valueKey] === '') {
                    if(valueKey === 'greaterThenInputValue') {
                        value = Number.MIN_SAFE_INTEGER;

                    } else {
                        value = Number.MAX_SAFE_INTEGER;
                    }
                }

                this.$parent.$parent.$parent.updateFilters(fieldName, value, type);
            }
        }
    }
</script>
