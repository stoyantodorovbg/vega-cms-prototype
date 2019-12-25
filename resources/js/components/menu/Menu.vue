<template>
        <menu-items-container v-if="menuData.status"
                              :menuData="menuData"
        ></menu-items-container>
</template>

<script>
    import MenuItemsContainer from "./MenuItemsContainer";

    export default {
        name: 'Menu',

        components: {
            MenuItemsContainer,
        },

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
