<template>
    <span v-if="text_data !== null">
        <span v-if="typeof text_data !== 'object'">{{ text_data }}</span>
        <component v-else
                   v-for="(element, i) in text_data"
                   :key="i"
                   :is="element.tag"
                   :href="element.href ? element.href : false"
                   :target="element.target ? element.target : false"
                   :src="element.src ? element.src : false"
                   :class="element.class ? element.class : false"
                   :style="element.style ? element.style : false"
        >
            <text-renderer v-if="typeof element.content === 'object' && element.content !== null"
                           :text_data="element.content"
            ></text-renderer>
            <span v-else>{{ element.content }}</span>
        </component>
    </span>
</template>

<script>
    export default {
        name: 'TextRenderer',

        props: ['text_data'],
    }
</script>
