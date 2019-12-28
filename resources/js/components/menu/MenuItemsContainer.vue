<template>
    <div :class="menuData.classes"
         :style="menuData.styles"
    >
        <div v-if="menuData.title && menuData.title.status"
             :class="menuData.title.classes"
             :style="menuData.title.styles"
        >
            {{ menuData.title.text }}
        </div>
        <div v-if="menuData.description && menuData.description.status"
             :class="menuData.description.classes"
             :style="menuData.description.styles"
        >
            {{ menuData.description.text }}
        </div>
        <menu-item
            v-for="menuItem in menuData.menuItems"
            :key="menuItem.id"
            :menuItemData="menuItem"
        ></menu-item>
    </div>
</template>

<script>
    import MenuItem from "./MenuItem";

    export default {
        components: {
          MenuItem
        },

        name: 'MenuItemsContainer',

        props: ['menuData']
    }
</script>
