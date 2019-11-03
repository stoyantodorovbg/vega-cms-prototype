<template>
    <a :href="prop_data.url">
        <i :class="prop_data.icon_class"></i>
    </a>
</template>

<script>
    export default {
        name: 'IconLink',
        props: ['prop_data']
    }
</script>
