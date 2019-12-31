<template>
    <div>
        <div class="form-group"
             v-for="(value, key) in inputsData"
             :key="key"
        >
            <label>{{ key }}</label>
            <text-input
                :input_value="value"
            ></text-input>
        </div>
        <add-json-input-key></add-json-input-key>
    </div>
</template>

<script>
    import TextInput from "./TextInput";
    import AddJsonInputKey from "./AddJsonInputKey";

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
            }
        },

        computed: {
            inputsData: function () {
                let inputsData = {};
                for (let key in this.jsonData.structure) {
                    inputsData[key] = this.jsonData[key] !== 'undefined' ? this.jsonData[key] : '';
                }

                return inputsData;
            }
        },

        methods: {
            addStructureKey(newKey) {
                if(this.inputsData[newKey] != 'undefined') {
                    this.inputsData[newKey] = '';
                    this.$forceUpdate();
                }
            }
        }
    }
</script>
