<template>
    <select class="form-control text-capitalize"
            :name="input_data.name"
            :id="input_data.id"
            v-model="selected"
    >
        <option value="">Choose one</option>
        <option v-for="option in options"
                :key="option.value"
                :value="option.value"
                :selected="option.value == selected_value"
        >
            {{ option.text }}
        </option>
    </select>
</template>

<script>
    import EventBus from "../../eventBus";

    export default {
        name: 'DerivedSelectInput',

        props: {
            input_data: {
                type: Object,
                default: {
                    id: 'id',
                    name: 'id',
                },
            },
            listen_on: {
                type: String,
                default: 'id_selected',
            },
            selected_value: {
                type: String,
                default: '',
            }
        },

        data() {
            return {
                options: [],
                selected: this.selected_value
            }
        },

        mounted() {
            this.listenTo();
        },

        methods: {
            listenTo() {
                EventBus.$on(this.listen_on, (data) => {
                    this.getData(data.endpoint, data.params)
                });
            },
            getData(endpoint, params) {
                axios.get('/api/' + this.$store.state.locale + endpoint, {
                        params: params
                    }
                ).then((response) => {
                    this.options = response.data.options;
                });
            }
        }
    }
</script>
