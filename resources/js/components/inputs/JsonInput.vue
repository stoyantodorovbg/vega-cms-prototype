<template>
    <div class="ml-5">
        <div class="form-group m-2 border p-2"
             v-for="(value, key) in inputsData"
             :key="key"
        >
            <label v-if="key !== 'empty_json'">{{ key }}</label>
            <text-input
                v-if="value.type === 'text'"
                :input_value="value.value"
                :input_name="getInputName(key)"
                :input_key="key"
                :json_input_name="input_name"
            ></text-input>
            <json-input v-else
                        :input_name="input_name + '[' + key + ']'"
                        :json_data="JSON.stringify(value)"
                        :level="parseInt(level) + 1"
            ></json-input>
            <remove-json-key :input_key="input_name"></remove-json-key>
        </div>
        <input v-if="Object.keys(jsonData).length === 0 && jsonData.constructor === Object"
               type="hidden"
               :name="input_name"
               value="[]"
        />
        <add-json-input-key :input_key="input_name"></add-json-input-key>
        <input
            v-if="level < 1"
            type="hidden"
            :name="input_name + '[structure]'"
            :value="structure"
        />
    </div>
</template>

<script>
    import TextInput from "./TextInput";
    import AddJsonInputKey from "./AddJsonInputKey";
    import EventBus from '../../eventBus';
    import RemoveJsonKey from "./RemoveJsonKey"

    export default {
        name: 'JsonInput',

        components: {
            TextInput, AddJsonInputKey, RemoveJsonKey
        },

        props: ['json_data', 'input_name', 'level'],

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
            structure: function () {
                if (typeof this.jsonData.structure === 'object' && typeof this.jsonData.structure !== null) {
                    return this.jsonData.structure;
                }

                return '';
            },
            inputsData: function () {
                let inputsData = {};
                if(this.jsonData.structure === 0) {
                    inputsData['empty_json'] = '';
                    inputsData['structure'] = {
                        empty_json: 'text'
                    }
                } else {
                    for (let key in this.jsonData.structure) {
                        if (key !== 'structure' && key !== 'type') {
                            if (this.jsonData.structure[key].type === 'text') {
                                inputsData[key] = {
                                    type: typeof this.jsonData[key] === 'object' && this.jsonData[key] !== null ?
                                        'json' : 'text',
                                    value: typeof this.jsonData[key] === 'object' && this.jsonData[key] !== null ?
                                        this.jsonData[key].value : this.jsonData[key],
                                }
                            } else if (this.jsonData.structure[key].type === 'json') {
                                inputsData[key] = {};
                                if(this.jsonData[key].length === 0) {
                                    inputsData[key]['empty_json'] = '';
                                    inputsData[key]['structure'] = {
                                        empty_json: 'text'
                                    }
                                } else {
                                    for (let subKey in this.jsonData[key]) {

                                        if (typeof this.jsonData[key][subKey] === 'object' && this.jsonData[this.jsonData.structure[key]] !== null) {
                                            inputsData[key][subKey] = {
                                                type: 'json',
                                                value: {}
                                            };
                                            for (let objectSubKey in this.jsonData[key][subKey]) {
                                                inputsData[key][subKey][objectSubKey] = this.jsonData[key][subKey][objectSubKey];
                                            }
                                        } else {
                                            inputsData[key][subKey] = this.jsonData[key][subKey];
                                        }
                                    }
                                    inputsData[key].structure = this.jsonData.structure[key].nested;
                                }
                            } else {
                                inputsData[key] = {
                                    type: 'text',
                                    value: ''
                                }
                            }
                        }
                    }
                }

                return inputsData;
            },
        },

        methods: {
            addStructureKey(newKey, keyType) {
                if(this.inputsData[newKey] != 'undefined') {
                    if(keyType === 'text') {
                        this.inputsData[newKey] = {
                            type: keyType,
                            value: ''
                        };
                        if('empty_json' in this.inputsData) {
                            delete this.inputsData.empty_json
                        }
                    } else {
                        this.inputsData[newKey] = {
                            empty_json: '',
                            structure: {
                                empty_json: 'text'
                            }
                        };
                    }
                    this.$forceUpdate();
                }
            },
            removeStructureKey(key) {
                if(this.inputsData[key] != 'undefined') {
                    delete this.inputsData[key];
                    this.$forceUpdate();
                }
            },
            watchForAddedInput() {
                EventBus.$on('json_text_input_added', (data) => {
                    if(data.jsonInputName === this.input_name) {
                        this.inputsData[data.inputName.value] = data.inputValue;
                    }
                });
            },
            getInputName(key) {
                return this.input_name + '[' + key + ']';
            },
        }
    }
</script>
