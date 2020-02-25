<template>
    <div>
        <label>{{ name }}</label>
        <input @change="changeInput(name, 'exact')"
               v-model="inputValue"
               type="checkbox">
    </div>
</template>

<script>
    export default {
        name: 'BoolInput',

        props: {
            name: {
                type: String,
                default: 'status',
            },
        },

        data() {
            return {
                inputValue: true,
            }
        },

        methods: {
            changeInput(fieldName, type)
            {
                this.$parent.$parent.$parent.updateFilters(fieldName, this.inputValue, type);
            }
        }
    }
</script>
