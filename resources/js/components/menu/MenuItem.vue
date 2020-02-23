<template>
    <div :class="menuItemData.classes"
         :style="menuItemData.styles"
    >
        <a v-if="menuItemData.title && menuItemData.title.status"
                :href="$helpers.adminUrlPrefix($store.state.locale) + menuItemData.url"
                :class="menuItemData.title.classes"
                :style="menuItemData.title.styles"
            >
            {{ menuItemData.title.text }}
        </a>
        <div v-if="menuItemData.description && menuItemData.description.status"
             :class="menuItemData.description.classes"
             :style="menuItemData.description.styles"
        >
            {{ menuItemData.description.text }}
        </div>
        <menu-items-container
            v-for="menuItem in menuItemData.menuItems"
            :key="menuItem.id"
            :menuItemData="menuItem"
        ></menu-items-container>
    </div>
</template>

<script>


    export default {
        name: 'menu-item',

        components: {
            MenuItemsContainer: () => import('./MenuItemsContainer'),
        },

        props: ['menuItemData']
    }
</script>
