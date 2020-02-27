<template>
    <th :class="classes">{{ content }}</th>
</template>

<script>
    export default {
        name: 'cell-th',

        props: ['content', 'classes'],

        props: {
            content: {
                type: String,
                default: 'id'
            },
            classes: {
                type: String,
                default: '',
            },
        }
    }
</script>
