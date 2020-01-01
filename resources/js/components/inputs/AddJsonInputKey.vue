<template>
        <div v-if="adding">
            <input v-model="newKey"
                   type="text"
                   class="form-control"
            />
            <button type="button"
                    class="btn btn-success"
                    @click="addKey()"
            >Add key
            </button>
        </div>
        <button v-else
                type="button"
                class="btn btn-success"
                @click="addingKey()"
        >
            Create new key
        </button>
</template>

<script>
    export default {
        name: 'AddJsonInputKey',

        data() {
            return {
                adding: false,
                newKey: '',
            }
        },

        methods: {
            addingKey() {
                this.adding = true;
            },

            addKey() {
                if(this.newKey !== '') {
                    this.$parent.addStructureKey(this.newKey);
                }

                this.adding = false;
                this.newKey = '';
            }
        }
    }
</script>
