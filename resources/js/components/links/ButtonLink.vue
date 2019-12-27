<template>
    <a :href="prop_data.url">
        <button :class="prop_data.htmlClass">{{ prop_data.text}}</button>
    </a>
</template>

<script>
    export default {
        name: 'ButtonLink',
        props: ['prop_data']
    }
</script>
