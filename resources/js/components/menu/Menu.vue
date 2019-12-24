<template>
    <div v-if="menuData.status">

    </div>
</template>

<script>
    export default {
        name: 'Menu',

        props: ['menu_id'],

        data() {
            return {
                menuData: {},
            }
        },

        mounted() {
            this.load();
        },

        methods: {
            load() {
                axios.get('/api/' + this.$store.state.locale + '/menu', {
                        params: {
                            id: this.menu_id
                        }
                    }
                ).then((response) => {
                    this.menuData = response.data;
                });
            }
        }
    }
</script>
