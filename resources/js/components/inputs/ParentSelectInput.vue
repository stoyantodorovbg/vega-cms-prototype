<template>
    <select class="form-control text-capitalize"
            :name="input_data.name"
            :id="input_data.id"
            @change="inputChanged()"
            v-model="selectedValue"
    >
        <option value="">Choose one</option>
        <option v-for="option in dataOptions"
                :id="option.value"
                :value="option.value"
        >
            {{ option.text }}
        </option>
    </select>
</template>

<script>
    import EventBus from "../../eventBus";

    export default {
        name: 'ParentSelectInput',

        props: ['input_data', 'event_name', 'options', 'http_data'],

        data() {
            return {
                dataOptions: JSON.parse(this.options),
                selectedValue: ''
            }
        },

        computed: {
            httpDataParams: function () {
                let filters = {};
                filters[this.http_data.field_name] = {
                    types: {
                        exact: {
                            value: this.selectedValue,
                        }
                    }
                };

                this.http_data.params['filters'] = JSON.stringify(filters);

                return this.http_data.params;
            }
        },

        methods: {
            inputChanged() {
                EventBus.$emit(this.event_name, {
                    endpoint: this.http_data.endpoint,
                    params: this.httpDataParams,
                });
            }
        }
    }
</script>
