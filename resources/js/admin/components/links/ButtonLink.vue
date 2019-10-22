<template>
    <a :href="prop_data.url">
        <button class="btn btn-success float-right m-1">{{ prop_data.text}}</button>
    </a>
</template>

<script>
    export default {
        name: 'ButtonLink',
        props: ['prop_data']
    }
</script>
