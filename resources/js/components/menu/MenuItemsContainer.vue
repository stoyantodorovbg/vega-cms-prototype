<template>
    <div :class="menuData ? menuData.classes : menuItemData.classes"
         :style="menuData ? menuData.styles : menuItemData.styles"
    >
        <div v-if="menuData && menuData.title && menuData.title.status"
             :class="menuData.title.classes"
             :style="menuData.title.styles"
        >
            {{ menuData.title.text }}
        </div>
        <div v-if="menuData && menuData.description && menuData.description.status"
             :class="menuData.description.classes"
             :style="menuData.description.styles"
        >
            {{ menuData.description.text }}
        </div>
        <a v-if="menuItemData && menuItemData.title && menuItemData.title.status"
           :href="$helpers.adminUrlPrefix($store.getters.locale) + menuItemData.url"
           :class="menuItemData.title.classes"
           :style="menuItemData.title.styles"
        >
            {{ menuItemData.title.text }}
        </a>
        <div v-if="menuItemData && menuItemData.description && menuItemData.description.status"
             :class="menuItemData.description.classes"
             :style="menuItemData.description.styles"
        >
            {{ menuItemData.description.text }}
        </div>
        <menu-item
            v-for="menuItem in nestedItems"
            :key="menuItem.id"
            :menuItemData="menuItem"
        ></menu-item>

    </div>
</template>

<script>

    import MenuItem from './MenuItem.vue';

    export default {
        name: 'menu-items-container',

        components: {
         // appMenuItem: MenuItem,
          MenuItem: () => import('./MenuItem.vue'),
        },

        props: {
            menuData: {
                type: Object,
                default: function () {
                    return {
                        id: 1,
                        classes: '',
                        status: 1,
                        title: {
                            classes: '',
                            status: 0,
                            text: 'menu item',
                            structure: {
                                classes: {
                                    type: 'text',
                                },
                                status: {
                                    type: 'text',
                                },
                                styles: {
                                    nested: [],
                                    type: 'json'
                                },
                                text: {
                                    type: 'text',
                                },
                            },
                            styles: [],
                        },
                        description: {
                            classes: '',
                            status: 0,
                            text: 'simple menu item',
                            structure: {
                                classes: {
                                    type: 'text',
                                },
                                status: {
                                    type: 'text',
                                },
                                styles: {
                                    nested: [],
                                    type: 'json'
                                },
                                text: {
                                    type: 'text',
                                },
                            },
                            styles: [],
                        },
                        styles: [],
                    }
                }
            },
            menuItemData: {
                type: Object,
                default: function () {
                    return {
                        id: 1,
                        classes: '',
                        status: 1,
                        title: {
                            classes: '',
                            status: 0,
                            text: 'menu item',
                            structure: {
                                classes: {
                                    type: 'text',
                                },
                                status: {
                                    type: 'text',
                                },
                                styles: {
                                    nested: [],
                                    type: 'json'
                                },
                                text: {
                                    type: 'text',
                                },
                            },
                            styles: [],
                        },
                        description: {
                            classes: '',
                            status: 0,
                            text: 'simple menu item',
                            structure: {
                                classes: {
                                    type: 'text',
                                },
                                status: {
                                    type: 'text',
                                },
                                styles: {
                                    nested: [],
                                    type: 'json'
                                },
                                text: {
                                    type: 'text',
                                },
                            },
                            styles: [],
                        },
                        styles: [],
                    }
                }
            }
        },

        computed: {
            nestedItems: function () {
                return this.menuData ? this.menuData.menuItems : this.menuItemData.menuItems;
            }
        }
    }
</script>
