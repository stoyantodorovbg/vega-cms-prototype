<template>
    <div>
        <label>{{ name }}</label>
        <input @change="changeInput(name, 'like')"
               v-model="inputValue"
               type="text"
               class="form-control"
        >
    </div>
</template>

<script>
    export default {
        props: ['name'],

        name: 'TextInput',

        data() {
            return {
                inputValue: ''
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
