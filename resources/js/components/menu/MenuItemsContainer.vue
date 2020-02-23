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
           :href="$helpers.adminUrlPrefix($store.state.locale) + menuItemData.url"
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


    export default {
        name: 'menu-items-container',

        components: {
            MenuItem: () => import('./MenuItem'),
        },

        props: ['menuData', 'menuItemData'],

        computed: {
            nestedItems: function () {
                return this.menuData ? this.menuData.menuItems : this.menuItemData.menuItems;
            }
        }
    }
</script>
