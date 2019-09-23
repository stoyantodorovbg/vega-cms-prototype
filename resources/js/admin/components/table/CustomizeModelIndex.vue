<template>
    <div class="form-group d-flex mt-3">
        <div class="form-check w-25"
             v-for="field in fields"
             :key="field.name"
        >
            <input type="checkbox"
                   class="form-check-input"
                   :checked="field.visibility"
                   @change="checkVisibility(field.name, field.visibility)"
            >
            <label class="form-check-label ml-1">{{ field.name }}</label>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'customize-model-index',
        props: ['fields'],
        methods: {
            checkVisibility(fieldName, fieldVisibility) {
                fieldVisibility = !fieldVisibility;
                this.$parent.changeFieldVisibility(fieldName, fieldVisibility);
            }
        }
    }
</script>
