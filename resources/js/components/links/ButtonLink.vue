<template>
    <div class="col-lg-12 float-right">
        <a :href="prop_data.url" :class="prop_data.htmlClass">
            {{ prop_data.text}}
        </a>
    </div>
</template>

<script>
    export default {
        name: 'ButtonLink',
        props: {
          prop_data: ''
        }
    }
</script>
