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

        props: {
            input_value: {
                type: String,
                default: ''
            },
            input_name: {
                type: String,
                default: ''
            },
            input_key: {
                type: String,
                default: ''
            },
            json_input_name: {
                type: String,
                default: ''
            },
        },

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
