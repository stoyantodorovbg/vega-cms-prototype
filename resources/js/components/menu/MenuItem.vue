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
            v-if="menuItemData.menuItemsContainer"
            :menuItemData="menuItemData.menuItemsContainer"
        ></menu-items-container>
    </div>
</template>

<script>
    import MenuItemsContainer from "./MenuItemsContainer";

    export default {
        name: 'MenuItem',

        components: {
          MenuItemsContainer
        },

        props: ['menuItemData']
    }
</script>
