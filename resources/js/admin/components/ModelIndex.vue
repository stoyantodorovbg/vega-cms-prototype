<template>
    <div>
        <customize-model-index :fields="fieldsSettings"></customize-model-index>
        <table class="table">
            <thead>
            <tr>
                <cell-td v-for="field in displayedFields" :key="field.name" :content="field.name"></cell-td>
            </tr>
            </thead>
            <tbody>
            <tr v-for="model in models" :key="model.id">
                <cell-td v-for="field in displayedFields" :key="field.name" :content="model[field.name]"></cell-td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import CellTd from './table/CellTd'
    import CellTh from './table/CellTh'
    import CustomizeModelIndex from "./table/CustomizeModelIndex";

    export default {
        components: { CellTd, CellTh, CustomizeModelIndex },

        props: ['model_name'],

        data() {
            return {
                models: {},
                displayedFields: [],
                modelFields: {},
                defaultFieldsCount: 10,
            }
        },

        computed: {
            fieldsSettings: {
                get: function() {
                    let fieldSettings = [];
                    let counter = 0;
                    for(let field in this.modelFields) {
                        fieldSettings.push({
                            name: this.modelFields[field],
                            visibility: true,
                            position: counter,
                        });
                        counter++;
                    }

                    return fieldSettings;
                },
            },
        },

        mounted() {
            this.load();
        },

        methods: {
            load() {
                axios.get('/api/' + this.$store.state.locale + '/admin/index', {
                        params: {
                            model: this.model_name,
                        }
                    }
                ).then((response) => {
                    this.models = response.data;
                    this.setFields(this.models, this.defaultFieldsCount);
                });
            },

            setFields(models, defaultFieldsCount = 10) {
                let displayedFields = this.modelFields = Object.keys(this.models[0]);

                if(defaultFieldsCount > this.modelFields.length) {
                    defaultFieldsCount = this.modelFields.length;
                    displayedFields = this.modelFields.slice(0, defaultFieldsCount);
                }

                let counter = 0;
                for(let field of displayedFields) {
                    this.displayedFields.push({
                        name: field,
                        position: counter,
                    });
                    counter++;
                }
            },

            prepareFieldsSettingsData(fields) {
                let params = {
                    settings: fields,
                    modelName: this.model_name
                };
                this.$store.commit('addModelDisplaySettings', params);

                let stateDisplaySettings = this.$store.state.adminIndexDisplaySettings;

                return fields;
            },
            changeFieldVisibility(fieldName, fieldVisibility, position) {

                let self = this;
                this.fieldsSettings.map(function(field) {
                    if(fieldName === field.name) {
                        field.visibility = fieldVisibility;
                        if(fieldVisibility) {
                            self.displayedFields.push({
                                name: fieldName,
                                position: position
                            });
                        } else {
                            self.displayedFields = self.displayedFields.filter(e => e.name !== field.name);
                        }

                        self.displayedFields.sort(function(a, b){return a.position - b.position});

                        return field;
                    }
                });
            }
        }
    }
</script>
