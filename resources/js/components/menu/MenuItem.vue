<template>
    <div :class="menuItemData.classes"
         :style="menuItemData.styles"
    >
        <div v-if="menuItemData.title && menuItemData.title.status"
             :class="menuItemData.title.classes"
             :style="menuItemData.title.styles"
        >
            {{ menuData.title.text }}
        </div>
        <div v-if="menuItemData.description && menuItemData.description.status"
             :class="menuItemData.description.classes"
             :style="menuItemData.description.styles"
        >
            {{ menuData.description.text }}
        </div>
        <menu-items-container
            v-if="menuItemData.menuItemsContainer"
            :menuData="menuItemData.menuItemsContainer"
        ></menu-items-container>
    </div>
</template>

<script>
    import MenuItemsContainer from "./MenuItemsContainer";

    export default {
        name: MenuItem,
        components: {MenuItemsContainer},
        comments: {
            MenuItemsContainer
        },

        props: ['menuItemData']
    }
</script>
