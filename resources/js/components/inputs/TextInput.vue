<template>
    <input v-model="inputValue"
           :name="input_name"
           type="text"
           class="form-control"
           @change="inputChange(input_key)"
           :hidden="this.input_key === 'empty_json'"
    />
</template>

<script>
    import EventBus from '../../eventBus';

    export default {
        name: 'TextInput',

        props: ['input_value', 'input_name', 'input_key', 'json_input_name'],

        data() {
            return {
                inputValue: this.input_value !== null ? this.input_value : '',
            }
        },

        methods: {
            inputChange(inputName) {
                EventBus.$emit('json_text_input_added', {
                    inputName: inputName,
                    inputValue: this.inputValue,
                    jsonInputName: this.json_input_name,
                });
            },
        }
    }
</script>
