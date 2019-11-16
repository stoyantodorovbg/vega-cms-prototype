<template>
    <th :class="classes">{{ content }}</th>
</template>

<script>
    export default {
        name: 'cell-th',
        props: ['content', 'classes'],
    }
</script>
