<template>
    <div>
        <menage-filters :fields="fieldsFiltersSettings"></menage-filters>
        <customize-model-index :fields="fieldsGridSettings"></customize-model-index>
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
    import MenageFilters from "./filters/MenageFilters";

    export default {
        components: { CellTd, CellTh, CustomizeModelIndex, MenageFilters },

        props: ['model_name'],

        data() {
            return {
                models: {},
                displayedFields: [],
                modelFields: {},
                defaultFieldsCount: 10,
                filters: {}
            }
        },

        computed: {
            fieldsGridSettings: {
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
            fieldsFiltersSettings: {
                get: function() {
                    let fieldSettings = [];
                    for(let field in this.modelFields) {
                        fieldSettings.push({
                            name: this.modelFields[field],
                            visibility: true,
                        });
                    }

                    return fieldSettings;
                },
            },
        },

        mounted() {
            this.load();
        },

        methods: {
            load(initial = true) {
                axios.get('/api/' + this.$store.state.locale + '/admin/index', {
                        params: {
                            model: this.model_name,
                            filters: this.filters
                        }
                    }
                ).then((response) => {
                    this.models = response.data;
                    if(initial) {
                        this.setFields(this.models, this.defaultFieldsCount);
                    }
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
                        visibility: true
                    });
                    counter++;
                }
            },

            storeFieldsSettings(fields) {
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
                this.fieldsGridSettings.map(function(field) {
                    if(fieldName === field.name) {
                        field.visibility = fieldVisibility;
                        if(fieldVisibility) {
                            self.displayedFields.push({
                                name: fieldName,
                                position: position,
                                visibility: fieldVisibility
                            });
                        } else {
                            self.displayedFields = self.displayedFields.filter(e => e.name !== field.name);
                        }

                        return field;
                    }
                });
                self.displayedFields.sort(function(a, b){return a.position - b.position});
                this.storeFieldsSettings(self.displayedFields)
            },
            updateFilters(fieldName, value, type)
            {
                if(typeof this.filters[fieldName] === 'undefined') {
                    this.filters[fieldName] = {
                        types: {
                            [type]: {
                                value: value,
                            }
                        }
                    }
                } else if(typeof this.filters[fieldName] !== 'undefined' &&
                    typeof this.filters[fieldName].types[type] === 'undefined'
                ) {
                    this.filters[fieldName].types[type] = {
                        value: value
                    }
                } else {
                    this.filters[fieldName].types[type].value = value;
                }
            }
        }
    }
</script>
