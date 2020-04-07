<template>
    <div class="col-lg-12">
        <button @click="changeEditing" type="button" class="btn btn-main">{{ getButtonValue() }}</button>
        <div v-if="editing" class="form-group custom-grid-panel">
            <div class="form-check"
                 v-for="field in fields"
                 :key="field.name">

                <b-form-checkbox
                        class="form-check-input"
                        :name="field.name"
                        :checked="field.visibility"
                        @change="checkVisibility(field.name, field.visibility, field.position)">

                        <div class="slot">
                            {{ field.name }}
                        </div>
                </b-form-checkbox>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'customize-model-index',

        props: {
            fields: {
                type: Array,
                default: function () {
                    return [
                        {
                            name: 'id',
                            position: 0,
                            visibility: true,
                        }
                    ];
                }
            }
        },

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
