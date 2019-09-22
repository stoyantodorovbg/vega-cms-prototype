<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <cell-td v-for="field in fields" :key="field" :content="field"></cell-td>
            </tr>
            </thead>
            <tbody>
            <tr v-for="model in models" :key="model.id">
                <cell-td v-for="field in fields" :key="field" :content="model[field]"></cell-td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import CellTd from './table/CellTd'
    import CellTh from './table/CellTh'

    export default {
        components: { CellTd, CellTh },
        data() {
            return {
                models: [],
                fields: [],
            }
        },
        mounted() {
            this.load();

        },
        methods: {
            load() {
                axios.get('/api/' + this.$store.state.locale + '/admin/index', {
                        params: {
                            model: 'Group',
                        }
                    }
                ).then((response) => {
                    this.models = response.data;
                    this.fields = Object.keys(this.models[0]);
                })
            }
        }
    }
</script>
