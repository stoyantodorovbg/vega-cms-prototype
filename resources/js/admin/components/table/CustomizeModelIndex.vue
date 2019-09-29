<template>
    <div>
        <button @click="changeEditing" type="button" class="btn btn-success float-right m-1">{{ getButtonValue() }}</button>
        <div v-if="editing" class="form-group d-flex mt-3">
            <div class="form-check w-25"
                 v-for="field in fields"
                 :key="field.name"
            >
                <input type="checkbox"
                       class="form-check-input"
                       :checked="field.visibility"
                       @change="checkVisibility(field.name, field.visibility, field.position)"
                >
                <label class="form-check-label ml-1">{{ field.name }}</label>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'customize-model-index',

        props: ['fields'],

        data() {
            return {
                editing: false,
            }
        },

        methods: {
            checkVisibility(fieldName, fieldVisibility, position) {
                fieldVisibility = !fieldVisibility;
                this.$parent.changeFieldVisibility(fieldName, fieldVisibility, position);
            },
            getButtonValue() {
                return this.editing ? 'Customize grid - hide menu' : 'Customize grid - show menu';
            },
            changeEditing() {
                this.editing = !this.editing;
            }
        }
    }
</script>
