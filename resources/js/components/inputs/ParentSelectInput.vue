<template>
    <select class="form-control text-capitalize"
            :name="input_data.name"
            :id="input_data.id"
            @change="fetchDerivedData()"
            v-model="selectedValue"
    >
        <option value="">Choose one</option>
        <option v-for="option in dataOptions"
                :key="option.value"
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

        props: {
            input_data: {
                type: Object,
                default: function() {
                    return {
                        id: '',
                        name: 'id',
                    }
                },
            },
            event_name: {
                type: String,
                default: 'id_selected',
            },
            options: {
                type: String,
                default: JSON.stringify([{
                    value: 0,
                    text: '',
                }])
            },
            http_data: {
                type: Object,
                default: function () {
                    return {
                        endpoint: '/derived-input-data',
                        field_name: 'id',
                        params: {
                            filters: {
                                id: {
                                    types: {
                                        exact: {
                                            value: ''
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            },
            selected_value: {
                type: String,
                default: '',
            }
        },

        data() {
            return {
                dataOptions: JSON.parse(this.options),
                selectedValue: this.selected_value,
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

        mounted() {
            document.onreadystatechange = () => {
                if (document.readyState == "complete") {
                    if(this.selectedValue) {
                        this.fetchDerivedData();
                    }
                }
            }

        },

        methods: {
            fetchDerivedData() {
                EventBus.$emit(this.event_name, {
                    endpoint: this.http_data.endpoint,
                    params: this.httpDataParams,
                });
            },
        }
    }
</script>
