<template>
    <div>
        <div v-for="(value, key) in json_data">
            {{ key }}: {{ value }}
        </div>
    </div>
</template>

<script>
    export default {
        name: 'JsonPresenter',

        props: ['json_data']
    }
</script>
