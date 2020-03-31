<template>
    <nav>
        <menu-items-container v-if="menuData.status"
                              :menuData="menuData"
        ></menu-items-container>
    </nav>
</template>

<script>
    import MenuItemsContainer from "./MenuItemsContainer";

    export default {
        name: 'DynamicMenu',

        components: {
            MenuItemsContainer,
        },

        props: {
            menu_id: {
                type: Number,
                default: 1
            },
        },

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
                axios.get('/api/' + this.$store.getters.locale + '/menu', {
                        params: {
                            menu_id: this.menu_id
                        }
                    }
                ).then((response) => {
                    this.menuData = response.data.menu;
                });
            }
        }
    }
</script>
