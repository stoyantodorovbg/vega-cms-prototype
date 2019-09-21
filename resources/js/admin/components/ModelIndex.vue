<template>
    <div>
        <div v-for="model in models" :key="model.id">
            111
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                models: []
            }
        },
        mounted() {
            this.load()
        },
        methods: {
            load() {
                axios.get('/api/en/api/admin/index', {
                        params: {
                            model: 'Group',
                        }
                    }
                ).then((response) => {
                    this.models = response.data;
                })
            }
        }
    }
</script>
