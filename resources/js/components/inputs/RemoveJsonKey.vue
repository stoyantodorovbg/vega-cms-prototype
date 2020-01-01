<template>
    <button type="button"
            class="btn btn-danger"
            @click="removeKey()"
    >Remove this input key
    </button>
</template>

<script>

    export default {
        name: 'RemoveJsonKey',

        props: ['input_key'],

        methods: {
            removeKey() {
                if (this.input_key !== '') {
                    this.$parent.removeStructureKey(this.input_key);
                }
            }
        }
    }
</script>
