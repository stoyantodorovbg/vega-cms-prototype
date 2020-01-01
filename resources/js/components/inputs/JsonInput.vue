<template>
    <div>
        <div class="form-group"
             v-for="(value, key) in inputsData"
             :key="key"
        >
            <label>{{ key }}</label>
            <text-input
                :input_value="value"
                :input_name="getInputName(key)"
                :input_key="key"
                :json_input_name="input_name"
            ></text-input>
        </div>
        <add-json-input-key></add-json-input-key>
    </div>
</template>

<script>
    import TextInput from "./TextInput";
    import AddJsonInputKey from "./AddJsonInputKey";
    import EventBus from '../../eventBus';

    export default {
        name: 'JsonInput',

        components: {
            TextInput, AddJsonInputKey
        },

        props: ['json_data', 'input_name'],

        data() {
            return {
                jsonData: this.json_data !== '[]' ?
                    JSON.parse(this.json_data) :
                    {
                        structure: {}
                    },
                inputName: this.input_name + '[]',
            }
        },

        mounted() {
            this.watchForAddedInput();
        },

        computed: {
            inputsData: function () {
                let inputsData = {};
                if(this.jsonData.structure != 'undefined' && this.jsonData.structure.length > 0) {
                    for (let field of this.jsonData.structure) {
                        inputsData[field] = this.jsonData[field] !== 'undefined' ? this.jsonData[field] : '';
                    }
                }

                return inputsData;
            },
        },

        methods: {
            addStructureKey(newKey) {
                if(this.inputsData[newKey] != 'undefined') {
                    this.inputsData[newKey] = '';
                    this.$forceUpdate();
                }
            },
            watchForAddedInput() {
                EventBus.$on('json_text_input_added', (data) => {
                    if(data.jsonInputName === this.input_name) {
                        this.inputsData[data.inputName] = data.inputValue;
                    }
                });
            },
            getInputName(key) {
                return this.input_name + '[' + key + ']';
            }
        }
    }
</script>
