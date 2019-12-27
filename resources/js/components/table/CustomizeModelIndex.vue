<template>
    <div class="col-lg-12 mt-3 mb-3">
        <button @click="changeEditing" type="button" class="btn btn-success">{{ getButtonValue() }}</button>
        <div v-if="editing" class="form-group custom-grid-panel">
            <div class="form-check"
                 v-for="field in fields"
                 :key="field.name">

                <b-form-checkbox
                        class="form-check-input"
                        :name="field.name"
                        :checked="field.visibility"
                        @change="checkVisibility(field.name, field.visibility, field.position)">

                    {{ field.name }}
                </b-form-checkbox>
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
        },
        mounted() {
          // console.log(this.fields);
        }
    }
</script>
