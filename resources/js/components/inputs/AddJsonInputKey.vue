<template>
        <div v-if="adding">
            <input v-model="newKey"
                   type="text"
                   class="form-control"
            />
            <div class="d-flex">
                <select
                    v-model="keyType"
                    @change="keyTypeChoosed()"
                    class="form-control w-50 m-3 text-capitalize"
                >
                    <option value="">Choose key type</option>
                    <option value="text">Text</option>
                    <option value="json">JSON</option>
                </select>
                <button type="button"
                        class="btn btn-main"
                        @click="addKey()"
                        :disabled="isAddKeyButtonDisabled"
                >Add key
                </button>
            </div>
        </div>
        <button v-else
                type="button"
                class="btn btn-main"
                @click="addingKey()"
        >
            Add new key to {{ input_key }}
        </button>
</template>

<script>
    export default {
        name: 'AddJsonInputKey',

        props: {
            input_key: {
                type: String,
                default: 'id',
            },
        },

        data() {
            return {
                adding: false,
                newKey: '',
                keyType: '',
                isAddKeyButtonDisabled: true
            }
        },

        methods: {
            addingKey() {
                this.adding = true;
            },
            addKey() {
                if(this.newKey !== '') {
                    this.$parent.addStructureKey(this.newKey, this.keyType);
                }

                this.adding = false;
                this.newKey = '';
            },
            keyTypeChoosed() {
                if(this.keyType) {
                    this.isAddKeyButtonDisabled = false;
                }
            }
        }
    }
</script>
