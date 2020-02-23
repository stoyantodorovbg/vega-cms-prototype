<template>
    <select class="form-control text-capitalize" :name="input_data.name" :id="input_data.id">
        <option value="">Choose one</option>
        <option v-for="option in options"
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
        name: 'DerivedSelectInput',

        props: ['input_data', 'listen_on'],

        data() {
            return {
                options: []
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
                console.log(params)
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
