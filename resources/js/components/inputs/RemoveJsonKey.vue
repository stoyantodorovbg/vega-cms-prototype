<template>
    <button v-if="this.input_key !== 'empty_json'"
        type="button"
        class="btn btn-danger btn-sm"
        @click="removeKey()"
    >Remove {{ title }} input key</button>
</template>

<script>

    export default {
        name: 'RemoveJsonKey',

        props: ['title', 'input_key'],

        methods: {
            removeKey() {
                if (this.input_key !== '') {
                    this.$parent.removeStructureKey(this.input_key);
                }
            }
        }
    }
</script>
