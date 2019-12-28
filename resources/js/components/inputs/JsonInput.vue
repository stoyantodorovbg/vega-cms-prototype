<template>
    <div>
        <div class="form-group"
             v-for="(value, key) in inputsData"
             :key="key"
        >
            <label>{{ key }}:</label>
            <text-input
                :input_value="value"
            ></text-input>
        </div>
    </div>
</template>

<script>
    import TextInput from "./TextInput";

    export default {
        name: 'JsonInput',

        components: {
            TextInput
        },

        props: ['json_data', 'input_name'],

        data() {
            return {
                jsonData: JSON.parse(this.json_data),
            }
        },

        computed: {
            inputsData: function () {
                let inputsData = {};

                if (this.jsonData.structure !== 'undefined') {
                    for (let key in this.jsonData.structure) {
                        inputsData[key] = this.jsonData[key] !== 'undefined' ? this.jsonData[key] : '';
                    }
                }

                return inputsData;
            }
        },
    }
</script>
